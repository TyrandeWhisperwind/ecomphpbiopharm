<?php 
require_once 'core/init.php';
$id = $_POST['i'];

$well=$db->query("select id from produits where i= '$id' ");
$id_gest=mysqli_fetch_array($well, MYSQLI_ASSOC);




$sql=" SELECT * FROM produits WHERE id = '{$id_gest['id']}' ";
$result = $db->query($sql);
$product = mysqli_fetch_assoc($result); //associatif array in product


?>


<?php ob_start(); ?>	

<div  data-backdrop="static" class="modal fade details-1" id= "details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
											<div  style=" background-color:#004b88; "class ="model-header"> 
													
							<h4  style=" padding-top:15px;font-family:  Tahoma, sans-serif; color:white;"align="center"class="modal-title"><b><?= $product['nom'];?></b></h4>								
														<hr>
											</div>
											
										<div class="modal-body">
													<div class="container-fluid"> 
														<div class="row">
																	<div class="col-sm-6"> 
																		<div class="center-block">
																<img src= "<?= $product['image'];?>" alt ="medec" class="details img-responsive">
																		</div>
																	</div>
																	
																	
																	<div class="col-sm-6"> 
																		<div class="form-group">
																							
																			<p> <label class="L" for ="quantity">Classe thérapeutique:</label><?php echo '&nbsp'.$product['categories'].'.';?> </p>
																							 
																			
																			
							<p><label class="L" for ="quantity"> Forme: </label> <?php echo $product['forme'].'.';?> </p>
																			
                             <p><label class="L" for ="quantity"> Dosage: </label> <?php echo $product['dosage'].'.';?> </p>
                                <p><label class="L" for ="quantity"> DCI:</label> <?php echo $product['dci'].'.';?> </p>
																			
							<p><label class="L" for ="quantity"> Présentation:</label> <?php echo $product['presentation'].'.';?> </p>											
																			
												
                        			 <p><label class="L" for ="quantity">Quantité de boite par carton: </label> <?= $product['quantity_par_carton'];?> Boites</p>											                                      

																	<?php	$dispo=$product['quantite'];?>
																			
								<p><label class="L" for ="quantity">Prix: </label> <?= $product['prix'];?>Da.</p>

																		</div>  
																	
																	</div>  
														</div>
													</div>
														<div class="modal-footer"> 
															<button class="btn btn-default" onclick="closeModal()">Fermer</button>
																																			
														</div>
										</div>
									</div>
								</div>
</div>
<!--close button & refresh -->
<script>
 function closeModal(){
  jQuery('#details-modal').modal('hide');
  setTimeout(function(){
   jQuery('#details-modal').remove();
   jQuery('modal-backdrop').remove();
  },500);
 }
/*refreshe with echap key*/
 window.addEventListener("keydown",checkKeyPress,false);   
function checkKeyPress(key){
if(key.keyCode=="27"){closeModal();}


}
    

</script>
 <?php  echo ob_get_clean(); ?>