<?php
session_start();


require_once  '../core/init.php';
include 'includes/head.php';
include 'includes/nav.php';

?>


<?php
if(isset($_SESSION['id_client']))
{

?>



    <div class="row profile">
		<?php
include 'sidebar.php';

?>

                            <div class="col-md-9 order-content">
          
                                <div class="form_main col-md-4 col-sm-5 col-xs-7">
                                    
          <!--nom et prenom client-->  <h1>Bienvenue sur votre profil</h1>
                                    <hr>
                                    
                                    
                                    
 
				
		
		
	
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