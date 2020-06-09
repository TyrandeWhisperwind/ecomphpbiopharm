<?php
session_start();



if(isset($_SESSION['id_gest']))
{
 

  
    
    



include('../inc/config.php');




function mysqli_result($result , $offset , $field = 0){
    $result->data_seek($offset);
    $row = $result->fetch_array();
    return $row[$field];
    }








?>

<!DOCTYPE html>
<html>
    
    <head>
        
            <?php  include('nav.php');     ?>

                <!--/span-->
                
                <div class="span9" id="content">
                   <br>
                      <div class="muted pull-left"><a href="message.php" class="btn"><i class="icon-envelope"></i> Envoyer un message</a> 
                    
                    <a href="index.php" class="btn">
                                                    <i class="icon-chevron-right"></i> Rechercher plus d'information sur un client</a>
                    </div>
                    <br ><br>
                	<?php
						if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>le client a ete bien supprimer</h4>';
							echo '</div>';
						}						
                  	?>
                    
                  <div class="row-fluid">

   
                  
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                           <div style="text-align:center;"class="center"><h4>Liste des clients</h4></div>

                            </div>
                            <div class="block-content collapse in">
                            	 <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width:50px;">Id_client</th>
                                                <th>Nom </th>
                                                <th>Prénom</th>
                                                <th>Société</th>
                                                <th>Email</th>
                                                <th>Téléphone</th>
                                                <th>Wilaya</th>
                                              
                                             

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											$per_page = 15;
                                            $r="SELECT COUNT(*) FROM client";
 
											$page_query = $db->query($r);
                                        
											$pages = ceil(mysqli_result($page_query, 0) / $per_page);
 
											$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
											$start = ($page - 1) * $per_page;
                                            $rr="SELECT * FROM client where gest='{$_SESSION['id_gest']}' LIMIT $start, $per_page";
											
											$query = $db->query($rr);
                                          
										 
											while ($data = mysqli_fetch_array($query)) {
											?>
												<tr>
													<td><?php echo $data['id_client']; ?></td>
													<td><?php echo $data['nom_client']; ?></td>
                                                    <td><?php echo $data['prenom']; ?></td>
                                                    <td><?php echo $data['society']; ?></td>
                                                    <td><?php echo $data['mail']; ?></td>
                                                    <td><?php echo $data['telephone']; ?></td>
                                                    <td><?php echo $data['wilaya']; ?></td>
                                                </tr>
											<?php	
											}
											?>
                                        </tbody>
                                    </table>
                                    <div align="center">
									<?php
									if($pages >= 1 && $page <= $pages)
									{
									  for($x=1; $x<=$pages; $x++)
									  {
										
									  	if($x == $page)
											echo ' <b><a href="?page='.$x.'">'.$x.'</a></b> | ';
										else
											echo ' <a href="?page='.$x.'">'.$x.'</a> |';
									  }
									}
									?>
                                    </div>
                                   
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

</script>
        <script>
        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
              
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
    </body>

</html>
<?php }else{header ('Location:../index.php');} ?>