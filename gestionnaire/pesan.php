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
                    <br><br>
                     <button onclick="window.open('pdf/cndvente.pdf');" class="btn btn-basic btn-lg"><i class="icon-chevron-right"></i> Conditions</button>
                	<?php
						if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
							echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>la commande e ete bien supprimer</h4>';
							echo '</div>';
						}
						
                  	?>
                    
                  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                               <div style="text-align:center;"class="center"><h4>Commandes validée</h4></div>
                            </div>
                            <div class="block-content collapse in">
                            	 <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id_cmd</th>
                                                <th>Id_fact</th>
                                                <th>Id_client</th>
                                                <th>Quantité<br>totale</th>
                                                <th>Prix total</th>
                                                <th>Date de <br> récupération</th>
                                                <th >Action</th>
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
              $rr="SELECT * FROM listecommande where (etat='valide' and id_gest='{$_SESSION['id_gest']}')  ORDER BY date_fix ASC LIMIT $start, $per_page";
											
											$query = $db->query($rr);
                                         
										 
											while ($data = mysqli_fetch_array($query)) {
											?>
                        
												<tr>
													<td><?php echo $data['id_listecommande']; ?></td>
													<td><?php echo $data['id_facture']; ?></td>
													<td><?php echo $data['id_client']; ?></td>
                                                       <td><?php echo $data['quantity'].'carton(s)'; ?></td>

                                                    <td><?php echo $data['total'].'DA'; ?></td>
                                                    <td width='90'><?php echo $data['date_fix']; ?></td>
                                                    <td><a href="detail3.php?id=<?php echo $data['id_listecommande']; ?>" class="btn">
                                                     Afficher</a> 
                                                    <a target="_blank" href="facture.php?id=<?php echo $data['id_listecommande']; ?>" class="btn btn-info" class="btn">Facture</a> 
<a target="_blank"  href="bon.php?id=<?php echo $data['id_listecommande']; ?>" class="btn btn-success" class="btn">Bon</a>
               <button  onclick="livrer(<?php echo $data['i']; ?>)" id="mod" type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaledit">Livrer</button>
                                                       </td>
												</tr>
											<?php	
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
    <!-- modal -->
                                 <!--modif-->
<div data-backdrop="static" id="modaledit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 align="center"class="modal-title">Livrer</h4>
      </div>
      <div class="modal-body">
          <!--input quantité-->
           <form action="" method="post" id="modifier">
                       
                               <table align="center">
                                    <body>
                                      <tr>
                       <td> <p>  <label for="quantity"><b>Nom agent:</b></label></td><td>
     <input placeholder="Entrer le nom de l'agent"type="text" class="form-control"  name="agent" id="agent" class="form-control"> 
                                              </p> </td>      
                                            
                                            </tr>
                                          <tr>
                       <td> <p>  <label for="quantity"><b>Date livraison: &nbsp;&nbsp;</b></label></td><td>
     <input placeholder="Entrer la date de livraison"type="text" class="form-control"  name="date"  id="date"class="form-control"> 
                                              </p> </td>      
                                            
                                            </tr>
                                   
                                        <tr>
         <td rowspan="2" align='center'><input style="width:100px; height:30px;"type="button" id="submit" class="btn btn-success btn-sm" name="submit" value ="Livrer"/> </td> 
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





  function livrer(i){ 
           var i=i;         
      $('#submit').click(function (){  
           var agent = $('#agent').val();
          var date = $('#date').val(); 



                $('#error_message1').html('');  
                $.ajax({  
                     url:"liver.php",  
                     method:"POST",  
                     data:{agent:agent,date:date,i:i},  
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
                    
                });  
             
      });  
  
  }




</script>
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