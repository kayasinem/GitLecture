<?php
	require 'config.php';

	if(isset($_POST['forgotpass'])) {
		$errMsg = '';

		// Getting data from FROM
		$secretpin = $_POST['secretpin'];

		if(empty($secretpin))
			$errMsg = 'Lütfen! parolanıza ait hatırlatma PIN bilgisini giriniz.';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT password, secretpin FROM pdo WHERE secretpin = :secretpin');
				$stmt->execute(array(
					':secretpin' => $secretpin
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				if($secretpin == $data['secretpin']) {
					$viewpass = 'Parolanız: ' . $data['password'] . '<br><a href="login.php">Şimdi giriş yapın.</a>';
				}
				else {
					$errMsg = 'Girilen PIN eşleşmedi.';
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>

<html>
<head><title>Şifremi Unuttum</title></head>
<body>
	<div>
		<div>
			<?php
				if(isset($errMsg)){
					echo $errMsg;
				}
			?>
			<div><b>Şifremi Unuttum</b></div>
			<?php
				if(isset($viewpass)){
					echo $viewpass;
				}
			?>
			<div>
				<form>
					<input type="text" name="secretpin" placeholder="Secret Pin" autocomplete="off" class="box"/><br /><br />
					<input type="submit" name='forgotpass' value="Kontrol Et" class='submit'/><br />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
