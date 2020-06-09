<?php
session_start();
if(isset($_SESSION['id_gest']))
{
 
include('../inc/config.php');

$id = $_GET['id'];
 $r="DELETE from produits where id='$id'";
$query = $db->query($r);

 
if ($query) {
    header('location:produits.php?message=delete');
}
?>
<?php }else{header ('Location:../index.php');} ?>