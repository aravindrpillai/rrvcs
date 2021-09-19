<?php
$table_images = "images";
require_once("resize.php");

if((($value == "image_gallery") && (!isset($_REQUEST['image_submit']))) || ($value=="error_get_in"))
{
echo "<h2> Image Gallery </h2>";
echo "<form action=\"admin.php\" method=\"POST\" enctype=\"multipart/form-data\">";

echo "<table>";
echo "<tr><td>Album name </td><td> <input type=\"text\" name=\"new_album\" style=\"height:30px; width:450px;\" ></td></tr>";

$result = mysql_query("SELECT album FROM $table_images");
echo "<tr><td>Or select an existing album </td><td> 
<select name=\"existing_album\" style=\"height:30px; width:450px;\" ><option>Select album</option>";
while($rows = mysql_fetch_array($result))
echo "<option>".$rows['album']."</option>";
echo "</select></td></tr>";

echo "<tr><td><br></td><td><br></td></tr>";
echo"<tr><td>Upload upto 40 images
	         </td><td><INPUT type=\"file\" name=\"img_1\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_2\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_3\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_4\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_5\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_6\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_7\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_8\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_9\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_10\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_11\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_12\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_13\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_14\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_15\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_16\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_17\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_18\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_19\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_20\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_21\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_22\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_23\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_24\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_25\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_26\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_27\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_28\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_29\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_30\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_31\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_32\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_33\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_34\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_35\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_36\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_37\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_38\" style=\"height:30px; width:220px;\"/></td></tr>";
echo"<tr><td></td><td><INPUT type=\"file\" name=\"img_39\" style=\"height:30px; width:220px;\"/> <INPUT type=\"file\" name=\"img_40\" style=\"height:30px; width:220px;\"/></td></tr>";

echo "<input type=\"hidden\" value=\"yes\" name=\"allow_access\">";
echo "<input type=\"hidden\" value=\"image_gallery\" name=\"value\"></td></tr>";

echo "<tr><td><br></td><td><br></td></tr>";
echo "<tr><td></td><td>
<input type=\"submit\" name=\"image_submit\" value=\"Submit\" style=\"height:30px; width:100px;\">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"reset\" value=\"Reset\" style=\"height:30px; width:100px;\"></td></tr>";
echo "</table>";
echo "</form>";
}


//------------------------------------------------------------------------------------------------------------------------------------------



if(isset($_REQUEST['image_submit']))
{
//-------------------------------------
$query = "CREATE TABLE IF NOT EXISTS $table_images  (slno INT NOT NULL AUTO_INCREMENT, album VARCHAR(30) NOT NULL UNIQUE , 
img_1 VARCHAR(65), img_2 VARCHAR(65), img_3 VARCHAR(65), img_4 VARCHAR(65), img_5 VARCHAR(65), img_6 VARCHAR(65), img_7 VARCHAR(65), img_8 VARCHAR(65), 
img_9 VARCHAR(65), img_10 VARCHAR(65), img_11 VARCHAR(65), img_12 VARCHAR(65), img_13 VARCHAR(65), img_14 VARCHAR(65), img_15 VARCHAR(65), 
img_16 VARCHAR(65), img_17 VARCHAR(65), img_18 VARCHAR(65), img_19 VARCHAR(65), img_20 VARCHAR(65), img_21 VARCHAR(65), img_22 VARCHAR(65), 
img_23 VARCHAR(65), img_24 VARCHAR(65), img_25 VARCHAR(65), img_26 VARCHAR(65), img_27 VARCHAR(65), img_28 VARCHAR(65), img_29 VARCHAR(65), 
img_30 VARCHAR(65), img_31 VARCHAR(65), img_32 VARCHAR(65), img_33 VARCHAR(65), img_34 VARCHAR(65), img_35 VARCHAR(65), img_36 VARCHAR(65), 
img_37 VARCHAR(65), img_38 VARCHAR(65), img_39 VARCHAR(65), img_40 VARCHAR(65),PRIMARY KEY(slno))";

$result = mysql_query($query);    if(!$result) die("Table creation error. ". mysql_error());
//-----------------------------------


echo "<h2> Image Gallery </h2>";

$new_album = $_REQUEST['new_album'];
$existing_album = $_REQUEST['existing_album'];
$error_in_album = 0;

if((($new_album == "") && ($existing_album == "Select album")) || (($new_album != "") && ($existing_album != "Select album")))
{
echo "<form action=\"admin.php\" method=\"POST\">";
echo "<input type=\"hidden\" name=\"value\" value=\"image_gallery\">";
echo "<input type=\"hidden\" name=\"yes\" value=\"allow_access\">";
echo "<font color=\"red\">Error . Either you have to add a new album name or select an existing album </font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"error_submit\" value=\"Go back\">";
echo "</form>";
$error_in_album = 1;
}


