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
    <title>Bon</title>
    <link rel="stylesheet" href="stylebon.css" media="all" />
   
  </head>
    
  <body>
 <div id="dvContainer">
    <header class="clearfix">
       
      <div id="logo">
        <img src="logo.png">
          <div ><span>S.P.A au capital de:</span><font id="here"> 500 000 000.00 DA</font></div>
                  <div ><span>R.C.N°:</span><font id="here"> 09 B 0983870 Alger</font></div>
                <div ><span>N° d'ientification statistique:</span><font id="here"> 00009 1620 02399 43</font></div>
          <div ><span>Article d'imposition:</span><font id="here"> 1620 0199323</font></div>
         

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
         <h1 style='font-family:arial;'>Bon d'enlèvement</h1>
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
                               <div><font size="3" ><b>Montant:</b></font><font size="4" ><?php echo '  '.$r2['total'].' DA';?></font></div>

            </div>
                            <div style ="margin-left:20px; font-family: Arial, sans-serif; "><font size="3" ><b>Client:</b></font><font size="4" ><?php echo '  '.$r3['nom_client'].'  '.$r3['prenom'];?></font></div>

                <div style ="margin-left:20px; font-family: Arial, sans-serif; "><font size="3" ><b>Adresse:</b></font><font size="4" ><?php echo '  '.$r3['addresse'];?></font></div>
                <div style ="margin-left:20px; font-family: Arial, sans-serif; "><font size="3" ><b>Code client:</b></font><font size="4" ><?php echo '  '.$r2['id_client'];?></font></div>
            
            
               <?php $last=$db->query("select * from bon_enlevement where id_cmd ='{$r['id_listecommande']}'");
            $rrr=mysqli_fetch_array($last);
            
            
            ?>
            <div style ="margin-left:20px; font-family: Arial, sans-serif; "><font size="3" ><b>Bon N°:</b></font><font size="4" ><?php echo '  '.$rrr['id_bon'];?></font></div>
            <div style ="margin-left:20px; font-family: Arial, sans-serif; "><font size="3" ><b>Nom agent :</b></font><font size="4" ><?php echo '  '.$rrr['agent'];?></font></div>
            
           
            </div>
           

        </div>
    </div>
    <div class="panel-footer">
        <div class="tr">
           
   

        </div>
    </div>

        
        
        
<br>

 <table  border=1 frame=void rules=rows>
        <thead>
         
          <tr>
                    <th ><b>Code<br>produit</b></th>
                    <th class="desc"style='text-align:center;'><b>Désignation</b></th>
                    <th id="af"><b>Quantité<br>boites</b></th>
                                  <th id="af"><b>Colisage</b></th>
                    <th   colspan="3" id="af"><b>Nb.cartons</th>
          </tr>
        </thead>
        <tbody>
     
                <?php  $affiche="select * from commandes where id_listecommande='{$m}'";
            $donne = mysqli_query($db, $affiche);
                 
                          while($affi = mysqli_fetch_array($donne, MYSQLI_ASSOC))  
                          {          $r="SELECT nom,quantity_par_carton FROM produits where id='{$affi['id_produit']}'";

                                         $t= mysqli_query($db,$r);
                                    $w= mysqli_fetch_assoc($t);
            
            
        ?>
          <tr>
            <td class="desc" style='text-align:center;font-size:16px;'><?php echo $affi['id_produit'];?></td>
            <td class="desc" style='text-align:center;font-size:16px;'><?php echo $w['nom'];?></td>
          <td class="desc" style='text-align:center;font-size:16px;'><?php echo $affi['qty_boit'].' Boites';?></td>

            <td id="af" class="qty" style='text-align:center;font-size:16px;'><?php echo $w['quantity_par_carton'];?></td>
             <td id="af" colspan="3" class="qty" style='text-align:center;font-size:16px;'><?php echo $affi['qty'].' C';?></td>



          </tr>
                      <?php }?>

          
      
            
           
         
        
            
        </tbody>
      </table>

        
  
    
      
    </main>
   <footer>
     Siége social:Haouch Mahiédine,lot N°18,Section N°5,Réghaia,Alger-Algerie Fax:(+213)023 85 10 27</br>Email:distribution@biopharmdz.com/site :www.biopharm.com
    </footer>
</div>
  </body>
</html>
<?php }else{header ('Location:../index.php');} ?>
