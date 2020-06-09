<?php
session_start();

$id_msg=$_POST['id_msg'];



 //insert.php  
 $connect = mysqli_connect('localhost','root', '' ,'shopdb'); 
 
        
     
     
     
     
    $sql = "SELECT message FROM messagerie WHERE id_msg='{$id_msg}'";

                
     $result= mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
        
           echo $row['message'];  
       
 
 ?>
