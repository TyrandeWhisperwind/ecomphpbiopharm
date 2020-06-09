<?php
$id=$_POST['i'];
$agent=$_POST['agent'];
$date=$_POST['date'];
  



 $bday           = explode('-', $date);
 $insertbday     = $bday[2] . '-' . $bday[1] . '-' . $bday[0];
 $verif =checkdate($bday[1],$bday[0],$bday[2]);
 $birth     = date("Y-m-d", strtotime($insertbday));

 $connect = mysqli_connect('localhost','root', '' ,'shopdb'); 

 $well=$connect->query("select id_listecommande from listecommande where i= '$id' ");
$id=mysqli_fetch_array($well, MYSQLI_ASSOC);


  
         $sqlt =$connect->query("UPDATE bon_enlevement SET  agent='{$agent}' where id_cmd='{$id['id_listecommande']}' ");

    
    $sql = "UPDATE listecommande SET  date_livraison='{$birth}',etat='livre' where id_listecommande='{$id['id_listecommande']}' ";
        if(mysqli_query($connect, $sql))  
      {  
           echo "Informations enregistrées";  
      }  
 
 ?>
