<?php
session_start();
require_once  '../core/init.php';
$id_client=$_SESSION['id_client'];
$nom_client=$_SESSION['nom_client'];
$prenom_client= $_SESSION['prenom'];
$i=$_POST['i'];

$well=$db->query("select id_listecommande from listecommande where i= '$i' ");
$id=mysqli_fetch_array($well, MYSQLI_ASSOC);




           $sql="SELECT * FROM commandes WHERE id_client= '{$id_client}' AND id_listecommande = '{$id['id_listecommande']}' ";
$result = mysqli_query($db, $sql);

 echo '  
                                 <table style="background-color:#e6f3ff;" class="table table-bordered table-striped" id="data1">
                                              
                                          
                                <thead>
                                        <tr>   
                                            <th class="disable-sorting">N°</th>
                                            <th class="disable-sorting">Image</th>
                                            <th class="disable-sorting">Nom médicament</th>
                                            <th class="disable-sorting">Quantité</th>

                                            <th class="disable-sorting">Quantité total <br>de boites</th>
                                            <th class="disable-sorting">Prix unitaire</th>

                                            <th class="disable-sorting">Total</th>
                                        </tr>
                                </thead>
                                    
                                <body>';
                                    $i=1;
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  
                          {   
                            $req="SELECT * FROM produits where id='{$row['id_produit']}'";
                              $re = mysqli_query($db, $req);
                              $r = mysqli_fetch_array($re, MYSQLI_ASSOC);
 if($row['manque']==1){        echo '  
                               <tr style="background-color:#ffb3b3;">  
                                    <td>'.$i.'</td>  
                                   <td><img style="width:150px;height:150px;"src= "'.$r['image'].'" id="cmdimg" alt ="medec" class="details img-responsive"></td>  
                                     <td>'.$r['nom'].'</td>   
                                 <td>'.$row['qty'].'&nbspCarton(s)</td>

                                    <td>'.$row['qty_boit'].'&nbspBoites</td>
                                    <td>'.$row['prix_unite'].'&nbspDa</td> 
                                    
                                    <td>'.$row['total'].'&nbspDa</td>
                                   
                               </tr>  
                               ';  }else{
                               echo '  
                               <tr>  
                                    <td>'.$i.'</td>  
                                   <td><img style="width:150px;height:150px;"src= "'.$r['image'].'" id="cmdimg" alt ="medec" class="details img-responsive"></td>  
                                     <td>'.$r['nom'].'</td>   
                                 <td>'.$row['qty'].'&nbspCarton(s)</td>

                                    <td>'.$row['qty_boit'].'&nbspBoites</td>
                                    <td>'.$row['prix_unite'].'&nbspDa</td> 
                                    
                                    <td>'.$row['total'].'&nbspDa</td>
                                   
                               </tr>  
                               ';  }
        $i++;
                              
                                    
                                    
    }
                                        

    
                        
                          echo '       </body>
                                       
                                </table>
                               ';  
   
 
 ?>

