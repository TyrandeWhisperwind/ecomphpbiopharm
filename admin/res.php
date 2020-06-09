<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "shopdb");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM gestionnaire
  WHERE id LIKE '%".$search."%'
  OR nom LIKE '%".$search."%' 
  OR prenom LIKE '%".$search."%' 
  OR sexe LIKE '%".$search."%' 
  OR date LIKE '%".$search."%'
  OR ville LIKE '%".$search."%'
  OR wilaya LIKE '%".$search."%'
  OR nbr_client LIKE '%".$search."%'
  OR wilaya LIKE '%".$search."%'
  OR addresse LIKE '%".$search."%'
  OR mail LIKE '%".$search."%'
  OR telephone LIKE '%".$search."%'
 ";
}
else
{
 $query = "SELECT * FROM gestionnaire  ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table-bordered table-striped table-hover ">
    <tr>
    <th>Id_gest</th>
     <th>Nom</th>
     <th>Prénom</th>
     <th>Civilité</th>
     <th>Date naissance</th>
     <th>Addresse</th>  

<th>Code postal</th>  
<th>Ville </th>
<th>Wilaya</th>
<th>Téléphone</th>
<th>Email</th>
<th>Nbr client géré</th>

    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["nom"].'</td>
    <td>'.$row["prenom"].'</td>
    <td>'.$row["sexe"].'</td>
    <td>'.$row["date"].'</td>
    <td>'.$row["addresse"].'</td>
     
          <td>'.$row["code_postal"].'</td> 
           
 <td>'.$row["ville"].'</td> 
             <td>'.$row["wilaya"].'</td> 
              <td>'.$row["telephone"].'</td> 
               <td>'.$row["mail"].'</td> 
                <td>'.$row["nbr_client"].'</td> 
                
                
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