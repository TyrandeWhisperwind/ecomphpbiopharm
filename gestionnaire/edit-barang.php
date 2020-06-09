<?php
session_start();
if(isset($_SESSION['id_gest']))
{
 
include('../inc/config.php');
?>



<?php
/*expression réguliere*/


$id = $_GET['id'];
$r="SELECT * FROM produits WHERE id='$id'";
$query = $db->query($r);
$data = mysqli_fetch_array($query);



if(isset($_POST['f']) AND !empty($_POST['nom']) AND $_POST['nom']!= $data['nom'])
{
$nom=htmlspecialchars($_POST['nom']);


$sql=$db->query("UPDATE  produits SET  nom ='{$nom}' WHERE id='{$data['id']}'");

         header('Location:produits.php');

}

if(isset($_POST['f']) AND !empty($_POST['prix']) AND $_POST['prix']!= $data['prix'])
{
$prix=htmlspecialchars($_POST['prix']);


$sql=$db->query("UPDATE  produits SET prix='{$prix}' WHERE id='{$data['id']}'");

         header('Location:produits.php');

}
    

if(isset($_POST['f']) AND !empty($_POST['quantite']) AND $_POST['quantite']!= $data['quantite'])
{
$quantite=htmlspecialchars($_POST['quantite']);


$sql=$db->query("UPDATE  produits SET quantite='{$quantite}' WHERE id='{$data['id']}'");

         header('Location:produits.php');

}

if(isset($_POST['f']) AND !empty($_POST['categories']) AND $_POST['categories']!= $data['categories'])
{
$categories=htmlspecialchars($_POST['categories']);


$sql=$db->query("UPDATE  produits SET categories='{$categories}' WHERE id='{$data['id']}'");

         header('Location:produits.php');

}


if (!empty($_FILES["gbarang"]["tmp_name"]))
{
$gambar_barang = $_FILES['gbarang']['type'];

if( isset($_POST['f']) AND $gambar_barang == "image/jpeg" || $gambar_barang == "image/jpg" || $gambar_barang == "image/png" || $gambar_barang == "image/x-png")
  
{ 
        $namafolder="medi/"; 

        $gambar = $namafolder . basename($_FILES['gbarang']['name']);
    
        $sql=$db->query("UPDATE  produits SET image='{$gambar}' WHERE id='{$data['id']}'");

         header('Location:produits.php');

    
    
  
}

}


    
if(isset($_POST['f']) AND !empty($_POST['presentation']) AND $_POST['presentation']!= $data['presentation'])
{
$presentation=htmlspecialchars($_POST['presentation']);


$sql=$db->query("UPDATE  produits SET presentation='{$presentation}' WHERE id='{$data['id']}'");

         header('Location:produits.php');

}
    











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
                           <div style="text-align:center;"class="center"><h4>Modifier le produit</h4></div>
                            </div>
               
                            <div class="block-content collapse in">
                                <div class="span12">
                                                                        <div style="margin-left:125px;margin-top:25px;"class="form">

                                   <form class="form-horizontal" name="edit_barang" method="post" enctype="multipart/form-data" action="">
                                      
                                     <fieldset>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Code produit :</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="code" type="text" value="<?php echo $data['id']; ?>"  disabled >
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label"><b>Nom :</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="nom" type="text" value="<?php echo $data['nom']; ?>">
                                          </div>
                                        </div>
                                    <div class="control-group">
                                          <label class="control-label"><b>Prix :</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="prix" type="text" value="<?php echo $data['prix']; ?>">
                                          </div>
                                        </div>
                                     
                                        <div class="control-group">
                                          <label class="control-label"><b>Quantité :</b> </label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="quantite" type="text" value="<?php echo $data['quantite']; ?>">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="select01"><b>Catégorie :</b> </label>
                                          <div class="controls">
                                            <select id="select01" class="chzn-select" name="categories" >
                                                  <option selected disabled><?php echo $data['categories']; ?></option>

                                               <option>Anti-inflammatoire et antalgique</option>
                                              <option>Anti-infectieux</option>
                                              <option>Cardiologie</option>
                                              <option>Dermatologie</option>
                                              <option>Diabetologie</option>
                                              <option>Gastro-enterologie</option>
                                              <option>Gynecologie</option>
                                              <option>Neuro-psychatrie</option>
                                              <option>OTC</option>
                                              <option>Pneumo-allergologie</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput"><b>Image :</b> </label>
                                          
                                          <div class="controls">
                                            <?php echo '<img src="'.$data['image'].'">'; ?>
                                            <input class="input-file uniform_on" id="fileInput" name="gbarang" type="file">
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label"><b>Présentation :</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="presentation" type="text" value="<?php echo $data['presentation']; ?>">
                                          </div>
                                        </div>


                                




<br>
                                       
                                          <button style="margin-left:180px;"type="submit" name="f"class="btn btn-primary">Sauvgarder</button>
                                          <button type="reset" class="btn btn-info">Réinitialiser</button>
                                       
                                      </fieldset>
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

       


        <script src="js/jquery-1.9.1.min.js"></script>
        
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
    </body>

</html>
<?php }else{header ('Location:../index.php');} ?>