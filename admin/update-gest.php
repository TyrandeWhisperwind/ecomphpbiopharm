<?php
if(isset($_POST['id'])){
include('../inc/config.php');
 

$id = $_POST['id'];
$password =sha1($_POST['password']);

$pas2 = sha1($_POST['pas2']);
if(!empty($_POST['password']) and !empty($_POST['pas2'])){
	if($_POST['pas2']==$_POST['password']){
	$r="UPDATE utilisateur set mot_de_passe='$password' where id_user='$id'";
$query = $db->query($r);
	if ($query) {
    header('location:gestt.php?message=update');
}
}else{header('location:gestt.php?message=echec2');}
//echo'mot de passe de confirmation incorrecte';
}else{ header('location:gestt.php?message=echec');
	//echo'Veuillez remplir tous les champs';
}

}



 

?>