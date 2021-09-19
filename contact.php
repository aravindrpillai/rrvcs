<?php  $contact = "active"; require_once('header.php');  ?>
<!-- ####################################################################################################### -->


<div class="wrapper col3">
<div id="homecontent">

<div class="fl_left">
<div class="column2">
<h2>Location</h2>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3943.1328147406516!2d76.857772!3d8.773572999999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1408038476234" width="520" height="350" frameborder="0" style="border:0"></iframe>
</div>
</div>


	
	
<div class="fl_right">
<h2>Contact Address</h2>

<ul>
<p><strong><a>ABCD Central School</a></strong></p>
<p><strong><a>City</a></strong></p>
<p><strong><a>District</a></strong></p>
<p><strong><a>State</a></strong></p></li>
<li><p><strong><a>Pin : 69xxxx</a></strong></p></li>
<p><strong><a>Contact No : 047x-xxxxxx</a></strong></p>
<li><p><strong><a>Email : abcd@gmail.com</a></strong></p></li>

</ul>

</div>

    
	
<br class="clear" />
</div>
</div>



<!-- ####################################################################################################### -->
<div id="container">



<?php
if(isset($_REQUEST['feed_back_submit']))
{
require_once("data_base.php");

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$contact_no = $_REQUEST['contact_no'];
$query_fb = $_REQUEST['query']; 

$time = strftime('%c');
if     (!empty($_SERVER['HTTP_CLIENT_IP']))       {$ip = $_SERVER['HTTP_CLIENT_IP'];} 
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];} 
else                                              {$ip = $_SERVER['REMOTE_ADDR'];}
$ip_address = $ip;

$query = "CREATE TABLE IF NOT EXISTS feedback (slno INT NOT NULL AUTO_INCREMENT, name VARCHAR(35) NOT NULL, email VARCHAR(40) NOT NULL, contact_no VARCHAR(13) NOT NULL, query VARCHAR(200) NOT NULL, time VARCHAR(20) , ip_address VARCHAR(16), PRIMARY KEY(slno)  )";
$result = mysql_query($query);
if(!$result) echo "<font color=\"red\"> Error in table Creation ". mysql_error()."</font>";


$query = "INSERT INTO feedback (name, email, contact_no, query, time, ip_address) VALUES 
(\"$name\",\"$email\",\"$contact_no\",\"$query_fb\",\"$time\",\"$ip_address\")";

echo "<h2> Queries  </h2>";
$result = mysql_query($query);
if(!$result) echo "<font color=\"red\"> Error in sending your feedback ". mysql_error()."</font><br><br><br>";
else  echo "<font color=\"green\"> <b>Feedback Successfully posted <b></font><br><br><br>";

}
?>


<h2> Feedback </h2>

<form action="contact.php" method="post">
<table border="0">
<tr><td>Name </td><td> <input required type="text" name="name" placeholder="Derik John" style="width:300px; height:22px;"></td></tr>
<tr><td>Email ID </td><td> <input required type="email" name="email" placeholder="derik@yahoo.com"  style="width:300px; height:22px;"></td></tr>
<tr><td>Contact No </td><td> <input required type="text" name="contact_no" placeholder="9447020535" style="width:300px; height:22px;"></td></tr>
<tr><td>Query </td><td> <textarea required name="query" rows="5" cols="30" style="width:300px; height:100px;" ></textarea></td></tr>
<tr><td></td><td> <input type="submit" value="Submit" name="feed_back_submit"  style="width:100px; height:32px;"><input type="reset" value="Reset"  style="width:100px; height:32px;"></td></tr>
</table>
</form>
</div>


<!-- ####################################################################################################### -->

<?php require_once('footer.php'); ?>