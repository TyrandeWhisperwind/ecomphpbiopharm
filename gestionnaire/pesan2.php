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
						 if (!empty($_GET['message']) && $_GET['message']=='success') {
                            echo '<div class="alert alert-success">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Commande validée</h4>';
                            echo '</div>';
                        }else if (!empty($_GET['idlist']))
                         {
                         $id=$_GET['idlist'];
                            $request="select * from commandes where id_listecommande= '$id' and manque= 1"; 
                        $result = mysqli_query($db, $request);
                             
                             echo '<div class="alert alert-danger">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                             echo'Vous ne pouvez pas valider cette commande les produits suivant sont en manque de stock:<br>';
                              
                             
                             while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  
                          {   
                                 $azerty="select nom from produits where id='{$row['id_produit']}'"; 
                                     $compil= mysqli_query($db, $azerty);

                                    $ro= mysqli_fetch_array($compil);
                                  
                                echo $ro['nom']."<br>";

                           }
                           
                

                            echo '</div>';
                             
              
                         }else if (!empty($_GET['message']) && $_GET['message']=='success1')
                         {
                         
                         echo '<div class="alert alert-success">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>La commande est disponible en stock</h4>';
                            echo '</div>';
                         }else if (!empty($_GET['message']) && $_GET['message']=='success2')
                         {
                              echo '<div class="alert alert-danger">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>La commande n\'est pas disponible en stock</h4>';
                            echo '</div>';
                         }
						
                  	?>
                    
                  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                               <div style="text-align:center;"class="center"><h4>Commandes reçues</h4></div>
                            </div>
                            <div class="block-content collapse in">
                            	 <table class="table table-bordered ">
                                        <thead>
                                            <tr>
                                                <th >Id_cmd</th>
                                                <th >Id_client</th>
                                              <th>Quantité<br>totale</th>
                                                <th>Prix total</th>
                                                                         <th style="wdith:70px;">Date<br>commande</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											$per_page = 15;
                                            $r="SELECT COUNT(*) FROM listecommande";
 
											$page_query = $db->query($r);
                                            
											$pages = ceil(mysqli_result($page_query, 0) / $per_page);
 
											$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
											$start = ($page - 1) * $per_page;
                                            $rr="SELECT * FROM listecommande where ((etat='' or etat='manque' or etat='ok') and id_gest='{$_SESSION['id_gest']}') ORDER BY date_envoie ASC LIMIT $start, $per_page";
											
											$query = $db->query($rr);
                                         
										 
											while ($data = mysqli_fetch_array($query)) {
											?>
								<?php if ($data['etat']=='manque') { ?>
                                            <tr style="background-color:#ffb3b3;">
													<td><?php echo $data['id_listecommande']; ?></td>
													<td><?php echo $data['id_client']; ?></td>
                                                      <td><?php echo $data['quantity'].'carton(s)'; ?></td>
                                                    <td><?php echo $data['total'].'DA'; ?></td>
                                                    <td width='90'><?php echo $data['date_envoie']; ?></td>

                                        
                                    <td width='222'><a href="detail2.php?id=<?php echo $data['id_listecommande']; ?>" class="btn">
                                                     Afficher</a>
                            
                                                        <a href="val.php?id=<?php echo $data['id_listecommande']; ?>" class="btn btn-success" onclick="return confirm('Êtes-vous sûr ?')")>Valider</a>
                                         <a href="verifiersidispo.php?id=<?php echo $data['id_listecommande']; ?>" class="btn btn-info" >Vérifier</a>


                                                    
                                                    </td>
                                                        
												</tr> 
                                            
                                            <?php }else if ($data['etat']=='') { ?>	
                                            
                                            
											<tr>
													<td><?php echo $data['id_listecommande']; ?></td>
													<td><?php echo $data['id_client']; ?></td>
                                                      <td><?php echo $data['quantity'].'carton(s)'; ?></td>
                                                    <td><?php echo $data['total'].'DA'; ?></td>
                                                    <td width='90'><?php echo $data['date_envoie']; ?></td>

                                        
                                    <td width='150'><a href="detail2.php?id=<?php echo $data['id_listecommande']; ?>" class="btn">
                                                     Afficher</a>
                            
                                                        <a href="val.php?id=<?php echo $data['id_listecommande']; ?>" class="btn btn-success" onclick="return confirm('Êtes-vous sûr ?')")>Valider</a>


                                                    
                                                    </td>
                                                        
												</tr>
                                            <?php }else if ($data['etat']=='ok'){?>
                                            
                                            <tr style="background-color:#ccffcc;">
													<td><?php echo $data['id_listecommande']; ?></td>
													<td><?php echo $data['id_client']; ?></td>
                                                      <td><?php echo $data['quantity'].'carton(s)'; ?></td>
                                                    <td><?php echo $data['total'].'DA'; ?></td>
                                                    <td width='90'><?php echo $data['date_envoie']; ?></td>

                                        
                                    <td width='222'><a href="detail2.php?id=<?php echo $data['id_listecommande']; ?>" class="btn">
                                                     Afficher</a>
                            
                                                        <a href="val.php?id=<?php echo $data['id_listecommande']; ?>" class="btn btn-success" onclick="return confirm('Êtes-vous sûr ?')")>Valider</a>
                                        

                                                    
                                                    </td>
                                                        
												</tr> 
                                            
											<?php	
											}}
											?>
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