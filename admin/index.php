<?php
	require 'config.php';

	if(isset($_POST['login'])) {
		$errMsg = '';

		// Get data from FORM
		$username = $_POST['username'];
		$password = $_POST['password'];

		if($username == '')
			$errMsg = 'Lütfen, geçerli bir kullanıcı adı giriniz!';
		if($password == '')
			$errMsg = 'Lütfen, geçerli bir şifre giriniz!';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT id, fullname, username, password FROM admins WHERE username = :username');
				$stmt->execute(array(
					':username' => $username
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);

				if($data == false){
					$errMsg = "Kullanıcı bulunamadı.";
				}
				else {
					if($password == $data['password']) {
						$_SESSION['name'] = $data['fullname'];
						$_SESSION['username'] = $data['username'];
						$_SESSION['password'] = $data['password'];

						header('Location: dashboard.php');
						exit;
					}
					else
						$errMsg = 'Hatalı giriş! Kullanıcı adı/şifre hatalı.';
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>

<html>
	<head>
		<title>Giriş Yap</title>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/master.css">
		<style media="screen">
			body{
				color: #fff;
			}
		</style>
	</head>
	<body>
		<div class="wrap container-fluid">
			<div>
				<div class="col-sm-3 error-message">
					<?php
						if(isset($errMsg)){
							echo $errMsg;
						}
					?>
				</div>
				<div><b></b></div>
				<div class="col-sm-4 login-form">
					<div class="yonerge-metni"><p>Kullanıcı adı ve şifreniz ile giriş yapabilirsiniz.</p></div><br>
					<form action="" method="post">
						<input type="text" name="username" placeholder="example@examle.com" value="" autocomplete="off" class="box"/><br /><br />
						<input type="password" name="password" placeholder="Şifre" value="" autocomplete="off" class="box" /><br/><br /><br>
						<input type="submit" name='login' value="GİRİŞ" class='submit'/><br />
					</form>
					<a href="forgot.php"><p>Şifremi Unuttum!</p> </a>
					<a href="register.php"><p>Yeni hesap oluştur.</p> </a>
				</div>
			</div>
		</div>
	</body>
</html>
