<?php
$con = mysqli_connect('localhost','root', '', 'clinica');
$db = mysqli_select_db($con, 'clinica');
	
if(!$con || !$db)
{
	echo "<pre>";
	echo mysqli_error($con);
	echo "</pre>";
}
?>

