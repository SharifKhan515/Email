<?php
session_start();
ob_start();
require('connect.inc.php');
?>
<?php
if(isset($_POST['mail_to'])&&!empty($_POST['mail_to'])
	&& isset($_POST['mail_subject'])&&!empty($_POST['mail_subject'])
    && isset($_POST['mail_body'])&&!empty($_POST['mail_body']))
{
	$to=htmlentities($_POST['mail_to']);;
    $sub=htmlentities($_POST['mail_subject']);
    $body=htmlentities($_POST['mail_body']);
	$id=$_SESSION['name'];
	$image_link = "";
	if($_FILES['userfile']['error']>0){
		echo 'error';
	}
	else{
		//$prefix = $_SESSION['user'].time();
		$link = "upload/" .$id. $_FILES["userfile"]["name"];
		move_uploaded_file($_FILES["userfile"]["tmp_name"],$link);
		$image_link = "http://localhost/email2/upload/".$id. $_FILES["userfile"]["name"];
	}
    
    $query="SELECT  `username` FROM `email_user` WHERE id='$id' ";
     $query_run = mysql_query($query);
     while($query_row=mysql_fetch_assoc($query_run))
      {$user=$query_row['username'];
      }
	  $from="From:"."$user";
	  $time=time();
	  //date_default_timezone_set("UTC+06:00");
	  ini_set('date.timezone', 'UTC');
       $time=time()+(6 * 60 * 60);
      $actual_time=date('H:i:s',$time);
       $date=date('d m Y',$time);
	  $query="SELECT  `id` FROM `email_user` WHERE username='$to' ";
	  if($query_run = mysql_query($query))
	  {
		  if(mysql_num_rows($query_run)==NULL)
		  {
			if(mail($to,$sub,$body,$from))
            {
				header('Location:inbox.php');
			}
           else
			  header('Location:inbox.php'); 
			  
		  }
		  else
		  {
			  while($query_row1=mysql_fetch_assoc($query_run))
			  {$to_id=$query_row1['id'];
		  
			  }
			  $from_id=$_SESSION['name'];
		 
			 $query="INSERT INTO `email_body`(`to`, `from`, `sub`, `body`, `time`, `date`, `to-id`, `from-id`,`times`,`image_link`)
			 VALUES ('$to','$user','$sub','$body',' $actual_time','$date','$to_id','$from_id','$time','$image_link')"; 
			  if($query_run = mysql_query($query))
			  {
				  
				  header('Location:inbox.php');
				  
			  }
			  else
			  {
				  echo mysql_error();
				  
			  }
		  }
		  
		  
		  
	  }

	
		
}



?>