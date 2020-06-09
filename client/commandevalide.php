<?php
session_start();


require_once  '../core/init.php';
include 'includes/head.php';
include 'includes/nav.php';

?>


<?php
if(isset($_SESSION['id_client']))
{

    
$id=$_SESSION['id_client'];
 
$sql="SELECT * FROM listecommande WHERE id_client= '$id' AND etat != 'abandonner' AND etat != 'livre' AND etat != 'archiver' ORDER BY date_envoie ASC";
$result = mysqli_query($db, $sql);

$row_num = $result->num_rows;
    
    
?>



    <div class="row profile">
				<?php
include 'sidebar.php';

?>
<!--===========================================================================================================================================-->

                            <div class="col-md-9 order-content">
          
                                
                                    
                                        <h2>Commande envoyée</h2>
                                    <hr>
                                
                                
                                 <div  style="background-color: transparent;"class="panel panel-default ">
                                  <?php   if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
                            echo '<div class="alert alert-success">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Commande abandonnée</h4>';
                            echo '</div>';
                        }?>
                                                 <div class="panel-body">
                                                 
                                <table style="background-color:#e6f3ff;" class="table table-bordered table-striped" id="data">
                                              
                                          
                                <thead>
                                        <tr>   
                                            <th class="disable-sorting">N°</th>
                                            <th class="disable-sorting">Quantité<br>commandée</th>
                                            <th class="disable-sorting">Total</th>
                                            <th class="disable-sorting">Date<br>commande</th>
                                            <th class="disable-sorting">Date<br>récupération</th>
                                             <th class="disable-sorting">Etat</th>

                                            
                                            <th class="disable-sorting"><em class="fa fa-cog"></em> Action</th>
                                        </tr>
                                </thead>
                                    
                                <body>
                                    
                                   
                                    
                                    
                                    
                                    
                                       <?php  
                                                        $i=1;
                          while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  
                          {   
                           
                            
                              
                               echo '  
                               <tr>  
                                    <td>'.$row['id_listecommande'].'</td>  
                                    <td>'.$row['quantity'].'&nbspCarton(s)</td>  
                                    <td>'.$row["total"].'&nbspDa</td>  
                                    <td>'.$row["date_envoie"].'</td>';
                               
   if($row["date_fix"]==0){ echo'    <td> Pas encore fixé</td>  
' ;  }else{ echo' <td>'.$row["date_fix"].'</td>';}
                              
 if($row['etat']=='valide'){echo '<td style ="text-align:center;"class="hidden-md bg-success">validée</td> ';}else if ($row['etat']==''|| $row['etat']=='ok'){echo '<td style ="text-align:center;"class="hidden-md bg-danger">en attente</td>';}
                              else if ($row['etat']=='manque'){echo '<td style ="text-align:center;"class="hidden-md bg-danger">manque de stock</td>';}
                              echo'     
                                                                     
                                    <td> 
                            
                                  <button  onclick="afficher('.$row["i"].')" data-toggle="modal" id="sup"type="button"class="btn btn-sm btn-success" data-target="#modal" >Afficher</button>
                                      <a href="deletecmd.php?id='.$row["id_listecommande"].'" onclick="return confirm(\'Êtes-vous sûr ?\')") id="sup"type="button"class="btn btn-sm btn-danger" data-target="#modalaban" >Abandonner</a>


                                 
                                 
                                   </td>  
                                   
                               </tr>  
                               ';  
                              
                              $i++;
                              
                          }  
                          ?>  
    
                                   
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                               
                                    
                                  
                                
    
                                   
                        
                                </body>
                                       
                                </table>
                                
                                            
                                            </div> 
                       </div> 
            
                            </div>
		
		
	</div>

    
                    
                    
                    
                    
                                     <!--===========================================================================================-->
                                             <!--modal liste details-->
                                             
<div data-backdrop="static" id="modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 align="center"class="modal-title">Détails de la commande</h4>
      </div>
      <div class="modal-body">
        
          
                 
                                                 <div class="panel-body">
                                      <p align="center"><u>Remarque</u>: les lignes en rouge indique que le médicament est en repture de stock</p>           
                                <span id="success_message" ></span>
                                
                                            
                                            </div> 
                    
          
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" value="Refresh Page" data-dismiss="modal" onClick="closeModal()">Fermer</button>
      </div>
    </div>

  </div>
</div>
                
                    
                    
                    
                    
                    
                    <div data-backdrop="static" id="modalaban" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 align="center"class="modal-title">Abandonner</h4>
      </div>
      <div class="modal-body">
        
          
                 
                                                 <div class="panel-body">
                                                 
                           <p align="center"> Vous étes sur le point d'abandonner votre liste de commande,etes vous sûr?</p>   
                                            
                                            </div> 
                    
          
          
          
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-danger" value="Refresh Page" data-dismiss="modal" onClick="">Abandonner</button>
        <button type="button" class="btn btn-default" value="Refresh Page" data-dismiss="modal" onClick="closeModal()">Fermer</button>
      </div>
    </div>

  </div>
</div>
                    
                    
                    
                    
                    
                    
                    
             
                    
                    
                    
                    
<!--===========================================================================================================================-->

                    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jiquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
                            
                                      <!--for table data-->
 <script src="jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="js/jquery.sortelements.js" type="text/javascript"></script>
<script src="js/jquery.bdt.js" type="text/javascript"></script>
                            
                            
 <script>
                            
    /*for table data*/
     
$(document).ready( function () {
    $('#data').bdt();
});
   
     
     
                          
  function  afficher(i)  {
  
  
                var i=i;
		
		jQuery.ajax({
            
             
			url : 'modal.php',
			method : "post",
			data : {i:i},
			success : function (data) {
               
				$('#success_message').fadeIn().html(data);
			
			},
			error   : function () {
				alert("error");	
			}
		});

  }         
    
     
     function closeModal(){
  jQuery('#modal').modal('hide');
  setTimeout(function(){
   jQuery('#modal').remove();
   jQuery('modal-backdrop').remove();
  },500);
 }
     
     
</script>              

                        
<?php

include 'includes/footer.php';


?>
<?php
}else{header ('Location:../index.php');}
?>