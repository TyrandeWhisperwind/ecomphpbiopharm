<?php
include('../inc/config.php');

?>

<!DOCTYPE html>
<html>
    
    <head>
  <?php 
include'nav.php';
  ?>
       <?php  if(isset($_POST['f']))
      
{ $idg=htmlspecialchars($_POST['idf']);
      $pseudo=htmlspecialchars($_POST['nom']);
        $prenom=htmlspecialchars($_POST['prenom']);
        
        $sexe  =  $_POST['sexe'];
        if($sexe=="w"){$gender="Madame";}else{$gender="Monsieur";}
            
            
        $string= htmlspecialchars($_POST['dn']);
        
       
        $addresse=htmlspecialchars($_POST['addresse']);
        $code=htmlspecialchars($_POST['codep']);
       
                                                                                                                                                       $wilaya = array ('','Adra','Chlef', 'Laghouat','Oum El B                                        ouaghi','Batna','Béjaïa','Biskra','Bécha','Blida','Bouira','Tamanrasset','Tébessa','Tlemcen','Tiaret','Tizi Ouzou','Alger','Djelfa','Jijel','Sétif','Saïda','Skikda','Sidi Bel Abbès','Annaba','Guelma','Constantine','Médéa','Mostaganem','M\'Sila','Mascara','Ouargla','Oran','El Bayadh','Illizi','Bordj Bou Arreridj','Boumerdès','El Tarf','Tindouf','Tissemsilt','El Oued','Khenchela','Souk Ahras','Tipaza','Mila','Aïn Defla','Naâma','Aïn   Témouchent','Ghardaïa','Relizane');

 
        $wi=$_POST['wilaya'];


       
 
        $city=htmlspecialchars($_POST['ville']);
        $phone=htmlspecialchars($_POST['tele']);
       
        $mail=htmlspecialchars($_POST['mail']);
  

            if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['sexe'])AND !empty($_POST['dn'])AND !empty($_POST['addresse']) AND !empty($_POST['codep']) AND 
               !empty($_POST['ville'] ) AND  !empty($_POST['wilaya'] )AND  !empty($_POST['tele'] ) AND  !empty($_POST['mail'] ) AND  !empty($_POST['idf'] )  AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'] ))
            {

                  $mdp=sha1($_POST['mdp']);
                    $mdp2=sha1($_POST['mdp2']);

                    $pseudolength=strlen($pseudo);
                       
                if(preg_match("#gest[0-9]{2}#", $idg))/*min 3 */
                     { 
         if($pseudolength <= 255 AND preg_match("#(^[^\s-' 0-9])([a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ'\s-]*)[^\s-'0-9]$#", $pseudo))/*min 3 */
                     {
                        $prenomlength=strlen($prenom);
                            
                          
                        if($prenomlength <= 255 AND preg_match("#(^[^\s-' 0-9])([a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ'\s-]*)[^\s-'0-9]$#", $prenom)) /*min 3 */
                            {
                               

                                  
                           if ( preg_match("#\d\d-\d\d-\d\d\d\d#", $string ))
                            {    
                                       $bday           = explode('-', $string);
                                       $insertbday     = $bday[2] . '-' . $bday[1] . '-' . $bday[0];
                                       $verif =checkdate($bday[1],$bday[0],$bday[2]);
                                       $birth     = date("Y-m-d", strtotime($insertbday));
                                     if($verif)
                                     {

                                         if(preg_match(" #^[0-9]{5,5}$# ", $code ))  /*00000*/ 
                                         {
                                        $citylength=strlen($city);
                      if($citylength <= 255 AND preg_match("#(^[^\s-' 0-9])([a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ'\s-]*)[^\s-'0-9]$#", $city)) /*min 3 */ 
                        {  
                          
                          if ( preg_match ( "#^[0-9]{9,10}$#" , $phone ) )
                          {
                              
                             
              if(preg_match(" #^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$# " , $mail ))
                                        /*abc123@cde456.aa ou abc123@cde456.aaa*/
                                        {
                                            
                                                $sql=$db->query("SELECT * FROM utilisateur WHERE id_user= '{$idg}' ");

                                                $row_cnt = $sql->num_rows;

                                                if($row_cnt == 0)
                                                {

                                                    
                                                 if($mdp==$mdp2){

             $sql=$db->query("INSERT INTO gestionnaire (id,nom,prenom,sexe,date,addresse,code_postal,ville,wilaya,telephone,mail) Values ('{$idg}','{$pseudo}' , '{$prenom}','{$gender}', '{$birth}', '{$addresse}' , '{$code}' , '{$city}' ,'{$wilaya[$wi]}','{$phone}' , '{$mail}')");

                                                             
                           $sq=$db->query("INSERT INTO utilisateur (id_user,type,mot_de_passe) Values ('{$idg}','gs','{$mdp}')");

                                                              $erreur="1";



                                                 }else{$erreur="2";}
                                                        
                                                }else{$erreur="3";}

                                        }else{$erreur="4";}
                                       
                                        }else{$erreur="5";}
                                        }else{$erreur="6";}
                                        }else{$erreur="7";}
                                     }else{$erreur="8";}
                             }else{$erreur="9";}
                                    
                            }else{$erreur="10";}
                         }else{$erreur="11";}
                    }else{$erreur="12";}


            } else{$erreur="13";}

}
                                      

