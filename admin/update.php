<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');

	if(isset($_POST['update'])) {
		$errMsg = '';

		// Getting data from FROM
		$fullname = $_POST['fullname'];
		$secretpin = $_POST['secretpin'];
		$password = $_POST['password'];
		$passwordVarify = $_POST['passwordVarify'];

		if($password != $passwordVarify)
			$errMsg = 'Hata: Şifre bilgisini kontrol ediniz.';

		if($errMsg == '') {
			try {
		      $sql = "UPDATE authors SET fullname = :fullname, password = :password, secretpin = :secretpin WHERE username = :username";
		      $stmt = $connect->prepare($sql);
		      $stmt->execute(array(
		        ':fullname' => $fullname,
		        ':secretpin' => $secretpin,
		        ':password' => $password,
		        ':username' => $_SESSION['username']
		      ));
				header('Location: update.php?action=updated');
				exit;

			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'updated')
		$errMsg = 'Bilgi güncellemesi başarılı: <a href="logout.php">Çıkış</a> yapıp tekrar giriş yapınız.';
?>

<html>
<head>
	<title>Güncelle</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="assets/css/master.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/customer-nav.css">
</head>
<body>

	<?php include 'admin-dash-header.php'; ?>
			<?php
				if(isset($errMsg)){
					echo $errMsg;
				}
			?>
			<div class="col-sm-10 dash-wrap">
                <?php include "nav.html"; ?>

				<div align="center" class="col-sm-8 user-information">
					<h4>Bilgi Güncelle</h4>
					<form class="update-form" action="" method="post">
						Ad ve Soyad <br>
						<input type="text" name="fullname" value="<?php echo $_SESSION['name']; ?>" autocomplete="off" class="box"/><br /><br />
						Kullanıcı Adı <br>
						<input type="text" name="username" value="<?php echo $_SESSION['username']; ?>" disabled autocomplete="off" class="box"/><br /><br />

						Şifre <br>
						<input type="password" name="password" value="<?php echo $_SESSION['password'] ?>" class="box" /><br/><br />
						Şifre <br>
						<input type="password" name="passwordVarify" value="<?php echo $_SESSION['password'] ?>" class="box" /><br/><br />
						<input type="submit" name='update' value="GÜNCELLE" class='submit'/><br />
					</form>
				</div>
			</div>
	<div>

	</div>
</body>
</html>
