<?php
include('../inc/config.php');

$id = $_GET['id'];

$req="select * from commandes where id_listecommande='$id'";
$veri = mysqli_query($db, $req);

$t=mysqli_fetch_array($veri, MYSQLI_ASSOC);
    
if( $t['etat']== 'valide')

{
    
$stock="SELECT id_produit ,qty FROM commandes where id_listecommande='{$id}'";
$stck = mysqli_query($db, $stock);

 while($ligne = mysqli_fetch_array($stck, MYSQLI_ASSOC))  /*table commande*/
{ 
     
 $produit="SELECT quantite,quantite_achete FROM produits where id='{$ligne['id_produit']}'";
     $re = mysqli_query($db, $produit);
     $r = mysqli_fetch_array($re, MYSQLI_ASSOC);/*table produit*/
        
   
     
     

$newquantite=$r['quantite']+$ligne['qty'];
$new=$r['quantite_achete']-$ligne['qty'];
$maj=$db->query("UPDATE produits SET quantite='{$newquantite}' , quantite_achete='{$new}' WHERE id ='{$ligne['id_produit']}'");
    
}


    while($v = mysqli_fetch_array($veri, MYSQLI_ASSOC))
{
 $re=$db->query("DELETE from commandes where id_listecommande='$id'");


}


 $p=$db->query("DELETE from facture where id_listecommande='$id'");
 $p=$db->query("DELETE from bon_enlevement where id_cmd='$id'");


 $r="DELETE from listecommande where id_listecommande='$id'";

 
if (mysqli_query($db, $r)) {
    header('location:pesan.php?message=delete');
}

}else{
while($v = mysqli_fetch_array($veri, MYSQLI_ASSOC))
{
 $re=$db->query("DELETE from commandes where id_listecommande='$id'");


}


 $p=$db->query("DELETE from facture where id_listecommande='$id'");
 $p=$db->query("DELETE from bon_enlevement where id_cmd='$id'");


 $r="DELETE from listecommande where id_listecommande='$id'";

 
if (mysqli_query($db, $r)) {
    header('location:pesan.php?message=delete');
}
}
?>
