<?php 
session_start();
require_once 'core/init.php';
$id = $_POST['i'];

$well=$db->query("select id from produits where i= '$id' ");
$id_gest=mysqli_fetch_array($well, MYSQLI_ASSOC);



$sql=" SELECT * FROM produits WHERE id = '{$id_gest['id']}' ";
$result = $db->query($sql);
$product = mysqli_fetch_assoc($result); //associatif array in product

$id_client=$_SESSION['id_client'];
$nom_client=$_SESSION['nom_client'];
$prenom_client= $_SESSION['prenom'];

?>


<?php ob_start(); ?>	

<div  data-backdrop="static" class="modal fade details-1" id= "details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
											<div  style=" background-color:#004b88; "class ="model-header"> 
<h4  style=" padding-top:15px;font-family:  Tahoma, sans-serif; color:white;"align="center"class="modal-title"><b><?= $product['nom'];?></b></h4>								
							
													
						 <input type="hidden" name="idf" id="idf" value="<?php echo $product['id'];?>"> 									
														<hr>
											</div>
											
										<div class="modal-body">
													<div class="container-fluid"> 
														<div class="row">
                                                            <span id="modal_errors" class="bg-danger"></span>
																	<div class="col-sm-6"> 
																		<div class="center-block">
																<img style="margin-left:50px; margin-top:70px;"src= "<?= $product['image'];?>" alt ="medec" class="details img-responsive">
																		</div>
																	</div>
																	
																	
																	<div class="col-sm-6"> 
																		<div class="form-group">
																							
																			<p> <label class="L" for ="quantity">Classe thérapeutique: </label> <?php echo '&nbsp'.$product['categories'].'.';?> </p>
																							 
																			
																			
							<p><label class="L" for ="quantity"> Forme:</label> <?php echo $product['forme'].'.';?> </p>
																			
                             <p><label class="L" for ="quantity"> Dosage:</label> <?php echo $product['dosage'].'.';?> </p>
                                <p><label class="L" for ="quantity"> DCI:</label> <?php echo $product['dci'].'.';?> </p>
                                                                <p><label class="L" for ="quantity"> Présentation:</label> <?php echo $product['presentation'].'.';?> </p>                                           
		
                        			 <p><label class="L" for ="quantity">Quantité de boite par carton: </label> <?= $product['quantity_par_carton'];?> Boites</p>											                                      

																	<?php	$dispo=$product['quantite'];?>
																			
								<p><label class="L" for ="quantity">Prix: </label> <?= $product['prix'];?>Da.</p>

                                                                    <?php   $prix=$product['prix'];?>
																			
															<hr>
				<h5>Entrer une quantité pour commander(en nombre de cartons)</h5>
                                                                            
                     <form action="" method="post" id="add_commande">
                         <table>
                                    <body>
                                      <tr>
                                    
                                        
                      <td>    <p>  <label for="quantity">Quantité:</label>
     <input placeholder="Entrer la quantité"type="text" class="form-control" id="quantity" name="quantity" class="form-control"> 
                                              </p> </td>     
                                             </tr>
                                        
                                            
                                        
     
<tr>
          <td>  <input style="width:150px; height:40px;"type="button" id="submit" class="btn btn-success  btn-md" name="submit" value ="Enregister"/> </td>
                                           </tr>
                                        </body>
                           </table>
                         
                         <br>
                        <span id="error_message" class="text-danger"></span>  
                     <span id="success_message" class="text-success"></span> 
                                </form>							
																			
								</div>  
																	
																	</div>  
														</div>
													</div>
														<div class="modal-footer"> 
                                                            <p class="text-danger">N'oubliez pas d'envoyer votre commande sur votre profil( <i class="glyphicon glyphicon-shopping-cart"></i> Passer une commande).</p>
															<button class="btn btn-default" onclick="closeModal()">Fermer</button>
                                                            
                                                            
                                                           
                                                            
				
																			
														</div>
										</div>
									</div>
								</div>
</div>

<script>
$(document).ready(function(){  
      $('#submit').click(function(){  
           var quantity = $('#quantity').val(); 
           var id = $('#idf').val(); 
          
           var prix= <?php echo $prix;?>;
           var dispo= <?php echo $dispo;?>;
           
           if(quantity == '' || quantity== 0)  
           {  
                $('#error_message').html("Entrer une quantité valide"); 
               
                $("form").trigger("reset");  
 
           }else if(quantity > dispo ){
          $('#error_message').html("Votre commande dépasse la quantité en stock."); 
              
               
               
                $("form").trigger("reset");  
          
           }else{  
                $('#error_message').html('');  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:{quantity:quantity,id:id,prix:prix},  
                     success:function(data){
                         
                            $("form").trigger("reset");  
 
                          $('#success_message').fadeIn().html(data);
                     
                     setTimeout(function(){  
                               $('#success_message').fadeOut("Slow");  
                          }, 4000);  
                     },
                    error   : function () {
				alert("error");
				
			}
                    
                });  
           }  
      });  
 });  
    
    
    
    
    
    
    
    
    
    
      
   /*close button & refresh*/
 function closeModal(){
  jQuery('#details-modal').modal('hide');
  setTimeout(function(){
   jQuery('#details-modal').remove();
   jQuery('modal-backdrop').remove();
  },500);
 }
/*refreshe with escp key*/
 window.addEventListener("keydown",checkKeyPress,false);   
function checkKeyPress(key){
if(key.keyCode=="27"){closeModal();}


}
    

</script>
 <?php  echo ob_get_clean(); ?>