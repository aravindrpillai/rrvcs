<?php require_once('header.php'); ?>


<!-- ####################################################################################################### -->

<script language='javascript' type='text/javascript'>
		function check(input)
		{
		if(input.value != document.getElementById('password_1').value)
		input.setCustomValidity('Mismatching Passwords ');
		else
		input.setCustomValidity('');
		}
		
		function check2(input)
		{
		if(input.value != document.getElementById('password_2').value)
		input.setCustomValidity('Mismatching Passwords ');
		else
		input.setCustomValidity('');
		}

</script>



<!-- #################     PHP               ############################################################ -->


<?php
require_once("data_base.php");
$table_name = "student_details";
$wait = 10;

/*------------ If no value is set to username and password, this page will redirect to home page with an error message------------*/
if ((!isset($_REQUEST['parent_username'])) || (!isset($_REQUEST['parent_password'])))   die(header('Location:index.php?login_error=error'));
/*------------The above code is to avoid accessing the page with direct URL -> (www.***.com/parents_login.php)--------------------*/


$username = $_REQUEST['parent_username'];
$password = $_REQUEST['parent_password'];
$query = "SELECT * FROM  $table_name WHERE (username=\"$username\") OR (slno = \"$username\") ";
$result = mysql_query($query);  if(!$result) die(header('Location:index.php?login_error=error'));
$rows = mysql_fetch_array($result);

$slno = $rows['slno'];
$username_db = $rows['username'];
$password_db = $rows['password'];
$mobile = $rows['mobile'];
$land_line = $rows['land_line'];

/*--------Trying to access account using slno and contact no even after setting new UN and PW-------------------*/
if( ($password_db != "def_password") && ($slno == $username) && ($username_db != "def_username") && (($password==$land_line)||($password==$mobile)))
die("<br> Redirecting from here ; trying to access with slno even after setting UN and PW<br>");
//die(header('Location:index.php?login_error=error')); // if once username is set they can login only with username and cannot with slno




//--------------------SAVING NEW LOGIN CREDENTIALS TO DB--------------------------------------------------------------------------------------
if(isset($_REQUEST['set_user_login']))
{
$wait = 1;
echo "<br> Inside SAVING NEW LOGIN CREDENTIALS TO DB<br> ";
$slno = $_REQUEST['slno'];
$username = $_REQUEST['username_set'];
$password = $_REQUEST['password_1'];
if(($username == "def_username") || ($password == "def_password")) header('Location:index.php?login_error=def_values');

$query = "UPDATE $table_name SET username=\"$username\", password=\"$password\" WHERE slno='$slno'  ";
$result = mysql_query($query);
if(!$result) echo "<font color=\"red\"> Error .". mysql_error()."</font> ";
else 
{
$loc = "Location:parents_login.php?parent_username=".$username."&parent_password=".$password."&msg=success";
die(header($loc));
}
}
//-----------------------------------------------------------------------------------------------------------------------------------------




//------------FOR FIRST LOGIN TO SET THEIR USER_NAME AND PASSWORD--------------------------------------------------------------------------
if( ($password_db == "def_password") && ($username_db=="def_username") && (($mobile==$password) || ($land_line==$password)) )
{
$wait = 1;
echo "<div class=\"wrapper col3\">  <div id=\"homecontent\">";
$name = $rows['name'];
echo "<h2>Welcome $name.  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
 <font color=\"red\"> Set your username and password </font></h2>";
echo "<table><form action=\"parents_login.php\" method=\"POST\">";
echo "<tr><td>Username </td><td>: <input required type=\"text\" name=\"username_set\"> </td></tr>";
echo "<tr><td>Password </td><td>: <input required type=\"password\" name=\"password_1\" id=\"password_1\"> </td></tr>";
echo "<tr><td>Re enter Password </td><td>: <input required type=\"password\" name=\"password_2\" id=\"passwordconf\" oninput=\"check(this)\"> </td></tr>";

echo "<tr><td>
<input type=\"hidden\" name=\"slno\" value=\"$slno\">
<input type=\"hidden\" value=\"def_username\" name=\"parent_username\">
<input type=\"hidden\" value=\"def_password\" name=\"parent_password\">
<br></td><td><br></td></tr>";

echo "<tr><td><br></td><td>&nbsp;&nbsp;&nbsp;	
<input type=\"submit\" name=\"set_user_login\" value=\"Set login credentials\" style=\height:30px;\"> </td></tr>";
echo "</form></table>";

echo "<br><br><font color=\"blue\">Note : When you have successfully update your username and password, you will be redirected to home page. 
You need to use your new username and password to access your account there after. In case of any login difficulty, please contact principal. </font>";
echo "</div></div>";
}
//---------------------------------------------------------------------------------------------------------------------------------