?>

                <!--/span-->
                <div class="span9" id="content">
           
                    <?php
            if (!empty($erreur) && $erreur == '1') {
              echo '<div class="alert alert-success">' ;
              echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
              echo '<h4>Gestionnaire ajouté</h4>';
              echo '</div>';
            }
            else if (!empty($erreur) && $erreur == '9'  ) {
              echo '<div class="alert alert-danger">' ;
              echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
              echo '<h4>Date invalide</h4>';
              echo '</div>';
            }
            else if (!empty($erreur) && $erreur == '12') {
              echo '<div class="alert alert-danger">' ;
              echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
              echo '<h4>Identificateur invalide</h4>';
              echo '</div>';
            }
                        else if (!empty($erreur) && $erreur == '4') {
                            echo '<div class="alert alert-danger">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Email invalide</h4>';
                            echo '</div>';
                        }
                          else if (!empty($erreur) && $erreur == '6') {
                            echo '<div class="alert alert-danger">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Nom de ville invalide</h4>';
                            echo '</div>';
                        }
                         else if (!empty($erreur) && $erreur== '5') {
                            echo '<div class="alert alert-danger">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Numéro de téléphone invalide</h4>';
                            echo '</div>';
                        }
                         else if (!empty($erreur) && $erreur == '11') {
                            echo '<div class="alert alert-danger">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Nom invalide</h4>';
                            echo '</div>';
                        }
                         else if (!empty($erreur) && $erreur == '10') {
                            echo '<div class="alert alert-danger">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Prénom invalide</h4>';
                            echo '</div>';
                        }
                          else if (!empty($erreur) && $erreur == '13') {
                            echo '<div class="alert alert-danger">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Saisire tous les champs </h4>';
                            echo '</div>';
                        } else if (!empty($erreur) && $erreur == '2') {
                            echo '<div class="alert alert-danger">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Mot de passe non identique</h4>';
                            echo '</div>';
                        }else if (!empty($erreur) && $erreur == '3') {
                            echo '<div class="alert alert-danger">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Identificateur déja existant</h4>';
                            echo '</div>';
                        }else if (!empty($erreur) && $erreur == '8'  ) {
              echo '<div class="alert alert-danger">' ;
              echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
              echo '<h4>Date invalide</h4>';
              echo '</div>';
            }
            
                    ?>
                  
                    <div class="row-fluid section">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                 <div style="text-align:center;"class="center"><h4>Ajouter un gestionnaire</h4></div>
                            </div>
                            
                            <div class="block-content collapse in">
                                <div class="span12">
                                	 <form class="form-horizontal" name="input_user" method="post" action="#"> 
                                      <fieldset>
                                          <br>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Identificateur:</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="idf" type="text" placeholder="Identificateur">
                                          </div>
                                        </div>
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Nom:</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="nom" type="text" placeholder="nom">
                                          </div>
                                        </div>
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Prénom:</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="prenom" type="text" placeholder="prénom">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Date de naissance:</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="dn" type="text" placeholder="date de naissance">
                                          </div>
                                        </div>
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Addresse:</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="addresse" type="text" placeholder="addresse">
                                          </div>
                                        </div>
                                     <div class="control-group">
                                <label class="control-label col-sm-2 col-xs-5" for="sexe"><b>Civilité:</b><span class="glyphicon glyphicon-star"></span>                                     </label>
                                <div class="controls">
                                    <select name="sexe">  
                                                            <option value="Monsieur">Monsieur </option>
                                                            <option value="Madame">Madame</option></select>
                                 </div>
             </div>
                                         <div class="control-group">
            <label class="control-label col-sm-2 col-xs-5" for="pays"><b>Wilaya:</b><span class="glyphicon glyphicon-star"></span></label>
            <div class="controls">

              <select  name="wilaya"><option value="1">Adrar</option><option value="2">Chlef</option><option value="3">Laghouat</option><option value="4">Oum El Bouaghi</option><option value="5">Batna</option><option value="6">Béjaïa</option><option value="7">Biskra</option><option value="8">Béchar</option><option value="9">Blida</option><option value="10">Bouira</option><option value="11">Tamanrasset</option><option value="12">Tébessa</option><option value="13">Tlemcen</option><option value="14">Tiaret</option><option value="15">Tizi Ouzou</option><option value="16">Alger</option><option value="17">Djelfa</option><option value="18">Jijel</option><option value="19">Sétif</option><option value="20">Saïda</option><option value="21">Skikda</option><option value="22">Sidi Bel Abbès</option><option value="23">Annaba</option><option value="24">Guelma</option><option value="25">Constantine</option><option value="26">Médéa</option><option value="27">Mostaganem</option><option value="28">M'Sila</option><option value="29">Mascara</option><option value="30">Ouargla</option><option value="31">Oran</option><option value="32">El Bayadh</option><option value="33">Illizi</option><option value="34">Bordj Bou Arreridj</option><option value="35">Boumerdès</option><option value="36">El Tarf</option><option value="37">Tindouf</option><option value="38">Tissemsilt</option><option value="39">El Oued</option><option value="40">Khenchela</option><option value="41">Souk Ahras</option><option value="42">Tipaza</option><option value="43">Mila</option><option value="44">Aïn Defla</option><option value="45">Naâma</option><option value="46">Aïn Témouchent</option><option value="47">Ghardaïa</option><option value="48">Relizane</option></select>
              </div>
          </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Ville:</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="ville" type="text" placeholder="ville">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Code postal:</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="codep" type="text" placeholder="code postal">
                                          </div>
                                        </div>
                                         <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Téléphone:</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="tele" type="text" placeholder="téléphone">
                                          </div>
                                        </div>
                                       
                                       
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Email:</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="mail" type="mail" placeholder="Email">
                                          </div>
                                        </div>
                                          
                                     <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Mot de passe:</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="mdp" type="password" placeholder="Entrer le mot de passe">
                                          </div>
                                        </div>
                                            <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Mdp confirmation:</b></label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" name="mdp2" type="password" placeholder="Entrer le mot de passe de confirmation">
                                          </div>
                                        </div>
                        
      
        
                            
        
                                          
                            
                                              <br>
                                              
                                        <div style="margin-left:200px;"class="push">
                                          <button type="submit" name="f" class="btn btn-primary">Enregistrer</button>
                                          <button type="reset" class="btn">Annuler</button>
                                                </div>
                                      </fieldset>
                                    </form>
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