<?php require_once('header.php');  ?>

<script type="text/javascript">
function func_delete(slno_1) 
{
var slno = slno_1;
var r = confirm("Are you sure you want to remove the data from DB\nPress OK or Cancel.");
if (r == true) window.location.href = "student_page.php?action=delete&slno="+slno;
else  return false
}


function func_edit(slno_1) 
{
var slno = slno_1;
window.location.href = "student_page.php?action=edit&slno="+slno;
}
</script>


<!-- ####################################################################################################### -->
<div class="wrapper col3">
<div id="container">
<?php


echo "<form action=\"admin.php\" method=\"POST\">";
echo "<input type=\"hidden\" value=\"yes\" name=\"allow_access\">";
echo "<input type=\"submit\" value=\"Back to account\" name=\"return_from_student_page\" style=\"float:right;\">";
echo "</form>";


echo "<h2> Students Record  </h2>";

require_once("data_base.php");
$table_name = "student_details";

//-----------------------ADD STUDENT----------------------------------------------------------------------------------------
if(isset($_REQUEST['add_new_student']))
{
echo "<form action=\"student_page.php\" method=\"POST\">";
echo "<table>";
echo "<tr><td> Student Name </td><td>: <input placeholder=\"Jon Kox\" type=\"text\" name=\"name\" style=\"height:28px; width:200px;\"> </td></tr>";
echo "<tr><td> Admission No. </td><td>: <input placeholder=\"2803\" type=\"text\" name=\"adno\" style=\"height:28px; width:200px;\"> </td></tr>";
echo "<tr><td> Class And Division </td><td>: 
<select name=\"class\" style=\"height:28px; width:90px;\">
<option>12</option><option>11</option><option>10</option><option>9</option>
<option>8</option><option>7</option><option>6</option><option>5</option>
<option>4</option><option>3</option><option>2</option><option>1</option>
<option>UKG</option><option>LKG</option>
</select> 
&nbsp;&nbsp;&nbsp;&nbsp;
<select name=\"division\" style=\"height:28px; width:90px;\">
<option>A</option><option>B</option><option>C</option>
<option>D</option><option>E</option><option>F</option>
</select> </td></tr>";

echo "<tr><td> Date Of Birth </td><td>: <input type=\"date\" name=\"dob\" style=\"height:28px; width:200px;\"> </td></tr>";
echo "<tr><td> Gender </td><td>:
<select name=\"gender\" style=\"height:28px; width:204px;\"><option>Male</option><option>Female</option></select> </td></tr>";


echo "<tr><td><br></td><td><br></td></tr>";

echo "<tr><td> Father's Name </td><td>: <input placeholder=\"Koshy Philip\" type=\"text\" name=\"father_name\" style=\"height:28px; width:200px;\"> </td></tr>";
echo "<tr><td> Father's Occupation </td><td>: <input placeholder=\"Business\" type=\"text\" name=\"father_occupation\" style=\"height:28px; width:200px;\"> </td></tr>";
echo "<tr><td> Mother's Name </td><td>: <input placeholder=\"Tresa Koshy\" type=\"text\" name=\"mother_name\" style=\"height:28px; width:200px;\"> </td></tr>";
echo "<tr><td> Mother's Occupation </td><td>: <input placeholder=\"House wife\" type=\"text\" name=\"mother_occupation\" style=\"height:28px; width:200px;\"> </td></tr>";

echo "<tr><td><br></td><td><br></td></tr>";

echo "<tr><td> Religion </td><td>: <input placeholder=\"Religion\" type=\"text\" name=\"religion\" style=\"height:28px; width:200px;\"> </td>";
echo "<tr><td> Caste </td><td>: <input placeholder=\"Caste\" type=\"text\" name=\"caste\" style=\"height:28px; width:200px;\"> </td>";
echo "<tr><td> Type </td><td>: <select name=\"caste_type\" style=\"height:28px; width:204px;\"><option>General</option><option>OBC</option></select> </td>";

echo "<tr><td><br></td><td><br></td></tr>";
echo "<tr><td> Address </td><td>: <input placeholder=\"House No:17 C, Rose villa, Banglore\" type=\"text\" name=\"address\" style=\"height:28px; width:200px;\"> </td>";
echo "<tr><td><br></td><td><br></td></tr>";

echo "<tr><td> Mobile </td><td>: <input maxlength=\"10\" placeholder=\"94470xxxxx\" type=\"text\" name=\"mobile\" style=\"height:28px; width:200px;\"> </td>";
echo "<tr><td> Land Line </td><td>: <input maxlength=\"12\" placeholder=\"0475 227xxx \" type=\"text\" name=\"landline\" style=\"height:28px; width:200px;\"> </td>";

echo "<tr><td><br></td><td><br></td></tr>";

echo "<tr><td></td><td> &nbsp;
<input type=\"reset\" value=\"Reset\" style=\"height:38px; width:95px;\">

&nbsp;&nbsp;
<input type=\"submit\" value=\"Save\" name=\"add_students_to_db\" style=\"height:38px; width:95px;\">

</td></tr>";
echo "</table>";
echo "</form>";
}
//---------------------------------------------------------------------------------------------------------------------------------------


