<?php
session_start();
$id_client=$_SESSION['id_client'];
$nom_client=$_SESSION['nom_client'];
$prenom_client= $_SESSION['prenom'];
$id_com=$_POST['id_com'];



 
 $connect = mysqli_connect('localhost','root', '' ,'shopdb'); 
 
        
     
     
     
     
    $sql = "DELETE FROM commandes WHERE id_com='{$id_com}' ";
        if(mysqli_query($connect, $sql))  
      {  
           echo "Cette commande a été supprimer de la liste.";  
      }  
 
 ?>
