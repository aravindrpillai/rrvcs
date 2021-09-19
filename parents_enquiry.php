<?php

if(isset($_REQUEST['send_text']))
{
$to = $_REQUEST['slno'];
$text = $_REQUEST['query'];
$from = "principal";
$date = strftime('%c');
if     (!empty($_SERVER['HTTP_CLIENT_IP']))       {$ip = $_SERVER['HTTP_CLIENT_IP'];} 
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];} 
else                                              {$ip = $_SERVER['REMOTE_ADDR'];}

$query = "INSERT INTO parent_principal (from_adr, to_adr, text_content, ip_adr, date_time) VALUES (\"$from\",\"$to\",\"$text\",\"$ip\",\"$date\")";
$result = mysql_query($query); if(!$result) echo "<font color=\"red\"> Error in sending  ". mysql_error()."</font>";
}




if($value == "parents")
{
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
//echo "$query <br>";
$result = mysql_query($query); if(!$result) echo mysql_error();
$rows=mysql_fetch_array($result);
$name = $rows['name'];
$adno = $rows['adno'];
$date = $rows['date_time'];
$class_div = $rows['class_div'];

echo "<fieldset> <legend>$name of $class_div , Adno : $adno</legend>";
echo "<form action=\"admin.php\" method=\"POST\">";
echo "<input required type=\"text\" name=\"query\" style=\"width:800px\">";

echo "<input type=\"hidden\"  value=\"$slno\" name=\"slno\">";
echo "<input type=\"hidden\" value=\"yes\" name=\"allow_access\">";
echo "<input type=\"hidden\" value=\"parents\" name=\"value\">";

echo "&nbsp; <input type=\"submit\"  value=\"Send\" name=\"send_text\" style=\"width:100px\">";
echo "</form><br>";

$query = "SELECT * FROM parent_principal WHERE (from_adr=$slno OR to_adr=$slno) ORDER BY slno DESC";
$result=mysql_query($query);
echo "<table>";
while($rows = mysql_fetch_array($result))
{
$text = $rows['text_content']; 
$to = $rows['to_adr'];
$from = $rows['from_adr'];
$date = $rows['date_time'];
if($to == "principal") echo "<tr><td><font color=\"black\" size=\"2\">$name :  </font></td><td><font color=\"magenta\" size=\"2\">"; 
if($from == "principal") echo "<tr><td><font color=\"black\" size=\"2\">You :  </font></td><td><font color=\"orange\" size=\"2\">";
echo "$text </font></td><td><font color=\"black\" size=\"2\"> On $date </font></td></tr>";
}


echo "</table></fieldset>";
}

}
?>