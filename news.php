

<?php require_once('header.php');  ?>

<div class="wrapper col3">
<div id="container">
<h2> NEWS / INFORMATIONS </h2>

<?php
error_reporting(0);
require_once("data_base.php");

$result = mysql_query("SELECT * FROM news ORDER BY slno DESC");
while ($rows = mysql_fetch_array($result))
{
$title = $rows['title'];
$news = $rows['news'];
$time = $rows['date_and_time_of_register'];

echo"
<a><b>$title</b> <font size=\"1\" color=\"orange\">( posted on $time )</font></a><br>
$news
<br><br>";
}
 
?>

</div></div>

<?php require_once('footer.php');  ?>