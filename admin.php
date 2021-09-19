<?php require_once('header.php');  ?>


<!-- #################     PHP               ############################################################ -->

<?php
error_reporting(0);
require_once("data_base.php");

$username_set = "rrvcskilimanoor";
$password_set = "adminofrrvcs";

$username = $_REQUEST['admin_username'];
$password = $_REQUEST['admin_password'];

if(($username == "director") && ($password == "pass123"))
die(header ('Location:director.php?allow=yes'));

if(isset($_REQUEST['return_from_student_page'])) { $username = $username_set;  $password = $password_set; }
if(isset($_REQUEST['allow_access']))				 { $username = $username_set;  $password = $password_set; }


if(($username != $username_set) || ($password != $password_set))  { header('Location:index.php?login_error=error');  die(); }



//echo "<br>Username : $username   <---->Password : $password";



echo "<div class=\"wrapper col2\">
<div id=\"container\">
<table border=\"0\">
<tr>
<td align=\"center\"><a href=\"admin.php?value=image_gallery&allow_access=yes\">  <img src=\"images/demo/img_gallery.png\" height=\"80px\" width=\"100px\"></a></td>
<td align=\"center\"><a href=\"admin.php?value=news&allow_access=yes\">           <img src=\"images/demo/news.png\" height=\"80px\" width=\"100px\"></a></td>
<td align=\"center\"><a href=\"admin.php?value=add_student&allow_access=yes\">    <img src=\"images/demo/add_student.png\" height=\"80px\" width=\"100px\"></a></td>
<td align=\"center\"><a href=\"admin.php?value=parents&allow_access=yes\">        <img src=\"images/demo/parents.png\" height=\"80px\" width=\"100px\"></a></td>
<td align=\"center\"><a href=\"admin.php?value=read_feed_back&allow_access=yes\"> <img src=\"images/demo/read_mail.png\" height=\"80px\" width=\"100px\"></a></td>
<td align=\"center\"><a href=\"admin.php?value=message&allow_access=yes\">        <img src=\"images/demo/quick_message.png\" height=\"80px\" width=\"100px\"></a></td>
</tr>
<tr>
<td align=\"center\"><a href=\"admin.php?value=image_gallery&allow_access=yes\"> Image Gallery </a></td> 
<td align=\"center\"><a href=\"admin.php?value=news&allow_access=yes\"> Update News </a></td> 
<td align=\"center\"><a href=\"admin.php?value=add_student&allow_access=yes\"> Add Student </a></td>
<td align=\"center\"><a href=\"admin.php?value=parents&allow_access=yes\"> Parents </a></td>
<td align=\"center\"><a href=\"admin.php?value=read_feed_back&allow_access=yes\"> Read Feedback </a></td>
<td align=\"center\"><a href=\"admin.php?value=message&allow_access=yes\"> Quick message </a></td>
</tr>                    
</table>
</div>
</div>";




if(isset($_REQUEST['value']))
{

echo "<div class=\"wrapper col3\">";
echo "<div id=\"container\">";

echo "<form action=\"admin.php\" method=\"POST\">";
echo "<input type=\"hidden\" value=\"yes\" name=\"allow_access\">";
echo "<input type=\"submit\" value=\"Close [X]\" name=\"close_submit\" style=\"float:right;\">";
echo "</form>";

//--------------------------------------------
$value = $_REQUEST['value'];
include("image_upload.php");		//------------------ Image Gallery
include("add_news.php");			//------------------ Add news
include("quick_message.php");		//------------------ Quick message
include("read_feedback.php");		//------------------ Read Feedback
include("add_student.php");         //------------------ Add student
include("parents_enquiry.php");     //------------------ Add student
//--------------------------------------------

echo "</div>";
echo "</div>";
}
?>

<!-- ####################################################################################################### -->


<div class="wrapper col4">

<div id="footer">
<div class="footbox"><a href="http://www.facebook.com"><img src="images/demo/fb.png" height="20px" width="20px" alt="facebook"></a> </div>
<div class="footbox"><a href="http://www.twitter.com"><img src="images/demo/twitter.png" height="20px" width="20px" alt="twitter"></a> </div>
<div class="footbox">&nbsp;&nbsp;&nbsp;&nbsp;</div>
<div class="footbox"><a href="http://www.cbse.nic.in/"><h2>CBSE</h2></a></div>

</div>
<br class="clear" />

</div>



<!---------------FOOTER WITH DESIGN CREDITS------------------------------------------------------------------------------------->
<div class="wrapper col5">
  <div id="copyright">
    <p class="fl_left">Site driven by <b>Steps IT Solutions</b> (9447020535) || Site best viewed in Mozilla Firefox</p>
    <p class="fl_right">Design Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <br class="clear" />
  </div>
</div>


</body>
</html>
