<?php 
session_start();

//connection
require_once 'core/init.php';

if(isset($_SESSION['id_client']))
{



//head
include 'head.php';

//navbar
include 'nav.php';
//headslide
include 'headslide.php';

$sql= " SELECT * FROM produits";
$featured= $db->query($sql);
?>
 




<section style="background-color:#f2f4f3" id=classe>


        <div class="container-fluid">
                 <h1 style="margin-top:-80px; text-align:center;" class="section-heading"><span style="color:#004b88;"class="glyphicon glyphicon-triangle-right" ></span> <font style=" font-size: 40px;"> Les classes thérapeutiques </font><span style="color:#004b88;"class="glyphicon glyphicon-triangle-left" ></span></h1><br><br>

<?php

$sql = "SELECT * FROM categories ORDER BY category ASC";
$pquery = $db->query($sql);

?>
  <div style="margin-left:-30px; "class="col-md-3">
      

      
 <div class="collapse navbar-collapse" id="sideNavbar">
       <div class="panel-group" id="accordion">
         <a target="_blank" href="index3.php" style="width:270px;"class="btn btn-info btn-lg">Rechercher un médicament</a><br>
          <?php while($parent =mysqli_fetch_assoc($pquery)) : ?>
          
        <div id="hoverlink" style="background-color:#004b88;"class="panel panel-default">
     
            <a   href="?idcat=<?php echo $parent['id'];?>#classe"> 
            <div class="panel-heading">
            <h4 id="hoverlink" class="panel-title "><font style="color:white;font-size:15px;"><b><?php echo $parent['category'];?></b></font></h4>
          </div></a>
          
        </div>
     									<?php endwhile ;?>

  </div>
     
    
        <!-- end hidden Menu items --> 
      </div>
 <?php $req="select id from categories ";
  $result = mysqli_query($db, $req);

 $row_num = $result->num_rows;
      
      ?>

</div>
 <div style="margin-top:20px;" class="col-md-9"><br> <p style=" font-size: 20px;
    line-height: 21px;
    font-weight: 400;glyphicon glyphicon-triangle-left
    letter-spacing: 0px;
}font-family:Roboto, Arial, Tahoma, sans-serif; text-align: left;"><font color="#004b88"><strong>BIOPHARM</strong></font> met à votre disposition <?php echo $row_num ;?> classes thérapeutiques. </p><br>
     
        <?php
//leftside
if (empty ($_GET['idcat'])){

    $sq= " SELECT * FROM produits where categories = 'Anti-infectieux' ";
$feat= $db->query($sq);
    
    ?>
     
     <h3 class="section-heading"><span style="color:#004b88;"class="glyphicon glyphicon-triangle-right" ></span> <font style=" font-size: 25px;"> Anti-infectieux </font><span style="color:#004b88;"class="glyphicon glyphicon-triangle-left" style="width:50px;"></span></h3> 
                 
<br>  
  
  <div class="row text-center portfolio">   
      
				<?php while ($products = mysqli_fetch_assoc($feat)): ?>

    <div class="col-lg-3 col-sm-3 col-xs-4">
        <div class="panel panel-default">
            <div class="panel-body">
           
                 <a href="#classe">
            					<img onclick="detailsmodal(<?= $products['i']; ?>)"src ="<?php echo $products['image']; ?>" alt="medec" class="img-thumbnail img-responsive"/>
</a>
              
            </div>
            <div class="panel-footer">
             					<p style="  color:#004b88; font-size:14px;"><b><?= $products['nom']; ?></b></p>
                                   

            </div>  
        </div> 
    </div>
      				<?php endwhile ; ?>

  
  </div>
     <?php

}
?>
      
     

          <!---->
    <?php
//leftside
if (!empty ($_GET['idcat'])){
$id=$_GET['idcat'];
    

    
$sql= " SELECT category FROM categories where id = '$id'";
 $result= mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
    
    
$sql= " SELECT * FROM produits where categories = '{$row['category']}' ORDER BY nom ASC";
$featured= $db->query($sql);
       

 

    
?>

	
            
  
<h3 class="section-heading"><span style="color:#004b88;"class="glyphicon glyphicon-triangle-right" ></span> <font style="font-size: 25px;"> <?php echo $row['category'];?> </font><span style="color:#004b88;"class="glyphicon glyphicon-triangle-left" ></span></h3> 
                 
<br>  
  
  <div class="row text-center portfolio">   
      
				<?php while ($products = mysqli_fetch_assoc($featured)): ?>

    <div class="col-lg-3 col-sm-3 col-xs-4">
        <div class="panel panel-default">
            <div class="panel-body">
           
                 <a href="#classe">
            					<img onclick="detailsmodal(<?= $products['i']; ?>)"src ="<?php echo $products['image']; ?>" alt="medec" class="img-thumbnail img-responsive"/>
</a>
              
            </div>
            <div class="panel-footer">
             					<p style=" color:#004b88; font-size:14px;"><b><?= $products['nom']; ?></b></p>
                                   

            </div>  
        </div> 
    </div>
      				<?php endwhile ; ?>

  
  </div>
     

  
</div>

<?php

}
?>
        
