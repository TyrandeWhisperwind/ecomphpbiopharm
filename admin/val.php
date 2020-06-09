<?php
include('../inc/config.php');

 $id=$_GET['id'];
$date_envoie = date('Y-m-d H:i:s');
 $datetime = date('Y-m-d H:i:s', strtotime('+24 hours'));  
$b=true;


$verife="SELECT id_produit ,qty,id_com FROM commandes where id_listecommande='{$id}'";
$veri = mysqli_query($db, $verife);




while($v = mysqli_fetch_array($veri, MYSQLI_ASSOC))  /*table commande*/
{ 
     
 $produit="SELECT quantite FROM produits where id='{$v['id_produit']}'";
     $re = mysqli_query($db, $produit);
     $r = mysqli_fetch_array($re, MYSQLI_ASSOC);/*table produit*/
    

   if($r['quantite']<$v['qty'])
       
   {

       $manquecmdnde=$db->query("update listecommande set etat='manque' where id_listecommande='$id'");

       $manquecmdnde=$db->query("update commandes set manque=1 where id_com='{$v['id_com']}'");
      $manquecmdnde=$db->query("update produits set qty_mnq= (qty_mnq +('{$v['qty']}' - '{$r['quantite']}')) where id='{$v['id_produit']}'");

       
       $b=false;
   
   }
     
     
 

}



if($b){
$stock="SELECT manque,id_produit ,qty FROM commandes where id_listecommande='{$id}'";
$stck = mysqli_query($db, $stock);


 while($ligne = mysqli_fetch_array($stck, MYSQLI_ASSOC))  /*table commande*/
{ 
     
 $produit="SELECT quantite,quantite_achete FROM produits where id='{$ligne['id_produit']}'";
     $re = mysqli_query($db, $produit);
     $r = mysqli_fetch_array($re, MYSQLI_ASSOC);/*table produit*/
        
   
     
     

$newquantite=$r['quantite']-$ligne['qty'];
$new=$r['quantite_achete']+$ligne['qty'];
$maj=$db->query("UPDATE produits SET quantite='{$newquantite}' , quantite_achete='{$new}' WHERE id ='{$ligne['id_produit']}'");
 
if($ligne['manque']==1)
{$majcmdmanque=$db->query("UPDATE commandes SET manque='0'");}
     
}


$query = "SELECT id_client  FROM listecommande WHERE id_listecommande='{$id}'";
    

$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$id_client=$row['id_client'];    
    
    
    

$que = "SELECT nombre_achat FROM client WHERE id_client='{$id_client}'";
$resu = mysqli_query($db, $que);
$ro = mysqli_fetch_assoc($resu);
$nbrachat=$ro['nombre_achat'];
$nbrachat=$nbrachat+1;



$nbracha=$db->query("UPDATE client SET nombre_achat='{$nbrachat}' WHERE id_client='{$id_client}'");
              $manquecmdnde=$db->query("update listecommande set date_fix='$datetime' where id_listecommande='$id' ");

$etat="UPDATE listecommande SET etat='valide' WHERE id_listecommande='{$id}'";







if(mysqli_query($db,$etat)) 
{
        
    header('location:pesan2.php?message=success');
    
}

}else{   header('location:pesan2.php?idlist='.$id); };
?>