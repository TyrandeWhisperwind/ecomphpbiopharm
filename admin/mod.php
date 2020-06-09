<?php

$nbr=$_POST['nbr'];


$id=$_POST['i'];


include('../inc/config.php');
 
$well=$db->query("select id from gestionnaire where i= '$id' ");
$id_gest=mysqli_fetch_array($well, MYSQLI_ASSOC);


if($nbr==0){  
$reqcli=$db->query("select * from client  where gest= '{$id_gest['id']}' ");
    
  while( $row = mysqli_fetch_array($reqcli, MYSQLI_ASSOC) )
    {
        
    $sql = $db->query("UPDATE client SET gest=''  where gest= '{$id_gest['id']}' ");

    
    }


$t="UPDATE gestionnaire SET nbr_client= '0' where id = '{$id_gest['id']}' ";
        
          if(mysqli_query($db, $t))  
      {  
           echo "Nombre de client affecté";  
      }

}else{

    $sql = $db->query("UPDATE client SET gest= '{$id_gest['id']}' where gest='' limit $nbr  ");

    
$t="UPDATE gestionnaire SET nbr_client= ( nbr_client + '{$nbr}') where id = '{$id_gest['id']}' ";
        
          if(mysqli_query($db, $t))  
      {  
           echo "Nombre de client affecté";  
      }  
       
}

?>
