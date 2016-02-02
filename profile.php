<?php
session_start();
ob_start();
require('connect.inc.php');
?>

<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<title>Profile</title>
<body>

<div id="container">
<div id="header"><div id ="image">
<img height="600%" src="images/ll.jpg"></img></div>
<div  height="600%" id="image2"><img src="header.png" ></img></div>
</div>



<div id="horizontalnav">
<?php
$id=$_SESSION['name'];
$query="SELECT  `username` FROM `email_user` WHERE id='$id' ";
$query_run = mysql_query($query);
while($query_row=mysql_fetch_assoc($query_run))
{$user=$query_row['username'];

echo "<h1>$user</h1>";}
?>
<div class="navlinks">

<ul>
<link rel="stylesheet" href="mbcsmb7zbs.css" type="text/css" />
<div id="mb7zbsebul_wrapper" style="max-width: 184px;">
  <ul id="mb7zbsebul_table" class="mb7zbsebul_menulist css_menu">
  <li><div class="buttonbg gradient_button gradient34"><a href="index.html">Sign-Out</a></div></li>
  <li><div class="buttonbg gradient_button gradient34" style="width: 60px;"><a>Help<br /></a></div></li>
  </ul>
</div>




</div>

</div>



<div id="leftnav">
<link rel="stylesheet" href="mbcsmbrfzq.css" type="text/css" />


<div id="mbrfzqebul_wrapper" style="width: 148px;">
  <ul id="mbrfzqebul_table" class="mbrfzqebul_menulist css_menu">
  <li><div class="buttonbg gradient_button gradient44"><a href="compose.php">Compose</a></div></li>
  <li><div class="buttonbg gradient_button gradient44"><a href="inbox.php">Inbox</a></div></li>
  <li><div class="buttonbg gradient_button gradient44"><a href="sent.php">Sent-Mail</a></div></li>
  <li><div class="buttonbg gradient_button gradient44"><a class="button_4" href="profile.php">Profile</a></div></li>
  </ul>
</div>

<script type="text/javascript" src="mbjsmbrfzq.js"></script>

</div>

<div id="body">
<h1 align="centere" >Your Jmail profile</h1><hr>
<?php

$username=$_SESSION['name'];
$query="SELECT `username`, `first_name`, `last_name`, `password`, `sex`,
 `b_date`, `b_month`, `b_year`, `country` FROM `email_user` WHERE id='$username' ";
if($query_run = mysql_query($query))
{
       while($query_row=mysql_fetch_assoc($query_run))
	{
	   
		$username=$query_row['username'];
        $first_name=$query_row['first_name'];
        $last_name=$query_row['last_name'];
        $sex=$query_row['sex'];
        $country=$query_row['country'];
        $date=$query_row['b_date'];
        $month=$query_row['b_month'];
        $year=$query_row['b_year'];
		echo "<h2>First Name:$first_name</h2>";
		echo "<h2>Last Name:$last_name</h2>";
		echo "<h2>Sex: $sex</h2>";
		echo "<h2>Birth:$date"."-$month"."-$year</h2>";
		echo "<h2>Country:$country</h2>";
		echo "<h2>Username: $username</h2>";
		
		
	}  
	
		
	
}
		else
		{
			die();
		}

?>
<hr/>
 </div>

<div id="footer"><h2 align="middle" >This site is developed as a php project.</h2>


</div>
</div>

</body>
</html>
