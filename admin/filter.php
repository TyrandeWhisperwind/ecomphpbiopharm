<?php  
session_start();
if(isset($_SESSION['id_gest']))
{
 
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "shopdb");  
      $output = '';  
      $query = "  
           SELECT * FROM commandes  
           WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">ID</th>  
                     <th width="30%">id_produit</th>  
                     <th width="43%">nom_client</th> 
                     <th width="10%">qty</th>  
                     <th width="10%">total</th>  
                     
                      <th width="12%">date_livraison</th> 
                      <th width="12%">date</th>  
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["id_com"] .'</td>  
                          <td>'. $row["id_produit"] .'</td>  
                          <td>'. $row["nom_client"] .'</td>  
                          <td>$ '. $row["qty"] .'</td>  
                          <td>'. $row["total"] .'</td>  
                          <td>'. $row["date_livraison"] .'</td>
                          <td>'. $row["date"] .'</td>
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
<?php }else{header ('Location:../index.php');} ?>