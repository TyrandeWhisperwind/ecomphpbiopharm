<?php
session_start();


require_once  '../core/init.php';
include 'includes/head.php';
include 'includes/nav.php';



?>




<?php
if(isset($_SESSION['id_client']))
{$id=$_SESSION['id_client'];
 
$sql="SELECT * FROM commandes WHERE id_client= '$id' AND id_listecommande = '' ";
$result = mysqli_query($db, $sql);

 $row_num = $result->num_rows;
 

  
    
    



?>



    <div class="row profile">
				<?php
include 'sidebar.php';

?>
<div class="col-md-9 order-content">
          
                                
                                    
    <h2>Passer une commande</h2>
                                    <hr>
                              
                                <h4>Consulter <a href="accueil/index.php#classe">Les classes thérapeutiques</a> pour passer une commande.</h4>
                                <div  style="background-color: transparent;"class="panel panel-default ">
                                                 <div class="panel-body">
                                                 
                                <table style="background-color:#e6f3ff;" class="table table-bordered table-striped" id="data">
                                              
                                          
                                <thead>
                                        <tr style="align:top;"> <th class="disable-sorting">N°</th>
                                            <th class="disable-sorting">Image</th>
                                            <th class="disable-sorting">Nom médicament</th>
                                            <th class="disable-sorting">Quantité</th>
                                             <th class="disable-sorting">Quantité totale <br> de boites</th>

                                                    <th class="disable-sorting">Prix unitaire</th>

                                            <th class="disable-sorting">Total</th>
                                            <th class="disable-sorting"><em class="fa fa-cog"></em> Action</th>
                                        </tr>
                                </thead>
                                    
                                <body>
                                    
                                   
                               
                                    
                                  
                                    <?php  
                                    $i=1;
                          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  
                          {   
                            $req="SELECT * FROM produits where id='{$row['id_produit']}'";
                              $re = mysqli_query($db, $req);
                              $r = mysqli_fetch_array($re, MYSQLI_ASSOC);
                             
                              
                               echo '  
                               <tr>  <td>'.$i.'</td> 
                                    <td><img src= "'.$r['image'].'" id="cmdimg" alt ="medec" class="details img-responsive"></td>  
                                    <td>'.$r['nom'].'</td>  
                                    <td>'.$row["qty"].'&nbspCarton(s)</td>
                                                    <td>'.$row["qty_boit"].'&nbspBoites</td> 

                                                              <td>'.$row["prix_unite"].'&nbspDa'.'</td>


                                    <td>'.$row["total"].'&nbspDa'.'</td> 
                                    <td width="200px"> 
                            
                                    <button  onclick="modifier( '.$row['id_com'].','.$r['quantite'].')" id="mod" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaledit"><em class="fa fa-pencil"></em> Modifier</button>
                                   <button onclick="supprimer( '.$row['id_com'].')" id="sup"type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modaldel"><em class="fa fa-trash"></em> Supprimer</a></button>
                                   </td>  
                               </tr>  
                               ';  
                              
                              $i++;
                          }  
                          ?>  
    
                                   
                        
                                </body>
                                       
                                </table>
                                
                                            
                                            </div> 
                       </div> 
    
    
    <!--valider liste commande    /*bouton valider liste*/-->
    
     <button  onclick="envoyer(<?php echo $row_num;?>)" id="valide" type="button" class="btn btn-success  btn-lg" data-toggle="modal" data-target="#modalenvoyer">Envoyer la commande</button>
    
    
    
    <?php 
 $requette="SELECT * FROM commandes where id_listecommande='' and id_client='{$id}'";
    $var = mysqli_query($db, $requette);

 $cpt = $var->num_rows;
   
    
if($cpt!=0){
 echo'   <a target="_blank" href="proforma.php" style="margin-left:10px;" class="btn btn-primary  btn-lg"  type="button" onclick="")>Demande de proforma</a>';  }else {echo ' <button  id="sup" data-toggle="modal" data-target="#vide"  style="margin-left:10px;" class="btn btn-primary  btn-lg"  type="button">Demande de proforma</button>';}
    
    ?>
    
    
    
    
</div> 
                              
                                
 </div>
                                  
                            
                            
                            
 </div>
		
		
	


                             <!--modif-->
<div data-backdrop="static" id="modaledit" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:30%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="center"class="modal-title">Modifier la quantité</h4>
      </div>
      <div class="modal-body">
          <!--input quantité-->
           <form action="" method="post" id="modifier">
                       
                               <table>
                                    <body>
                                      <tr>
                       <td> <p>  <label for="quantity">Quantité:</label>
     <input placeholder="Entrer la quantité"type="text" class="form-control" id="quantity" name="quantity" class="form-control"> 
                                              </p> </td>      
                                            
                                            </tr>
                                        
                                    
     
                                        <tr>
         <td>    <input style="width:100px; height:30px;"type="button" id="submit" class="btn btn-success btn-sm" name="submit" value ="Modifier"/> </td> 
                                          </tr>
                                        </body>
                           </table>
                         
                     <p><span id="success_message1" class="text-success"></span>
                    <span id="error_message1" class="text-danger"></span> 
               </p>
                                </form>							
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"value="Refresh Page" onClick="window.location.reload()">Fermer</button>
      </div>
    </div>

  </div>
</div>
                                    
                                    
                                    
                                                        <!--supprim-->
<div data-backdrop="static" id="modaldel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 align="center"class="modal-title">Supprimer</h4>
      </div>
      <div class="modal-body">
            <font size="4"><p  align="center"><span id="success_message" class="text-success"></span> </p></font>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" value="Refresh Page" onClick="window.location.reload()">Fermer</button>
      </div>
    </div>

  </div>
</div>
                            
                                                                                   <!--vide-->
<div data-backdrop="static" id="vide" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 align="center"class="modal-title">Liste vide</h4>
      </div>
      <div class="modal-body">
            <font size="4"><p  align="center"><span  class="text-danger">Cette liste est vide, veuillez la remplir.</span> </p></font>
       
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>    
      </div>
    </div>

  </div>
</div>
                    
                    
                    
                <!--envoyer-->    
                
                <div  data-backdrop="static" class="modal fade details-1" id= "modalenvoyer" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
								<div class="modal-dialog modal-md">
									<div class="modal-content">
											<div class ="model-header"> 
														<br>
															<h4 align="center" class="modal-title text-center">Envoyer</h4>
													
															
														<hr>
											</div>
											
										<div class="modal-body">
                                            
													<div class="container-fluid"> 
														<div class="row">
                                                            
																	
                                                            
                                                                   
																	
																	
																		<div class="form-group">
                                                                            <span id="error_message2" class="text-danger"></span>
																<span id="success_message2" class="text-success"></span><hr><p>Votre commande sera préparé dés sa validation,ensuite vous pourez la récupéré chez <strong>Biopharm Production</strong> à Oued Smar (Alger,Algérie) .En cas de soucis veuillez nous contacter.<a href="contacte.php">  Nous contacter</a></p>			
																			
																			
								                                        </div>  
																	
																	
														</div>
													   </div>
                                            
                                            
								            <div class="modal-footer"> 
                                                           
												<button class="btn btn-default" onclick="window.location.reload()">Fermer</button>
        				
								            </div>
										</div>
									</div>
								</div>
</div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
             
                    
                    
                    
                    
                    
                    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jiquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
                
                <!--for table data-->
 <script src="jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="js/vendor/jquery.sortelements.js" type="text/javascript"></script>
<script src="js/jquery.bdt.js" type="text/javascript"></script>

                    
<script>
                        /*for table data*/
$(document).ready( function () {
    $('#data').bdt();
});
                        
                        
                        
                        
                        
      /*supprimer bouton*/                  
  function  supprimer(id_com)  {
  
  var data = {"id_com":id_com};
        
		
		jQuery.ajax({
            
             
			url : 'supprimer.php',
			method : "post",
			data : data,
			success : function (data) {
               
				$('#success_message').fadeIn().html(data);
			
			},
			error   : function () {
				alert("error");	
			}
		});

  }         
    
    
    
    
    
    
    
    
    
    
    
    
    
                    /*expression pour vérifier la quantité si numérique*/
                        
                        
      function modifier(id_com,r){ 
           var id_com=id_com;
           var r=r;           
      $('#submit').click(function (){  
           var quantity = $('#quantity').val(); 

           if(quantity == '' || quantity== 0)  
           {  
                $('#error_message1').html("Entrer une quantité valide"); 
               
                $("form").trigger("reset");  
 
           } else if(quantity > r) {
                    $('#error_message1').html("Votre commande dépasse la quantité en stock."); 

                    $("form").trigger("reset");  
          
           }
          
          else{  
                $('#error_message1').html('');  
                $.ajax({  
                     url:"modifier.php",  
                     method:"POST",  
                     data:{quantity:quantity,id_com:id_com},  
                     success:function(data){
                         
                            $("form").trigger("reset");  
 
                          $('#success_message1').fadeIn().html(data);
                     
                     setTimeout(function(){  
                               $('#success_message1').fadeOut("Slow");  
                          }, 4000);  
                     },
                    error   : function () {
				alert("error");
				
			}
                    
                });  
           }  
      });  
  
  }
      
/*envoyer liste */
    
    function envoyer(row_num)
    {
    
         
        
        var row_num=row_num;
        
        if(row_num == 0){
                $('#error_message2').html('Cette liste est vide, veuillez la remplir.');
        
        }else{
        
		
		jQuery.ajax({
            
             
			url : 'envoyer.php',
            method : "post",
			data : {row_num:row_num},
			success : function (data) {

			$('#success_message2').fadeIn().html(data);
			},
			error   : function () {
				alert("error");	
			}
		}); }
    
    
    
    }
                    
                      
    
                        
                        
                        
                        
                        
                        
</script>
                        
<?php

include 'includes/footer.php';


?>
<?php
}else{header ('Location:../index.php');}
?>