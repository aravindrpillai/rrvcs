
<head>
<title>Title</title>
<link rel="shortcut icon" type="image/x-icon" href="images/demo/title_icon.ico" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="scripts/jquery.cycle.setup.js"></script>


<script type="text/javascript" src="img_scripts/superfish.js"></script>
<!-- FancyBox -->
<script type="text/javascript" src="img_scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="img_scripts/fancybox/jquery.fancybox-1.3.2.js"></script>
<script type="text/javascript" src="img_scripts/fancybox/jquery.fancybox-1.3.2.setup.js"></script>
<link rel="stylesheet" href="img_scripts/fancybox/jquery.fancybox-1.3.2.css" type="text/css" />
<!-- End FancyBox -->

<script type="text/javascript">function page_not_available(page_name) { alert('Sorry,'+ page_name +' Page Currently Unavailable');  }</script>
</head>


<body>

<style>

.alert-box {
    color:#555;
    border-radius:10px;
    font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
    padding:10px 10px 10px 36px;
    margin:10px;
}

.alert-box span {
    font-weight:bold;
    text-transform:uppercase;
}

.error {
    background:#ffecec no-repeat 10px 50%;
    border:1px solid #f5aca6;
}



</style>

<?php
if(isset($_REQUEST['login_error']))
{
if($_REQUEST['login_error'] == "acc_set_success")
echo "<div class=\"alert-box error\"><span> <center><b><font color=\"green\">Account set successfully . Login with your new username and password </font></b></center></span></div>";
elseif($_REQUEST['login_error'] == "def_values")
echo "<div class=\"alert-box error\"><span> <center><b><font color=\"red\">Such username and passwords are not allowed </font></b></center></span></div>";
else
echo "<div class=\"alert-box error\"><span> <center><b><font color=\"red\">Login Error . Enter correct username and password </font></b></center></span></div>";
}
?>
	
	
<!-------------------------------------------------------------------------------->	
<div class="wrapper col0">
<div id="topbar">


<div id="slidepanel">
  
<div class="topbox">
<h2>Login Panel</h2>
<p>Login with your username and password</p>
</div>
	  
<div class="topbox last">
<h2>Administrator Login Here</h2>
<form action="admin.php" method="post">
<fieldset>
<legend>Administrator Login Form</legend>
<label for="pupilname"><font color="white">Username:</font><input required type="text" name="admin_username"/></label>
<label for="pupilpass"><font color="white">Password:</font><input required type="password" name="admin_password"/></label>
<p><input type="submit" name="admin_login" value="Login" />&nbsp;<input type="reset" value="Reset" /></p>
</fieldset>
</form>
</div>


<div class="topbox last">
<h2>Parents Login Here</h2>
<form action="parents_login.php" method="post">
<fieldset>
<legend>Parents Login Form</legend>
<label for="pupilname"><font color="white">Username:</font><input required type="text" name="parent_username"/></label>
<label for="pupilpass"><font color="white">Password:</font><input required type="password" name="parent_password"/></label>
<p><input type="submit" name="parent_login" value="Login" />&nbsp;<input type="reset" value="Reset" /></p>
</fieldset>
</form>
</div>

<br class="clear" />
</div>
	

<div id="loginpanel">
<ul>
<li class="left">Log In Here &raquo;</li>
<li class="right" id="toggle"><a id="slideit" href="#slidepanel">Administrator</a><a id="closeit" style="display: none;" href="#slidepanel">Close Panel</a></li>
</ul>
</div>
	
<br class="clear" /></div></div>



<!----------------------------------------------------------------------------------->

<div class="wrapper col1">
<div id="header">

<div style="clear:both"></div>
<center><a style='float:center'><font size="5"><b>ABCD CENTRAL SCHOOL</b></font></a>
<div style="clear:both"></div>
<br><br>


<!---- For disabling Option:  onClick="page_not_available('About us')" ---->
<ul>
<li class="<?php echo @ $index; ?>">					<a href="index.php">Home</a></li>
<li class="<?php echo @ $management; ?>">				<a href="management.php">Management</a></li>
<li class="<?php echo @ $about_us; ?>">					<a href="about_school.php">About Us</a></li>
<li class="<?php echo @ $faculty; ?>">					<a href="faculty.php">Faculty</a></li>
<li class="<?php echo @ $facilities; ?>">				<a href="facilities.php">Facilities</a></li>
<li class="<?php echo @ $rules_and_regulations; ?>">	<a href="rules_and_regulations.php">Rules and Regulations</a></li>
<li class="<?php echo @ $image_gallery; ?>">			<a href="image_gallery.php">Image Gallery</a></li>
<li class="<?php echo @ $contact; ?>" class="last">		<a href="contact.php">Contact</a></li>
</ul>

<br class="clear" />
</div>
</div>

<!----------------------------------------------------------------------------------->

