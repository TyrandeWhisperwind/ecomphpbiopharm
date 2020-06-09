<?php
session_start();
include('../inc/config.php');

if(isset($_SESSION['id_gest']))
{
$m=$_GET['id'];?>


<!DOCTYPE html>
<html lang="en">
  <head>
      
      
         <script type="text/javascript" src="pdf/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title></title>');
            printWindow.document.write('<link rel="stylesheet" href="style.css"/>');
            printWindow.document.write('</head><body >');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
            <input type="button" value="Imprimer" id="btnPrint" />



    <meta charset="utf-8">
    <title>Facture</title>
    <link rel="stylesheet" href="style.css" media="all" />
   
  </head>
    
  <body>
 <div id="dvContainer">
    <header class="clearfix">
       
      <div id="logo">
        <img src="logo.png">
          <div ><span>S.P.A au capital de:</span><font id="here"> 500 000 000.00 DA</font></div>
                  <div ><span>R.C.N°:</span><font id="here"> 09 B 0983870 Alger</font></div>
                <div ><span>N° d'ientification statistique:</span><font id="here"> 00009 1620 02399 43</font></div>
                <div ><span>Compte bancaire:</span><font id="here"> BNP PARIBAS 08 Rue de citra, Hydra Alger</font></div>
          <div ><span>RIB N°:</span><font id="here"> 027 00700 000 2884 00 126  &nbsp;&nbsp; CCP N°: 007999990000391595 01</font></div>
         

      </div>
  
      <div id="company">
         <table style="margin-top:20px;" border="1px">
        
              

 <tr><td width="100%" >
        
        <div align='left'>Antenne régionale de ventes Alger,Oued Smar</div>
        <div align='left' >16000,Alger</div>
        <div align='left'><i>Tél:023851011</i></div>
        <div  align='left'><i>Fax:023851023</i></div>
      </td></tr>
    </table>

      </div>
   
    </header>
    <main>
         <h1 style='font-family:arial;'>Facture</h1>
   <div class="panel panel-default panel-table">
    <div class="panel-heading">
        <div class="tr">
           
   
        </div>
    </div>
       
       <?php 
       $req="SELECT * FROM facture where id_listecommande='$m'";
                              $re = mysqli_query($db, $req);
                              $r = mysqli_fetch_array($re, MYSQLI_ASSOC);
     $req2="SELECT * FROM listecommande where id_listecommande='$m'";
                              $re2 = mysqli_query($db, $req2);
                              $r2 = mysqli_fetch_array($re2, MYSQLI_ASSOC);
    
     $req3="SELECT * FROM client where id_client='{$r2['id_client']}'";
                              $re3 = mysqli_query($db, $req3);
                              $r3 = mysqli_fetch_array($re3, MYSQLI_ASSOC);
       

       ?>
    <div class="panel-body">
        <div class="tr"     style="    display: table-row;">
            <div  style="width:300px;    font-family: Arial, sans-serif;    display: table-cell;
    padding: 15px;
    border: 1px solid #ddd;
    border-top: none;
    border-left: none;
    border-bottom: none;"class="td"><div ><font size="3" ><b>Facture N°:</b></font><font size="4" ><?php echo '  '.$r['id_facture'];?></font></div>
                <div><font size="3" ><b>Date:</b></font><font size="4" ><?php echo '  '.$r['date_facturation'];?></font></div>
               <div><font size="3" ><b>Réf:</b></font><font size="4" ><?php echo '  '.$r['id_listecommande'];?></font></div>
            </div>
            
                <div style ="margin-left:20px; font-family: Arial, sans-serif; "><font size="3" ><b>Adresse:</b></font><font size="4" ><?php echo '  '.$r3['addresse'];?></font></div>
                <div style ="margin-left:20px; font-family: Arial, sans-serif; "><font size="3" ><b>Code client:</b></font><font size="4" ><?php echo '  '.$r2['id_client'];?></font></div>
              <div style ="margin-left:20px; font-family: Arial, sans-serif; " ><font size="3" ><b>N° d'identification statistique:</b></font><font size="4" ><?php echo '  '.$r3['st'];?></font></div>
             <div style ="margin-left:20px; font-family: Arial, sans-serif; " ><font size="3" ><b>Date livraison:</b></font><font size="4" ><?php echo '  '.$r2['date_livraison'];?></font></div>
            
            </div>
           

        </div>
    </div>
    <div class="panel-footer">
        <div class="tr">
           
   

        </div>
    </div>

        
        
        
<br>

<table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no" style='font-size:16px;'><b>Code<br>produit</th>
            <th class="desc" style='font-size:16px;'><b>Désignation</b></th>
            <th class="unit" style='font-size:16px;'><b>Quantité</b></th>
            <th class="qty" style='font-size:16px;'><b>Prix unitaire</b></th>
            <th class="total" style='font-size:16px;'><b>Total</b></th>
          </tr>
                  
        </thead>
        <tbody>
            <?php  $affiche="select * from commandes where id_listecommande='{$m}'";
            $donne = mysqli_query($db, $affiche);
              
                          while($affi = mysqli_fetch_array($donne, MYSQLI_ASSOC))  
                          {          $r="SELECT nom FROM produits where id='{$affi['id_produit']}'";

                                         $t= mysqli_query($db,$r);
                                    $w= mysqli_fetch_assoc($t);
            
            
        ?>
          <tr>
            <td class="no" style='text-align:center;font-size:15px;'><?php echo $affi['id_produit'];?></td>
            <td class="desc"><?php echo $w['nom'];?></td>
            <td class="unit"  style="text-align:center; font-size:14px;"><?php echo $affi['qty_boit'].' Boites';?></td>
            <td class="qty"  style="text-align:center; font-size:14px;"><?php echo $affi['prix_unite'].' DA';?></td>
            <td class="total" style="text-align:center; font-size:14px;"><?php echo $affi['total'].' DA';?></td>
          </tr>
            <?php }?>
        </tbody>
      <tfoot>
            
            <tr>
            <td colspan="2"></td>
            <td colspan="2"><b>Total:</b></td>
            <td><?php echo $r2['total'].' DA';?></td>
          </tr>
          <tr>
                 <?php if($r2['total']>= 100000){$ffs=($r2['total']*2)/100; }else{ $ffs = 0;}?>
            <td colspan="2"></td>
            <td colspan="2"><b>Remise:</b></td>
            <td><?php echo $ffs.' DA';?></td>
          </tr>
         <tr>
          
            <td colspan="2"></td>
            <td colspan="2"><b>Total:</b></td>
            <td><?php echo $r2['total']-$ffs.' DA';?></td>
          </tr>
        </tfoot>
      </table>

        
  
    
      
    </main>
   <footer>
     Siége social:Haouch Mahiédine,lot N°18,Section N°5,Réghaia,Alger-Algerie Fax:(+213)023 85 10 27</br>Email:distribution@biopharmdz.com/site :www.biopharm.com
    </footer>
</div>
  </body>
</html>
<?php }else{header ('Location:../index.php');} ?>
