<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: index.php');
?>

<html>
<head>
	<title>GameLand | <?php echo $_SESSION['name']; ?></title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="assets/css/master.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/customer-nav.css">
	<style media="screen">

	</style>
</head>
<body>
	<?php include 'cust-dash-header.php'; ?>
			<?php
				if(isset($errMsg)){
					echo $errMsg;
				}
			?>
			<div class="col-sm-10 dash-wrap">
                <?php include "nav.html"; ?>

				<div class="col-sm-8 user-information">
					<h4>Kişisel Bilgiler</h4>
					<?php
					// verileri çekme başlangıcı
					try {
						$sorgu = $connect -> query("SELECT fullname, username, mobile FROM authors WHERE username = '$_SESSION[username]' ");
						$cikti = $sorgu -> fetch(PDO::FETCH_ASSOC);

						echo "Ad-soyad: ".$cikti["fullname"]."<br>".
									"E-posta: ".$cikti["username"]."<br>".
									"Cep: ".$cikti["mobile"]."<br>";
					}
					catch (PDOException $e) {
						die($e->getMessage());
					}


					// verileri çekme sonu

					 ?>


				</div>
			</div>



</body>
</html>
