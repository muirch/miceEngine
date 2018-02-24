<?php
	require_once 'config.php';
	include("modules/base.php");

  $data=$conn->query("SELECT * FROM users ORDER BY firstcount DESC LIMIT 15");
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
					<?php include("includes/navigation.php"); ?>
					<table class="table table-dark" style="color:#999;background:transparent;width:800px;margin:auto;">
					  <?php if (count($data) > 15) { ?>
					  <thead>
					    <tr>
					      <th scope="col">Ник</th>
					      <th scope="col">Сыра собрано первым</th>
					      <th scope="col">Сейвов</th>
					    </tr>
					  </thead>
					  <tbody>
						<?php 
							while($row=$data->fetch_array()){
							    echo "<tr scope='row'><td>";
							    echo $row['Username'];
							    echo "</td>";
							    echo "<td>";
							    echo $row['FirstCount'];
							    echo "</td>";							    
							    echo "<td>";					    
							    echo $row['ShamanSaves']."/".$row['HardModeSaves']."/".$row['DivineModeSaves'];
							    echo "</td></tr>";
							}
						} elseif (count($data) < 15) {
							echo('<div class="post"><center><p>'.$lang["ran1"].'</p></center></div>');
						}
						?>
						</tbody>
					</table>
				<div class="foot"></div>
	      </main>
				<?php include("includes/footer.php"); ?>
	    </div>
    </div> <!-- /container -->
		<?php include("includes/scripts.php"); ?>
  </body>
</html>