<?php
//----------FOR LOCAL HOST--------------------------------------------------------------


$db = "school_db";

$conn = mysql_connect('localhost','root',''); 
if (!$conn)  { die('Could not connect to MySQL: ' . mysql_error()); } 

$result = mysql_query("CREATE DATABASE IF NOT EXISTS $db");
if (!$result)  { die('Could not create new database: ' . mysql_error()); } 

$db = mysql_select_db("$db" , $conn);
if (!$db)  { die('Could not connect to database $db : ' . mysql_error()); } 


/*
//----------FOR SERVER------------------------------------------------------------------

$db = "rrvcentralschool_org_db";

$conn = mysql_connect('localhost','rrvcentr_root','maira_onnutheeerkkadey'); 
if (!$conn)  { die('Could not connect to MySQL: ' . mysql_error()); } 

$result = mysql_query("CREATE DATABASE IF NOT EXISTS $db");
if (!$result)  { die('Could not create new database: ' . mysql_error()); } 

$db = mysql_select_db("$db" , $conn);
if (!$db)  { die('Could not connect to database $db : ' . mysql_error()); } 


*/


?>