</div>
	
    


 
 
 
 
    

</section>




<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 style="margin-top:-85px;"class="section-heading"><span style="color:#004b88;"class="glyphicon glyphicon-triangle-right" style="width:50px;"></span> <font style=" font-size: 50px;"> Contactez-nous </font><span style="color:#004b88;"class="glyphicon glyphicon-triangle-left" style="width:50px;"></span></h2>
              
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
               
                             <br>
                                                            <div class="col-md-6">

                <div  style=" background-image:url(images/get_in_touch.png); background-repeat: no-repeat;
background-position: right bottom;background-color: #2991d6;"class="jumbotron">
                  <div class="row">
                     
                          <div class="container" style="border-bottom:1px solid black">
                            <h2 style="font-family:sans-serif;font-style: oblique;">Informations de contact :</h2>
                          </div> <br><br>
                          <ul class="container details">
                            <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;">:</span><font style="color: #fff ; ">+213 23 85 10 11</p></font></li>
                            <li><p><span class="glyphicon glyphicon-phone" style="width:50px;">:</span><font style="color: #fff ; ">+213 770 95 14 03</p></font></li>
                            <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;">:</span><font style="color: #fff ; ">Antenne régionale de vente, ALGER</p></font></li>
                            <li><p><span class="glyphicon glyphicon-envelope" style="width:50px;">:</span><font style="color: #fff ; ">relations.investisseurs@biopharmdz.com</p></font>
                          </ul>
                  </div>
                </div>
                        </div>
                            
                            <div class="col-md-6">
                <div style="background-color: #2991d6;"class="jumbotron">
                  <div class="row">

                     
                          <img style="height: 100%; width: 100%; " src="images/med3.jpg">
                  
                        </div></div></div>
                   
                </div>
            </div>
        </div>
    
    </section>




   <section style="background-color:#f2f4f3" id="about">
       
        <div  class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 style="margin-top:-70px;"class="section-heading"><span style="color:#004b88;"class="glyphicon glyphicon-triangle-right" style="width:50px;"></span> <font style=" font-size: 50px;"> Notre groupe </font><span style="color:#004b88;"class="glyphicon glyphicon-triangle-left" style="width:50px;"></span></h2><br> <br><br> <br>
 <p style=" font-size: 20px;
    line-height: 21px;
    font-weight: 400;glyphicon glyphicon-triangle-left
    letter-spacing: 0px;
}font-family:Roboto, Arial, Tahoma, sans-serif; text-align: center;">BIOPHARM, laboratoire pharmaceutique algérien, est un groupe industriel et commercial qui a investi au début des années 1990 dans le secteur pharmaceutique  et qui dispose aujourd’hui d’une unité de production aux normes internationales et d’un réseau de distribution aux grossistes et aux pharmacies.

Après près de deux décennies d’intense activité, BIOPHARM est arrivé à une étape importante de son développement qui a nécessité une restructuration.

BIOPHARM a commencé par adapter progressivement sa structure organisationnelle en tant que Groupe autour de ses différents métiers :</p>
                </div>
              
            </div>
              <br> <br>  <br> <br>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="images/05.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                
                                <div class="timeline-heading">
                                    <h3 class="subheading">BIOPHARM Production</h3>
                                </div>
                                <div class="timeline-body">
                                    <p style=" font-size: 16px;"class="text-muted">La production de médicament ce fait à travers BIOPHARM, qui demeure le noyau central du Groupe .                                 <button type="button" class="btn btn-primary active btn-xs" data-toggle="modal" data-target="#modalpro">Voir plus</button>
</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="images/distri.jpg" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3 class="subheading">BIOPHARM Distribution</h3>
                                </div>
                                <div class="timeline-body">
                                    <p style=" font-size: 16px;" class="text-muted">La distribution en gros de produits pharmaceutiques à travers BIOPHARM DISTRIBUTION .  <button type="button" class="btn btn-primary active btn-xs"  data-toggle="modal" data-target="#modaldis">Voir plus</button></p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="images/bio.png" alt="">
                            </div>
                          <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3 class="subheading">BIOPURE</h3>
                                </div>
                                <div class="timeline-body">
                                    <p style=" font-size: 16px;" class="text-muted">La répartition aux officines ce fait à travers BIOPURE.   <button type="button" class="btn btn-primary active btn-xs"  data-toggle="modal" data-target="#modalpur">Voir plus</button></p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="images/HHI.png" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3 class="subheading">HHI</h3>
                                </div>
                                <div class="timeline-body">
                                    <p style=" font-size: 16px;" class="text-muted">La promotion et l’information médicales, à travers HHI (Human Health Information).  <button type="button" class="btn btn-primary active btn-xs" data-toggle="modal" data-target="#modalhhi">Voir plus</button></p>
                                </div>
                            </div>
                        </li>
                          <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="images/E.png" alt="">
                            </div>
                          <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3 class="subheading">BIOPHARM Logistic</h3>
                                </div>
                                <div class="timeline-body">
                                    <p style=" font-size: 16px;" class="text-muted">La logistique pour l’industrie pharmaceutique à travers BIOPHARM LOGISTIC.  <button type="button" class="btn btn-primary active btn-xs" data-toggle="modal" data-target="#modalog">Voir plus</button></p>
                                </div>
                            </div>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </section>




