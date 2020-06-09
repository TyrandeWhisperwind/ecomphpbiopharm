<?php session_start();
if(isset($_SESSION['id_gest']))
{
 
include('../inc/config.php');

?>
<!DOCTYPE html>
   <?php 
                           $reqcli=$db->query("select * from client where gest= '' ");
$cpt=$reqcli->num_rows;

                                        ?>
<html>
    
    <head>
     <?php  include('nav.php');     ?>
                <!--/span-->
                
                <div class="span9" id="content">
                	<?php
						if (!empty($_GET['message']) && $_GET['message'] == 'success') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Gestionnaire ajouté</h4>';
							echo '</div>';
						}
						else if (!empty($_GET['message']) && $_GET['message'] == 'update') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Gestionnaire modifié</h4>';
							echo '</div>';
						}
						else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
							echo '<div class="alert alert-danger">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Gestionnaire supprimé</h4>';
							echo '</div>';
						}
                        else if (!empty($_GET['message']) && $_GET['message'] == 'echec') {
                            echo '<div class="alert alert-danger">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Saisire tous les champs </h4>';
                            echo '</div>';
                        }
                          else if (!empty($_GET['message']) && $_GET['message'] == 'echec2') {
                            echo '<div class="alert alert-danger">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Mot de passe de confirmation incorrect</h4>';
                            echo '</div>';
                        }
						
                  	?> 
                    <br>
                    
                     <a href="ajouter-gest.php" class="btn"><i class="icon-plus"></i> Ajouter un gestionnaire</a>
                  <a href="searchgest.php" class="btn">
                                                    <i class="icon-chevron-right"></i> Rechercher plus d'information sur un gestionnaire</a>  
                     <a href="detailgest.php" class="btn">
                                                    <i class="icon-chevron-right"></i> Nombre commande par gestionnaire</a>  
					<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                               <div style="text-align:center;"class="center"><h4>Liste des gestionnaires</h4></div>
                            </div>
                            <div class="block-content collapse in">
                             <h4 align="center" style="color:red;">Nombre de client non affecté: <?php echo $cpt;?></h4>
                            	    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th >Id_gest</th>
                                                   <th>Nom </th>
                                                <th  >prénom</th>
                                           
                                                  <th >Addresse</th>
                                                <th >Téléphone</th>
                                                 <th  >Email</th>
                                                 <th>Nbr_client</th> 
                                                <th width='250px'>Action</th>
                                            </tr>
                                        </thead>
                                     
                                        <tbody>
                                            <?php
                                            $r="SELECT* from gestionnaire";
											$query = $db->query($r);
                                            
										 
											$no = 1;
											while ($data = mysqli_fetch_array($query)) {
											?>
												<tr>
													<td><?php echo $data['id'];?></td>
                                              
                                              
                                                    
													<td><?php echo $data['nom']; ?></td>
                                                    <td><?php echo $data['prenom']; ?></td>
                                          
                                                      <td><?php echo $data['addresse']; ?></td>
                                                      <td><?php echo $data['telephone']; ?></td>
                                                      <td><?php echo $data['mail']; ?></td>
                                                    <td><?php echo $data['nbr_client']; ?></td>   
												
<td><a href="edit-gest.php?id=<?php echo $data['id']; ?>" class="btn btn-info btn-sm"> Modifer</a> 
    
  <button  onclick="a(<?php echo $cpt; ?>,<?php echo $data['i'];?>)" id="mod" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaledit">Affecter client</button> 
    
    <a href="delete-gest.php?id=<?php echo $data['id']; ?>" ><i class="btn btn-danger btn-sm" ><i class="icon-trash"></i></a></td>
												</tr>
											<?php
												$no++;
											}
											?>
                                        </tbody>
                                    </table>
                            </div>
                            <div class="navbar navbar-inner block-header">
                            	
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                 
                </div>
            </div>
        
    
    <div data-backdrop="static" id="modaledit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="center"class="modal-title">Affecter</h4>
      </div>
      <div class="modal-body">
          <!--input quantité-->
           <form action="" method="post" id="modifier">
                       
                               <table align="center">
                                    <body>
                                      <tr>
                       <td> <p>  <label for="quantity"><b>Nombre de client:</b></label></td><td>
     <input placeholder="Entrer le nombre de client"type="text" class="form-control"  name="nbr" id="nbr" class="form-control"></p></td>      
                                            
                                            </tr>
                                         
                                   
                                        <tr>
         <td rowspan="2" align='center'><input style="width:100px; height:30px;"type="button" id="submi" class="btn btn-success btn-sm" name="submi" value ="Enregister"/> 
                                            
                                            </td> 
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

        </div>
        <!--/.fluid-container-->
       <script>
 function a(cpt,i){ 
     

           var cpt=cpt;         
               var i=i;         

     
      $('#submi').click(function (){  
           var nbr = $('#nbr').val();
          
          
               if( nbr > cpt){ $('#error_message1').html('Pas de clients à affecter');  }else {
                $.ajax({  
                     url:"mod.php",  
                     method:"POST",  
                     data:{nbr:nbr,i:i},  
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
                    
                });  }
             
      });  
  
  }


   
  

</script>
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
    </body>

</html>
<?php }else{header ('Location:../index.php');} ?>