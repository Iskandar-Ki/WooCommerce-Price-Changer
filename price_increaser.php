<?php

include "conf.php";

$termid = "term_to_search";

$percent_increase = true;
$percent = 5.00;

$numeral_increase = false;
$numeral = 10.00;

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM  `wp_postmeta` WHERE meta_key =  '_price' AND ( `post_id` IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = "+$termid+"))) OR `post_id` IN (SELECT `ID` FROM wp_posts WHERE post_parent IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = "+$termid+"))) ))";
    $results = $conn->query($sql);
    foreach ($results as $row) {
            echo ">".$row["post_id"]."<";
            if ($percent_increase) {
                $new_price = $row['meta_value']+($row['meta_value']*$percent)/100;
                $new_price = round($new_price,2);
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
            }elseif ($numeral_increase) {
                $new_price = $row['meta_value']+$numeral;
                $new_price = round($new_price,2);
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
            }
            echo $row['meta_id']." ".$row['meta_value']." -> ".$new_price." Updated successfully\n";
        
    }
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM  `wp_postmeta` WHERE meta_key =  '_min_variation_regular_price' AND ( `post_id` IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = "+$termid+"))) OR `post_id` IN (SELECT `ID` FROM wp_posts WHERE post_parent IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = "+$termid+"))) ))";
    $results = $conn->query($sql);
    foreach ($results as $row) {
        echo ">".$row["post_id"]."<";
            if ($percent_increase) {
                $new_price = $row['meta_value']+($row['meta_value']*$percent)/100;
                $new_price = round($new_price,2);
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
            }elseif ($numeral_increase) {
                $new_price = $row['meta_value']+$numeral;
                $new_price = round($new_price,2);
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
            }
        echo $row['meta_id']." ".$row['meta_value']." -> ".$new_price." Updated successfully\n";
        
    }
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM  `wp_postmeta` WHERE meta_key =  '_max_variation_regular_price' AND ( `post_id` IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = "+$termid+"))) OR `post_id` IN (SELECT `ID` FROM wp_posts WHERE post_parent IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = "+$termid+"))) ))";
    $results = $conn->query($sql);
    foreach ($results as $row) {
            if ($percent_increase) {
                $new_price = $row['meta_value']+($row['meta_value']*$percent)/100;
                $new_price = round($new_price,2);
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
            }elseif ($numeral_increase) {
                $new_price = $row['meta_value']+$numeral;
                $new_price = round($new_price,2);
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
            }
        echo $row['meta_id']." ".$row['meta_value']." -> ".$new_price." Updated successfully\n";
        
    }
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM  `wp_postmeta` WHERE meta_key =  '_max_variation_price' AND ( `post_id` IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = "+$termid+"))) OR `post_id` IN (SELECT `ID` FROM wp_posts WHERE post_parent IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = "+$termid+"))) ))";
    $results = $conn->query($sql);
    foreach ($results as $row) {
        echo ">".$row["post_id"]."<";
            if ($percent_increase) {
                $new_price = $row['meta_value']+($row['meta_value']*$percent)/100;
                $new_price = round($new_price,2);
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
            }elseif ($numeral_increase) {
                $new_price = $row['meta_value']+$numeral;
                $new_price = round($new_price,2);
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
            }
        echo $row['meta_id']." ".$row['meta_value']." -> ".$new_price." Updated successfully\n";
        
    }
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM  `wp_postmeta` WHERE meta_key =  '_min_variation_price' AND ( `post_id` IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = "+$termid+"))) OR `post_id` IN (SELECT `ID` FROM wp_posts WHERE post_parent IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = "+$termid+"))) ))";
    $results = $conn->query($sql);
    foreach ($results as $row) {
        echo ">".$row["post_id"]."<";
            if ($percent_increase) {
                $new_price = $row['meta_value']+($row['meta_value']*$percent)/100;
                $new_price = round($new_price,2);
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
            }elseif ($numeral_increase) {
                $new_price = $row['meta_value']+$numeral;
                $new_price = round($new_price,2);
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
            }
        echo $row['meta_id']." ".$row['meta_value']." -> ".$new_price." Updated successfully\n";
        
    }
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM  `wp_postmeta` WHERE meta_key =  '_regular_price' AND ( `post_id` IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = "+$termid+"))) OR `post_id` IN (SELECT `ID` FROM wp_posts WHERE post_parent IN (SELECT `object_id` FROM `wp_term_relationships` WHERE term_taxonomy_id IN (SELECT `term_taxonomy_id` FROM wp_term_taxonomy WHERE (term_id = "+$termid+"))) ))";
    $results = $conn->query($sql);
    foreach ($results as $row) {
        echo ">".$row["post_id"]."<";
            if ($percent_increase) {
                $new_price = $row['meta_value']+($row['meta_value']*$percent)/100;
                $new_price = round($new_price,2);
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
            }elseif ($numeral_increase) {
                $new_price = $row['meta_value']+$numeral;
                $new_price = round($new_price,2);
                $sql2="UPDATE `wp_postmeta` SET `meta_value` = '".$new_price."' WHERE meta_id = ".$row['meta_id'];
                $results2 = $conn->exec($sql2);
            }
        echo $row['meta_id']." ".$row['meta_value']." -> ".$new_price." Updated successfully\n";
        
    }
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM `wp_options` WHERE `option_name` LIKE ('%\_transient\_%')";
    $results = $conn->query($sql);
    echo "Cache Deleted successfully\n";

}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>