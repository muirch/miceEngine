<?php
	require_once 'config.php';
  $data=$conn->query("SELECT * FROM news ORDER BY id DESC LIMIT 5");
?>
<!DOCTYPE html>
<html>
<?php include("includes/header.php"); ?>
 <body>
 		<?php include("includes/maintenance.php"); ?>
		<?php include("includes/adm-nav.php"); ?>
    <div class="container">
	 		<div class="content">
	      <main id="main">
	      	<div class="head"></div>
					<div class="jeu" style="width:800px;height:600px;margin-left:16px;">
						<div id="transformice" class="inner" style="width:100%;height:100%;">
							<object id="swf1" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="100%" height="100%" id="Transformice" align="middle">
								<param name="allowScriptAccess" value="always" />
								<param name="menu" value="true" />
								<param name="quality" value="high" />
								<param name="bgcolor" value="#6A7495" />
								<embed id="swf2" src="//cdn.sensou.me/Transformice.swf" wmode="direct" menu="true" quality="high" bgcolor="#6A7495" width="100%" height="100%" name="Transformice" align="middle" swLiveConnect="true" allowFullScreen="true" allowScriptAccess="always" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
							</object>				
						</div>
					</div>
					<div class="foot"></div>
					<?php include("includes/navigation.php"); ?>
	      </main>
	      <section id="second">
			    <?php while($row=$data->fetch_assoc()) { ?>
		      <div class="post col"">
		         <h1><a href="post.php?id=<?=$row['id']?>"><?=$row['title'];?></a></h1>
		         <img src="https://i.imgur.com/7fyZPKh.jpg" alt="usr img" class="pull-left img-responsive thumb margin10 img-thumbnail">
		         <em><a href="stats?name=<?=$row['byName'];?>"><?=$row['byName'];?></a></em> <span style="color:#999;font-size:12px;">- <?=$row['date'];?></span>
		         <article>
			         	<p>
			             <?=$row['news'];?>
			          </p>
		          </article>
		     	</div>
			    <?php } ?>
		     	<div class="foot"></div>
	     	</section>
	     	<?php include("includes/footer.php"); ?>
	    </div>
    </div> <!-- /container -->

	<script type="text/javascript">
		var langue = navigator.language;
	  if (!langue) {
	    langue = navigator.browserLanguage;
	  }
	  langue = langue.substr(0, 2);
		
		function positionMolette(X, Y) {
		}
		function activerMolette(OUI, HAUT) {
		}
		
		function recupLangue() {
			return langue;
		}
		
		function pleinEcran(OUI) {
			if (OUI) {
				document.getElementById("transformice").style.position="fixed";
				document.getElementById("transformice").style.left="0";
				document.getElementById("transformice").style.top="0";
				document.getElementById("transformice").style.width="100%";
				document.getElementById("transformice").style.height="100%";
				document.getElementById("second").style.display="none";
				document.getElementById("usernav").style.display="none";
				document.getElementById("google-ad").style.display="none";
				document.getElementById("navbar").style.display="none";
			} else {
				document.getElementById("transformice").style.position="static";
				document.getElementById("transformice").style.width="800px";
	      document.getElementById("transformice").style.height="600px";
				document.getElementById("second").style.display="block";
				document.getElementById("usernav").style.display="block";
				document.getElementById("google-ad").style.display="block";
				document.getElementById("navbar").style.display="block";
			}
		}
		
		function cancelEvent(e) {
			if (navigator.userAgent.indexOf("hrome") != -1) {
				document.getElementById("swf2").x_moletteTransformice(e.wheelDelta);
			}
			e = e ? e : window.event;
			if(e.stopPropagation)
				e.stopPropagation();
			if(e.preventDefault)
				e.preventDefault();
				e.cancelBubble = true;
				e.cancel = true;
				e.returnValue = false;
			return false;
		}
	  
	  function hookEvent(element, eventName, callback) {
			if (element.addEventListener) {
	      if (eventName == 'mousewheel') {
					element.addEventListener('DOMMouseScroll', callback, false);
				}
			element.addEventListener(eventName, callback, false);
	    } else if (element.attachEvent) {
					element.attachEvent("on" + eventName, callback);
	      }
		}
	</script>
	<?php include("includes/scripts.php"); ?>
  </body>
</html>