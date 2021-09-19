<?php require_once('header.php');  ?>

<!-- #################     PHP               ############################################################ -->

<div class='wrapper col3'>
<div id='container'>


<?php
$pw = "director123password";
error_reporting(0);
require_once("data_base.php");

if($_REQUEST['login_pw'] == $pw)
{

$value = "read_feed_back";
echo "<fieldset>";
include("read_feedback.php");
echo "</fieldset><br><br>";
//----------------------------------------------------------
echo "<fieldset>";
echo "<h2> Parents - Principal Chat Box </h2>";
$query = "SELECT DISTINCT from_adr FROM parent_principal ORDER BY slno DESC";
$result = mysql_query($query); if(!$result) echo mysql_error();

for($i=0;$rows = mysql_fetch_array($result);$i++)
if($rows['from_adr'] != "principal")
$sender[$i] = $rows['from_adr'];


$count = count($sender);

for($i=0;$i<=$count;$i++)
if($sender[$i] != "")
{
$slno = $sender[$i];
$query = "SELECT * FROM student_details WHERE slno=$slno";
$result = mysql_query($query); if(!$result) echo mysql_error();
$rows=mysql_fetch_array($result);
$name = $rows['name'];
$adno = $rows['adno'];
$class_div = $rows['class_div'];

echo "<fieldset> <legend>$name of $class_div , Adno : $adno</legend>";

$query = "SELECT * FROM parent_principal WHERE (from_adr=$slno OR to_adr=$slno) ORDER BY slno DESC";
$result=mysql_query($query);
echo "<table>";
while($rows = mysql_fetch_array($result))
{
$text = $rows['text_content']; 
$to = $rows['to_adr'];
$date_time = $rows['date_time'];
$from = $rows['from_adr'];
if($to == "principal") echo "<tr><td><font color=\"red\" size=\"2\">$name : </font></td>         <td><font color=\"magenta\" size=\"2\">"; 
if($from == "principal") echo "<tr><td><font color=\"red\" size=\"2\">Principal : </font></td>   <td><font color=\"orange\" size=\"2\">";
echo "$text </font></td>   <td><font color=\"red\" size=\"2\">( $date_time )</font></td><tr>";
}
echo "</table>";

echo "</fieldset>";
}

//----------------------------------------------------------

echo "</fieldset>";
}
else
{
echo "<center><fieldset>";
if( ($_REQUEST['login_pw'] != $pw) && (($_REQUEST['login_pw'] != "")) )
echo "<br> <font color=\"red\"> Access Denied </font><br><br>";
echo "<legend>Director Access </legend><form action=\"director.php\" method=\"POST\">
<input type=\"password\" name=\"login_pw\" style=\"width:300px; height:30px;\">
<br>
<input type=\"submit\" name=\"submit\" value=\"Access\"  style=\"width:300px; height:30px;\">

</form></fieldset></center>";
}


echo "</div></div>";
?>

<!-- ####################################################################################################### -->

<?php require_once('footer.php'); ?>
