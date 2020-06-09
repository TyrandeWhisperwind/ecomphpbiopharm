<?php session_start();
if(isset($_SESSION['id_gest']))
{?>
 
<html>




 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Recherche</title>
  <script src="../jquery.min.js"></script>
 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
  <script src="bootstrap.min.js"></script>
  <link href="bootstrap.min.css" rel="stylesheet" />
 </head>
 <body>
   
  <div align="left">
                                        
      <tr> <td><a href="acheteurs.php" class="btn">
      <button type="button" class="btn btn-info" aria-label="Left Align" style="width:1300px">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Retour
</button></a>  </td></tr>
                                    </div>
                            
   <br />
   <h2 align="center">Rechercher une information sur un client</h2><br />
   <div class="form-group">
    <div class="input-group">
      
     <span class="input-group-addon">Rechercher</span>
     <input type="text" name="search_text" id="search_text" placeholder="Rechercher" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  

 </body>
                               
        <style>
h2{
 
  border-top: 14px;
}
            body{
            background-color:#F8F8FF;}



        </style>          
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
<?php }else{header ('Location:../index.php');} ?>