<?php
include('../inc/config.php');
 $id=$_GET['id'];
$indcie=1;
$b=false;

                    $rdyughj="select * from commandes where id_listecommande='$id'";
                                                $azeaze = $db->query($rdyughj);
                                                 $row_num =  $azeaze->num_rows; 
                                            
                                    while ($ligne = mysqli_fetch_array($azeaze)) 
                                            {
                                                $eee="select quantite from produits where id='{$ligne['id_produit']}'";
                                                $result = mysqli_query($db,$eee);
                                                $row = mysqli_fetch_array($result);
                                        if($row['quantite']>=$ligne['qty'])
                              {$aaa=$db->query("update commandes set manque=0 where id_com='{$ligne['id_com']}'");
                              $indice++; }
                                            }
                                            
                                                
                                   if($indice==$row_num) 
                 {$azeaz=$db->query("update listecommande set etat='ok' where id_listecommande='$id'");
                                   $b=true;
                                }       


        if($b){
    header('location:pesan2.php?message=success1');}

else{
 header('location:pesan2.php?message=success2');
}


?>