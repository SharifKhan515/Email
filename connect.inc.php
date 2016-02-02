<?php
$con_error='coudnot connect';
$mysql_host='localhost';
$mysql_user='root';
$mysql_pw='';
$mysql_db='email';
if(!@mysql_connect($mysql_host,$mysql_user,$mysql_pw) ||!@mysql_select_db($mysql_db) )
{
	
	die($con_error);
	
}


?>