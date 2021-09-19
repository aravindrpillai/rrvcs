<?php  $management = "active"; require_once('header.php');  ?>

<!-- ####################################################################################################### -->
<div class="wrapper col2" >
</div>

<body onload='hide_faculty();'>

<!-- ####################################################################################################### -->

<div class="wrapper col3">
<div id="homecontent">

<!----------------------------------------------------------------------------------------------------->
<div class="fl_left">
<div class="column2">
<h2>Principal : Mr.Principal</h2>
<img src="images/demo/#.jpg"  width="420" height="250" align="right">
</div>
</div>
	
<div class="fl_right">
<br><br><br>
<ul>
<p><strong>"THE YOUNG DO NOT KNOW TO BE PRUDENT AND SO THEY ATTEMPT THE IMPOSSIBLE AND ACHIEVE IT, GENERATION AFTER GENERATION" .by Pearl S Buck</strong>
<br><br>Students have to be equipped with appropriate tools to enter the world with confidence to face the challenges that come with multiple opportunities they now have. For this, they are available on figure tips through our omnipresent internet. Today’s education needs to equip youngsters with the skills to observe, collate, compare, analyze, to act as per the demand of the moment and connect text book information to real life situations or vice versa. Whatever we do, one thing is certain that our young will keep on  amazing us.


</p>
</ul>
<script type="text/javascript">
function hide_faculty()    
{ 
$("#faculty").hide();	
var button = "<button onClick='show_faculty()'> List Faculty Of RRVCS </button> ";
$("#button").html(button);	
}

function show_faculty()    
{ 
$("#faculty").show() ;	 
var button = "<button onClick='hide_faculty()'> Hide Faculty Listing </button> ";
$("#button").html(button);	
}
</script>

</div>
<!------------------------------------------------------------------------------------------------------->
	
<br class="clear" />

<center>
<br>
<div id="button"><button onClick='hide_faculty()'> Hide Faculty Listing </button></div>
</center>	


<br class="clear" />
<div id="faculty">

<table border="2px">
<tr><td><b> Slno </td><td><b> Name </td> 	<td><b> Designation </td> </td>
<tr><td> 1. </td><td>  *************</td>	<td> Principal</td></tr>
<tr><td> 2. </td><td>  *************</td>	<td> Vice Principal</td></tr>
<tr><td> 3. </td><td>  *************</td>	<td>head mistress (LKG to Vth)</td></tr>
<tr><td> 4. </td><td>  *************</td>	<td> Teacher </td></tr>
<tr><td> 5. </td><td>  *************</td>	<td> Teacher </td></tr>
<tr><td> 6. </td><td>  *************</td>	<td> Teacher </td></tr>
<tr><td> 7. </td><td>  *************</td>	<td> Teacher </td></tr>
<tr><td> 8. </td><td>  *************</td>	<td> Teacher </td></tr>
<tr><td> 9. </td><td>  *************</td>	<td> Teacher </td></tr>
<tr><td> 10. </td><td> *************</td>	<td> Teacher </td></tr>
<tr><td> 11. </td><td> *************</td>	<td> Teacher </td></tr>
<tr><td> 12. </td><td> *************</td>	<td> Teacher </td></tr>
</table>
</div>

</div>
</div>


<!-- ####################################################################################################### -->


<?php require_once('footer.php'); ?>