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
                
                    
                  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div style="text-align:center;"class="center"><h4>Les lignes de la commande</h4></div>
                            </div>
                            <div class="block-content collapse in">
                            	 <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Code produit</th>
                                        
                                                   <th>Quantité de boite</th>
                                                <th>Quantité de carton</th>

                                                
                                                    <th>Total</th>
                                                  <th>prix unitaire</th>
                                         

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                           if(!empty($_GET['id'])){
                                               
                                               $m=$_GET['id'];
                                            $f="SELECT * FROM listecommande";
                                            $ff=$db->query($f);
                                           $fff=mysqli_fetch_assoc($ff);
                                           $vv=$fff['id_listecommande'];

											$per_page = 15;
                                            $r="SELECT COUNT(*) FROM commandes ";
 
											$page_query = $db->query($r);
                                       
											$pages = ceil(mysqli_result($page_query, 0) / $per_page);
 
											$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
											$start = ($page - 1) * $per_page;
                                            $rr="SELECT * FROM commandes  LIMIT $start, $per_page";
                    
											
											$query = $db->query($rr);
                                          
										 
											while ($data = mysqli_fetch_array($query) ) {
                                          
                                               
                                                    if($data['id_listecommande']==$m)
                                                {
											
                                                				?>
								<?php if ($data['manque']==1) {?>
                                            <tr style="background-color:#ffb3b3;">
												
													<td><?php echo $data['id_produit']; ?></td>
                                                   
                                                    <td><?php echo $data['qty_boit'].' Boites'; ?></td>
                                                                 <td><?php echo $data['qty'].' carton(s)'; ?></td>

                                                     <td><?php echo $data['total'].'DA'; ?></td>
                                                      <td><?php echo $data['prix_unite'].'DA'; ?></td>
                                                
                                                </tr>
                                                                                        <?php }else {?>
                                             <tr>
												
													<td><?php echo $data['id_produit']; ?></td>
                                                   
                                                    <td><?php echo $data['qty_boit'].' Boites'; ?></td>
                                                     <td><?php echo $data['qty'].' carton(s)'; ?></td>

                                                     <td><?php echo $data['total'].'DA'; ?></td>
                                                      <td><?php echo $data['prix_unite'].'DA'; ?></td>
                                                
                                                </tr>
                                            
                                            
                                            <?php }?>	

											<?php	
											}
                                        }
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