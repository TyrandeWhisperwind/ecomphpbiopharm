<?php
session_start();
if(isset($_SESSION['id_gest']))
{
 
include('../inc/config.php');
?>
<?php


                                            

if (isset($_POST['id_client']))
{
    $id_client= htmlspecialchars($_POST['id_client']); /*verifier si numérique*/

 if (isset($_POST['f']))
{

$msg=htmlspecialchars($_POST['message']);
$obj=htmlspecialchars($_POST['obj']);
$date = date('Y-m-d H:i:s');



    
    $sql=$db->query("INSERT into messagerie (message,expediteur,date_envoie,objet,destinateur,vers) Values   ('{$msg}','admin','{$date}','{$obj}','{$id_client}','vers1')");
        $sql2="INSERT into messagerie (message,expediteur,date_envoie,objet,destinateur,vers) Values   ('{$msg}','admin','{$date}','{$obj}','{$id_client}','vers2')";
    
    if(mysqli_query($db, $sql2))  
       {  
    header('location:msg-envoyer.php');    
      }
}
}
    

?>





<!DOCTYPE html>
<html>
    
     <head>
        
              <?php  include('nav.php');     ?>

              
                <div class="span9" id="content">
               
                 
                    <div class="row-fluid section">
                      
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                           <div style="text-align:center;"class="center"><h4>Envoyer un message</h4></div>
                            </div>
                            
                            <div class="block-content collapse in">
                                <div class="span12">
                                <div style=" margin-top:30px; margin-left:250px;"class="form post">

                                   <form method="POST" action="#"  id="formulaire_inscription" name="formulaire_inscription"> 
                            
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                          <div class="control-group">
                                            <label class="control-label"><b>Objet:</b></label>
                                              <div class="controls">
                        <input required="" class="form-control" placeholder="Enter l'objet" maxlength="65"name="obj" type="text" value="">
                                        </div>
                                              </div>
                                       
                                       
                                       
                                       
                                       
                                       
                                        <div class="control-group">
                                          <label class="control-label"><b>Id_client:</b></label>
                                          <div class="controls">
                                            <input  required=""  class="input-xlarge focused" name="id_client" type="text" placeholder="Identificateur du client" value="<?php if(isset($_GET['id'])){echo $_GET['id'];}?>">
                                          </div>
                                        </div>
                                       
                                       
                                       
                                    
                                 
                                       
                                        <div  required=""  class="control-group">
                                          <label class="control-label"><b>Message:</b></label>
                                          <div class="controls">
                                           <textarea required=""  class="input-xlarge textarea" name="message" placeholder="Entrer votre message" style="width: 400px; height: 200px"></textarea>
                                          </div>
                                        </div>
                                    <button type="submit" name="f" class="btn btn-primary">Envoyer</button>

                                   
                                    </form>
                                                                                  </div>
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
    </body>

</html>
<?php }else{header ('Location:../index.php');} ?>