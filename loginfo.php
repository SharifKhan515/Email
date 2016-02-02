<?php
require('connect.inc.php');
session_start();
ob_start();
unset($_SESSION['name']);

?>

<html>

<head>
<link  rel="stylesheet" type="text/css" href="style-sign.css"/>
<title>Log-in</title>

</head>
<body>

<?php
if(isset($_POST['name'])&&!empty($_POST['name']) 
   &&isset($_POST['pw'])&&!empty($_POST['name']))
{      
  	  $name=htmlentities($_POST['name']);
      $pw=htmlentities($_POST['pw']);
	  $rmb=htmlentities($_POST['rmb']);
	  echo $rmb;
       $query="SELECT `id` FROM `email_user` 
	        WHERE username='$name' AND password='$pw'";
if($query_run = mysql_query($query))
      {
	if(mysql_num_rows($query_run)!=NULL)
	{while($query_row=mysql_fetch_assoc($query_run))
	{
	   $id=$query_row['id'];
		$_SESSION['name']=$id;
		if($rmb!=NULL)
		{setcookie('name',"$id",time()+3600);
	echo "hoice";}
	else
		echo "hoi nai";
	    header('Location: inbox.php');
		
	}
}
else
{
	header('Location: login2.html');
}
}
else
	{
		echo mysql_error();
		}
}

else
{
	
header('Location: login2.html');	
}  
?>
</body>
</html>