<!--modals-->
	
<div data-backdrop="static" id="modalpro" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div style="background-color:#004b88; "class="modal-header">
       
        <h2 style="font-family:  Tahoma, sans-serif; color:white;"align="center"class="modal-title" >Biopharm production</h2>
      </div>
      <div class="modal-body">
          Bâtie sur un site de 8 000 m2, notre unité de Oued Smar (Alger,Algérie) fabrique aujourd’hui quelques 35 millions d’unités annuellement, à travers 9 lignes de production, soit deux (2) lignes pour les formes liquides (petits et grands volumes), une ligne de crèmes et gels, deux lignes de suppositoires et quatre lignes de formes sèches (sachets, poudre, pilules et comprimés). Notre gamme de production comprend prés d'une centaine de génériques couvrant les principales classes thérapeutiques.

Le laboratoire pharmaceutique BIOPHARM contribue, depuis le lancement de ses fabrications en 2005, à la création d’emplois nouveaux à haute valeur ajoutée, au développement de génériques innovants et à la réduction de la dépendance extérieure de notre pays, dans un secteur industriel complexe et exigeant.

Dès le départ, notre option fut celle d’un engagement durable pour la qualité et, en conséquence, celle de l’investissement dans les ressources humaines et la formation permanente de nos équipes. Dans le respect scrupuleux des Bonnes Pratiques de Fabrication (BPF) pharmaceutiques, le contrôle de la qualité de chaque médicament s’exerce de manière continue, à toutes les phases de sa fabrication et s’applique à l’ensemble de ses composants. Notre département d’assurance-qualité, appuyé lui-même sur un laboratoire de contrôle doté des équipements les plus modernes, supervise l’ensemble des opérations de production et ce, jusqu’à la livraison finale de nos produits.

Au cœur des activités de notre usine, se trouve un Laboratoire de recherche et de développement dont les performances nous permettent de formuler chaque année près d’une quinzaine de nouveaux produits génériques et de procéder au lancement de leur fabrication.

A BIOPHARM, nous exportons depuis 2011 une quinzaine de nos produits vers le marché africain (Tunisie, Libye, Mauritanie, Mali, Niger). L’agrément en 2015 de notre unité de production de Oued Smar par l’ANSM française (Agence Nationale de Sécurité du Médicament et des produits de santé) nous ouvre, à terme, des possibilités d’exportation vers le marché européen.
       
      </div>
      <div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>      </div>
    </div>

  </div>
</div>

<div data-backdrop="static" id="modaldis" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div  style="background-color:#004b88; "class="modal-header">
       
        <h4 style="font-family:  Tahoma, sans-serif; color:white;"align="center"class="modal-title">BIOPHARM Distribution</h4>
      </div>
      <div class="modal-body">
         Notre filiale BIOPHARM Distribution a développé durant plus de deux décennies un large réseau de distribution constitué de 3 centres de distribution situés à Alger, Constantine et Oran ainsi que de 150 grossistes répartiteurs répartis sur le territoire algérien. Ce réseau  met à la disposition  des professionnels et des patients plus de 500 produits de différentes classes thérapeutiques.

BIOPHARM Distribution a tissé, au long des années, de solides rapports de confiance  avec des laboratoires de renommée mondiale qui lui confient la distribution de leurs produits. Parmi ces partenaires, on peut citer, notamment : Astra Zeneca, Bayer, Boehringer- Ingenlheim, Cipla, Lilly, Ferrer, Johnson & Johnson, Ipsen Pharma, Léo Pharma, Lilly, Merck Serono, MSD,  Pierre Fabre,  Servier, Takeda, Théa,  etc.

Le premier fournisseur de BIOPHARM Distribution est sa société mère, BIOPHARM dont elle distribue la gamme à titre exclusif. Son premier client est BIOPURE, la société du groupe en charge de la répartition aux officines qui vient ainsi compléter le réseau de distribution en permettant un accès direct à plus de 3000  pharmacies, et couvrant jusqu’aux régions les plus reculées du pays.

A BIOPHARM Distribution, nous nous appuyons sur une équipe de professionnels commerciaux pour assurer l’acheminement des produits qui nous sont confiés au plus près de nos clients et pour garantir, ce faisant, leur disponibilité permanente pour les patients auxquels ils sont destinés.

Notre réseau de distribution grossiste, tourné vers la satisfaction de nos clients, est certifié, depuis 2008, selon le Référentiel Qualité ISO 9001.

 
       
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>    
      </div>
    </div>

  </div>
</div>


