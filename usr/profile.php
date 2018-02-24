<?php
	ob_start();
	session_start();
	require_once '../config.php';
	checkSession();
	selectData();
		
	$curpass = trim($_POST['curpassword']);
	$curpass = strip_tags($curpass);
	$curpass = htmlspecialchars($curpass);

	$newpassword = trim($_POST['newpassword']);
	$newpassword = strip_tags($newpassword);
	$newpassword = htmlspecialchars($newpassword);

	$repnewpassword = trim($_POST['repnewpassword']);
	$repnewpassword = strip_tags($repnewpassword);
	$repnewpassword = htmlspecialchars($repnewpassword);

	$newemail = trim($_POST['email']);
	$newemail = strip_tags($newemail);
	$newemail = htmlspecialchars($newemail);

	$repnewemail = trim($_POST['repemail']);
	$repnewemail = strip_tags($repnewemail);
	$repnewemail = htmlspecialchars($repnewemail);

	if (isset($_POST['changepass'])){
		$curpass = base64_encode(hash('sha256', hash('sha256', $curpass)."\xf7\x1a\xa6\xde\x8f\x17v\xa8\x03\x9d2\xb8\xa1V\xb2\xa9>\xddC\x9d\xc5\xdd\xceV\xd3\xb7\xa4\x05J\r\x08\xb0", true)); // password hashing using SHA256+SHA256
		if ($userRow['Password']==$curpass and $newpassword==$repnewpassword){
			$newpassword = base64_encode(hash('sha256', hash('sha256', $newpassword)."\xf7\x1a\xa6\xde\x8f\x17v\xa8\x03\x9d2\xb8\xa1V\xb2\xa9>\xddC\x9d\xc5\xdd\xceV\xd3\xb7\xa4\x05J\r\x08\xb0", true));
			$conn->query("UPDATE users SET Password='$newpassword' WHERE Username='$userRow[Username]'");
		} elseif ($userRow['Password']!=$curpass or $newpassword!=$repnewpassword or $userRow['Password']!=$curpass and $newpassword!=$repnewpassword){
			header("Location: http://sensou.me/usr/profile?err");
		}
	}

	if (isset($_POST['changemail'])){
		if ($userRow['Email']=="" and $newemail==$repnewemail){
			$conn->query("UPDATE users SET Email='$newemail' WHERE Username='$userRow[Username]'");
			header("Location: http://sensou.me/usr/profile");
		} elseif ($userRow['Password']!=$curpass or $newpassword!=$repnewpassword or $userRow['Password']!=$curpass and $newpassword!=$repnewpassword){
			header("Location: http://sensou.me/usr/profile?err");
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
						<nav class="navbar navbar-expand-lg mice" id="usernav" style="background:transparent;">
						  <div class="navbar-collapse">
						    <ul class="navbar-nav mr-auto">
						      <li class="nav-item">
						        <a class="nav-link" href="<?=$siteLink?>/usr/profile">Настройки</a>
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="<?=$siteLink?>/stats?name=<?=$userRow['Username'];?>">Моя статистика</a>
						      </li>
						    </ul>
						  </div>
						</nav>    		
	      		<div class="post">
							<article style="color:#999">
								<h1>Настройки</h1>
								<?php if($userRow['Email']!="") { ?>
								Ваш ID: <?php echo $userRow['PlayerID'] ?><br/>
								Ваш e-mail: <?php echo $userRow['Email'] ?>
								<?php } else { ?>
						    <form class="form" method="post">
						      <h2>Задать e-mail для восстановления доступа</h2>
								  <div class="form-row align-items-center" style="margin-bottom:16px;">
								    <div class="col-auto">
								      <input type="text" class="form-control mb-2 mb-sm-1" name="email" placeholder="example@mail.com" required autofocus>
								      <input type="text" class="form-control mb-2 mb-sm-1" name="repemail" placeholder="Введите e-mail еще раз" required autofocus>
								    </div>
								    <div class="col-auto">
								      <button id="subButt" type="submit" name="changemail" class="btn mb-2 mb-sm-1">Отправить</button>
								    </div>
								  </div>
						    </form>
								<?php } ?>
						    <form class="form" method="post">
						      <h2>Сменить пароль</h2>
								  <div class="form-row align-items-center" style="margin-bottom:16px;">
								    <div class="col-auto">
								      <input type="password" class="form-control mb-2 mb-sm-1" name="curpassword" placeholder="Текущий пароль" required autofocus>
								      <input type="password" class="form-control mb-2 mb-sm-1" name="newpassword" placeholder="Новый пароль" required autofocus>
								      <input type="password" class="form-control mb-2 mb-sm-1" name="repnewpassword" placeholder="Повторите новый пароль" required autofocus>
								    </div>
								    <div class="col-auto">
								      <button id="subButt" type="submit" name="changepass" class="btn mb-2 mb-sm-1">Отправить</button>
								    </div>
								  </div>
						    </form>
						    <?php if(isset($_GET['err'])) echo "<h4 style='color:red !important'>Ошибка! Проверьте правильность введенных данных.</h4>" ?>
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