<?php
session_start();


require_once  '../core/init.php';
include 'includes/head.php';
include 'includes/nav.php';

?>

<?php
if(isset($_SESSION['id_client']))
{
$id=$_SESSION['id_client'];
$nom=$_SESSION['nom_client'];
$prenom=$_SESSION['prenom'];
$mail=$_SESSION['mail'];
$date = date('Y-m-d H:i:s');

if(isset($_POST['send']))
{
    $msg=htmlspecialchars($_POST['message']);
    if(isset($_POST['obj']))
{
    

$obj=htmlspecialchars($_POST['obj']);
       
        
    
 
    $sqlreq=$db->query("select gest from client where id_client ='$id' ");
    $row = mysqli_fetch_array($sqlreq);

        
    if($row['gest']==''){
        
         $sql=$db->query("INSERT into messagerie (message,expediteur,date_envoie,objet,destinateur,vers) Values   ('{$msg}','{$id}','{$date}','{$obj}','admin','vers1')");
    
            $sql=$db->query("INSERT into messagerie (message,expediteur,date_envoie,objet,destinateur,vers) Values   ('{$msg}','{$id}','{$date}','{$obj}','admin','vers2')");
        
        
        }else{
    $sql=$db->query("INSERT into messagerie (message,expediteur,date_envoie,objet,destinateur,vers) Values   ('{$msg}','{$id}','{$date}','{$obj}','{$row['gest']}','vers1')");
    
            $sql=$db->query("INSERT into messagerie (message,expediteur,date_envoie,objet,destinateur,vers) Values   ('{$msg}','{$id}','{$date}','{$obj}','{$row['gest']}','vers2')");

}
                header('Location:confirmation.php');

}else {echo 'Donner un objet a votre message';}
   
}

?>


    <div class="row profile">
				<?php
include 'sidebar.php';

?>
                     <!-- ----------------------------------------------------------------------------------------------------->
                                           
                                           
                                            <div class="col-md-9 order-content">
          
                                <div class="form_main col-md-4 col-sm-5 col-xs-7">
      
                                        <h2>Messages envoyés</h2>
                                     
                                    <hr>
                                    
                                                                        
<div style="width:394px;"class="container">                                
<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    
    
     
    
    <ul class="nav navbar-nav">
      <li><a class="navbar-brand"  data-transition ="slide" href="contact.php">&nbsp;&nbsp;&nbsp;Messages reçus</a></li>
            <li class="active"><a class="navbar-brand"  data-transition ="slide" href="contacte.php">Messages envoyés</a></li>

    </ul>
  
    
      
        
    </nav>
    
 </div>                       
                                    
                                    
                                    
                                  
                                    
                                    <?php              
                            
                            $sq="SELECT * FROM messagerie WHERE expediteur= '$id' and vers='vers1'";
                                $resu = mysqli_query($db, $sq);
                                              
                               
                                    ?>
                                    <div style =" border: solid 1px grey; overflow: auto; width :100%;height:250px;" id="container"> 
                                    <div class="list-group chat-user-list">
                                        <table class="table table-inbox table-hover">
                            <tbody>
                                <div id="'#page-1'">
                           <?php      while($row = mysqli_fetch_array($resu, MYSQLI_ASSOC))  
                                        {
                                ?>
                                
                                
                                
                                 <tr class="unread">
                                  
         <td style="background-color:;"class="inbox-small-cells"><i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;<label>Objet:</label></td>
                                 
                                  <td width="500px"class="view-message "><span class="teaser"><?php echo $row['objet'];?></span>

<span class="complete"></span>

<span class="more"></span></td>
                             
                                     
                               <td class="view-message  text-right"><button  onclick="voir(<?php echo $row['id_msg'];?>)" data-toggle="modal" id="sup"type="button"class="btn btn-info  btn-sm" data-target="#modalvoir" ><i class="glyphicon glyphicon-eye-open"></i> Voir</button></td>
                                        
                                     <td class="view-message  text-right"><button onclick="delet(<?php echo $row['id_msg'];?>)"  data-toggle="modal" id="sup"type="button"class="btn btn-danger btn-sm" data-target="#modaldelete" ><i class="glyphicon glyphicon-remove"></i> Supprimer</button></td>
                                     
                                     
                                     <td class="view-message  text-right"><?php echo $row['date_envoie'];?></td>
                              </tr>
                                    
                                <?php }?>
                             </div>
                                
                                
                                
                                
                                
                                
                                
                                
                          </tbody>
                                            

                          </table>
                                    </div>
                                    
                                    
                                    </div>
   <br>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
         <!--=================================form for sending msg=======================================-->
		
            <div style="background-color: #e3f2fd;" class="panel panel-default">
                
                <div class="panel-body">                
                    <form accept-charset="UTF-8" name="chatform"action="" method="POST">
                        
                         <div class="form-group">
						<label class="control-label col-sm-2 col-xs-5" for="CP">Objet:</label><div class="col-sm-10 col-xs-7"><input required="" class="form-control" placeholder="Enter l'objet" maxlength="65"name="obj" type="text"
                                     value="">
													</div><br><br>
					</div>
                  
                  
                        <textarea required="" class="form-control counted" name="message" id="message" placeholder="Taper votre message" rows="5" style="margin-bottom:10px; " value="<?php if(isset($msg)){echo $msg;}?>"></textarea>
                        
                        <h6 class="pull-right" id="counter">320 caractères restant</h6>
                        <button onClick="clearField();"name="send" class="btn btn-info" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
                                    
                                    
                                    
                                    
                                </div>
            
                            </div>
		
		
	</div>


    
                    
                    
                    
                    
                    
                   
                   <!-- modal voir-->
                                      
<div data-backdrop="static" id="modalvoir" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 align="center"class="modal-title">Message</h4>
      </div>
      <div class="modal-body">
      <font size="4"><p  align="center"><span id="success_message" ></span> </p></font>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" value="Refresh Page" data-dismiss="modal" onClick="closeModal()">Fermer</button>
      </div>
    </div>

  </div>
</div>
                    
                    
                    <!-- modal supp-->
                                      
                                      
                                                                                           
<div data-backdrop="static" id="modaldelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 align="center"class="modal-title">Supprimer</h4>
      </div>
      <div class="modal-body">
      <font size="4">  <p align="center"><span id="success_message1" class="text-success" ></span> </p></font>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" value="Refresh Page" onClick="window.location.reload()">Fermer</button>
      </div>
    </div>

  </div>
</div>
                    
                    
                    
                    
                    
                     
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
             
                    
                    
                    
                    
                    
                    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jiquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<script>
    
    
    
    
    
    
      /*supprimer bouton*/                  
  function  delet(id_msg)  {
  
  var data = {"id_msg":id_msg};
        
		
		jQuery.ajax({
            
             
			url : 'delete2.php',
			method : "post",
			data : data,
			success : function (data) {
               
				$('#success_message1').fadeIn().html(data);
			
			},
			error   : function () {
				alert("error");	
			}
		});

  }         
    
    
    
    
    
    
    
    
    
function clearField() {
document.getElementById("chatform").reset();
}
    
    
    
    
    
    (function($) {
    /**
	 * attaches a character counter to each textarea element in the jQuery object
	 * usage: $("#myTextArea").charCounter(max, settings);
	 */
	
	$.fn.charCounter = function (max, settings) {
		max = max || 100;
		settings = $.extend({
			container: "<span></span>",
			classname: "charcounter",
			format: "(%1 characters remaining)",
			pulse: true,
			delay: 0
		}, settings);
		var p, timeout;
		
		function count(el, container) {
			el = $(el);
			if (el.val().length > max) {
			    el.val(el.val().substring(0, max));
			    if (settings.pulse && !p) {
			    	pulse(container, true);
			    };
			};
			if (settings.delay > 0) {
				if (timeout) {
					window.clearTimeout(timeout);
				}
				timeout = window.setTimeout(function () {
					container.html(settings.format.replace(/%1/, (max - el.val().length)));
				}, settings.delay);
			} else {
				container.html(settings.format.replace(/%1/, (max - el.val().length)));
			}
		};
		
		function pulse(el, again) {
			if (p) {
				window.clearTimeout(p);
				p = null;
			};
			el.animate({ opacity: 0.1 }, 100, function () {
				$(this).animate({ opacity: 1.0 }, 100);
			});
			if (again) {
				p = window.setTimeout(function () { pulse(el) }, 200);
			};
		};
		
		return this.each(function () {
			var container;
			if (!settings.container.match(/^<.+>$/)) {
				// use existing element to hold counter message
				container = $(settings.container);
			} else {
				// append element to hold counter message (clean up old element first)
				$(this).next("." + settings.classname).remove();
				container = $(settings.container)
								.insertAfter(this)
								.addClass(settings.classname);
			}
			$(this)
				.unbind(".charCounter")
				.bind("keydown.charCounter", function () { count(this, container); })
				.bind("keypress.charCounter", function () { count(this, container); })
				.bind("keyup.charCounter", function () { count(this, container); })
				.bind("focus.charCounter", function () { count(this, container); })
				.bind("mouseover.charCounter", function () { count(this, container); })
				.bind("mouseout.charCounter", function () { count(this, container); })
				.bind("paste.charCounter", function () { 
					var me = this;
					setTimeout(function () { count(me, container); }, 10);
				});
			if (this.addEventListener) {
				this.addEventListener('input', function () { count(this, container); }, false);
			};
			count(this, container);
		});
	};

})(jQuery);

$(function() {
    $(".counted").charCounter(320,{container: "#counter"});
});
    
    
    /*hide*/
    $(".more").toggle(function(){
    $(this).text("less..").siblings(".complete").show();    
}, function(){
    $(this).text("more..").siblings(".complete").hide();    
});

    
    
    
    
    
    
    
    
    
    
    
    
    
     function closeModal(){
  jQuery('#modalvoir').modal('hide');
  setTimeout(function(){
   jQuery('#modalvoir').remove();
   jQuery('modal-backdrop').remove();
  },500);
 }
    
    
    
    
    /*voir fct*/
    
    
    function  voir(id_msg)  {
  
  var data = {"id_msg":id_msg};
        
		
		jQuery.ajax({
            
             
			url : 'voir2.php',
			method : "post",
			data : data,
			success : function (data) {
               
				$('#success_message').fadeIn().html(data);
			
			},
			error   : function () {
				alert("error");	
			}
		});

  }         


</script>

                   
<?php

include 'includes/footer.php';


?>
<?php
}else{header ('Location:../index.php');}
?>