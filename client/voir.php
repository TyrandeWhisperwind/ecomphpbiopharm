<?php
session_start();
$id_client=$_SESSION['id_client'];
$nom_client=$_SESSION['nom_client'];
$prenom_client= $_SESSION['prenom'];
$id_ms=$_POST['id_ms'];



 //insert.php  
 $connect = mysqli_connect('localhost','root', '' ,'shopdb'); 
 
        
     
     
     
     
    $sql = "SELECT message FROM messagerie WHERE id_msg='{$id_ms}' ";

                
     $result= mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
        
           echo $row['message'];  
       
 
 ?>
