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
<br>

 <div class="CSSTableGenerator" >
             



                            <div style="width:65%;"class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                   <div style="text-align:center;"class="center"><h4>Statistique</h4></div>
                                   

                                    </div>
                                
                                
                               
                                <div class="block-content collapse in">
                                   
                     <?php $sql=$db->query("select nbr_client from gestionnaire where id='{$_SESSION['id_gest']}'");
                                           $row_cnt = mysqli_fetch_array($sql);
                                    
                                    ?>
                                                               
                                    <div style="margin-top: 15px;"class="container-fluid">
	
                            <table id="tableReport" class="table table-bordered table-striped table-hover ">
                         	<tbody>
            		<tr  class="media" id="carga_30" >
            			<td class="media-body">
            				<h4 class="media-heading font-yellow text-bold hidden-xs">Nombre de client à gérer</h4>
                            </td>
                        <td  style=" width: 72px !important;
    height: 30px;
    
    background-color: #eee;   "class="media-left">
            				<h4 style="text-align:center;"><?php echo $row_cnt['nbr_client'];?></h4>
            			</td>
                        
                    </tr>
                	
            	</tbody>
            </table>
                                </div>
                                    
                                     <?php 
                                            
              $sq=$db->query("select * from listecommande where ((etat='' or etat='manque') and id_gest='{$_SESSION['id_gest']}') ");
                                           $c = $sq->num_rows;
                                    
                                    ?>
                                    
                                    
                                       <div style="margin-top: 15px;"class="container-fluid">
	
		
            <table id="tableReport" class="table table-bordered table-striped table-hover ">
            	<tbody>
            		<tr  class="media" id="carga_30" >
                        
            			
            			<td class="media-body">
            				<h4 class="media-heading font-yellow text-bold hidden-xs">Nombre de commande reçue</h4>
            				
            				
            				
                            </td>
                        <td  style=" width: 72px !important;
    height: 30px;
    
    background-color: #eee;   "class="media-left">
            				<h4 style="text-align:center;"><?php echo $c;?></h4>
            			</td>

                    </tr>

            	</tbody>
            </table>
             
                                           
                                </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                         
                                     <?php 
                                            
              $sq=$db->query("select * from listecommande where ((etat='valide') and id_gest='{$_SESSION['id_gest']}') ");
                                           $ctt = $sq->num_rows;
                                    
                                    ?>
                                    
                                    
                                       <div style="margin-top: 15px;"class="container-fluid">
	
		
            <table id="tableReport" class="table table-bordered table-striped table-hover ">
            	<tbody>
            		<tr  class="media" id="carga_30" >
                        
            			
            			<td class="media-body">
            				<h4 class="media-heading font-yellow text-bold hidden-xs">Nombre de commande validée</h4>
            				
            				
            				
                            </td>
                        <td  style=" width: 72px !important;
    height: 30px;
    
    background-color: #eee;   "class="media-left">
            				<h4 style="text-align:center;"><?php echo $ctt;?></h4>
            			</td>

                    </tr>

            	</tbody>
            </table>
             
                                           
                                </div>
                                    
                                    
                                    
                                    
                                         
                                     <?php 
                                            
              $sq=$db->query("select * from listecommande where ((etat='abandonner' ) and id_gest='{$_SESSION['id_gest']}') ");
                                           $cttt = $sq->num_rows;
                                    
                                    ?>
                                    
                                    
                                       <div style="margin-top: 15px;"class="container-fluid">
	
		
            <table id="tableReport" class="table table-bordered table-striped table-hover ">
            	<tbody>
            		<tr  class="media" id="carga_30" >
                        
            			
            			<td class="media-body">
            				<h4 class="media-heading font-yellow text-bold hidden-xs">Nombre de commande abandonnée</h4>
            				
            				
            				
                            </td>
                        <td  style=" width: 72px !important;
    height: 30px;
    
    background-color: #eee;   "class="media-left">
            				<h4 style="text-align:center;"><?php echo $cttt;?></h4>
            			</td>

                    </tr>

            	</tbody>
            </table>
             
                                           
                                </div>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                     <?php 
                                            
                                            $sq=$db->query("select * from listecommande where etat='livre' and id_gest='{$_SESSION['id_gest']}'");
                                           $c = $sq->num_rows;
                                    
                                    ?>
                                    
                                    
                                       <div style="margin-top: 15px;"class="container-fluid">
	
		
            <table id="tableReport" class="table table-bordered table-striped table-hover ">
            	<tbody>
            		<tr  class="media" id="carga_30" >
                        
            			
            			<td class="media-body">
            				<h4 class="media-heading font-yellow text-bold hidden-xs">Nombre de commande livrée</h4>
            				
            				
            				
                            </td>
                        <td  style=" width: 72px !important;
    height: 30px;
    
    background-color: #eee;   "class="media-left">
            				<h4 style="text-align:center;"><?php echo $c;?></h4>
            			</td>

                    </tr>

            	</tbody>
            </table>
             
                                           
                                </div>
                                    
                                    
                                    
                        
                                    
                                    
                                      
                                       <div style="margin-top: 15px;"class="container-fluid">
	
		
            <table id="tableReport" class="table table-bordered table-striped table-hover ">
            	<tbody>
            		<tr  class="media" id="carga_30" >
                        
            			
            			<td class="media-body">
            				<h4 class="media-heading font-yellow text-bold hidden-xs">Afficher le pourcentage de produits par catégorie</h4>
            				
            				
            				
                            </td>
                        <td  style=" width: 72px !important;
    height: 30px;
    
    background-color: #eee;   "class="media-left">
            				<h5 style="text-align:center;"><a href="fin.php">Afficher le graphe</a></h5>
                          
            			</td>

                    </tr>

            	</tbody>
            </table>
             
                                           
                                </div>
                                    
                                    
                                    
                                     <?php  
                   
                      $r="SELECT nom FROM produits
   WHERE quantite_achete = (SELECT MAX(quantite_achete) FROM produits)" ;

             
                       $result = $db->query($r);
                      
                       $num_rows = mysqli_result($result, 0, 0);
                        
                        ?>

                                        <div style="margin-top: 15px;"class="container-fluid">
	
		
            <table id="tableReport" class="table table-bordered table-striped table-hover ">
            	<tbody>
            		<tr  class="media" id="carga_30" >
                        
            			
            			<td class="media-body">
            				<h4 class="media-heading font-yellow text-bold hidden-xs">Le produit le plus commercialisé</h4>
            				
            				
            				
                            </td>
                        <td  style=" width: 72px !important;
    height: 30px;
    
    background-color: #eee;   "class="media-left">
            				<h5 style="text-align:center;"><?php echo $num_rows ;?></h5>
            			</td>

                    </tr>

            	</tbody>
            </table>
             
                                           
                                </div>
                                    
                                    
                                    
                                       
                                    
                                    
                            </div>
                            <!-- /block -->
                                <div class="navbar navbar-inner block-header">
                               
                            </div>
                                 </div>
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












    </body>
    </html>
<?php }else{header ('Location:../index.php');} ?>