<div data-backdrop="static" id="modalpur" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div style="background-color:#004b88; " class="modal-header">
       
        <h4 style="font-family:  Tahoma, sans-serif; color:white;"align="center"class="modal-title">BIOPURE</h4>
      </div>
      <div class="modal-body">
           La filiale BIOPURE, entrée en activité en 2006, s’impose aujourd’hui sur le marché algérien comme un des acteurs majeurs de la répartition de médicaments aux officines pharmaceutiques.

Avec ses cinq centres de distribution opérationnels situés à Blida, Constantine, Oran, Tizi Ouzou et Ouargla, ainsi que ses six plateformes logistiques, Biopure assure la distribution d’une gamme très étendue couvrant 4000 références médicamenteuses avec une quantité de 60 millions de boites livrées en 2015.

Biopure effectue des livraisons sûres et rapides, jour et nuit, avec des délais ne dépassant pas les 24h après commande, cela plusieurs fois par jour et sur un réseau de plus de 3000 officines clientes réparties sur l’ensemble des 48 wilayas que compte notre pays.

A Biopure, nous veillons à la disponibilité des médicaments que nous distribuons dans toutes les pharmacies partenaires, jusqu’aux endroits les plus reculés de l’Algérie.

 A Biopure, nous œuvrons par-dessus tout  à répondre aux exigences de notre clientèle et à l’amélioration continue de nos prestations de services, grâce, notamment :
          <br><br>
<ul>
  <li>  A notre respect des Bonnes Pratiques de Stockage et de distribution de nos produits</li> 
   <li>  A notre stricte observance des contraintes de la chaine du froid</li> 
  <li>   A notre gestion moderne et réactive des commandes, des facturations et des règlements</li> 
   <li>  A la proximité de notre clientèle et à la disponibilité de notre force de vente </li> 
  <li>   A un système de formation continue que nous déployons au bénéfice de l’ensemble de notre personne</li> 

 </ul>
       
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>    
      </div>
    </div>

  </div>
</div>
<div data-backdrop="static" id="modalhhi" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div style="background-color:#004b88; "class="modal-header">
       
        <h4  style="font-family:  Tahoma, sans-serif; color:white;"align="center"class="modal-title">HHI</h4>
      </div>
      <div class="modal-body">
           La filiale Human Health Information (HHI), entrée en activité en 2002, est une société de représentation et d’information médicales qui apporte une assistance intégrée et complète aux laboratoires désirant avoir une représentation en Algérie.

Grâce à ses 180 collaborateurs, dont 110 représentants médicaux et 30 représentants commerciaux, HHI assure l’information médicale auprès des médecins et professionnels de santé des produits, aussi bien ceux fabriqués par BIOPHARM que ceux de ses partenaires tels que : Bayer Healthcare, Ferrer, Cipla, Unique, Smith and Nephew, Becton Dickinson, PTS Diagnostic, Wooshin, à travers l’ensemble du territoire algérien.

Grâce à la qualité de ses services et au travail  en harmonie de ses équipes médicales et commerciales ainsi qu’aux résultats encourageants obtenus sur le terrain, HHI réussit à gagner la confiance d’un nombre croissant de partenaires.

Human Health Information (HHI) assure: <br> <br>
<ul>
  <li>  La représentation réglementaire et pharmaceutique auprès du Ministère de la Santé, de la Population et de la Réforme Hospitalière</li>
   <li> Le conseil en marketing et la promotion médico-pharmaceutique</li>
  <li>  Le recrutement, l’encadrement et la formation des délégués médico-commerciaux qui assurent l'information médicale auprès des spécialistes de la santé (médecins, pharmaciens, dentistes…) et des structures médicales  (PCH, hôpitaux, cliniques publiques et privées et distributeurs).   </li> </ul>

HHI  constitue aujourd'hui le  vecteur essentiel  des actions  du groupe BIOPHARM en direction de la communauté scientifique, médicale et professionnelle en Algérie
      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>    
      </div>
    </div>

  </div>
</div>

<div data-backdrop="static" id="modalog" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div style="background-color:#004b88; "class="modal-header">
       
        <h4 style="font-family:  Tahoma, sans-serif; color:white;" align="center"class="modal-title">BIOPHARM Logistic</h4>
      </div>
      <div class="modal-body">
           

BIOPHARM Logistic est née en 2014 par suite de la filialisation des activités de logistique opérées auparavant au sein du groupe BIOPHARM. Elle assure des prestations de logistique allant du transit portuaire, de la réalisation et  l’exploitation d’infrastructures à la logistique des flux. Son premier objectif est d’offrir des prestations logistiques répondant aux standards internationaux que sont les Bonnes Pratiques de Distribution et de stockage des produits pharmaceutiques. 

Elle s’appuie, pour ce faire, sur un réseau de 6 centres logistiques répartis sur quatre grandes régions EST, CENTRE, OUEST et SUD, et couvrant des espaces de stockage équipés de chambres froides qualifiées, validées et opérationnelles.  

