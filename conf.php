<?php
$servername = "localhost";
$dbname = "database_name";
$username = "username";
$password = "*******";

/** TERM_ID represent id of categories */
$TERM_ID_LIST = [1,2,3];
/** If True, increment will be 
 *      value += (value * INCREMENT_VALUE )/100
 *  else
 *      value += INCREMENT_VALUE
 */
$PERCENT_INCREASE = true;
/** INCREMENT_VALUE is value of increment.
 * if you use PERCENT_INCREASE set to True, and you want increase of 30%
 * this value must be set to 30 not 0.3
 */
$INCREMENT_VALUE = 30;

?>