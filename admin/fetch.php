<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "shopdb");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM client 
  WHERE nom_client LIKE '%".$search."%'
  OR prenom LIKE '%".$search."%' 
  OR addresse LIKE '%".$search."%' 
  OR code_postal LIKE '%".$search."%' 
  OR ville LIKE '%".$search."%'
  OR society LIKE '%".$search."%'
  OR sexe LIKE '%".$search."%'
  OR wilaya LIKE '%".$search."%'
  OR mail LIKE '%".$search."%'
  OR id_client LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM client ORDER BY id_client
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table-bordered table-striped table-hover ">
    <tr>
    <th>id</th>
     <th>nom</th>
     <th>prenom</th>
     <th>adresse</th>
     <th>code_postal</th>
     <th>ville</th>  
<th>telephone</th>  
<th>Email</th>  
<th>wilaya</th> 
 <th>society</th>
<th>Civilité</th>  
<th>date de naissance</th>
<th>Action</th>

    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["id_client"].'</td>
    <td>'.$row["nom_client"].'</td>
    <td>'.$row["prenom"].'</td>
    <td>'.$row["addresse"].'</td>
    <td>'.$row["code_postal"].'</td>
    <td>'.$row["ville"].'</td>
     
          <td>'.$row["telephone"].'</td>
            <td>'.$row["mail"].'</td>
              <td>'.$row["wilaya"].'</td>
                <td>'.$row["society"].'</td>
                <td>'.$row["sexe"].'</td>
                <td>'.$row["date"].'</td>
                <td><a href="message.php?id='.$row['id_client'].'" class="btn btn-info">envoyer message</a></td>
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