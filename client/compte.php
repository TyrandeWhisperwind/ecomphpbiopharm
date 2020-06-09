<?php
session_start();

require_once  '../core/init.php';
include 'includes/head.php';
include 'includes/nav.php';

?>




<?php
if(isset($_SESSION['id_client']))
{
    
    $getid=$_SESSION['id_client'];

    
$req=$db->query("SELECT * FROM client WHERE id_client= '{$getid}' ");
$userinfo=$req->fetch_array(MYSQLI_BOTH);    



?>


    <div class="row profile">
	
        		<?php
include 'sidebar.php';

?>
                            <div class="col-md-9 order-content">
          
                                <div class="form_main col-md-4 col-sm-5 col-xs-7">
                                    
          <!--nom client-->       <h2 style="margin-left:10px; margin-bottom:10px;"class="heading"><strong><?php echo $userinfo['nom_client'].'&nbsp&nbsp&nbsp'.$userinfo['prenom'];?></strong></h2>
                                       
                                        
									<div class="col-sm-5"> 
										<div class="form-group">
                                         
                                            <p style="font-size:17px;"><label>IDF: </label><?php echo '&nbsp&nbsp&nbsp'.$userinfo['id_client'];?> </p>	
                                                                                        <p style="font-size:17px;"><label>N.I.S: </label><?php echo '&nbsp&nbsp&nbsp'.$userinfo['st'];?> </p>	
                                            
									<p style="font-size:17px;"><label>Date de naissance: </label><?php echo '&nbsp&nbsp&nbsp'.$userinfo['date'];?> </p>														
									<p style="font-size:17px;"> <label>Addresse: </label><?php  echo '&nbsp&nbsp&nbsp'.$userinfo['addresse']; ?> </p>
                                    <p style="font-size:17px;"><label > Code postal: </label><?php  echo '&nbsp&nbsp&nbsp'.$userinfo['code_postal']; ?> </p>
							      <p style="font-size:17px;"><label> Commune: </label><?php  echo '&nbsp&nbsp&nbsp'.$userinfo['ville'];?> </p>
                                <p style="font-size:17px;"><label> Wilaya:</label><?php   echo '&nbsp&nbsp&nbsp'.$userinfo['wilaya'];?> </p>
			                     <p style="font-size:17px;"><label>Téléphone: </label> <?php  echo '&nbsp&nbsp'.$userinfo['telephone'];?></p>
                                             <p style="font-size:17px;"><label>Société: </label> <?php echo '&nbsp&nbsp&nbsp'.$userinfo['society']; ?></p>
																			
															<hr>
												<p style="font-size:17px;"> <label>Email: </label><?php  echo '&nbsp&nbsp&nbsp'.$userinfo['mail']; ?> </p>
                                          
																			
																		</div>  
																	
																	</div>  
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
            
                            </div>
		
		
	</div>

                
                
                
                
                
                
                
                
                
                

    
       <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jiquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>



















                        
<?php

include 'includes/footer.php';


?>
<?php
}else{header ('Location:../index.php');}
?> 
