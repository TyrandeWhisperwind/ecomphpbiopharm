<?php
session_start();
$id_client=$_SESSION['id_client'];
$nom_client=$_SESSION['nom_client'];
$prenom_client= $_SESSION['prenom'];
$id=$_POST['id'];
$prix=$_POST['prix'];
$date = date('Y-m-d H:i:s');
$qtt=0;
$qttt=0;
$totalt=0;
$i=array();

 


 //insert.php  
 $connect = mysqli_connect('localhost','root', '' ,'shopdb'); 

 $req="SELECT quantity_par_carton FROM produits where id= '{$id}' ";
                $qtycarton= mysqli_query($connect,$req);
                $quatityboite = mysqli_fetch_array($qtycarton);
 
if(isset($_POST["quantity"]))  
 {  
      $quantity =htmlspecialchars($_POST["quantity"]);  


      $verif=$connect->query("SELECT * FROM commandes where id_produit='{$id}' and id_listecommande='' and id_client='{$id_client}'");
                $row_cnt = $verif->num_rows;
                        


                    if($row_cnt >=1)
                        {
                    $veri="SELECT * FROM commandes where id_produit='{$id}' and id_listecommande='' and id_client='{$id_client}'";
                             $re = mysqli_query($connect, $veri);
                                     
                                     while($v = mysqli_fetch_array($re, MYSQLI_ASSOC))  
                                     {
                                        $qtt=$qtt+$v['qty'];
                                         $i[]=$v['id_com'];
                                         
                                     }
                        
                                $qtt=$qtt+$quantity ;
                       $qttt=$qtt*$quatityboite['quantity_par_carton'];
                            
                        $totalt=$qttt*$prix;
                          
 $sq = $connect->query("INSERT INTO commandes (id_produit,id_client,qty,total,nom_client,prenom,prix_unite,date,qty_boit) VALUES ('{$id}','{$id_client}','{$qtt}','{$totalt}','{$nom_client}','{$prenom_client}','{$prix}','{$date}','$qttt')");  
                            
            foreach($i as $element)
            
            {
            $sql = "DELETE FROM commandes WHERE id_com='{$element}'";

            
            }            
                        
                        
                        
                        
                        }else{
                    




              
                     $qttt=$quantity * $quatityboite['quantity_par_carton'];
     
       $total=$prix*$qttt;

     
    $sql = "INSERT INTO commandes (id_produit,id_client,qty,total,nom_client,prenom,prix_unite,date,qty_boit) VALUES ('{$id}','{$id_client}','{$quantity}','{$total}','{$nom_client}','{$prenom_client}','{$prix}','{$date}','$qttt')";  
     
     
}
     
        if(mysqli_query($connect,$sql))  
      {  
           echo "Votre commande a été enregistrer sur votre profil.";  
      }  
 }  
 ?>

