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
                	<?php
						if (!empty($_GET['message']) && $_GET['message'] == 'sauvgarder') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>la commande a ete bien sauvgarder</h4>';
							echo '</div>';
						}	
                          else if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                            echo '<div class="alert alert-success">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>commande validee avec succee</h4>';
                            echo '</div>';
                        }					
                  	?>
                    
                  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div style="text-align:center;"class="center"><h4>Nombre de commande par gestionnaire</h4></div>
                            </div>
                            <div class="block-content collapse in">
                            	 <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                         <th>Id_gest</th>
                                        
                                                   <th>Nbr_cmd_reçue</th>
                                                <th>Nbr_cmd_validée</th>
                                                 <th>Nbr_cmd_livrée</th>
                                                   <th>Nbr_cmd_abandonnée</th>
                                                   
                                                   <th>Nbr_cmd_archivée</th>
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
  
                                          
                                            $f="SELECT * FROM gestionnaire";
                                            $ff=$db->query($f);
                                           $fff=mysqli_fetch_assoc($ff);
                                          

											$per_page = 15;
                                            $r="SELECT COUNT(*) FROM gestionnaire ";
 
											$page_query = $db->query($r);
                                       
											$pages = ceil(mysqli_result($page_query, 0) / $per_page);
 
											$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
											$start = ($page - 1) * $per_page;
                                            $rr="SELECT id FROM gestionnaire  LIMIT $start, $per_page";
                                                    
											
											$query = $db->query($rr);
    
                                    while ($data = mysqli_fetch_array($query) ) {
                                          
            $pef=$db->query("SELECT * FROM listecommande where (id_gest='{$data['id']}' and (etat ='' or etat='manque' or etat='ok') )");
                                        $c1=$pef->num_rows;
                                        
           $pef=$db->query("SELECT * FROM listecommande where id_gest='{$data['id']}' and etat ='valide' ");
                                        $c2=$pef->num_rows;
                                                                           
           $pef=$db->query("SELECT * FROM listecommande where id_gest='{$data['id']}' and etat ='livre' ");
                                        $c3=$pef->num_rows;
                  $pef=$db->query("SELECT * FROM listecommande where id_gest='{$data['id']}' and etat ='abandonner' ");
                                        $c4=$pef->num_rows;
                        $pef=$db->query("SELECT * FROM listecommande where id_gest='{$data['id']}' and etat ='archiver' ");
                                        $c5=$pef->num_rows;
                                                                                             
                                                                                                        
                                                                                                                   
                                                                                                        
                                                                                                              
                                                                                                        
                                                    
                                                
                                          
												?>

												<tr>
													<td><?php echo $data['id'];?></td>
                                                   
                                                    <td><?php echo $c1;?></td>
                                                 <td><?php echo $c2;?></td>

                                                     <td><?php echo $c3;?></td>
                                                      <td><?php echo $c4;?></td> <td><?php echo $c5;?></td>
                                                   
                                                     
                                                        
                                                        
                                                        
                                                </tr>
									<?php }?>
                                        </tbody>
                                    </table>
                                    <div align="center">
									<?php
									if($pages > 1 && $page <= $pages)
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