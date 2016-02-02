<?php
session_start();
require('connect.inc.php');
?>

<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<title>Inbox</title>
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
<?php 
$id=$_SESSION['name'];
$sub=$_GET['sub'];


$query="SELECT `from`, `sub`, `body`, `time`, `date`, `to-id`,`times`,`image_link` FROM `email_body` WHERE sub='$sub' ";
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
	      $id2=$query_row['to-id'];
		  $from=$query_row['from'];
		  $sub=$query_row['sub'];
		 $time=$query_row['time'];
		 $date=$query_row['date'];
		 $body=$query_row['body'];
		  $image=$query_row['image_link'];
		  $times=$query_row['times'];
		  if($id2==$id)
		  { if($image==NULL)
		{echo "<h3>$from<h3><hr/><h3>$sub<h3/><hr/>
		<p>$body<p/><hr/><h4>$time at $date<h4/>";}
		else
			{
				echo "<h3>$from<h3><hr/><h3>$sub<h3/><hr/>
		<p>$body<p/>
		<div id=\"right\">
		<img height=\"200px\" src=$image></img></div><hr/><h4>$time at $date<h4/>";
		  }
		
		  
		  
		  }
		
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