<?php 
require_once  '../core/init.php';
include 'includes/head.php';
include 'includes/nav.php';

?>
<br>


<?php
/*verifier la puissance du mot de passe
date exp
et nom exp   --- ''
*/

if(isset($_POST['f']))
{       $pseudo=htmlspecialchars($_POST['pseudo']);
        $prenom=htmlspecialchars($_POST['prenom']);
        
        $sexe  =  $_POST['gender'];
        if($sexe=="w"){$gender="Madame";}else{$gender="Monsieur";}
            
            
        $string= htmlspecialchars($_POST['birth']);
        
       
        $addresse=htmlspecialchars($_POST['addresse']);
        $code=htmlspecialchars($_POST['code']);
       
                                                                                                                                                       $wilaya = array ('','Adra','Chlef', 'Laghouat','Oum El B                                        ouaghi','Batna','Béjaïa','Biskra','Bécha','Blida','Bouira','Tamanrasset','Tébessa','Tlemcen','Tiaret','Tizi Ouzou','Alger','Djelfa','Jijel','Sétif','Saïda','Skikda','Sidi Bel Abbès','Annaba','Guelma','Constantine','Médéa','Mostaganem','M\'Sila','Mascara','Ouargla','Oran','El Bayadh','Illizi','Bordj Bou Arreridj','Boumerdès','El Tarf','Tindouf','Tissemsilt','El Oued','Khenchela','Souk Ahras','Tipaza','Mila','Aïn Defla','Naâma','Aïn   Témouchent','Ghardaïa','Relizane');

 
        $wi=$_POST['wilaya'];


        
        $st=htmlspecialchars($_POST['st']);

 
        $city=htmlspecialchars($_POST['city']);
        $phone=htmlspecialchars($_POST['phone']);
        $company=htmlspecialchars($_POST['company']);
        $mail=htmlspecialchars($_POST['email']);
         $idg=htmlspecialchars($_POST['idg']);
        $mdp=sha1($_POST['mdp']);
        $mdp2=sha1($_POST['mdp2']);


            if(!empty($_POST['pseudo']) AND !empty($_POST['prenom']) AND !empty($_POST['gender'])AND !empty($_POST['birth'])AND !empty($_POST['addresse']) AND !empty($_POST['code']) AND 
               !empty($_POST['city'] ) AND  !empty($_POST['wilaya'] )AND  !empty($_POST['phone'] ) AND  !empty($_POST['company'] ) AND !empty($_POST['email'] )  AND !empty($_POST['mdp'] )  AND !empty($_POST['mdp2']) AND !empty($_POST['idg'])  AND !empty($_POST['st']) )
            {

                    $pseudolength=strlen($pseudo);
                       
                
        /*pas constif*/   if($pseudolength <= 255 AND preg_match("#(^[^\s-' 0-9])([a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ'\s-]*)[^\s-'0-9]$#", $pseudo))/*min 3 */
                     {
                        $prenomlength=strlen($prenom);
                            
                          
                        if($prenomlength <= 255 AND preg_match("#(^[^\s-' 0-9])([a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ'\s-]*)[^\s-'0-9]$#", $prenom)) /*min 3 */
                            {
                                if ( preg_match("#98B\d\d\d\d\d\d\d#", $idg )){

                                  
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
                              $companylength=strlen($company);
                              if($companylength <= 255 AND preg_match("#(^[^\s-' 0-9])([a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ'\s-]*)[^\s-'0-9]$#", $company))
                              {
              if(preg_match(" #^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$# " , $mail ))
                                        /*abc123@cde456.aa ou abc123@cde456.aaa*/
                                        {
                                            
                                                $sql=$db->query("SELECT * FROM utilisateur WHERE id_user= '{$idg}' ");

                                                $row_cnt = $sql->num_rows;

                                                if($row_cnt == 0)
                                                {

                                                    
                                                         if($mdp==$mdp2)
                                                        {

             $sql=$db->query("INSERT INTO client (nom_client,prenom,sexe,date,addresse,code_postal,ville,wilaya,telephone,society,mail,id_client,st) Values ('{$pseudo}' , '{$prenom}','{$gender}', '{$birth}', '{$addresse}' , '{$code}' , '{$city}' ,'{$wilaya[$wi]}','{$phone}' ,'{$company}', '{$mail}' , '{$idg}','{$st}')");

                                                             
                           $sq=$db->query("INSERT INTO utilisateur (id_user,mot_de_passe,type) Values ('{$idg}','{$mdp}','gr')");

                                                              $erreur1="votre compte a été créé";




                                                         }else{$erreur2 ="vos mdp ne correspande pas ";}
                                                }else{$erreur3="identificateur déja existant";}

                                        }else{$erreur4="Votre Email n'est pas valide";}
                                        }else{$erreur5="Votre nom de société n'est pas valide";}
                                        }else{$erreur6="Votre numéro de téléphone n'est pas valide";}
                                        }else{$erreur7="Votre nom de commune n'est pas valide";}
                                        }else{$erreur8="Votre code postal n'est pas valide";}
                                     }else{$erreur9 ="Votre date n'est pas valide";}
                             }else{$erreur10 ="Votre date n'est pas valide";}
                                     }else{$erreur11="Votre identificateurgrossiste est invalide";}

                            }else{$erreur12="Votre prénom n'est pas valide";}
                         }else{$erreur13="Votre nom n'est pas valide";}


            } else{$erreur14="tout les champs doivent etre complété";}

}
                                      

