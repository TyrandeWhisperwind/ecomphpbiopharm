<?php
require_once  '../core/init.php';

$id = $_GET['id'];
 $r="update listecommande set etat='abandonner' where id_listecommande='$id'";
$query = $db->query($r);

 
if ($query) {
    header('location:commandevalide.php?message=delete');
}
?>