if( ($existing_album == "Select album") && ($new_album != "") ) //  if there isnt any error in album  database with album name is created with out any other datas
{
$album_name = $new_album;
$query = "INSERT INTO $table_images (album) VALUES (\"$album_name\") ";
$result = mysql_query($query);
if(!$result) {echo "<font color=\"red\">Error in addding albumn name <font color=\"blue\"><b> $album_name </b></font>to DB . " . mysql_error() ."</font>"; $error_in_album = 1; }
}





if($error_in_album == 0)
{


if($existing_album == "Select album") $album_name = $new_album;
if($new_album == "") $album_name = $existing_album;




for($i=1; $i<=40;$i++)
{//--------------------->> for loop for reading the files from previous page ---- Opens here

$file_name = "img_".$i;
$client_file_name = $_FILES[$file_name]['name'];
if($client_file_name != "")
{	//---------------------------------------------------->> IF condition wether the button holds a file or not ---> Open

//echo "<br> Button : ".$i. " holds an image";
$temp_file_name = $_FILES[$file_name]['tmp_name'];
$file_size = $_FILES[$file_name]['size'];


$file_type = $_FILES[$file_name]['type'];
$valid_extensions = array('/jpg','/jpeg','/JPG','/JPEG' ,'/png','/PNG','/gif','/GIF');
$extension = strrchr($file_type , "/");
if(!in_array($extension,$valid_extensions)) { echo "<br><font color=\"red\"> Invalid extension for file :<font color=\"blue\"><b>  $client_file_name </b></font></font>"; break; }
$extension[0] = "."; // replace "/" with "."
$save_file_as = md5($album_name)."_".$i.$extension;
$save_to_location = "images/uploaded/".$save_file_as;


$query = "SELECT * FROM $table_images WHERE album = \"$album_name\"";
$result = mysql_query($query);
$rows = mysql_fetch_array($result);
for($j=1; $j<=40; $j++)
{	//---------------------------------------------------------------- #_04  ----> for checking wether such an image exists or not if exists rename the file
$row_name = "img_".$j;
$row_content = $rows[$row_name];
$compare_files = strcmp($row_content, $save_file_as);
//echo "<br> $compare_files";
if($compare_files == 0)
{
$save_file_as = $j."_".$save_file_as;
$save_to_location = "images/uploaded/".$save_file_as;
}
}   //---------------------------------------------------------------- #_04 closed (for loop)


//-------------------------THUMBNAIL-----------------------------
$dest = "images/thumbnail/".$save_file_as;
image_resize($temp_file_name,$dest);
//---------------------------------------------------------------


$result_in_move = move_uploaded_file($temp_file_name , $save_to_location);
if($result_in_move)
{	//-------------------------------------------------------------------------------->  #_03 open --> writing to DB after moving successfully done

$query = "SELECT * FROM $table_images WHERE album = \"$album_name\"";
$result = mysql_query($query);
$rows = mysql_fetch_array($result);
$save_to_this_row = "full";
for($j=1; $j<=40; $j++)
{	//----------------------------------------------------------------- #_05  ----> for checking wether such an image exists or not if exists rename the file
$row_name = "img_".$j;
$row_content = $rows[$row_name];
if($row_content == NULL)
{
$save_to_this_row = $row_name;
break;
}
}	//---------------------------------------------------------------- #_05 closed



//------------------------------------------------------------------------------------------------------------------------------Writing to DB
if($save_to_this_row != "full")
{
$query = "UPDATE $table_images SET $save_to_this_row=\"$save_file_as\" WHERE album = \"$album_name\" ";
//echo "<br> $query";
$result = mysql_query($query);
echo "<br><font color=\"green\"> File :<font color=\"blue\"><b>  $client_file_name </b></font>successfully uploaded </font>";
if(!$result)   { echo "Error is writing to DB.". mysql_error();   unlink($save_to_location);   }
}
else 
{
echo "<br> <font color = \"red\">Cannot add any more to the album <font color=\"blue\"><b> $album_name </b></font>as its maximum limit has reached . Create a new album for further adding images</font>";
unlink($save_to_location);
}


//---------------------------------------------------------------------------------------Writing to DB Closed


}	//-------------------------------------------------------------------> #_03 closed - if cond to chk wether file moved

else  // else for if #_03
echo  "<br><font color=\"red\"> Error in moving file no $i - $client_file_name</font>";



}	//---------------------------------------------------->> IF condition wether the button holds a file or not ---> Closed


}//--------------------->> for loop for reading the files from previous page ---- closed here



} //  error in album if condition
} //  main image upload submit 



?>