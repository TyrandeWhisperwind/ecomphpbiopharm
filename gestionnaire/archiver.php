<?php
include('../inc/config.php');

$id = $_GET['id'];




 $r="update listecommande set etat='archiver'  where id_listecommande='$id'";

 
if (mysqli_query($db, $r)) {
    header('location:pesan3.php?message=success');
}
?>
