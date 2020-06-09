<?php
session_start();
$id_client=$_SESSION['id_client'];
$nom_client=$_SESSION['nom_client'];
$prenom_client= $_SESSION['prenom'];
$mail= $_SESSION['mail'];

$peff=$_POST['row_num'];
$etat="";
$date_envoie = date('Y-m-d H:i:s');
$date=date('Y-m-d H:i:s');
$somme=0;
$qty=0;
$d=date('Y-m-d');
$connect = mysqli_connect('localhost','root', '' ,'shopdb'); 


 
$gesttionn="select gest from client where id_client= '$id_client' ";
$gestt= mysqli_query($connect,$gesttionn);
$gest=mysqli_fetch_array($gestt);




 
$adreq="select wilaya from client where id_client= '$id_client' ";
$adress= mysqli_query($connect,$adreq);
$adr=mysqli_fetch_array($adress);
$fc= strtoupper($adr['wilaya']);
$rest = substr($fc, 0, 3);

                $req="SELECT * FROM listecommande ";
                $result= mysqli_query($connect,$req);
                $row_num = $result->num_rows;
                $len=strlen($row_num+1);
                $bday   = explode('-', $d);

                                        if(($row_num == 0)||($bday[2]==1))
                                        {
                                            $valeur="CMD".$bday[0][2].$bday[0][3].$bday[1].$rest."00001";
                                            $valfac="FAC".$bday[0][2].$bday[0][3].$bday[1].$rest."00001";
                                            $valbon="BON".$bday[0][2].$bday[0][3].$bday[1].$rest."00001";
                                        }else{
                                        
                                            if($len==1)
                                            {$valeur="CMD".$bday[0][2].$bday[0][3].$bday[1].$rest."0000".($row_num+1);
                                             $valfac="FAC".$bday[0][2].$bday[0][3].$bday[1].$rest."0000".($row_num+1);
                                             $valbon="BON".$bday[0][2].$bday[0][3].$bday[1].$rest."0000".($row_num+1);
                                             
                                            }else if($len == 2)
                                            {$valeur="CMD".$bday[0][2].$bday[0][3].$bday[1].$rest."000".($row_num+1);
                                             $valfac="FAC".$bday[0][2].$bday[0][3].$bday[1].$rest."000".($row_num+1);
                                             $valbon="BON".$bday[0][2].$bday[0][3].$bday[1].$rest."000".($row_num+1);
                                            }
                                            
                                            else if($len == 3)
                                            { $valeur="CMD".$bday[0][2].$bday[0][3].$bday[1].$rest."00".($row_num+1);
                                              $valfac="FAC".$bday[0][2].$bday[0][3].$bday[1].$rest."00".($row_num+1);
                                              $valbon="BON".$bday[0][2].$bday[0][3].$bday[1].$rest."00".($row_num+1);
                                            }
                                            else if($len == 4)
                                            {$valeur="CMD".$bday[0][2].$bday[0][3].$bday[1].$rest."0".($row_num+1);
                                             $valfac="FAC".$bday[0][2].$bday[0][3].$bday[1].$rest."0".($row_num+1);
                                             $valbon="BON".$bday[0][2].$bday[0][3].$bday[1].$rest."0".($row_num+1);
                                            }
                                        }


 $s="SELECT qty FROM commandes where id_client='{$id_client}' AND id_listecommande=''";
           $v = mysqli_query($connect, $s);
            
         while($l= mysqli_fetch_array($v, MYSQLI_ASSOC))
         {
                    $qty=$qty+$l['qty']; /*quantité totale*/
                        
         
         }


            $sql="SELECT total FROM commandes where id_client='{$id_client}' AND id_listecommande=''";
           $voir = mysqli_query($connect, $sql);
            
         while($ligne= mysqli_fetch_array($voir, MYSQLI_ASSOC))
         {
                    $somme= $somme+$ligne['total'];/*total de la liste prix*/
                        
         
         }
                     

$query= "UPDATE commandes SET id_listecommande='{$valeur}' WHERE id_client='{$id_client}' AND id_listecommande=''";
                    mysqli_query($connect, $query);
                  

$list="INSERT INTO facture (id_facture,id_listecommande,date_facturation) Values ('{$valfac}','{$valeur}','{$date_envoie}')";
mysqli_query($connect, $list);

    
$list="INSERT INTO bon_enlevement (id_bon,id_cmd,date,id_client,agent) Values ('{$valbon}','{$valeur}','{$date_envoie}','{$id_client}','')";
mysqli_query($connect, $list);

if($gest['gest']=='')
{

$liste="INSERT INTO listecommande (id_listecommande,id_client,etat,date_envoie,total,quantity,id_facture,id_gest) Values ('{$valeur}','{$id_client}','{$etat}','{$date_envoie}','{$somme}','{$qty}','{$valfac}','')";

}else{
$liste="INSERT INTO listecommande (id_listecommande,id_client,etat,date_envoie,total,quantity,id_facture,id_gest) Values ('{$valeur}','{$id_client}','{$etat}','{$date_envoie}','{$somme}','{$qty}','{$valfac}','{$gest['gest']}')";

}
        if(mysqli_query($connect, $liste))  
      {  
           echo "Votre commande a été enoyer.<p>On vous contactera via un message ou un appel téléphonique pour confirmer vos coordonnées.</p>";  
      }  
 
 ?>