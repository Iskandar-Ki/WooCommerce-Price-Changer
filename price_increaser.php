<?php
include "conf.php";
/** Do you want some cool messages? */
$ENABLE_PRINT = True;
/** Usually these values are default attribute to change product price.
 * With this list, will be increase default price, min_price and max_price if you have variants
 */
$CHANGE_VALUES = ['_price','_min_variation_regular_price','_max_variation_regular_price','_max_variation_price','_regular_price','_sale_price'];

foreach( $TERM_ID_LIST as $TERM_ID ){
    foreach( $CHANGE_VALUES as $param ){
        try{
            $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM  `wp_postmeta` WHERE meta_key = '$param' AND ( `post_id` IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = $TERM_ID))) OR `post_id` IN (SELECT `ID` FROM wp_posts WHERE post_parent IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = $TERM_ID))) ))";
            $results = $conn->query($sql);
            foreach ($results as $row) {
                if ($PERCENT_INCREASE) {
                    $new_price = $row['meta_value']+($row['meta_value']*$INCREMENT_VALUE)/100;
                }else{
                    $new_price = $row['meta_value']+$INCREMENT_VALUE;
                }
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
                if ( $ENABLE_PRINT ){
                    echo ">".$row["post_id"]."<";
                    echo $row['meta_id']." ".$row['meta_value']." -> ".$new_price." Updated successfully";  
                }       
            }
        }catch(PDOException $e){
            echo "<span style=\"color:red\">Connection failed: " . $e->getMessage()."</span>";
        }
    } 
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `wp_options` WHERE `option_name` LIKE ('%\_transient\_%')";
        $results = $conn->query($sql);
        if ( $ENABLE_PRINT ){
            echo "<span style=\"color:green\">Cache deleted successfully</span>";
        }
    }catch(PDOException $e){
        echo "<span style=\"color:red\">Connection failed: " . $e->getMessage()."</span>";
    }
}
?>