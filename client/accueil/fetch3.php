<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "shopdb");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM produits
  WHERE id LIKE '%".$search."%'
  OR nom LIKE '%".$search."%' 
  OR categories LIKE '%".$search."%' 

  
  OR forme LIKE '%".$search."%'
  OR dosage LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM produits ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table-bordered table-striped table-hover ">
    <tr>
    <th>Id_produit</th>
     <th>Nom</th>
     <th>Catégories</th>
     
    
     <th>Forme</th>  

<th>Dosage</th>  
<th>Image</th>


    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["nom"].'</td>
    <td>'.$row["categories"].'</td>
    
    <td>'.$row["forme"].'</td>
     
          <td>'.$row["dosage"].'</td> 
           <td> .<img src="'.$row['image'].'" alt="'.$row['nom'].'" title="'.$row['nom'].'" width = "100" height = "100" /></td>  
          
          

            
   </tr>
  ';
 }
 echo $output;

}
else
{
 echo 'Data Not Found';
}

?>