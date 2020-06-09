<?php
session_start();
$id_client=$_SESSION['id_client'];
$nom_client=$_SESSION['nom_client'];
$prenom_client= $_SESSION['prenom'];
$id_ms=$_POST['id_msg'];



 //insert.php  
 $connect = mysqli_connect('localhost','root', '' ,'shopdb'); 
 
        
     
     
     
     
    $sql = "DELETE FROM messagerie WHERE id_msg='{$id_ms}' and vers='vers1' ";
        if(mysqli_query($connect, $sql))  
      {  
           echo "Message supprimé.";  
      }  
 
 ?>
