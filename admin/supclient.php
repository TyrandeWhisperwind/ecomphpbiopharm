<?php

include('../inc/config.php');


$id = $_GET['id'];

$pef="SELECT gest FROM client where id_client ='$id' ";
   $qtycarton= mysqli_query($db,$pef);
                $quatityboite = mysqli_fetch_array($qtycarton);
 

 $sql = $db->query("UPDATE gestionnaire SET nbr_client=(nbr_client - 1) where id='{$quatityboite['gest']}'");




 $rrr=$db->query("DELETE from utilisateur where id_user ='$id'");

 $r="DELETE from client where id_client='$id'";


 
if (mysqli_query($db, $r)) {
    header('location:acheteurs.php?message=delete');
}
?>