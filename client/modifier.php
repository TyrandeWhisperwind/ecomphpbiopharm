<?php
session_start();
$id_client=$_SESSION['id_client'];
$nom_client=$_SESSION['nom_client'];
$prenom_client= $_SESSION['prenom'];
$id_com=$_POST['id_com'];
$quantity=$_POST['quantity'];
$qtytotal=0;

   


  
 $connect = mysqli_connect('localhost','root', '' ,'shopdb'); 
 
  $query = "SELECT prix_unite,id_produit  FROM commandes WHERE id_com='{$id_com}'";

 $result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);


$req="SELECT quantity_par_carton  FROM produits where id= '{$row['id_produit']}' ";
                $qtycarton= mysqli_query($connect,$req);
                $quatityboite = mysqli_fetch_array($qtycarton);
 


     $qtytotal=$quatityboite['quantity_par_carton']*$quantity;
     $total=$qtytotal*$row['prix_unite'];
     
    
    $sql = "UPDATE commandes SET qty='{$quantity}' , total='{$total}' ,qty_boit='$qtytotal' WHERE id_com='{$id_com}' AND id_client='{$id_client}' AND id_listecommande= 0";
        if(mysqli_query($connect, $sql))  
      {  
           echo "La quantité a été modifier.";  
      }  
 
 ?>
