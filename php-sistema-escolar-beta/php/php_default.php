<?php
	$host='localhost';
	$user='root';
	$password='';
	$dbname='system_info';
	$link =	mysql_connect($host,$user,$password) or die(mysql_error());	
			mysql_select_db($dbname, $link) or die(mysql_error());
?>