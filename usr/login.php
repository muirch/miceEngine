<?php
	ob_start();
	session_start();
	require_once '../config.php';

	$name = trim($_POST['username']);
	$name = strip_tags($name);
	$name = htmlspecialchars($name);
		
	$pass = trim($_POST['password']);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);	

	if(isset($_SESSION['admin']) or isset($_SESSION['user'])){
		header("Location: index"); 
	}

	if(isset($_POST['sub'])) {	
		$password = base64_encode(hash('sha256', hash('sha256', $pass)."\xf7\x1a\xa6\xde\x8f\x17v\xa8\x03\x9d2\xb8\xa1V\xb2\xa9>\xddC\x9d\xc5\xdd\xceV\xd3\xb7\xa4\x05J\r\x08\xb0", true)); // password hashing using SHA256+SHA256				
		$res=$conn->query("SELECT * FROM users WHERE Username='$name'");
		$row=$res->fetch_array();
		$count=$res->num_rows; // if uname/pass correct it returns must be 1 row				
		echo $password;
		if( $count == 1 && $row['Password']==$password && $row['PrivLevel'] == 12) {
			$_SESSION['admin'] = $row['PlayerID'];
			header("Location: http://sensou.me/panel/index");
		} elseif( $count == 1 && $row['Password']==$password && $row['PrivLevel'] < 12) {
			$_SESSION['user'] = $row['PlayerID'];
			header("Location: http://sensou.me/index"); 
		} else {
			header("Location: http://sensou.me/usr/login?err");
		}
	}

?>

<!DOCTYPE html>
<html>
<?php include("../includes/header.php"); ?>
 	<body>
 		<?php include("../includes/maintenance.php"); ?>
		<?php include("../includes/adm-nav.php"); ?>
    <div class="container">
	 		<div class="content">
	      <main id="main">
	      	<div class="head"></div>
					<?php include("../includes/navigation.php"); ?>  		
	      		<div class="post">
							<article class="container">
						    <form class="form content" method="post">
						      <h1>Авторизация</h1>
								  <div class="form-row align-items-center" style="margin-bottom:16px;">
								    <div class="col-auto">
								    	<?php if(isset($_GET['err'])) echo "<h4 style='color:red !important'>Данные не верны!</h4>" ?>
								      <input type="username" class="form-control mb-2 mb-sm-1" name="username" placeholder="Логин" required autofocus>
								      <input type="password" class="form-control mb-2 mb-sm-1" name="password" placeholder="Пароль" required autofocus>
								    	<button id="subButt" type="submit" name="sub" class="btn mb-2 mb-sm-1">Войти</button>
								    </div>
								  </div>
						    </form>
							</article>
	          </div>
					<div class="foot"></div>
	      </main>
				<?php include("../includes/footer.php"); ?>
	    </div>
    </div> <!-- /container -->
		<?php include("../includes/scripts.php"); ?>
  </body>
</html>