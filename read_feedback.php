<?php


if($value == "read_feed_back")
{
echo "<h2> Feedback </h2>";
$query = "SELECT * FROM feedback ORDER BY slno DESC";
$result = mysql_query($query);
while($rows = mysql_fetch_array($result))
{
$name = $rows['name'];
$email = $rows['email'];
$contact_no = $rows['contact_no'];
$query = $rows['query'];
$time = $rows['time'];
$ip_address = $rows['ip_address'];

echo "<b><font color=\"green\"> $name </font></b>Posted on $time ";
echo "<br><b><font color=\"blue\"> $query </font></b>";
echo "<br> $email - $contact_no , $ip_address <br><br>";

}

}



?>