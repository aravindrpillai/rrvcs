
<?php require_once('header.php'); ?>



<!-- ####################################################################################################### -->
<div class="wrapper col2"></div>

<div class="wrapper col3">
<div id="homecontent">

<?php require_once("data_base.php"); ?>

<?php if(!isset($_REQUEST['delete'])): ?>
<fieldset>
	<form action="del.php" method="post">
		<center>
			Remove  
            <select name="remove_item" style="width:200px">
					<option>Images</option>
					<option>Gallery</option>
					<option>News</option>
					</select>
			<input type="submit" name="delete" value="List" />
		</center>
	</form>
</fieldset>
<?php endif; ?>



<?php if(isset($_REQUEST['delete'])): 
$item = $_REQUEST['remove_item'];
if($item == 'News') $query = 'SELECT * FROM news ORDER BY slno DESC';
if($item == 'Images') $query = 'SELECT * FROM images ORDER BY slno DESC';
if($item == 'Gallery') $query = 'SELECT slno,album FROM images ORDER BY slno DESC';

$result = mysql_query($query);
while($rows = mysql_fetch_array($result)):
	$slno = $rows['slno'];
	$album = $rows['album'];
?>

<button onClick="delete_gallery('<?php echo $slno; ?>');" > Delete <?php echo $album  ?> </button>

<?php endwhile; ?>
<?php endif; ?>

	
<br class="clear" />
</div>
</div>


<!------------------------------------------------------------------------------------------------------------------------------>
<?php require_once('footer.php'); ?>


<script type="text/javascript">
function delete_gallery(slno)
	{
		if(confirm("Are You Sure ? "))
		window.location.href = "del.php?action=album&delete=set&remove_item=Gallery&slno="+slno;
	}
</script>



<?php 
if(isset($_REQUEST['action']))
{
$delete_what = $_REQUEST['action'];
$slno = $_REQUEST['slno'];

$query = "SELECT * FROM images WHERE slno = \"$slno\"";
$result = mysql_query($query);
$rows = mysql_fetch_array($result);

for($i=1;$i<=40;$i++)
{
	$index = "img_".$i;
	echo "<br> $i . ".$rows[$index];
}

$query = "DELETE * FROM images WHERE slno = \"$slno\" ";
mysql_query($query);

}
?>


