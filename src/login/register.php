<?php
	require 'config.php';

	if(isset($_POST['register'])) {
		$errMsg = '';

		// Get data from FROM
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$secretpin = $_POST['secretpin'];
		$mobile = $_POST['mobile'];

		if($fullname == '')
			$errMsg = 'Lütfen, adınızı ve soyadınız alanını boş bırakmayın!';
		if($username == '')
			$errMsg = 'Lütfen, kullanıcı adı alanını boş bırakmayın!';
		if($password == '')
			$errMsg = 'Lütfen, şifre alanını boş bırakmayın!';
		if($secretpin == '')
			$errMsg = 'Lütfen, PIN alanını boş bırakmayın!';
		if($mobile == '')
				$errMsg = 'Lütfen, cep telefonu alanını boş bırakmayın!';




		if($errMsg == ''){
			try {
				$stmt = $connect->prepare('INSERT INTO authors (fullname, username, password, secretpin, mobile)
				VALUES (:fullname, :username, :password, :secretpin, :mobile)');
				$stmt->execute(array(
					':fullname' => $fullname,
					':username' => $username,
					':password' => $password,
					':secretpin' => $secretpin,
					':mobile' => $mobile
					));
				header('Location: register.php?action=joined');
				exit;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}

	if(isset($_GET['action']) && $_GET['action'] == 'joined') {
		// $errMsg = 'Kayıt işleminiz yapıldı. Şimdi' . '<a href="index.php">' . ' GİRİŞ' . '</a> yapabilirsiniz.';
		$errMsg = "Kayıt işleminiz yapıldı. Giriş sayfasına yönlendiriliyorsunuz.";
		header("Location: index.php");
	}
?>

<html>
<head>
	<title>Hesap Oluştur</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/css/master.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
	<div class="wrap-register container-fluid">
		<div>
			<?php
				if(isset($errMsg)){
					echo $errMsg;
				}
			?>

			<div class="col-sm-6 col-xs-3 register-form">
				<div class="aciklama"><p>Yeni bir hesap oluşturmak için gerekli alanları doldurunuz.</p></div><br>
				<form action="" method="post">
					<input type="text" name="fullname" placeholder="Adınız ve soyadınız" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname'] ?>" autocomplete="off" class="box" required /><br /><br />
					<input type="text" name="username" placeholder="E-Posta" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="box" required /><br /><br />
					<input type="password" name="password" placeholder="Şifre" value="<?php if(isset($_POST['password'])) echo $_POST['password'] ?>" class="box" required /><br/><br />
					<input type="text" name="secretpin" placeholder="PIN" value="<?php if(isset($_POST['secretpin'])) echo $_POST['secretpin'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="text" name="mobile" placeholder="05XXXXXXXXX" value="<?php if(isset($_POST['secretpin'])) echo $_POST['secretpin'] ?>" autocomplete="off" class="box"/><br /><br />
					<input type="submit" name='register' value="HESAP OLUŞTUR" class='submit'/><br><br><br>
					<div class="zaten"><p>Zaten hesabın var mı?<a href="index.php"><b> GİRİŞ </b></a>yap.</p></div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
