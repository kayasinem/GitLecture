<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: index.php');
?>
<html>
<head>
	<title>Firma İsmi | <?php echo $_SESSION['name']; ?></title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="assets/css/master.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/customer-nav.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/rg-1.0.0/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/rg-1.0.0/datatables.min.js"></script>
	<style>
	.add30-submit{
		background: transparent;
		border: none;
	}
	</style>
</head>
<body>
	<?php include 'admin-dash-header.php'; ?>
			<?php
				if(isset($errMsg)){
					echo $errMsg;
				}
			?>
      <div class="col-sm-10 dash-wrap">

          <?php include 'nav.html'; ?>
          <div align="center" class="col-sm-10 admin-information">
                <script type="text/javascript" src="assets/js/datatable.js"></script>
				<div align="center" class="col-md-10 add-30"><br>
						<h4>Makale İstekleri Tablosu</h4>
							<table id="myTable" class="table table-responsive">
									<form action="" method="post">


									<?php

									if(isset($_POST['sec'])) {
										foreach ($_POST['sec'] as $secilen) {
											$silinecekler = implode(', ', $_POST['sec']);
		    							$sql = "UPDATE articles SET status = 'ONAYLANDI', accept = 1 WHERE id = :id";
											$stmt = $connect->prepare($sql);
											$stmt->execute(array(
												':id' => $secilen
											));
										
										}
									}
									$sorgu = $connect->query('SELECT * FROM articles WHERE accept != 1');
									$ogeler = $sorgu->fetchAll();
									?>
									<thead>
									<tr>
											<th>Seç</th>
											<th>E-Posta</th>
											<th>Başlık</th>
											<th>Kategori</th>
											<th>İstek Tarihi</th>
											<th>Onayla</th>
									</tr>
									</thead>
									<?php
									foreach ($ogeler as $oge) {

										echo "<tbody>
										<tr>
												<td>". "<input type='checkbox' name='sec[]' value='".$oge['id']. "'> </td>
												<td>". $oge['username'] ."</td>
												<td>". $oge['title'] ."</td>
												<td>". $oge['category_id'] ."</td>
												<td>". $oge['created_at'] ."</td>
												<td>". '<button class="add30-submit" type="submit" name="update"><span class="glyphicon glyphicon-check"></span</button>' ."</td>
										</tr>
										</tbody>";
									}
									 ?>
							</table>
							<!-- <input type="submit" name="update" value="ONAYLA"> -->

							</form>
				</div>
			</div>

		</body>
</html>
