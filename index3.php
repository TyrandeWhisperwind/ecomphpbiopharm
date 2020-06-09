
<html>




 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Recherche</title>
     
     
  <script src="jquery.min.js"></script>
  <script src="search/bootstrap.min.js"></script>
  <link href="search/bootstrap.min.css" rel="stylesheet" />
       
      
 </head>
 <body>
          
 
                               

  
        <style>
h2{
 
  border-top: 14px;
}
            body{
            background-color:#F8F8FF;}



        </style>                       
                            
   <br />
   <h2 align="center" >Rechercher une information sur un médicament</h2><br />
   <div class="form-group">
    <div class="input-group">
      
     <span class="input-group-addon" >Rechercher</span>
     <input type="text" name="search_text" id="search_text" placeholder="Rechercher" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  

 </body>
</html>
<script type="text/javascript">
$(function() {
  $('a[href=#header]').click(function(){
    $('html').animate({scrollTop:0}, 'slow');
    return false;
  });
});
</script>

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch3.php",
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
