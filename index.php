<?php  $index = "active"; require_once('header.php');  ?>
<!-- ####################################################################################################### -->

<div class="wrapper col2">
<div id="featured_slide">
  
<div class="featured_box"><a><img src="images/demo/wel_img_1.jpg" alt="" /></a>
<div class="floater">
<h2>1. About Our School</h2>
<p><font size="5">R</font>AJA RAVI VARMA  central school was started as a project of Raja Ravi Varma cultural and educational centre Kilimanoor on 15 June 1992.The school started functioning with eight students in 1st class standard and in each consecutive year one higher class was added.</p>
</div>
</div>

<div class="featured_box"><a><img src="images/demo/wel_img_2.jpg" alt="" /></a>
<div class="floater">
<h2>2. Positive atmosphere</h2>
<p><font size="5">W</font>ith best teachers ,best syllabus,best curriculum you cannot seek the attention and concentration of a student. It needs a pupil friendly atmosphere, which makes them feel 'YES!! This is my home'. We provide that positive atmosphere.</p>
</div>
</div>

<div class="featured_box"><a><img src="images/demo/wel_img_3.jpg" alt="" /></a>
<div class="floater">
<h2>3. Children's Park</h2>
<p><font size="5">O</font>ur school have a good children's park to entertain the kids as our policy is not to live inside the books.</p>
</div>
</div>

<div class="featured_box"><a href="#"><img src="images/demo/wel_img_4.jpg" alt="" /></a>
<div class="floater">
<h2>4. School Assembly</h2>
<p><font size="5">A</font> high quality school assembly is one of the most important aspects of a school's curriculum. Its potential to nurture a positive school ethos that stresses care for the self, others and the pursuit of all forms of excellence should not be underestimated. It powerfully nurtures the development of intrapersonal intelligence. 
</p>
</div>
</div>

<div class="featured_box"><a href="#"><img src="images/demo/wel_img_5.jpg" alt="" /></a>
<div class="floater">
<h2>5. CBSE Affiliated</h2>
<p><font size="5">T</font>he CBSE board granted Senior Secondary Affiliation in 2003 and the Secondary Section started in the same year.</p>
</div>
</div>


</div>
</div>



<!-- ####################################################################################################### -->


<div class="wrapper col3">
  <div id="homecontent">
    <div class="fl_left">
	
      <div class="column2">
        <h2>Our Vision</h2>
        <img class="imgl" src="images/demo/logo.jpg" width="125px" height="125px" alt="" />
<p><b> &raquo; We are moulding global citizens who are proud of their &nbsp;&nbsp;&nbsp; heritage and blessed with values and knowledge.</b></p>
<p><b> &raquo; We are moulding generations who are proud of their<br>&nbsp;&nbsp;&nbsp; heritage , aware of their responsibilities and inspired by <br>&nbsp;&nbsp;&nbsp; values and knowledge.</b></p>
<p><b> &raquo; In the era of competition and everyday innovation we<br>&nbsp;&nbsp;&nbsp; prepare global citizens and better individuals. We teach <br>&nbsp;&nbsp;&nbsp; children how to think , not what to think.</b></p>
<p><b> &raquo; Our vision is to prepare noble souls who are inspired by values, knowledge<br>&nbsp;&nbsp;&nbsp; and intelligence.</b></p>
   
   </div>
    </div>
	
	
	
	
	
	
	
	
	
	
<?php
error_reporting(0);
require_once("data_base.php");
?>

<div class=fl_right>
<a href="news.php">
<h2>Latest News Feeds &nbsp;&nbsp;&nbsp;&nbsp;  <font size="2" color="red"> click to read more </font></h2>

<ul>
<marquee behavior="scroll" direction="up" onMouseOver="this.stop();" onMouseOut="this.start();" scrollamount="3">

<?php
$result = mysql_query("SELECT * FROM news ORDER BY slno DESC");
while ($rows = mysql_fetch_array($result))
{
$title = $rows['title'];
$news = $rows['news'];
$time = $rows['date_and_time_of_register'];
?>

<li>
<p><strong><a><?php echo $title ?><font size="1" color="orange">( posted on <?php echo $time ?> )</font></a></strong></p>
<p><?php echo $news ?></p>
</li>
<?php } ?>

</marquee></ul></a></div>
  

	
<br class="clear" />
</div>
</div>



<?php
$query="SELECT * FROM images ORDER BY slno DESC LIMIT 1";
$result = mysql_query($query);
if($result):
$result = mysql_fetch_array($result);

?>

<div class="wrapper col3">
<div id="container">
<fieldset><legend>Gallery Updates</legend>	

<table><tr>


<?php
for($i=2; $i<10; $i++)
{
$loc_thu = "images/thumbnail/".$result[$i];
$loc_org = "images/uploaded/".$result[$i];

echo "<td><a rel=\"gallery_group\" href=\"$loc_org\"><img src='$loc_thu' height='70px' width='70px'></a></td>";
}

endif;
?>
</tr>
</table>
</fieldset></div></div>
<!-- ####################################################################################################### -->

<?php require_once('footer.php'); ?>