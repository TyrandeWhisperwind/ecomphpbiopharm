<?php
session_start();
if(isset($_SESSION['id_gest']))
{
 
include('../inc/config.php');
?>

<?php
$date=date('Y-m-d H:i:s');
/*expression réguliére*/
if(isset($_POST['f']))
{   
    if(isset($_POST['code']))
    {
    
        $code=htmlspecialchars($_POST['code']);
        $reqq=$db->query("select * from produits where id='$code'");
        $rowcnt=$reqq->num_rows;
        
         if($rowcnt==0)
                    {
             if(isset($_POST['nom']))
                    {
                        $nom=htmlspecialchars($_POST['nom']);
                                if(isset($_POST['prix']))
                                    {

                                        $prix=htmlspecialchars($_POST['prix']);
                                             if(isset($_POST['quantite']))
                                                 {
                                                   $quantite=htmlspecialchars($_POST['quantite']);
                                                 
                                                 
                                                    if(isset($_POST['categories']))
                                                    {
                                                                $categorie= $_POST['categories'];
                                                          $gambar_barang = $_FILES['gbarang']['type'];

             if($gambar_barang == "image/jpeg" || $gambar_barang == "image/jpg" || $gambar_barang == "image/png" || $gambar_barang == "image/x-png")
    {           $namafolder="medi/"; 

        $gambar = $namafolder . basename($_FILES['gbarang']['name']);
                                                        
                                                        if(isset($_POST['forme']))
                                                            {
                                                                                                                                                                                                 $forme=htmlspecialchars($_POST['forme']);
                                                                    if(isset($_POST['presentation']))
                                                                         {
                                                                            $presentation=htmlspecialchars($_POST['presentation']);
                                                                                                                                                                                                         if(isset($_POST['dosage']))
                                                                                                                                                                                                         {                                                                                                                       $dosage=htmlspecialchars($_POST['dosage']);
                                                                                                                                                                                                            if(isset($_POST['dci']))
                                                                        {$dci=htmlspecialchars($_POST['dci']);
                                                                         if(isset($_POST['qtb'])){
                                                                                                                                                                                                            $qtb=htmlspecialchars($_POST['qtb']);   

                                                                                                                                                                                                                        $sql="insert into produits (id,nom,prix,quantite,categories,image,forme,presentation,dosage,quantite_achete,dci,quantity_par_carton) values ('$code','$nom','$prix','$quantite','$categorie',' $gambar','$forme','$presentation','$dosage','0','$dci','$qtb')";
                                                                                                                                                                     if(mysqli_query($db, $sql))  
      {  
           echo '<div class="alert alert-success">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Produit ajouté</h4>';
							echo '</div>';
      }  
                                                                         }
                                                                        }
                                                                                                                                                                                                                                        }

                                                                        
                                                                        
                                                            
                                                                                }
                                                 
                                                            
                                                            
                                                                        }
                                                 
                                                                }
                                                        }

                                                }
                                    
                                    
                                    }
                     
                     
                 }
                
    }else{echo '<div class="alert alert-danger">' ;
							echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
							echo '<h4>Médicament déja existant</h4>';
							echo '</div>';}
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
                           <div style="text-align:center;"class="center"><h4>Ajouter un produit</h4></div>
                            </div>
                            
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div style="margin-left:125px;margin-top:25px;"class="form">
                                   <form class="form-horizontal" name="input_barang" enctype="multipart/form-data" method="post" action=""> 
                                      
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Code produit :</b></label>
                                          <div class="controls">
                                            <input required="" class="input-xlarge focused" name="code" type="text" placeholder="Enter le code" value="<?php if(isset($code)){echo $code;}?>">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label"><b>Nom :</b></label>
                                          <div class="controls">
                                            <input  value="<?php if(isset($nom)){echo $nom;}?>"required=""  class="input-xlarge focused" name="nom" type="text" placeholder="Enter le nom">
                                          </div>
                                        </div>
                                    <div class="control-group">
                                          <label class="control-label"><b>Prix :</b></label>
                                          <div class="controls">
                                            <input value="<?php if(isset($prix)){echo $prix;}?>" required="" class="input-xlarge focused" name="prix" type="text" placeholder="Enter le prix">
                                          </div>
                                        </div>
                                    
                                        <div class="control-group">
                                          <label class="control-label"><b>Quantité :</b> </label>
                                          <div class="controls">
                                            <input  value="<?php if(isset($quantite)){echo $quantite;}?>"required="" class="input-xlarge focused" name="quantite" type="text" placeholder="Enter la quantité">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="select01"><b>Catégorie :</b></label>
                                          <div class="controls">
                                            <select id="select01" class="chzn-select" name="categories">
                                              <option>Anti-inflammatoire et antalgique</option>
                                              <option>Anti-infectieux</option>
                                              <option>Cardiologie</option>
                                              <option>Dermatologie</option>
                                              <option>Diabétologie</option>
                                              <option>Gastro-entérologie</option>
                                              <option>Gynécologie</option>
                                              <option>Neuro-psychiatrie</option>
                                              <option>OTC</option>
                                              <option>Pneumo-allergologie</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput"><b>Image :</b> </label>
                                          <div class="controls">
                                            <input  value="<?php if(isset($gambar)){echo $gambar;}?>"required=""  class="input-file uniform_on" id="fileInput" name="gbarang" type="file">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label"><b>Forme :</b> </label>
                                          <div class="controls">
                                            <input value="<?php if(isset($forme)){echo $forme;}?>" required=""  class="input-xlarge focused" name="forme" type="text" placeholder="Enter la forme">
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <label class="control-label"><b>Présentation :</b> </label>
                                          <div class="controls">
                                            <input value="<?php if(isset($presentation)){echo $presentation;}?>" required="" class="input-xlarge focused" name="presentation" type="text" placeholder="Enter la présentation">
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <label class="control-label"><b>Dosage :</b> </label>
                                          <div class="controls">
                                            <input value="<?php if(isset($dosage)){echo $dosage;}?>" required="" class="input-xlarge focused" name="dosage" type="text" placeholder="Enter le  dosage">
                                          </div>
                                        </div>
                                       
                                         <div class="control-group">
                                          <label class="control-label"><b>DCI :</b> </label>
                                          <div class="controls">
                                            <input value="<?php if(isset($dci)){echo $dci;}?>" required="" class="input-xlarge focused" name="dci" type="text" placeholder="DCI">
                                          </div>
                                        </div>

                                       <div class="control-group">
                                          <label class="control-label"><b>Quantité de boit<br>carton:</b> </label>
                                          <div class="controls">
                                            <input value="<?php if(isset($qtb)){echo $qtb;}?>" required="" class="input-xlarge focused" name="qtb" type="text" placeholder="Entrer la quantité">
                                          </div>
                                        </div>


                                      <br>
                                          <button style="margin-left:180px;"type="submit"  name ="f"class="btn btn-primary">Sauvgarder</button>
                                          <button type="reset" class="btn btn-info">Réinitialiser</button>
                                        
                                    
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