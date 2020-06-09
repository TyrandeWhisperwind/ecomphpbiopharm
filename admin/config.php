<?php


$db = mysqli_connect('localhost','root','','shopdb');
if(mysqli_connect_errno())
{
	echo 'database conncetion failed'.mysqli_connect_error();
	die();
}



	$dbselect = mysqli_select_db($db,'shopdb');



function mysqli_result($result , $offset , $field = 0){
    $result->data_seek($offset);
    $row = $result->fetch_array();
    return $row[$field];
}






?>