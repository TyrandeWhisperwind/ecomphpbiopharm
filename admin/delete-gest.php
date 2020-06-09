<?php

include('../inc/config.php');


$id = $_GET['id'];

$reqcli=$db->query("select * from client  where gest= '{$id}' ");
    
  while( $row = mysqli_fetch_array($reqcli, MYSQLI_ASSOC) )
    {
        
    $sql = $db->query("UPDATE client SET gest=''  where gest= '{$id}' ");

    
    }


    $sql = $db->query("UPDATE listecommande SET id_gest='' where id_gest = '{$id}' ");

  
     


 $r="DELETE from utilisateur where id_user='$id'";
$query = $db->query($r);
 $rr="DELETE from gestionnaire where id='$id'";
$query = $db->query($rr);

 
if ($query) {
    header('location:gestt.php?message=delete');
}
?>