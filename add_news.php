
<?php if($value == "news"): ?>

<h2> Update News </h2>
<form action='admin.php' method='POST'>

<table>
<tr><td>Title </td><td> <input required maxlength='50' type='text' name='title' style='height:30px; width:450px;' > <font size='1'>max 50 char</font></td></tr>
<tr><td>News </td><td> <textarea required maxlength='500' name='news' rows='6' cols='60' style='height:100px; width:450px;'></textarea><font size='1'> max 500 char</font></td></tr>

<input type='hidden' value='yes' name='allow_access'>
<input type='hidden' value='news' name='value'>

<tr><td></td><td>
<input type='submit' name='news_submit' value='Submit' style='height:30px; width:100px;'>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='reset' value='Reset' style='height:30px; width:100px;'></td></tr>
</table>
</form>

<?php 
if(isset($_REQUEST['news_submit']))
{
$title = $_REQUEST['title'];
$news = $_REQUEST['news'];
$date_and_time_of_register = strftime('%c');

$query = "CREATE TABLE IF NOT EXISTS news (slno INT NOT NULL AUTO_INCREMENT , title varchar(55), news varchar(515), date_and_time_of_register varchar(30) , PRIMARY KEY(slno) ) ";
$result = mysql_query($query); if(!$result) die("Error in table creation " . mysql_error());

$query = "INSERT INTO news (title, news, date_and_time_of_register) VALUES (\"$title\",\"$news\",\"$date_and_time_of_register\")";
$result = mysql_query($query); if(!$result) die("Writing into table error " . mysql_error());
else 
echo "<center><a>Successfully posted </a></center>";
}
?>


<?php endif; ?>
 

