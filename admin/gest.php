<?php
session_start();
if(isset($_SESSION['id_gest']))
{
 $u=$_SESSION['id_gest'];
include('../inc/config.php');
?>
<!DOCTYPE html>
<html>
    
    <head>
             <?php  include('nav.php');     ?>

                <!--/span-->
                
                <div class="span9" id="content">
                	<?php
						if (!empty($_GET['message']) && $_GET['message'] == 'success') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Mot de passe changé</h4>';
							echo '</div>';
						}
						else if (!empty($_GET['message']) && $_GET['message'] == 'update') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Mot de passe changé</h4>';
							echo '</div>';
						}
						else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Mot de passe changé</h4>';
							echo '</div>';
						}
						
                  	?>
                    <br>
                    
					<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                 <div style="text-align:center;"class="center"><h4>Gestionnaire</h4></div>
                            </div>
                            <div class="block-content collapse in">
                            	 <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                
                                                <th >Nom d'utilisateur</th>
                                               
                                                <th >Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                  
                                       
                                            $r="SELECT* from utilisateur WHERE id_user='$u'";
                                         ;
											$query = $db->query($r);
                                            
										 
											$no = 1;
											while ($data = mysqli_fetch_array($query)) {
											?>
												<tr>
													
													<td><?php echo $data['id_user']; ?></td>
												<!--<td><?php //echo md5($data['password']); ?></td>-->
<td><a href="edit-gest.php?id=<?php echo $data['id_user']; ?>" class="btn"><i class="icon-edit"></i> Modifer mot de passe</a>  </td>
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
           
        </div>


        <!--/.fluid-container-->
       
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
    </body>

</html>
<?php }else{header ('Location:../index.php');} ?>