<?php
session_start();



if(isset($_SESSION['id_gest']))
{
 
include('../inc/config.php');

?>
<!DOCTYPE html>
<html>
    
    <head>
           <?php  include('nav.php');     ?>
                <!--/span-->
                <div class="span9" id="content">
                    <!-- morris graph chart -->
                    <div class="row-fluid section">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div style="text-align:center;"class="center"><h4>Modifier le gestionnaire</h4></div>
                            </div>
                            <?php
							$id = $_GET['id'];
                            $r="SELECT * from utilisateur where id_user='$id'";
							$query = $db->query($r);
                          
							$data = mysqli_fetch_array($query);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
                                	 <form class="form-horizontal" name="edit_user" method="post" action="update-gest.php">
                                     <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                                      <fieldset>
                                     <br>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Identificateur</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="id" type="text" value="<?php echo $data['id_user']; ?>" disabled >
                                           
                                          </div>
                                        </div>
                                                 
                               
                                 <div class="control-group">
                                          <label class="control-label"><b>Nouveau mot de passe</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="pas2" type="password" >
                                          </div>
                                        </div>
                                          <div class="control-group">
                                          <label class="control-label"><b>Confirmer mot de passe</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="password" type="password" >
                                          </div>
                                        </div>
                                         
                                        <div style="margin-left:200px;"class="push">
                                          <button type="submit" class="btn btn-primary">Enregister</button>
                                          <button type="reset" class="btn">Annuler</button>
                                        </div>
                                      </fieldset>
                                    </form>
                                </div>
                                
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