//-----------------------------------------------------------------------------------------------------------------------------------------
if(isset($_REQUEST['message_submit']))	
{
$wait = 1;
$query = "CREATE TABLE IF NOT EXISTS parent_principal (slno INT NOT NULL AUTO_INCREMENT, from_adr VARCHAR(10) NOT NULL, to_adr VARCHAR(10) NOT NULL, 
text_content VARCHAR(200) NOT NULL, date_time VARCHAR(20), ip_adr VARCHAR(17), PRIMARY KEY(slno))";
//echo "<br>$query<br>";
$result = mysql_query($query); if(!$result) echo "<font color=\"red\"> Table creation error ". mysql_error()."</font>";

$text = $_REQUEST['query'];
$from = $slno;
$to = "principal";

if     (!empty($_SERVER['HTTP_CLIENT_IP']))       {$ip = $_SERVER['HTTP_CLIENT_IP'];} 
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];} 
else                                              {$ip = $_SERVER['REMOTE_ADDR'];}


$query = "INSERT INTO parent_principal (from_adr, to_adr, text_content, ip_adr, date_time) VALUES (\"$from\",\"$to\",\"$text\",\"$ip\",NOW())";
$result = mysql_query($query); if(!$result) echo "<font color=\"red\"> Error in sending  ". mysql_error()."</font>";
}	




