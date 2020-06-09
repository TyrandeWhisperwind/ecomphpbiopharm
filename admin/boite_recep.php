<?php
session_start();
if(isset($_SESSION['id_gest']))
{
    $iduser=$_SESSION['id_gest'];
 
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
                        if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
                            echo '<div class="alert alert-success">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Message supprimé</h4>';
                            echo '</div>';
                        }                       
                    ?>
                     <br>
                      <div class="muted pull-left"><a href="message.php" class="btn"><i class="icon-envelope"></i> Envoyer un message</a> 
                    
                    <a href="index.php" class="btn">
                                                    <i class="icon-chevron-right"></i> Rechercher plus d'information sur un client</a>
                    </div>
                    <br ><br>
                    
                  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                              <div style="text-align:center;"class="center"><h4>Messages reçus</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                 <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id_client</th>
                                                <th style="width:550px;">Objet </th>
                                            <th>Date </th>
                                                <th style="width:250px;">Action</th>

                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $per_page = 15;
                                            $r="SELECT COUNT(*) FROM messagerie";
 
                                            $page_query = $db->query($r);
                                            $pages = ceil(mysqli_result($page_query, 0) / $per_page);
 
                                            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                                            $start = ($page - 1) * $per_page;
                                            $rr="SELECT * FROM messagerie where vers='vers2' and destinateur='$iduser'  LIMIT $start, $per_page";
                                    //and gestionnaire session
                                            
                                            $query = $db->query($rr);
                                            
                                         
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td style="width:25px;"><?php echo $data['expediteur']; ?></td>
                                                    <td style=" width:500px;"><?php echo $data['objet']; ?></td>
                                                   <td style=" width:80px;"><?php echo $data['date_envoie']; ?></td>
                                                   
                                                    <td>
                                                        <button    onclick="voir(<?php echo $data['id_msg'];?>)" id="m" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modaledit">Voir</button>
                                                       <a href="message.php?id=<?php echo $data['expediteur']; ?>" class="btn btn-primary">
                                                     Répondre</a>
                                        


                     <a href="delete-msg.php?id=<?php echo $data['id_msg']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')")><i class="icon-trash"></i></a>             
                                                    </td>
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
        
        
        
        
        
        
        
        <div data-backdrop="static" id="modaledit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 align="center"class="modal-title">Message</h4>
      </div>
      <div class="modal-body">
                <font size="4"><p  align="center"><span id="success_message" ></span> </p></font>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" value="Refresh Page" onClick="window.location.reload()">Fermer</button>
      </div>
    </div>

  </div>
</div>
        
     
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
            
            
            
            
            
            
            
            
            
            
            
            function  voir(id_msg)  {
  
  var data = {"id_msg":id_msg};
        
		
		jQuery.ajax({
            
             
			url : 'voirecep.php',
			method : "post",
			data : data,
			success : function (data) {
               
				$('#success_message').fadeIn().html(data);
			
			},
			error   : function () {
				alert("error");	
			}
		});

  }         
            
            
            
     
            
            
            
            
            
            
            
            
            
        </script>
    </body>

</html>
<?php }else{header ('Location:../index.php');} ?>