<?php
session_start();
require_once  '../core/init.php';

?>


<?php
if(isset($_SESSION['id_client']))
{ $qty=0;
  $total=0;
 $date=date('Y-m-d');

    $id=$_SESSION['id_client'];
 
    $nom_client=$_SESSION['nom_client'];
     $prenom_client=$_SESSION['prenom'];
      $adr_client=$_SESSION['addresse'];


    $sql="SELECT * FROM commandes WHERE id_client= '$id' AND id_listecommande = ''";
    $result = mysqli_query($db, $sql);

    
    
         $req="SELECT MAX(id_proforma) FROM proforma ";
                $resul= mysqli_query($db,$req);
                $ro = mysqli_fetch_array($resul);
                $valeur=($ro['MAX(id_proforma)']+1);/*id new liste*/
  
    
      while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  
       { 
     $sql=$db->query("insert into listeproforma (id_client,id_produit,quantity,id_proforma,prix_total,qty_boite,prix_net) values ('{$row['id_client']}','{$row['id_produit']}','{$row['qty']}','{$valeur}','{$row['total']}','{$row['qty_boit']}','{$row['prix_unite']}')");
          $total=$total+$row['total'];
          $qty=$qty+$row['qty_boit'];
           
     }

 $sql=$db->query("insert into proforma (date,quantity_total,prix_total,id_listeproforma) values ('{$date}','{$qty}','{$total}','{$valeur}')");
 

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>PROFORMA</title>
    <script type="text/javascript" src="pdf/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title></title>');
            printWindow.document.write('<link rel="stylesheet" href="printPDF.css"/>');
            printWindow.document.write('</head><body >');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>

            <link rel="stylesheet" href="printPDF.css" media="all" />
  </head>
  <body>
            <input type="button" value="Imprimer" id="btnPrint" />
								
 
 <div id="dvContainer">
      <header class="clearfix">
      <div id="logo">
        <img src="../images/lo.png">
      </div>
      <h1>DEMANDE DE PROFORMA</h1>
      <div id="company" class="clearfix">
        <div id=here>BIOPHARM</div>
        <div id=here>Antenne régionale de ventes Alger,Oued Smar</div>
        <div id=here>023851034</div>
        <div id=here>0770922742</div>
          

        <div>relations.investisseurs@biopharmdz.com</div>
      </div>
      <div id="project">
                  <div ><span>DATE:</span><font id=here><?php echo $date;?></font></div>
                          <div ><span>IDF CLIENT:</span><font id=here><?php echo $id;?></font></div>

                <div ><span>CLIENT:</span><font id=here><?php echo $nom_client.' '.$prenom_client;?></font></div>
                <div ><span>ADDRESS:</span><font id=here><?php echo $adr_client;?></font></div>
      </div>
    </header>
    <main>
      <table  border=1 frame=void rules=rows>
        <thead>
          <tr>
                    <th class="service"><b>N°</b></th>
                    <th><b>Code produit</b></th>
                    <th class="desc"><b>Désignation</b></th>
                    <th id="af"><b>Quantité</b></th>
                    <th id="af"><b>Prix unitaire</th>
                    <th colspan="2" id="af"><b>Total</b></th>
          </tr>
        </thead>
        <tbody>
      <?php  $affiche="select * from listeproforma where id_proforma='{$valeur}'";
            $donne = mysqli_query($db, $affiche);
                  $i=1;
                          while($affi = mysqli_fetch_array($donne, MYSQLI_ASSOC))  
                          {          $r="SELECT nom FROM produits where id='{$affi['id_produit']}'";

                                         $t= mysqli_query($db,$r);
                                    $w= mysqli_fetch_assoc($t);
            
            
        ?>
          <tr>
            <td style="width :5px;"class="service"><?php echo $i;?></td>
            <td class="unit"><?php echo $affi['id_produit'];?></td>
            <td class="desc"><?php echo $w['nom'];?></td>
            <td id="af" class="qty"><?php echo $affi['qty_boite'].' Boites';?></td>
             <td id="af" colspan="2" class="qty"><?php echo $affi['prix_net'].' DA';?></td>



            <td id="af" class="total"><?php echo $affi['prix_total'].' DA';?></td>
          </tr>
          
          
            <?php $i++;}?>
            
            <tr>
            <td id="af"colspan="6" class="grand total">Quantité totale</td>
            <td id="af"class="grand total"><?php echo $qty.' Boites';?></td>
          </tr>
         
          <tr>
            <td id="af"colspan="6" class="grand total">Prix total</td>
            <td id="af"class="grand total"><?php echo $total.' DA';?></td>
          </tr>
             <tr>
            <td id="af"colspan="6" class="grand total">Remise</td>
            <td id="af"class="grand total"></td>
          </tr>
            
        </tbody>
      </table>
      <div id="notices">
        <div>NOTE:</div>
        <div class="notice">-Le paiement se fait à la récupération de la commande.</div>
                  <div class="notice">-Le paiement se fait par chéque.</div>

      </div>
    </main>
           
        
    <footer>
      Cette facture proforma a été créée sur un ordinateur et est valable sans la signature et le sceau..
    </footer>
       
      </div>
       </div>
  </body>
 
    
</html>





<?php
}else{header ('Location:../index.php');}
?>