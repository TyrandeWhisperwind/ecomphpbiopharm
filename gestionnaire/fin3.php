



<?php  
 $connect = mysqli_connect("localhost", "root", "", "shopdb");  
 $query = "SELECT nom, SUM(quantite_achete) as number FROM produits GROUP BY nom";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>stat</title>  
            <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
           <script type="text/javascript" src="loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['nom', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["nom"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'porcentage de la quantite d achat pour chaque produits',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
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
                                        <a tabindex="-1" href="statistique.php.php">statistique</a>
                                    </li>
                                </ul>
                            </li>
                     
                        </ul>
                    </div>
                </div>
            </div>
        </div>






















        
        <div align="left">
                                        
      <tr> <td><a href="statistique.php" class="btn">
      <button type="button" class="btn btn-info" aria-label="Left Align" style="width:1300px">
  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>Retour
</button></a>  </td></tr>
                                    </div>
           <br /><br />  
           <div style="width:900px;">  
                <h3 align="center">les statistique</h3>  
                <br />  
                <div  id="piechart" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html>  