<?php

include('../inc/config.php');
//include('cek-login.php');

$id = $_GET['id'];
 $r="DELETE from messagerie where id_msg='$id'";
$query = $db->query($r);

 
if ($query) {
    header('location:msg-envoyer.php?message=delete');
}
?>