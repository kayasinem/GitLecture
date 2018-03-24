<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: index.php');
?>
<html>
<head>
	<title>Firma İsmi | <?php echo $_SESSION['name']; ?></title>
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
				<!-- begin request history -->
				<div class="col-sm-8 user-information">
					<h4>Yeni İçerik Ekle</h4>
					<?php
					// verileri çekme başlangıcı
					try {
						$sorgu = $connect -> query("SELECT fullname FROM authors WHERE username = '$_SESSION[username]' ");
						$cikti = $sorgu -> fetch(PDO::FETCH_ASSOC);

						 $yazarAdi = $cikti["fullname"];
					}
					catch (PDOException $e) {
						die($e->getMessage());
					}
					// verileri çekme sonu
					 ?>
					 <hr>
				</div>>

				<!-- begin new article -->
				<div align="center" class="col-sm-8 user-information">
					<form class="request-form" action="add-article.php" method="post">
						<input type="text" name="title" placeholder="Başlık" autocomplete="off" class="box" required /><br /><br />
						<input type="text" name="category_id" placeholder="Kategori" autocomplete="off" class="box" required /><br /><br />
                        <textarea name="content" placeholder="İçerik" class="content" required rows="50" cols="40"></textarea>
						<input type="text" name="author" placeholder="" value="<?php echo $yazarAdi; ?>" autocomplete="off" class="box"/><br /><br />
						<input type="submit" name='add' value="GÖNDER" class='submit'/><br><br><br>
					</form>

				</div>
			</div>



</body>
</html>