//-----------------------------------------------------------------------------------------------------------------------------------------
if(($username == $username_db) && ($password == $password_db) && ($username != "def_username") && ($password != "def_password"))
{
$wait=1;

$query = "SELECT * FROM  $table_name WHERE (username=\"$username\")";
$result = mysql_query($query);  if(!$result) echo "<br> Error".mysql_error();
$rows = mysql_fetch_array($result);

$slno = $rows['slno'];
$name = $rows['name'];
$father = $rows['father'];
$mother = $rows['mother'];
$dob = $rows['dob'];
$mobile = $rows['mobile'];
$land_line = $rows['land_line'];
$address = $rows['address'];
$religion = $rows['religion'];
$caste = $rows['caste'];
$caste_type = $rows['caste_type'];
$adno = $rows['adno'];
$mobile = $rows['mobile'];
$land_line = $rows['land_line'];

$username = $rows['username'];
$password = $rows['password'];



//------------------------MESSAGE PANEL-------------------------------------------------------------------------------------
echo"
<div class=\"wrapper col3\">  <div id=\"homecontent\">
<div class=\"fl_left\">
<div class=\"column2\">";


if(isset($_REQUEST['edit_login']))
{
echo"<form action=\"parents_login.php\" method=\"POST\"><input type=\"hidden\" name=\"slno\" value=\"$slno\">
<input type=\"hidden\" value=\"$username\" name=\"parent_username\">
<input type=\"hidden\" value=\"$password\" name=\"parent_password\"><input type=\"submit\" value=\"Close [X]\" style=\"float:right;\"></form>";

echo "<h2>Change Your Username / Password </h2>";
echo "<table><form action=\"parents_login.php\" method=\"POST\">";
echo "<tr><td>Username </td><td>: <input required type=\"text\" name=\"username_set\" value=\"$username\" style=\"width:300px; height:30px;\"> </td></tr>";
echo "<tr><td>Password </td><td>: <input required type=\"text\" name=\"password_1\" value=\"$password\"  style=\"width:300px; height:30px;\"> </td></tr>";
echo "<tr><td><input type=\"hidden\" name=\"slno\" value=\"$slno\">
<input type=\"hidden\" value=\"$username\" name=\"parent_username\">
<input type=\"hidden\" value=\"$password\" name=\"parent_password\">
<br></td><td><br></td></tr>";
echo "<tr><td><br></td><td>&nbsp;&nbsp;&nbsp;	<input type=\"submit\" name=\"set_user_login\" value=\"Set login credentials\"> </td></tr>";
echo "</form></table>";
}

else
{
echo "<h2>Message Panel </h2>

<form action=\"parents_login.php\" method=\"post\">
Parents can use this box for enquiring about your ward to the head of the school
<br>
<br>
<br><textarea name=\"query\" rows=\"5\" cols=\"40\" style=\"width:525px; height:100px;\" required></textarea>
<input type=\"hidden\" value=\"$slno\" name=\"slno\">
<input type=\"hidden\" value=\"$username\" name=\"parent_username\">
<input type=\"hidden\" value=\"$password\" name=\"parent_password\">
<br><br>";

if(isset($_REQUEST['msg']))
echo "<font color=\"green\"><b>Successful Changed Your Login Details </b></font>";
echo "<input type=\"submit\" value=\"Submit\" name=\"message_submit\"  style=\"width:100px; height:32px; float:right;\"></td>
</form>
<br><br><br><br>

To avoid scam we record your ip address and time, when you submit the message ."; 
}

echo "</div></div>";



//--------------------------------STUDENT DATA DISPLAY PANEL--------------------------------------------------------------------------------------	
echo"		
<div class=\"fl_right\">
<form action=\"parents_login.php\" method=\"POST\">
<input type=\"hidden\" value=\"$slno\" name=\"slno\">
<input type=\"hidden\" value=\"$username\" name=\"parent_username\">
<input type=\"hidden\" value=\"$password\" name=\"parent_password\">
<input type=\"submit\" value=\"Edit Login Credentials\" name=\"edit_login\" style=\"float:right; height:28px;\"> 
<h2>Student Details</h2>
</form>
<table>
<tr><td><font size=\"2\" color=\"blue\">Student name </font></td><td>: <font size=\"2\" color=\"orange\">$name</font></td></tr>
<tr><td><font size=\"2\" color=\"blue\">Admission No </font></td><td>: <font size=\"2\" color=\"orange\">$adno</font></td></tr>
<tr><td><font size=\"2\" color=\"blue\">Father </font></td><td>: <font size=\"2\" color=\"orange\">$father</font></td></tr>
<tr><td><font size=\"2\" color=\"blue\">Mother </font></td><td>: <font size=\"2\" color=\"orange\">$mother</font></td></tr>
<tr><td><font size=\"2\" color=\"blue\">Address </font></td><td>: <font size=\"2\" color=\"orange\">$address</font></td></tr>
<tr><td><font size=\"2\" color=\"blue\">Date of Birth </font></td><td>: <font size=\"2\" color=\"orange\">$dob</font></td></tr>
<tr><td><font size=\"2\" color=\"blue\">Religion </font></td><td>: <font size=\"2\" color=\"orange\">$religion</font></td></tr>
<tr><td><font size=\"2\" color=\"blue\">Mobile </font></td><td>: <font size=\"2\" color=\"orange\">$mobile</font></td></tr>
<tr><td><font size=\"2\" color=\"blue\">Land line </font></td><td>: <font size=\"2\" color=\"orange\">$land_line</font></td></tr>
</table>
</div>
<br class=\"clear\" />";
//----------------------------------------------------------------------------------------------------------------------------------------------


echo "<fieldset><legend>
<form action=\"parents_login.php\" method=\"POST\">
<input type=\"hidden\" value=\"$username\" name=\"parent_username\">
<input type=\"hidden\" value=\"$password\" name=\"parent_password\">
<input type=\"submit\" value=\"Inbox (Click To Refresh Page)\">
</form>
</legend>";
$query = "SELECT * FROM parent_principal WHERE (from_adr=$slno OR to_adr=$slno) ORDER BY slno DESC";
$result=mysql_query($query);
echo "<table>";
while($rows = mysql_fetch_array($result))
{
$text = $rows['text_content']; 
$to = $rows['to_adr'];
$from = $rows['from_adr'];
$date = $rows['date_time'];
if($to == "principal") echo "<tr><td><font color=\"black\" size=\"2\">You : </font></td><td><font color=\"magenta\" size=\"2\">"; 
if($from == "principal") echo "<tr><td><font color=\"black\" size=\"2\">Principal : </font></td><td><font color=\"orange\" size=\"2\">";
echo "$text </font></td><td><font color=\"black\" size=\"2\"> On $date </font></td></tr>";
}
echo "</table></fieldset>";



echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";

}


if($wait==0) header('Location:index.php?login_error=parents_login_error');

?>


<!-- ####################################################################################################### -->

<?php require_once('footer.php'); ?>