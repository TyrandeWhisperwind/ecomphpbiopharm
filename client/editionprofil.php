<?php
session_start();


require_once  '../core/init.php';
include 'includes/head.php';
include 'includes/nav.php';

?>


<?php 

/*puissance  mdp wilaya societé*/

if(isset($_SESSION['id_client']))
{
    
$req=$db->query("SELECT * FROM client WHERE id_client= '{$_SESSION['id_client']}' ");
$userinfo=$req->fetch_array(MYSQLI_BOTH);
 
$b=true;
    
    
    
if(isset($_POST['f']) AND !empty($_POST['newaddresse']) AND $_POST['newaddresse']!= $userinfo['addresse'])
{
$newaddresse=htmlspecialchars($_POST['newaddresse']);
$id=$_SESSION['id_client'];

$sql=$db->query("UPDATE  client SET  addresse ='{$newaddresse}' WHERE id_client='{$id}'");


}
    

    
if(isset($_POST['f']) AND !empty($_POST['newcode']) AND $_POST['newcode']!= $userinfo['code_postal'])
{
$newcode=htmlspecialchars($_POST['newcode']);
$id=$_SESSION['id_client'];
 if(preg_match(" #^[0-9]{5,5}$# ", $newcode ))  /*00000*/ 
 {


$sql=$db->query("UPDATE  client SET  code_postal ='{$newcode}' WHERE id_client='{$id}'");
 }else{$b=false; echo '<div class="alert alert-danger">
  <strong>Code postal invalide!</strong> 
</div>';}
}
    
    
    
    
      
if(isset($_POST['f']) AND !empty($_POST['newilaya']) AND $_POST['newilaya']!= $userinfo['wilaya'])
{
    $newilaya=htmlspecialchars($_POST['newilaya']);
$id=$_SESSION['id_client'];
if($newilaya <= 255 AND preg_match("#(^[^\s-' 0-9])([a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ'\s-]*)[^\s-'0-9]$#", $newilaya)) /*min 3 */ 
{  


$sql=$db->query("UPDATE  client SET  wilaya ='{$newilaya}' WHERE id_client='{$id}'");
}else{$b=false; echo '<div class="alert alert-danger">
  <strong>Nom wilaya invalide!</strong> 
</div>';}
} 
    
    
    
    
    
    
    
if(isset($_POST['f']) AND !empty($_POST['newcity']) AND $_POST['newcity']!= $userinfo['ville'])
{
    $newcity=htmlspecialchars($_POST['newcity']);
$id=$_SESSION['id_client'];
if($newcity <= 255 AND preg_match("#(^[^\s-' 0-9])([a-zA-ZàâéèêôùûçÀÂÉÈÔÙÛÇ'\s-]*)[^\s-'0-9]$#", $newcity)) /*min 3 */ 
{  


$sql=$db->query("UPDATE  client SET  ville ='{$newcity}' WHERE id_client='{$id}'");
}else{$b=false; echo '<div class="alert alert-danger">
  <strong>Nom ville invalide!</strong> 
</div>';}
}
   
    
    
    
    
if(isset($_POST['f']) AND !empty($_POST['newphone']) AND $_POST['newphone']!= $userinfo['telephone'])
{
    $newphone=htmlspecialchars($_POST['newphone']); 
$id=$_SESSION['id_client'];
if ( preg_match ( "#^[0-9]{9,10}$#" ,  $newphone ) )
{


$sql=$db->query("UPDATE  client SET  telephone ='{$newphone}' WHERE id_client='{$id}'");
}else{$b=false;echo '<div class="alert alert-danger">
  <strong>Numéro invalide!</strong> 
</div>';}
}

    
if(isset($_POST['f']) AND !empty($_POST['newemail']) AND $_POST['newemail']!= $userinfo['mail'])
{
$newemail=htmlspecialchars($_POST['newemail']); 
$id=$_SESSION['id_client'];
if(preg_match(" #^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$# " , $newemail ))
                                        /*abc123@cde456.aa ou abc123@cde456.aaa*/
{

     
$sql=$db->query("UPDATE  client SET  mail ='{$newemail}' WHERE id_client='{$id}'");


}else{$b=false; echo '<div class="alert alert-danger">
  <strong>Email invalide!</strong> 
</div>';}

}
    
    
if(isset($_POST['f']) AND !empty($_POST['newmdp']) AND !empty($_POST['newmdp2']) )
{
$newmdp=sha1($_POST['newmdp']);
$newmdp2=sha1($_POST['newmdp2']);
$id=$_SESSION['id_client'];

  if($newmdp==$newmdp2)
 {

$sql=$db->query("UPDATE  utilisateur SET  mot_de_passe ='{$newmdp}' WHERE id_client='{$id}'");
      
      
      
  }else{$b=false; echo '<div class="alert alert-danger">
  <strong>Mot de passe non identique!</strong> 
</div>';}

} 
    
    

  
if($b AND isset($_POST['f'])){header("Location: compte.php");}
    
   
    
    

  
    
?>



<div class="row profile">
				<?php
include 'sidebar.php';

?>
                    
                    
                    
                    
                    <!--formulaire de modification-->
<div class="col-md-9 order-content">
          
    <div class="form_main col-md-4 col-sm-5 col-xs-7">
                                    
           <h2>Mettre à jour mes informations</h2>
                                    <hr>
        <br>
         <div class="form">
              <form action="" method="POST" id="contactFrm" name="contactFrm">
                  
              
                        <div class="form-group">
                                <label class="control-label col-sm-2 col-xs-5" for="pseudo">Addresse:</label>
                                <div class="col-sm-10 col-xs-7">
                                <input  class="form-control" placeholder="Entrer votre nouvelle addresse"   name="newaddresse" type="text"  value="<?php echo $userinfo['addresse'];?>" >
                                 
                            </div>
                            <br><br>
                        </div>
              
                  
                  
                  <div class="form-group">
						<label class="control-label col-sm-2 col-xs-5" for="CP">Code postal:</label>
						<div class="col-sm-10 col-xs-7">
							<input  class="form-control" placeholder="Entrez votre nouveau code postal" name="newcode" type="text"
                                     value="<?php echo $userinfo['code_postal'];?>">
													</div><br><br>
					</div>
                  
                  
                  
                  
                  <div class="form-group">
						<label class="control-label col-sm-2 col-xs-5" for="ville">Wilaya:</label>
						<div class="col-sm-10 col-xs-7">
						<input  class="form-control" placeholder="Entrez votre nouvelle wilaya" name="newilaya" type="text"   value="<?php echo $userinfo['wilaya'];?>">
													</div><br><br>
					</div>
                  
                  
                  
                  <div class="form-group">
						<label class="control-label col-sm-2 col-xs-5" for="ville">Commune:</label>
						<div class="col-sm-10 col-xs-7">
						<input  class="form-control" placeholder="Entrez votre nouvelle commune" name="newcity" type="text"   value="<?php echo $userinfo['ville'];?>">
													</div><br><br>
					</div>
                  
                  
             
                  
                  
                  
                  
                    	<div class="form-group">
                                <label class="control-label col-sm-2 col-xs-5" for="phone">Téléphone:</label>
                                <div class="col-sm-10 col-xs-7">
                                    <input  class="form-control" placeholder="Entrer votre nouveau numéro de téléphone" title="exemple sans espaces, et sans points " name="newphone" type="text"   value="<?php echo $userinfo['telephone'];?>" >
                                                            </div><br><br>
					</div>
                  
            
                   
                  <div class="form-group">
                                            <label class="control-label col-sm-2 col-xs-5" for="email">Email:</label>
                                            <div class="col-sm-10 col-xs-7">
                                                <input  class="form-control" placeholder="Entrez votre nouvel Email" title="Merci de respecter le format suivant : exemple@gmail.com" name="newemail" type="email"  value="<?php echo $userinfo['mail'];?>">
                                                                        </div><br><br>
                                    </div>  
                  
                  
                  
                  
                  
                    <div class="form-group">
                                        <label class="control-label col-sm-2 col-xs-5" for="mdp">Mot de passe:</label>
                                        <div class="col-sm-10 col-xs-7">
                                            <input  class="form-control" placeholder="Entrer votre nouveau mot de passe"                                                          name="newmdp"  type="password" >
                                         </div><br><br>
                                </div>

                  
                  
                  
                  
               
                    <div class="form-group">
                                        <label class="control-label col-sm-2 col-xs-5" for="mdp">Confirmation:</label>
                                        <div class="col-sm-10 col-xs-7">
                                            <input  class="form-control" placeholder="Entrez de nouveau votre mot de passe"                                                          name="newmdp2"  type="password"  >
                                         </div><br><br>
                                
                  </div>
                  
                  
                  
                  
                  
                          <div class="form-group" >
                              
                                <div class="col-sm-10 col-xs-7">
                                     <br> <br>
                                    <input type="submit" class="btn btn-success btn-lg" name="f" value ="Mettre à jour mes informations"/>
                                </div>
					</div>
					      
              
                                  </form>
           </div>  
    </div>
</div>
		
		
</div>


    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jiquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

                        
<?php

include 'includes/footer.php';


?>
<?php
}else{header ('Location:../index.php');}
?> 







