
<?php
session_start();
require('connect.inc.php');
?>

<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<title>Sent</title>
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
  <li><div class="buttonbg gradient_button gradient44"><a>Sent-Mail</a></div></li>
  <li><div class="buttonbg gradient_button gradient44"><a class="button_4" href="profile.php">Profile</a></div></li>
  </ul>
</div>

<script type="text/javascript" src="mbjsmbrfzq.js"></script>

</div>

<div id="body">
<?php 
$id=$_SESSION['name'];

$query="SELECT `to`, `sub`, `body`, `time`, `date` FROM `email_body` WHERE `from-id`='$id' ORDER BY  `email_body`.`times` DESC ";
if($query_run = mysql_query($query))
{
	if(mysql_num_rows($query_run)==NULL)
	{
		echo "<h1>you have no mail<h1>";
      }
	else
	{
		while($query_row=mysql_fetch_assoc($query_run))
	{
	   
		 $from=$query_row['to'];
		 $sub=$query_row['sub'];
		 $time=$query_row['time'];
		 $date=$query_row['date'];
		 
		echo "<table CELLSPACING=\"1\" CELLPADDING=\"5\" WIDTH=\"100%\" BORDER=\"1\">
           
           <td width=\"30%\">$from</td>
            <td width=\"40%\"><form action=\"mailread2.php\" method=\"get\">
			<input type=\"submit\" name=\"sub\" value=\"$sub\">
			</form></td>
           <td >$time  at $date</td>

      
           </table>" ;
		
		
	}
	
}
	
}else
	echo mysql_error();

 ?>
 </div>

<div id="footer"><h2 align="middle" >This site is developed as a php project.</h2>


</div>
</div>

</body>
</html>
