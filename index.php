<?php

require('connect.inc.php');
session_start();
ob_start();

$rmb= $_COOKIE['name'];
if(isset($rmb)!=NULL)
{
	  header('Location: inbox.php');
}
else
{
	header('Location: index1.php');
	}
?>