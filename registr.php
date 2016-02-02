<?php
session_start();
ob_start();
require('connect.inc.php');


if(isset($_POST['first_name'])&&!empty($_POST['first_name'])
	&& isset($_POST['last_name'])&&!empty($_POST['last_name'])
    && isset($_POST['pw'])&&!empty($_POST['pw'])
	&& isset($_POST['sex'])&&!empty($_POST['sex'])
	&& isset($_POST['Country'])&&!empty($_POST['Country'])
	&& isset($_POST['date'])&&!empty($_POST['date'])
	&& isset($_POST['month'])&&!empty($_POST['month'])
	&& isset($_POST['year'])&&!empty($_POST['year']))
{
	$first_name=htmlentities($_POST['first_name']);;
    $last_name=htmlentities($_POST['last_name']);
    $pw=htmlentities($_POST['pw']);
    $sex=htmlentities($_POST['sex']);
    $country=htmlentities($_POST['Country']);
    $date=htmlentities($_POST['date']);
    $month=htmlentities($_POST['month']);
    $year=htmlentities($_POST['year']);
	
		$username="$first_name"."@jmail.com";
		$query="SELECT 'username' FROM `email_user` WHERE username='$username'";
        if($query_run = mysql_query($query))
		{
	      if(mysql_num_rows($query_run)==NULL)	
		  {			
		$query="INSERT INTO `email_user`(`id`, `username`, `first_name`, `last_name`, `password`, `sex`, `b_date`, `b_month`, `b_year`, `country`) 
		VALUES ('','$username','$first_name','$last_name','$pw','$sex','$date','$month','$year','$country')";
		if($query_run = mysql_query($query))
		{
			$_SESSION['name']=$username;
			header('Location: after_registration.php');
		}
		else
		{
			die();
		  }
		}
		else
		{
			$num=rand(1,1000);
			$username="$first_name"."$last_name"."$num"."@jmail.com";
			$query="INSERT INTO `email_user`(`id`, `username`, `first_name`, `last_name`, `password`, `sex`, `b_date`, `b_month`, `b_year`, `country`) 
		VALUES ('','$username','$first_name','$last_name','$pw','$sex','$date','$month','$year','$country')";
		if($query_run = mysql_query($query))
		{
			 $query="SELECT `id` FROM `email_user` 
	        WHERE username='$username' AND password='$pw'";
			if($query_run = mysql_query($query))
			{  $query_row=mysql_fetch_assoc($query_run);
				$_SESSION['name']=$query_row['id'];
			header('Location: after_registration.php');
		}
		}
		else
		{
			die();
		  }
		}
		
		}
       else
		{
			die();
		  }		
	
}
else
{
	header('Location: register2.html');
}
?>