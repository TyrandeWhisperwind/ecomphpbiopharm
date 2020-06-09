<?php
include('../inc/config.php');

$id = $_GET['id'];

$req="select * from commandes where id_listecommande='$id'";
$veri = mysqli_query($db, $req);
while($v = mysqli_fetch_array($veri, MYSQLI_ASSOC))
{
 $re=$db->query("DELETE from commandes where id_listecommande='$id'");


}


 $p=$db->query("DELETE from facture where id_listecommande='$id'");
 $p=$db->query("DELETE from bon_enlevement where id_cmd='$id'");


 $r="DELETE from listecommande where id_listecommande='$id'";

 
if (mysqli_query($db, $r)) {
    header('location:pesan4.php?message=delete');
}
?>
