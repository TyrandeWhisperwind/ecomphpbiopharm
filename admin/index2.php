<?php  session_start();
if(isset($_SESSION['id_gest']))
{
 
 $connect = mysqli_connect("localhost", "root", "", "shopdb");  
 $query = "SELECT * FROM commandes ORDER BY id_com desc";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Ajax PHP MySQL Date Range Search using jQuery DatePicker</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
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
                                        <a tabindex="-1" href="statistique.php">statistique</a>
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
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Ajax PHP MySQL Date Range Search using jQuery DatePicker</h2>  
                <h3 align="center">Order Data</h3><br />  
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                </div>  
                <div style="clear:both"></div>                 
                <br />  
                <div id="order_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ID</th>  
                               <th width="30%">id_produit</th>  
                               <th width="43%">nom_client</th>  
                               <th width="10%">qty</th>  
                               <th width="12%">total</th> 
                                 <th width="12%">date_livraison</th>  
                                   <th width="12%">date</th>   
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["id_com"]; ?></td>  
                               <td><?php echo $row["id_produit"]; ?></td>  
                               <td><?php echo $row["nom_client"]; ?></td>  
                               <td>$ <?php echo $row["qty"]; ?></td> 
                               <td>$ <?php echo $row["total"]; ?></td> 
                                 <td>$ <?php echo $row["date_livraison"]; ?></td> 
                               <td><?php echo $row["date"]; ?></td>  
                                <td><a href="detail.php?id=<?php echo $row['id_com']; ?>" class="btn">
                                                    <i class="icon-edit"></i> details</a></td>
                          </tr>  
                     <?php  
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  
           </div>
            </div>
      </body>  

 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
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