//-----------------------STUDENT DETAILS WRITING TO DB----------------------------------------------------------------------------------------
if(isset($_REQUEST['add_students_to_db']))
{	
$name = $_REQUEST['name'];
$adno = $_REQUEST['adno'];
$class = $_REQUEST['class'];
$division = $_REQUEST['division'];
$dob = $_REQUEST['dob'];
$gender = $_REQUEST['gender'];
$father_name = $_REQUEST['father_name'];
$father_occupation = $_REQUEST['father_occupation'];
$mother_name = $_REQUEST['mother_name'];
$mother_occupation = $_REQUEST['mother_occupation'];
$religion = $_REQUEST['religion'];
$caste = $_REQUEST['caste'];
$caste_type = $_REQUEST['caste_type'];
$mobile = $_REQUEST['mobile'];
$land_line = $_REQUEST['landline'];
$address = $_REQUEST['address'];

if( ($class == "LKG" )|| ($class == "UKG" )) $class_div = $class." ".$division;
else $class_div = $class.$division;

	$query = "INSERT INTO $table_name
	(class_div,adno,name,gender,dob,religion,caste,caste_type,father,father_occupation,mother,mother_occupation,address,mobile,land_line) 
	VALUES (
	\"$class_div\",\"$adno\",\"$name\",\"$gender\",\"$dob\",\"$religion\",\"$caste\",\"$caste_type\",\"$father_name\",\"$father_occupation\",
	\"$mother_name\",\"$mother_occupation\",\"$address\",\"$mobile\",\"$land_line\")";

//	echo " $query <br>";	

$result = mysql_query($query);
if(!$result) echo "<font color=\"red\"> Error ". mysql_error()."</font>";
else
{
echo "<form action=\"student_page.php\" method=\"POST\">";
echo "<font color=\"green\"> Successfully entered the details </font> &nbsp;&nbsp;&nbsp; <input type=\"submit\" value=\"Add another student \" name=\"add_new_student\" style=\"\">";
echo "</form>";
}

}	
//---------------------------------------------------------------------------------------------------------------------------------------


//-----------------------DISPLAY STUDENT DATA ON SEARCH------------------------------------------------------------------------------
if(isset($_REQUEST['edit_student_data']))
{
$name = $_REQUEST['student_name'];
$adno = $_REQUEST['student_adno'];
$class = $_REQUEST['student_class'];    
$division = $_REQUEST['student_division'];
$caste_type = $_REQUEST['caste_type'];
$gender = $_REQUEST['gender'];

if(($class=="class") && ($division=="Div")) $q_5="(class_div NOT LIKE '******')"; 
else
{
if( ($class == "LKG" )|| ($class == "UKG" )) $class_div = $class." ".$division;
else $class_div = $class.$division;
$q_5="(class_div LIKE '$class_div')"; 
}
if(($class!="class") && ($division=="Div")) $q_5="(class_div LIKE '%$class%')"; 
if(($class=="class") && ($division!="Div")) $q_5="(class_div LIKE '%$division%')"; 


if($name == "") $q_1 = "(name NOT LIKE '******')"; else $q_1 = "(name LIKE '%$name%')";
if($adno == "") $q_2 = "(adno NOT LIKE '******')"; else $q_2 = "(adno LIKE '%$adno%')";  
if($caste_type == "All") $q_3 = "(caste_type NOT LIKE '******')"; else $q_3 = "(caste_type LIKE '$caste_type')";
if($gender == "All") $q_4 = "(gender NOT LIKE '******')"; else $q_4 = "(gender LIKE '$gender')";

$query = "SELECT * FROM $table_name WHERE $q_1 AND $q_2 AND $q_3 AND $q_4 AND $q_5";
//echo "<br> $query ";
			
		
$result = mysql_query($query);
echo "<table>";
echo "<tr> <td><b><font color=\"red\">Student name</font></b></td> <td><b><font color=\"orange\">Admission No</font></b></td> <td><b><font color=\"red\">
Class & Div</font></b></td> <td><b><font color=\"orange\">Date Of Birth</font></b></td> <td><b><font color=\"red\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Action</font></b></td>  
<td></td><td></td> </tr>";
echo "<tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr>";

$count=0;
while ($rows = mysql_fetch_array($result))
{
$count++;
$slno_db = $rows['slno'];
$name_db = $rows['name'];
$adno_db = $rows['adno'];
$class_db = $rows['class_div'];
$dob = $rows['dob'];

echo "<tr><td> $name_db </td> <td> $adno_db </td> <td> $class_db </td><td> $dob </td> 
<td>&nbsp;&nbsp;&nbsp;<button style=\"width:100px; height:28px;\" onclick=\"func_delete($slno_db)\">Delete</button>&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;<button style=\"width:100px; height:28px;\" onclick=\"func_edit($slno_db)\">View/Edit</button></td></tr>" ;
}
echo "</table>";

echo "<br> <font color=\"red\">$count Result(s) found </font> ";

}
//---------------------------------------------------------------------------------------------------------------------------------------

$action = "EMPTY";
if(isset($_REQUEST['action'])) // Code no---> REQ_001
{
$action = $_REQUEST['action'];
$slno = $_REQUEST['slno'];
}


if($action == "edit")
{// slno is obtained from code no---> REQ_001
$query = "SELECT * FROM $table_name WHERE slno = '$slno'";
$result = mysql_query($query);
$rows = mysql_fetch_array($result);

$name_db = $rows['name'];
$adno_db = $rows['adno'];
$class_div_db = $rows['class_div'];
$gender_db = $rows['gender'];
$dob_db = $rows['dob'];

$father_name_db = $rows['father'];
$father_occupation_db = $rows['father_occupation'];
$mother_name_db = $rows['mother'];
$mother_occupation_db = $rows['mother_occupation'];

$religion_db = $rows['religion'];
$caste_db = $rows['caste'];
$caste_type_db = $rows['caste_type'];

$address_db = $rows['address'];
$mobile_db = $rows['mobile'];
$land_line_db = $rows['land_line'];


$username = $rows['username'];
$password = $rows['password'];
if(($username=="def_username") && ($password=="def_password"))
{
$username = $rows['slno'];
if($rows['mobile'] != "")
$password = $rows['mobile']; 
else
$password = $rows['land_line']; 
}

echo "<form action=\"student_page.php\" method=\"POST\">";
echo "<table>";
echo "<tr><td> Student Name       </td><td>: <input required value=\"$name_db\" type=\"text\" name=\"name\" style=\"height:28px; width:500px;\"> </td></tr>";
echo "<tr><td> Admission No.      </td><td>: <input required value=\"$adno_db\" type=\"text\" name=\"adno\" style=\"height:28px; width:500px;\"> </td></tr>";
echo "<tr><td> Class And Division </td><td>: <input required value=\"$class_div_db\" type=\"text\" name=\"class_div\" style=\"height:28px; width:500px;\"></td></tr>";

echo "<tr><td> Date Of Birth      </td><td>: <input required value=\"$dob_db\" type=\"text\" name=\"dob\" style=\"height:28px; width:500px;\"> </td></tr>";
echo "<tr><td> Gender             </td><td>: <input required value=\"$gender_db\" type=\"text\" name=\"gender\" style=\"height:28px; width:500px;\"></td></tr>";


echo "<tr><td><br></td><td><br></td></tr>";

echo "<tr><td> Father's Name       </td><td>: <input required type=\"text\" value=\"$father_name_db\" name=\"father_name\" style=\"height:28px; width:500px;\"> </td></tr>";
echo "<tr><td> Father's Occupation </td><td>: <input required type=\"text\" value=\"$father_occupation_db\" name=\"father_occupation\" style=\"height:28px; width:500px;\"> </td></tr>";
echo "<tr><td> Mother's Name       </td><td>: <input required type=\"text\" value=\"$mother_name_db\" name=\"mother_name\" style=\"height:28px; width:500px;\"> </td></tr>";
echo "<tr><td> Mother's Occupation </td><td>: <input required type=\"text\" value=\"$mother_occupation_db\" name=\"mother_occupation\" style=\"height:28px; width:500px;\"> </td></tr>";

echo "<tr><td><br></td><td><br></td></tr>";

echo "<tr><td> Religion            </td><td>: <input required value=\"$religion_db\" type=\"text\" name=\"religion\" style=\"height:28px; width:500px;\"> </td></tr>";
echo "<tr><td> Caste 			   </td><td>: <input required value=\"$caste_db\" type=\"text\" name=\"caste\" style=\"height:28px; width:500px;\"> </td></tr>";
echo "<tr><td> Type			       </td><td>: <input required value=\"$caste_type_db\" type=\"text\" name=\"caste_type\" style=\"height:28px; width:500px;\"> </td></tr>";

echo "<tr><td><br></td><td><br></td></tr>";
echo "<tr><td> Address 			   </td><td>: <input required value=\"$address_db\" type=\"text\" name=\"address\" style=\"height:28px; width:500px;\"> </td></tr>";
echo "<tr><td><br></td><td><br></td></tr>";

echo "<tr><td> Mobile 			  </td><td>: <input maxlength=\"10\" required value=\"$mobile_db\" type=\"text\" name=\"mobile\" style=\"height:28px; width:500px;\"> </td></tr>";
echo "<tr><td> Land Line 		  </td><td>: <input maxlength=\"12\" required value=\"$land_line_db\" type=\"text\" name=\"land_line\" style=\"height:28px; width:500px;\"> </td></tr>";
echo "<tr><td><br></td><td><br></td></tr>";

echo "<tr><td> Username  </td><td>: <input disabled value=\"$username\" type=\"text\" style=\"height:28px; width:500px;\"> </td></tr>";
echo "<tr><td> Password  </td><td>: <input disabled value=\"$password\" type=\"text\" style=\"height:28px; width:500px;\"> </td></tr>";

echo "<tr><td><br></td><td><input type=\"hidden\" name=\"slno\" value=\"$slno\"<br></td></tr>";

echo "<tr><td></td><td> &nbsp;
<input type=\"reset\" value=\"Reset\" style=\"height:38px; width:95px;\">
&nbsp;&nbsp;
<input type=\"submit\" value=\"Save\" name=\"save_changes_from_edit\" style=\"height:38px; width:95px;\">
</td></tr>";

echo "</table>";
echo "</form>";
}
//-----------------------------------------------------------------------------------------------------------------------------



if(isset($_REQUEST['save_changes_from_edit']))
{
$name = $_REQUEST['name'];
$adno = $_REQUEST['adno'];
$class_div = $_REQUEST['class_div'];
$dob = $_REQUEST['dob'];
$gender = $_REQUEST['gender'];
$father_name = $_REQUEST['father_name'];
$father_occupation = $_REQUEST['father_occupation'];
$mother_name = $_REQUEST['mother_name'];
$mother_occupation = $_REQUEST['mother_occupation'];
$religion = $_REQUEST['religion'];
$caste = $_REQUEST['caste'];
$caste_type = $_REQUEST['caste_type'];
$mobile = $_REQUEST['mobile'];
$land_line = $_REQUEST['land_line'];
$address = $_REQUEST['address'];

$slno =  $_REQUEST['slno'];

$query = "UPDATE $table_name SET name =\"$name\" ,adno=\"$adno\" , class_div=\"$class_div\" , dob=\"$dob\", 
		gender=\"$gender\" , father=\"$father_name\" , father_occupation=\"$father_occupation\" ,
		mother=\"$mother_name\", mother_occupation=\"$mother_occupation\",  religion=\"$religion\",
		caste=\"$caste\", caste_type=\"$caste_type\", mobile=\"$mobile\", land_line=\"$land_line\", address=\"$address\" 
		WHERE slno = '$slno' ";
	
$result = mysql_query($query);
if(!$result) echo "<font color=\"red\"> Error ". mysql_error()."</font>";
else
echo "<font color=\"green\"> Successfully updated the details </font>";

}
//-----------------------------------------------------------------------------------------------------------------------------



//----------------------DELETING STUDENT DATA ---------------------------------------------------------------------------------------------------
if($action == "delete")
{  		// slno is obtained from code no---> REQ_001
$query = "DELETE FROM $table_name WHERE slno = '$slno'";
$result = mysql_query($query);
if(!$result) echo "<font color=\"red\"> Error in deleting. " . mysql_error() ."</font>";
else echo "<font color=\"green\"> successfully removed</font>";
}
//------------------------------------------------------------------------------------------------------------------------------------------------




?>


</div></div>
<!-- ####################################################################################################### -->

<?php require_once('footer.php');  ?>