<?php
session_start();
if(isset($_SESSION['id_gest']))
{
 
include('../inc/config.php');











function mysqli_result($result , $offset , $field = 0){
    $result->data_seek($offset);
    $row = $result->fetch_array();
    return $row[$field];
    }
?>

<!DOCTYPE html>
<html>
    
    <head>
       <?php  include('nav.php');     ?>

                
                <div class="span9" id="content">
                     <br>
                                 <a href="index3.php" class="btn">
                                                    <i class="icon-chevron-right"></i> Rechercher plus d'information sur un produit</a>  
                     <br >
                    <?php
                        if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                            echo '<div class="alert alert-success">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Produit ajouter</h4>';
                            echo '</div>';
                        }
                        else if (!empty($_GET['message']) && $_GET['message'] == 'update') {
                            echo '<div class="alert alert-success">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Produit modifier</h4>';
                            echo '</div>';
                        }
                        else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
                            echo '<div class="alert alert-success">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>Produit supprimé</h4>';
                            echo '</div>';
                        }
                        
                    ?>
                    
                  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div style="text-align:center;"class="center"><h4>Liste des médicaments</h4></div>
                            </div>
                            <div class="block-content collapse in">
                                 <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id_produit</th>
                                                <th>Nom</th>
                                                <th>prix</th>
                                                <th>Quantité en stock</th>
                                                <th style="width:70px;">Catégorie</th>
                                                <th>Quantité vendue</th>
                                                <th  style="width:70px;" >Image</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //j affiche 5 produits par page
                                            $per_page = 5;
                                            //on calcule le nmbre de produits 
                                            $r="SELECT COUNT(*) FROM produits";
                                            
 
                                            $page_query = $db->query($r);
                                           //ceil pour arrondir le nmbre de page au nbre superieur
                                            
                                           //$page_query=le resultat de la requete
                                            //0 numero de ligne dont on veut commencer a recuperer le resultat
                                            $pages = ceil(mysqli_result($page_query, 0) / $per_page);
                                            //pages contient le nbre des page qui vont etre creer

                                             //on est sur la 1ere page 
                                            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                                         // On calcul la première entrée à lire
//exple:Pour $page=2 : $page-1=1, 1*5=5 => Nous lisons les entrées à partir de l'entrée 5 soit la sixième (qui est la première de la deuxième page)


                                            $start = ($page - 1) * $per_page;


                                            $rr="SELECT * FROM produits LIMIT $start, $per_page";
                                            $query = $db->query($rr);
                                           
                                         
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $data['id']; ?></td>
                                                    <td><?php echo $data['nom']; ?></td>
                                                    <td><?php echo $data['prix'].'DA'; ?></td>
                                                    <td><?php echo $data['quantite'].' <br>cartons'; ?></td>
                                                    <td><?php echo $data['categories']; ?></td>
                                                     <td><?php echo $data['quantite_achete'].' Boites'; ?></td>
                                                    <td><?php echo '<img src="'.$data['image'].'" alt="'.$data['nom'].'" title="'.$data['nom'].'" width = "100" height = "100" />'; ?></td>                                                 
                                                  
                                                </tr>
                                            <?php   
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div align="center">
                                    <?php
                                    if($pages >= 1 && $page <= $pages)
                                    {
                                      for($x=1; $x<=$pages; $x++)
                                      {
                                          //echo ($x == $page) ? '<b><a href="?page='.$x.'">'.$x.'</a></b> ' : '<a href="?page='.$x.'">'.$x.'</a> ';
                                        if($x == $page)
                                            echo ' <b><a href="?page='.$x.'">'.$x.'</a></b> | ';
                                        else
                                            echo ' <a href="?page='.$x.'">'.$x.'</a> |';
                                      }
                                    }
                                    ?>
                                    </div>
                            </div>
                            <div class="navbar navbar-inner block-header">
                                
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
        <script>
        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
               
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
    </body>

</html>
<?php }else{header ('Location:../index.php');} ?>