Disposant d’une flotte de plus 300 véhicules et d’un personnel hautement qualifié et expérimenté, elle propose des services parmi les plus performants sur le marché, en termes de qualité comme en terme de prix. Ces services, qui vont des opérations de transit et d’enlèvement portuaire, au stockage et à l’acheminement de marchandises sur l’ensemble du territoire national, sont proposés 24H/24 et 7 Jours/7 à sa clientèle comprenant les filiales du groupe BIOPHARM.  

      </div>
      <div class="modal-footer">
       <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>    
      </div>
    </div>

  </div>
</div>
	
     <script>
	
//Touch Slider

(function(a){if(typeof define==="function"&&define.amd&&define.amd.jQuery){define(["jquery"],a)}else{if(typeof module!=="undefined"&&module.exports){a(require("jquery"))}else{a(jQuery)}}}(function(f){var y="1.6.15",p="left",o="right",e="up",x="down",c="in",A="out",m="none",s="auto",l="swipe",t="pinch",B="tap",j="doubletap",b="longtap",z="hold",E="horizontal",u="vertical",i="all",r=10,g="start",k="move",h="end",q="cancel",a="ontouchstart" in window,v=window.navigator.msPointerEnabled&&!window.navigator.pointerEnabled&&!a,d=(window.navigator.pointerEnabled||window.navigator.msPointerEnabled)&&!a,C="TouchSwipe";var n={fingers:1,threshold:75,cancelThreshold:null,pinchThreshold:20,maxTimeThreshold:null,fingerReleaseThreshold:250,longTapThreshold:500,doubleTapThreshold:200,swipe:null,swipeLeft:null,swipeRight:null,swipeUp:null,swipeDown:null,swipeStatus:null,pinchIn:null,pinchOut:null,pinchStatus:null,click:null,tap:null,doubleTap:null,longTap:null,hold:null,triggerOnTouchEnd:true,triggerOnTouchLeave:false,allowPageScroll:"auto",fallbackToMouseEvents:true,excludedElements:"label, button, input, select, textarea, a, .noSwipe",preventDefaultEvents:true};f.fn.swipe=function(H){var G=f(this),F=G.data(C);if(F&&typeof H==="string"){if(F[H]){return F[H].apply(this,Array.prototype.slice.call(arguments,1))}else{f.error("Method "+H+" does not exist on jQuery.swipe")}}else{if(F&&typeof H==="object"){F.option.apply(this,arguments)}else{if(!F&&(typeof H==="object"||!H)){return w.apply(this,arguments)}}}return G};f.fn.swipe.version=y;f.fn.swipe.defaults=n;f.fn.swipe.phases={PHASE_START:g,PHASE_MOVE:k,PHASE_END:h,PHASE_CANCEL:q};f.fn.swipe.directions={LEFT:p,RIGHT:o,UP:e,DOWN:x,IN:c,OUT:A};f.fn.swipe.pageScroll={NONE:m,HORIZONTAL:E,VERTICAL:u,AUTO:s};f.fn.swipe.fingers={ONE:1,TWO:2,THREE:3,FOUR:4,FIVE:5,ALL:i};function w(F){if(F&&(F.allowPageScroll===undefined&&(F.swipe!==undefined||F.swipeStatus!==undefined))){F.allowPageScroll=m}if(F.click!==undefined&&F.tap===undefined){F.tap=F.click}if(!F){F={}}F=f.extend({},f.fn.swipe.defaults,F);return this.each(function(){var H=f(this);var G=H.data(C);if(!G){G=new D(this,F);H.data(C,G)}})}function D(a5,au){var au=f.extend({},au);var az=(a||d||!au.fallbackToMouseEvents),K=az?(d?(v?"MSPointerDown":"pointerdown"):"touchstart"):"mousedown",ax=az?(d?(v?"MSPointerMove":"pointermove"):"touchmove"):"mousemove",V=az?(d?(v?"MSPointerUp":"pointerup"):"touchend"):"mouseup",T=az?(d?"mouseleave":null):"mouseleave",aD=(d?(v?"MSPointerCancel":"pointercancel"):"touchcancel");var ag=0,aP=null,a2=null,ac=0,a1=0,aZ=0,H=1,ap=0,aJ=0,N=null;var aR=f(a5);var aa="start";var X=0;var aQ={};var U=0,a3=0,a6=0,ay=0,O=0;var aW=null,af=null;try{aR.bind(K,aN);aR.bind(aD,ba)}catch(aj){f.error("events not supported "+K+","+aD+" on jQuery.swipe")}this.enable=function(){aR.bind(K,aN);aR.bind(aD,ba);return aR};this.disable=function(){aK();return aR};this.destroy=function(){aK();aR.data(C,null);aR=null};this.option=function(bd,bc){if(typeof bd==="object"){au=f.extend(au,bd)}else{if(au[bd]!==undefined){if(bc===undefined){return au[bd]}else{au[bd]=bc}}else{if(!bd){return au}else{f.error("Option "+bd+" does not exist on jQuery.swipe.options")}}}return null};function aN(be){if(aB()){return}if(f(be.target).closest(au.excludedElements,aR).length>0){return}var bf=be.originalEvent?be.originalEvent:be;var bd,bg=bf.touches,bc=bg?bg[0]:bf;aa=g;if(bg){X=bg.length}else{if(au.preventDefaultEvents!==false){be.preventDefault()}}ag=0;aP=null;a2=null;aJ=null;ac=0;a1=0;aZ=0;H=1;ap=0;N=ab();S();ai(0,bc);if(!bg||(X===au.fingers||au.fingers===i)||aX()){U=ar();if(X==2){ai(1,bg[1]);a1=aZ=at(aQ[0].start,aQ[1].start)}if(au.swipeStatus||au.pinchStatus){bd=P(bf,aa)}}else{bd=false}if(bd===false){aa=q;P(bf,aa);return bd}else{if(au.hold){af=setTimeout(f.proxy(function(){aR.trigger("hold",[bf.target]);if(au.hold){bd=au.hold.call(aR,bf,bf.target)}},this),au.longTapThreshold)}an(true)}return null}function a4(bf){var bi=bf.originalEvent?bf.originalEvent:bf;if(aa===h||aa===q||al()){return}var be,bj=bi.touches,bd=bj?bj[0]:bi;var bg=aH(bd);a3=ar();if(bj){X=bj.length}if(au.hold){clearTimeout(af)}aa=k;if(X==2){if(a1==0){ai(1,bj[1]);a1=aZ=at(aQ[0].start,aQ[1].start)}else{aH(bj[1]);aZ=at(aQ[0].end,aQ[1].end);aJ=aq(aQ[0].end,aQ[1].end)}H=a8(a1,aZ);ap=Math.abs(a1-aZ)}if((X===au.fingers||au.fingers===i)||!bj||aX()){aP=aL(bg.start,bg.end);a2=aL(bg.last,bg.end);ak(bf,a2);ag=aS(bg.start,bg.end);ac=aM();aI(aP,ag);be=P(bi,aa);if(!au.triggerOnTouchEnd||au.triggerOnTouchLeave){var bc=true;if(au.triggerOnTouchLeave){var bh=aY(this);bc=F(bg.end,bh)}if(!au.triggerOnTouchEnd&&bc){aa=aC(k)}else{if(au.triggerOnTouchLeave&&!bc){aa=aC(h)}}if(aa==q||aa==h){P(bi,aa)}}}else{aa=q;P(bi,aa)}if(be===false){aa=q;P(bi,aa)}}function M(bc){var bd=bc.originalEvent?bc.originalEvent:bc,be=bd.touches;if(be){if(be.length&&!al()){G(bd);return true}else{if(be.length&&al()){return true}}}if(al()){X=ay}a3=ar();ac=aM();if(bb()||!am()){aa=q;P(bd,aa)}else{if(au.triggerOnTouchEnd||(au.triggerOnTouchEnd==false&&aa===k)){if(au.preventDefaultEvents!==false){bc.preventDefault()}aa=h;P(bd,aa)}else{if(!au.triggerOnTouchEnd&&a7()){aa=h;aF(bd,aa,B)}else{if(aa===k){aa=q;P(bd,aa)}}}}an(false);return null}function ba(){X=0;a3=0;U=0;a1=0;aZ=0;H=1;S();an(false)}function L(bc){var bd=bc.originalEvent?bc.originalEvent:bc;if(au.triggerOnTouchLeave){aa=aC(h);P(bd,aa)}}function aK(){aR.unbind(K,aN);aR.unbind(aD,ba);aR.unbind(ax,a4);aR.unbind(V,M);if(T){aR.unbind(T,L)}an(false)}function aC(bg){var bf=bg;var be=aA();var bd=am();var bc=bb();if(!be||bc){bf=q}else{if(bd&&bg==k&&(!au.triggerOnTouchEnd||au.triggerOnTouchLeave)){bf=h}else{if(!bd&&bg==h&&au.triggerOnTouchLeave){bf=q}}}return bf}function P(be,bc){var bd,bf=be.touches;if(J()||W()){bd=aF(be,bc,l)}if((Q()||aX())&&bd!==false){bd=aF(be,bc,t)}if(aG()&&bd!==false){bd=aF(be,bc,j)}else{if(ao()&&bd!==false){bd=aF(be,bc,b)}else{if(ah()&&bd!==false){bd=aF(be,bc,B)}}}if(bc===q){if(W()){bd=aF(be,bc,l)}if(aX()){bd=aF(be,bc,t)}ba(be)}if(bc===h){if(bf){if(!bf.length){ba(be)}}else{ba(be)}}return bd}function aF(bf,bc,be){var bd;if(be==l){aR.trigger("swipeStatus",[bc,aP||null,ag||0,ac||0,X,aQ,a2]);if(au.swipeStatus){bd=au.swipeStatus.call(aR,bf,bc,aP||null,ag||0,ac||0,X,aQ,a2);if(bd===false){return false}}if(bc==h&&aV()){clearTimeout(aW);clearTimeout(af);aR.trigger("swipe",[aP,ag,ac,X,aQ,a2]);if(au.swipe){bd=au.swipe.call(aR,bf,aP,ag,ac,X,aQ,a2);if(bd===false){return false}}switch(aP){case p:aR.trigger("swipeLeft",[aP,ag,ac,X,aQ,a2]);if(au.swipeLeft){bd=au.swipeLeft.call(aR,bf,aP,ag,ac,X,aQ,a2)}break;case o:aR.trigger("swipeRight",[aP,ag,ac,X,aQ,a2]);if(au.swipeRight){bd=au.swipeRight.call(aR,bf,aP,ag,ac,X,aQ,a2)}break;case e:aR.trigger("swipeUp",[aP,ag,ac,X,aQ,a2]);if(au.swipeUp){bd=au.swipeUp.call(aR,bf,aP,ag,ac,X,aQ,a2)}break;case x:aR.trigger("swipeDown",[aP,ag,ac,X,aQ,a2]);if(au.swipeDown){bd=au.swipeDown.call(aR,bf,aP,ag,ac,X,aQ,a2)}break}}}if(be==t){aR.trigger("pinchStatus",[bc,aJ||null,ap||0,ac||0,X,H,aQ]);if(au.pinchStatus){bd=au.pinchStatus.call(aR,bf,bc,aJ||null,ap||0,ac||0,X,H,aQ);if(bd===false){return false}}if(bc==h&&a9()){switch(aJ){case c:aR.trigger("pinchIn",[aJ||null,ap||0,ac||0,X,H,aQ]);if(au.pinchIn){bd=au.pinchIn.call(aR,bf,aJ||null,ap||0,ac||0,X,H,aQ)}break;case A:aR.trigger("pinchOut",[aJ||null,ap||0,ac||0,X,H,aQ]);if(au.pinchOut){bd=au.pinchOut.call(aR,bf,aJ||null,ap||0,ac||0,X,H,aQ)}break}}}if(be==B){if(bc===q||bc===h){clearTimeout(aW);clearTimeout(af);if(Z()&&!I()){O=ar();aW=setTimeout(f.proxy(function(){O=null;aR.trigger("tap",[bf.target]);if(au.tap){bd=au.tap.call(aR,bf,bf.target)}},this),au.doubleTapThreshold)}else{O=null;aR.trigger("tap",[bf.target]);if(au.tap){bd=au.tap.call(aR,bf,bf.target)}}}}else{if(be==j){if(bc===q||bc===h){clearTimeout(aW);clearTimeout(af);O=null;aR.trigger("doubletap",[bf.target]);if(au.doubleTap){bd=au.doubleTap.call(aR,bf,bf.target)}}}else{if(be==b){if(bc===q||bc===h){clearTimeout(aW);O=null;aR.trigger("longtap",[bf.target]);if(au.longTap){bd=au.longTap.call(aR,bf,bf.target)}}}}}return bd}function am(){var bc=true;if(au.threshold!==null){bc=ag>=au.threshold}return bc}function bb(){var bc=false;if(au.cancelThreshold!==null&&aP!==null){bc=(aT(aP)-ag)>=au.cancelThreshold}return bc}function ae(){if(au.pinchThreshold!==null){return ap>=au.pinchThreshold}return true}function aA(){var bc;if(au.maxTimeThreshold){if(ac>=au.maxTimeThreshold){bc=false}else{bc=true}}else{bc=true}return bc}function ak(bc,bd){if(au.preventDefaultEvents===false){return}if(au.allowPageScroll===m){bc.preventDefault()}else{var be=au.allowPageScroll===s;switch(bd){case p:if((au.swipeLeft&&be)||(!be&&au.allowPageScroll!=E)){bc.preventDefault()}break;case o:if((au.swipeRight&&be)||(!be&&au.allowPageScroll!=E)){bc.preventDefault()}break;case e:if((au.swipeUp&&be)||(!be&&au.allowPageScroll!=u)){bc.preventDefault()}break;case x:if((au.swipeDown&&be)||(!be&&au.allowPageScroll!=u)){bc.preventDefault()}break}}}function a9(){var bd=aO();var bc=Y();var be=ae();return bd&&bc&&be}function aX(){return !!(au.pinchStatus||au.pinchIn||au.pinchOut)}function Q(){return !!(a9()&&aX())}function aV(){var bf=aA();var bh=am();var be=aO();var bc=Y();var bd=bb();var bg=!bd&&bc&&be&&bh&&bf;return bg}function W(){return !!(au.swipe||au.swipeStatus||au.swipeLeft||au.swipeRight||au.swipeUp||au.swipeDown)}function J(){return !!(aV()&&W())}function aO(){return((X===au.fingers||au.fingers===i)||!a)}function Y(){return aQ[0].end.x!==0}function a7(){return !!(au.tap)}function Z(){return !!(au.doubleTap)}function aU(){return !!(au.longTap)}function R(){if(O==null){return false}var bc=ar();return(Z()&&((bc-O)<=au.doubleTapThreshold))}function I(){return R()}function aw(){return((X===1||!a)&&(isNaN(ag)||ag<au.threshold))}function a0(){return((ac>au.longTapThreshold)&&(ag<r))}function ah(){return !!(aw()&&a7())}function aG(){return !!(R()&&Z())}function ao(){return !!(a0()&&aU())}function G(bc){a6=ar();ay=bc.touches.length+1}function S(){a6=0;ay=0}function al(){var bc=false;if(a6){var bd=ar()-a6;if(bd<=au.fingerReleaseThreshold){bc=true}}return bc}function aB(){return !!(aR.data(C+"_intouch")===true)}function an(bc){if(!aR){return}if(bc===true){aR.bind(ax,a4);aR.bind(V,M);if(T){aR.bind(T,L)}}else{aR.unbind(ax,a4,false);aR.unbind(V,M,false);if(T){aR.unbind(T,L,false)}}aR.data(C+"_intouch",bc===true)}function ai(be,bc){var bd={start:{x:0,y:0},last:{x:0,y:0},end:{x:0,y:0}};bd.start.x=bd.last.x=bd.end.x=bc.pageX||bc.clientX;bd.start.y=bd.last.y=bd.end.y=bc.pageY||bc.clientY;aQ[be]=bd;return bd}function aH(bc){var be=bc.identifier!==undefined?bc.identifier:0;var bd=ad(be);if(bd===null){bd=ai(be,bc)}bd.last.x=bd.end.x;bd.last.y=bd.end.y;bd.end.x=bc.pageX||bc.clientX;bd.end.y=bc.pageY||bc.clientY;return bd}function ad(bc){return aQ[bc]||null}function aI(bc,bd){bd=Math.max(bd,aT(bc));N[bc].distance=bd}function aT(bc){if(N[bc]){return N[bc].distance}return undefined}function ab(){var bc={};bc[p]=av(p);bc[o]=av(o);bc[e]=av(e);bc[x]=av(x);return bc}function av(bc){return{direction:bc,distance:0}}function aM(){return a3-U}function at(bf,be){var bd=Math.abs(bf.x-be.x);var bc=Math.abs(bf.y-be.y);return Math.round(Math.sqrt(bd*bd+bc*bc))}function a8(bc,bd){var be=(bd/bc)*1;return be.toFixed(2)}function aq(){if(H<1){return A}else{return c}}function aS(bd,bc){return Math.round(Math.sqrt(Math.pow(bc.x-bd.x,2)+Math.pow(bc.y-bd.y,2)))}function aE(bf,bd){var bc=bf.x-bd.x;var bh=bd.y-bf.y;var be=Math.atan2(bh,bc);var bg=Math.round(be*180/Math.PI);if(bg<0){bg=360-Math.abs(bg)}return bg}function aL(bd,bc){var be=aE(bd,bc);if((be<=45)&&(be>=0)){return p}else{if((be<=360)&&(be>=315)){return p}else{if((be>=135)&&(be<=225)){return o}else{if((be>45)&&(be<135)){return x}else{return e}}}}}function ar(){var bc=new Date();return bc.getTime()}function aY(bc){bc=f(bc);var be=bc.offset();var bd={left:be.left,right:be.left+bc.outerWidth(),top:be.top,bottom:be.top+bc.outerHeight()};return bd}function F(bc,bd){return(bc.x>bd.left&&bc.x<bd.right&&bc.y>bd.top&&bc.y<bd.bottom)}}}));!function(n){"use strict";n.fn.bsTouchSlider=function(i){var a=n(".carousel");return this.each(function(){function i(i){var a="webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";i.each(function(){var i=n(this),t=i.data("animation");i.addClass(t).one(a,function(){i.removeClass(t)})})}var t=a.find(".item:first").find("[data-animation ^= 'animated']");a.carousel(),i(t),a.on("slide.bs.carousel",function(a){var t=n(a.relatedTarget).find("[data-animation ^= 'animated']");i(t)}),n(".carousel .carousel-inner").swipe({swipeLeft:function(n,i,a,t,e){this.parent().carousel("next")},swipeRight:function(){this.parent().carousel("prev")},threshold:0})})}}(jQuery);



//Initialise Bootstrap Carousel Touch Slider

$('#accueil').bsTouchSlider();

//detail 

	function detailsmodal(i)
	{
       
		var data = {"i" : i};
        
		
		jQuery.ajax({
            
             
			url : 'details.php',
			method : "post",
			data : data,
			success : function (data) {
               
				jQuery('body').append(data);
				jQuery('#details-modal').modal('toggle');
			},
			error   : function () {
				alert("error");
				
			}
			
		});
	}
        
 

</script>

	</body>
</html>
<?php include 'footer.php';
?>
<?php
}else{header ('Location:../../index.php');}
?> 
