<?php  $image_gallery = "active"; require_once('header.php');  ?>

<!-- ####################################################################################################### -->
<div class="wrapper col3">

<div id="container">

<?php
//error_reporting(0);
include("data_base.php");
$table_images="images";
$album_name= "Empty Folder";





if(!isset($_REQUEST['album_selected']))
{		//--------------------------------------------------------------------    #_02 open
echo "<h2> Image Gallery  </h2>";

$query = "SELECT album FROM $table_images ORDER BY album ASC";
$result = mysql_query($query);
if(!$result) die("Data Fetching Error ". mysql_error());
echo "<table><tr>";
for($i=1;$rows = mysql_fetch_array($result);$i++)
{		//---------------------------------------------------------------------    #_01   while loop - open
$album_name = $rows['album'];
if( (($i-1)%8 == 0 ) && ($i!=1)) echo "<tr>";
echo "<td><a href=\"image_gallery.php?album_selected=$album_name\"> <center><img src=\"images/demo/folder.png\" height=\"60px\" width=\"60px\"><br>$album_name</center></a></td>";
if((($i%8) == 0) && ($i!=0)) echo "</tr>";
}		//---------------------------------------------------------------------    #_01   while loop - closed
echo "</table>";
}		//--------------------------------------------------------------------    #_02 Closed






//*****************************************************************************************************************************************************



if(isset($_REQUEST['album_selected']))
{		//--------------------------------------------------------------------    #_05 open

echo "<form action=\"image_gallery.php\" method=\"POST\">";
echo "<input type=\"submit\" value=\"Back To Album\" name=\"close_submit\" style=\"float:right;\">";
echo "</form>";

$album_name = $_REQUEST['album_selected'];
echo "<h2> Image Gallery of $album_name  </h2>";
$query = "SELECT * FROM $table_images WHERE album=\"$album_name\" ORDER BY album ASC";
$result = mysql_query($query);
if(!$result) die("Data Fetching Error ". mysql_error());
$rows = mysql_fetch_array($result);

echo "<table>";
echo "<tr>";
for($i=1; $i<=40 ; $i++)
{ 
$row_name = "img_".$i;
$img_name = $rows[$row_name];
if($img_name != NULL)
{		//---------------------------------------------------------------------    #_06   while loop - open

$location_org = "images/uploaded/".$img_name;
$location_thm = "images/thumbnail/".$img_name;
if(((($i-1)%6) == 0) && ($i!=1)) echo "<tr>";
echo "<td><a rel=\"gallery_group\" href=\"$location_org\" title=\"Album name: $album_name , Image no: $i\"> 
<center><img src=\"$location_thm\" height=\"160px\" width=\"160px\"></center></a></td>";
if(($i%6) == 0) echo "</tr>";
}		//---------------------------------------------------------------------    #_06   while loop - closed

}
echo "</table>";
}		//--------------------------------------------------------------------    #_05 Closed



//*****************************************************************************************************************************************************





?>
 


</div></div>
<!-- ####################################################################################################### -->
<?php require_once('footer.php'); ?>


<script type="text/javascript" src="img_scripts/superfish.js"></script>
<script type="text/javascript">  jQuery(function () { jQuery('ul.nav').superfish(); }); </script>