?>


<div style="align:center;"class="container">
    <div style="align:center;" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="creation_cmpt_client">
    
   <h2 style="color:#004b88;"align ="center" class="creat_client_767"><b>Création de votre compte client sur notre site</b></h2>
                                   	                                                                          <div class="col-sm-7 col-xs-7">
<?php if(isset($erreur1)){echo'<div class="alert alert-success" role="alert">
  <h4><b>votre compte a été créer!</b></h4> 
</div>';}?>
         <?php if(isset($erreur2)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>Vos deux mot de passe ne correspandent pas!</b></h4> 
</div>';}?>    
    <?php if(isset($erreur3)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>Identificateur déja existant!</b></h4> 
</div>';}?>   
                                                                                                                    <?php if(isset($erreur4)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>Votre Email n\'est pas valide!</b></h4> 
</div>';}?>   
                                                                                                                                                                                                                                      <?php if(isset($erreur5)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>Votre nom de société n\'est pas valide!</b></h4> 
</div>';}?>   
                                                                                                                                                                                                                     <?php if(isset($erreur6)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>Votre numéro de téléphone n\'est pas valide!</b></h4> 
</div>';}?>   
                                                                                                                                                                        <?php if(isset($erreur7)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>Votre nom de commune n\'est pas valide!</b></h4> 
</div>';}?>   
               
                                                                                                                                     <?php if(isset($erreur8)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>Votre code postal n\'est pas valide!</b></h4> 
</div>';}?>   
                                                                                                                                                                                                                                                      <?php if(isset($erreur9)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>Votre date n\'est pas valide!</b></h4> 
</div>';}?>   
                                                                                                                                                                                                                                <?php if(isset($erreur10)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>Votre date n\'est pas valide!</b></h4> 
</div>';}?>   
                                                                                                                                                                                                    <?php if(isset($erreur11)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>Votre identificateur n\'est pas valide!</b></h4> 
</div>';}?>   
                                                                                                                                                  <?php if(isset($erreur12)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>Votre prénom n\'est pas valide!</b></h4> 
</div>';}?>  
                                                                                                                        <?php if(isset($erreur13)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>Votre nom n\'est pas valide!</b></h4> 
</div>';}?>   
                                                                                                                                                                                                                         <?php if(isset($erreur14)){echo'<div class="alert alert-danger" role="alert">
  <h4><b>tous les champs doivent être complété!</b></h4> 
</div>';}?>   
             
             
               
                                                                                                                  
                                <h3  style="color:#004b88;"class="pull-left h3_compte">Vos coordonnées </h3>
					    </div>
                    
					          
                    
                    
				        <form method="POST" action="#" accept-charset="UTF-8" class="form-horizontal" id="formulaire_inscription"                                              name="formulaire_inscription">
                         
                    
                    
                    
                
                                                 <div class="col-sm-7 col-xs-7">

                        <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-5" for="civilite">Civilité <span class="glyphicon glyphicon-star"></span>                                     </label>
                                    <select name="gender">  
                                                            <option value="m">Monsieur</option>
                                                            <option value="w">Madame</option></select>
                                 </div>
					   </div>
                        
                    
                    
                    <br>
                            
                                   <div class="col-sm-7 col-xs-7">

                        <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-5" for="pseudo">Nom<span class="glyphicon glyphicon-star"></span></label>
                                
                                <input style="width: 500px;" required="" class="form-control" placeholder="Entrez votre nom"  id="pseudo" name="pseudo" type="text"  value="<?php if(isset($pseudo)){echo $pseudo;}?>" >
                                                            </div>
                        </div>
                    
                    
                    
                    
                    
                                                <div class="col-sm-7 col-xs-7">

                        <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-5" for="prenom">Prénom<span class="glyphicon glyphicon-star"></span>                                     </label>
                                    <input style="width: 500px;" required="" class="form-control" placeholder="Entrez votre pr&eacute;nom"  name="prenom"                                      type="text" id="prenom" value="<?php if(isset($prenom)){echo $prenom;}?>">
                                </div>
                        </div>
                                                        <div class="col-sm-7 col-xs-7">

                                <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-5" for="prenom">N.I.S<span class="glyphicon glyphicon-star"></span>                                     </label>
                                    <input style="width: 500px;"  required="" class="form-control" placeholder="Entrez votre Numéro d'identificateur statistique"  name="st"                                      type="text" id="nrc" value="<?php if(isset($st)){echo $st;}?>">
                                </div>
                        </div>
                    
                    
                          
                                                        <div class="col-sm-7 col-xs-7">

                        <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-5" for="anniversaire">Date de naissance<span class="glyphicon glyphicon-star"></span></label>
                                    <input style="width: 500px;"  required="" class="form-control format-date" placeholder="Au format : jj-mm-aaaa" title="jj-mm-aaaa" name="birth" type="text"   id="birth" value="<?php if(isset($string)){echo $string;}?>">
                                 </div>
                        </div>
                    
                    
                    
                    
                                            <div class="col-sm-7 col-xs-7">

                    
                             <div class="form-group">
                                            <label class="control-label col-sm-2 col-xs-5" for="email">Email<span class="glyphicon                                                   glyphicon-star"></span></label>
                                                <input style="width: 500px;" required="" class="form-control" placeholder="Entrez votre email" title="Merci de respecter le format suivant : exemple@gmail.com" name="email" type="email" id="email" value="<?php if(isset($mail)){echo $mail;}?>">
                                                                        </div>
                                    </div>  
                                                <div class="col-sm-7 col-xs-7">

                    
                             <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-5" for="adresse">Adresse<span class="glyphicon glyphicon-star"></span>                                   </label>
                                 <input style="width: 500px;" required="" class="form-control" placeholder="Entrez votre addresse" name="addresse" type="text"  id="addresse" value="<?php if(isset($addresse)){echo $addresse;}?>">
                                </div>
                        </div>
                    
                    
                    
                            
                    
                                                <div class="col-sm-7 col-xs-7">

                    <div class="form-group">
						<label class="control-label col-sm-2 col-xs-5" for="CP">Code postal<span class="glyphicon glyphicon-star"></span></label>
							<input style="width: 500px;" required="" class="form-control" placeholder="Entrez votre code postal" name="code" type="text"
                                    id="code" value="<?php if(isset($code)){echo $code;}?>">
													</div>
					</div>
                    
                    
                    
                            
                            
                                                      <div class="col-sm-7 col-xs-7">
  
                          
					<div class="form-group">
						<label class="control-label col-sm-2 col-xs-5" for="ville">Commune<span class="glyphicon glyphicon-star"></span></label>
						<input style="width: 500px;" required="" class="form-control" placeholder="Entrez votre Commune" name="city" type="text"  id="city" value="<?php if(isset($city)){echo $city;}?>">
													</div>
					</div>
                    
                    
                            
                    
                            
                                                     <div class="col-sm-7 col-xs-7">

					<div class="form-group">
						<label class="control-label col-sm-2 col-xs-5" for="pays">Wilaya<span class="glyphicon glyphicon-star"></span></label>
							<select style="width:500px;"class="form-control" name="wilaya"><option value="1">Adrar</option><option value="2">Chlef</option><option value="3">Laghouat</option><option value="4">Oum El Bouaghi</option><option value="5">Batna</option><option value="6">Béjaïa</option><option value="7">Biskra</option><option value="8">Béchar</option><option value="9">Blida</option><option value="10">Bouira</option><option value="11">Tamanrasset</option><option value="12">Tébessa</option><option value="13">Tlemcen</option><option value="14">Tiaret</option><option value="15">Tizi Ouzou</option><option value="16">Alger</option><option value="17">Djelfa</option><option value="18">Jijel</option><option value="19">Sétif</option><option value="20">Saïda</option><option value="21">Skikda</option><option value="22">Sidi Bel Abbès</option><option value="23">Annaba</option><option value="24">Guelma</option><option value="25">Constantine</option><option value="26">Médéa</option><option value="27">Mostaganem</option><option value="28">M'Sila</option><option value="29">Mascara</option><option value="30">Ouargla</option><option value="31">Oran</option><option value="32">El Bayadh</option><option value="33">Illizi</option><option value="34">Bordj Bou Arreridj</option><option value="35">Boumerdès</option><option value="36">El Tarf</option><option value="37">Tindouf</option><option value="38">Tissemsilt</option><option value="39">El Oued</option><option value="40">Khenchela</option><option value="41">Souk Ahras</option><option value="42">Tipaza</option><option value="43">Mila</option><option value="44">Aïn Defla</option><option value="45">Naâma</option><option value="46">Aïn Témouchent</option><option value="47">Ghardaïa</option><option value="48">Relizane</option></select>
													</div>
					</div>
                            
                            
                            
                            
                          
                    
                                                <div class="col-sm-7 col-xs-7">

                    	<div class="form-group">
                                <label class="control-label col-sm-2 col-xs-5" for="phone">Téléphone<span class="glyphicon glyphicon-star"></span>                                   </label>
                                    <input style="width: 500px;" required="" class="form-control" placeholder="Sans espaces, et sans points ex: 0231836836" title="exemple sans espaces, et sans points exemple: 0231836836" name="phone" type="text"  id="phone" value="<?php if(isset($phone)){echo $phone;}?>" >
                                                            </div>
					</div>
                    
                    
                            
                            
                                                        <div class="col-sm-7 col-xs-7">

                    <div class="form-group">
                                     <label class="control-label col-sm-2 col-xs-5" for="societe">Nom de l'entreprise<span class="glyphicon glyphicon-star"></label>
                                     <input style="width: 500px;" class="form-control" placeholder="Entrez votre soci&eacute;t&eacute;" name="company" type="text"
                                            id="company" value="<?php if(isset($company)){echo $company;}?>">
                                      </div>
					</div>
                    
                    
                    
                  
                            
                                                                                    <div class="col-sm-7 col-xs-7">

                            
                                        <h3 style="color:#004b88;"class="pull-left h3_compte">Information de connexion</h3>

                    
                     <br> <br> <br> 
                    <br>
                  </div>
                    
                    
                                                    <div class="col-sm-7 col-xs-7">

                         <div class="form-group">
                                            <label class="control-label col-sm-2 col-xs-5" for="email">Identificateur grossiste<span class="glyphicon                                                   glyphicon-star"></span></label>
                                                <input style="width: 500px;" required="" class="form-control" placeholder="Entrez votre identificateur" name="idg" type="text" id="idg" value="<?php if(isset($idg)){echo $idg;}?>">
                                                                        </div>
                                    </div>  
                    
                                   
                            
                            
                            
                            
                                  <div class="col-sm-7 col-xs-7">

                                <div class="form-group">
                                        <label class="control-label col-sm-2 col-xs-5" for="mdp">Mot de passe<span class="glyphicon glyphicon-star">                                          </span></label>
                                            <input style="width: 500px;" required="" class="form-control" placeholder=" tapper votre mot de passe"                                                          name="mdp"  type="password" id="mdp" >
                                         </div>
                                </div>
                        
      
        
                            
                            
        <div class="col-sm-7 col-xs-7">
              
					<div class="form-group">
                                <label class="control-label col-sm-2 col-xs-5" for="mdp2">Confirmation<span class="glyphicon glyphicon-star"></span>                                  </label>
                                    <input style="width: 500px;" required="" class="form-control" placeholder="Entrez de nouveau votre mot de passe"                                                              name="mdp2" type="password" id="mdp2"> 
                               
					
					 </div>
                  <div class="col-xs-offset-1 col-md-8 col-sm-9"><span class="label label-danger">Note:-</span> <b>En cliquant sur 'Soumettre votre demande', vous acceptez nos <a target="_blank" href="pdf/cndvente.pdf">conditions générales de vente.</a></b></div>   <br>
        <div style ="margin-left:200px; margin-top:10px;"class="col-sm-7 col-xs-7">

              <input type="submit" class="btn btn-success btn-lg" name="f" value ="Soumettre votre demande"/>
          <br>
                            <br>
                                   
</div>
   

    </form>   
          
            

                     </div>
        </div>
</div>
    
    
<?php
   if(isset($erreur)) 
   {
   echo $erreur;
   }
    
    
 ?>  
    

