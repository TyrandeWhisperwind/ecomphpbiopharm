<?php
session_start();
if(isset($_SESSION['id_gest']))
{
 
include('../inc/config.php');
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>envoyer un message</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="statistique.php">Espace gestionnaire</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><? echo $_SESSION['username'] ?><i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="logout.php">Deconnexion</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="statistique.php">Tableau de bord</a>
                            </li>
                             <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Gerer <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="produits.php">Produit</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="pesan.php">Commandes</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="acheteurs.php">Acheteurs</a>
                                    </li>
                                
                                  
                                    <li>
                                      <a tabindex="-1" href="statistique.php">Statistique</a>
                                    </li>
                                </ul>
                            </li>
                        
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                     <li class="active">
                            <a href="statistique.php"><i class="icon-chevron-right"></i>Tableau de bord</a>
                        </li>
                       
                        <li>
                            <a href="produits.php"><i class="icon-heart"></i> Produits</a>
                        </li>
                        <li>
                            <a href="pesan.php"><i class="icon-briefcase"></i> Commandes</a>
                        </li>
                        <li>
                            <a href="acheteurs.php"><i class="icon-user"></i> Acheteurs</a>
                        </li>
                     
                      
                        <li>
                            <a href="statistique.php"><i class="icon-star-empty"></i> Statistique</a>
                        </li>
                           <li>
                            <a href="gest.php"><i class="icon-user"></i> Gestionnaires</a>
                        </li> 
                       
                         <li>
                            <a href="boite_recep.php"><i class="icon-envelope"></i> Boite de reception</a>
                        </li> 
                        <li>
                            <a href="msg-envoyer.php"><i class="icon-comment"></i> Message envoyer</a>
                           
                        </li>  
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">
                  
                    <div class="row-fluid section">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Repondre</div>
                            </div>
                            <?php
              $id = $_GET['id'];
                            $r="SELECT * FROM messagerie WHERE id_msg='$id'";
              $query = $db->query($r);
                           
              $data = mysqli_fetch_array($query);
              ?>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <form class="form-horizontal" name="edit_msg" method="post" enctype="multipart/form-data" action="update-msg.php">
                                      
                                     <fieldset>
                                       <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>id_msg</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="id_msg" type="text" value="<?php echo $data['id_client']; ?>">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>id_client</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="id_client" type="text" value="<?php echo $data['id_client']; ?>">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label"><b>Nom_client</b> </label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="nom_client" type="text" value="<?php echo $data['nom_client']; ?>">
                                          </div>
                                        </div>
                                 
                                        
                                        <div class="control-group">
                                          <label class="control-label"><b>mail</b> </label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="mail" type="text" value="<?php echo $data['mail']; ?>">
                                          </div>
                                        </div>


                                     



                                          <div class="control-group">
                                          <label class="control-label"><b>message</b> </label>
                                          <div class="controls">
                                <textarea class="input-xlarge textarea" name="message" placeholder="message ..." style="width: 400px; height: 200px"></textarea>
                                          </div>
                                        </div>

                                       






                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary">Sauvgarder</button>
                                          <button type="reset" class="btn">reinisialiser</button>
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