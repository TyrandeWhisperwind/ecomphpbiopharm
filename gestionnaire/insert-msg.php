<?php

include('../inc/config.php');


$id_client= $_POST['id_client'];
$msg=$_POST['message'];



$r="INSERT INTO message_sent VALUES('$id_client','$msg')";
$quer = $db->query($r);

$r="INSERT INTO message_client VALUES('$id_client','$msg')";
$query = $db->query($r);

 
if ($query) {
    header('location:msg-envoyer.php?message=success');
}
?>