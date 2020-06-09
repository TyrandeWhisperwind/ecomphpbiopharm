<?php
include('../inc/config.php');
session_start();



if(isset($_SESSION['id_gest']))
{
 






function mysqli_result($result , $offset , $field = 0){
    $result->data_seek($offset);
    $row = $result->fetch_array();
    return $row[$field];
    }
?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>produits</title>
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
                    <a class="brand" href="statistique.php">espace gestionnaire</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><? echo $_SESSION['username'] ?><i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="login.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li>
                                <a href="statistique.php">tableau de bord</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Gerer <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="produits.php">produits</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="pesan.php">commandes</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="acheteurs.php">acheteurs</a>
                                    </li>
                                  
                                    <li>
                                        <a tabindex="-1" href="kontak.php">contact</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="slide.php">dispositives</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="statistique.php">statistique</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Utilisateur <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="user.php">liste des utilisateurs</a>
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
                            <a href="statistique.php"><i class="icon-chevron-right"></i>tableau de bord</a>
                        </li>
                       
                        <li>
                            <a href="produits.php"><i class="icon-heart"></i> produits</a>
                        </li>
                        <li>
                            <a href="pesan.php"><i class="icon-briefcase"></i> commandes</a>
                        </li>
                        <li>
                            <a href="acheteurs.php"><i class="icon-user"></i> acheteurs</a>
                        </li>
                     
                       
                        <li>
                            <a href="slide.php"><i class="icon-wrench"></i> Dispositives</a>
                        </li>
                        <li>
                            <a href="statistique.php"><i class="icon-star-empty"></i> statistique</a>
                        </li>
                           <li>
                            <a href="gest.php"><i class="icon-user"></i> gestionnaires</a>
                        </li> 
                     
                         <li>
                            <a href="boite_recep.php"><i class="icon-envelope"></i> boite de reception</a>
                        </li> 
                        <li>
                            <a href="msg-envoyer.php"><i class="icon-comment"></i> message envoyer</a>
                           
                        </li> 


                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content">
                    <?php
                        if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                            echo '<div class="alert alert-success">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>produit ajouter avec succee</h4>';
                            echo '</div>';
                        }
                        else if (!empty($_GET['message']) && $_GET['message'] == 'update') {
                            echo '<div class="alert alert-success">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>produit modifier avec succee</h4>';
                            echo '</div>';
                        }
                        else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
                            echo '<div class="alert alert-success">' ;
                            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                            echo '<h4>produit supprimer avec succee</h4>';
                            echo '</div>';
                        }
                        
                    ?>
                    
                  <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">liste des produits : Gerer le stock</div>
                            </div>
                            <div class="block-content collapse in">
                                 <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>code produit</th>
                                                <th>Nom du produit</th>
                                                <th>prix</th>
                                                <th>quantite en stock</th>
                                                <th>categorie</th>
                                                <th>image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $per_page = 5;
                                            $r="SELECT COUNT(*) FROM produits";

 
                                            $page_query = $db->query($r);
                                           
                                            $pages = ceil(mysqli_result($page_query, 0) / $per_page);
 
                                            $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
                                            $start = ($page - 1) * $per_page;
                                            $rr="SELECT * FROM produits LIMIT $start, $per_page";
                                            $query = $db->query($rr);
                                           
                                         
                                            while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $data['id']; ?></td>
                                                    <td><?php echo $data['nom']; ?></td>
                                                    <td><?php echo $data['prix']; ?></td>
                                                    <td><?php echo $data['quantite']; ?></td>
                                                    <td><?php echo $data['categories']; ?></td>
                                                    <td><?php echo '<img src="'.$data['image'].'" alt="'.$data['nom'].'" title="'.$data['nom'].'" width = "100" height = "100" />'; ?></td>                                                 
                                                    <td><a href="edit-barang.php?id=<?php echo $data['id']; ?>" class="btn">
                                                    <i class="icon-edit"></i> Modifier</a> | <a href="delete-barang.php?id=<?php echo $data['id']; ?>" class="btn" onclick="return confirm('vous etes sur?')")><i class="icon-trash"></i>supprimer</a></td>
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
                                 <a href="tambah-barang.php" class="btn"><i class="icon-plus"></i> Ajouter</a>
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