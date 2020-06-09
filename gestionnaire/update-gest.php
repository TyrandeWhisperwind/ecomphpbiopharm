<?php

include('../inc/config.php');
 

$id = $_POST['id'];
$password = $_POST['password'];
$mdpconnect=sha1($password);

$r="UPDATE utilisateur set mot_de_passe='$mdpconnect' where id_user='$id'";
$query = $db->query($r);

 
if ($query) {
    header('location:gest.php?message=update');
}
?>