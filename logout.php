<?php
session_start();
$id=$_SESSION['name'];
setcookie('name',"$id",time()-3600);
unset($_SESSION['name']);
header('Location: index.php');
?>
