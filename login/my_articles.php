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
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
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
					<h4>Yazılarım</h4>
                    <table id="myTable" class="table table-responsive">
                        <form action="" method="post">
                            <?php
                            $sorgu = $connect->query("SELECT * FROM articles WHERE accept  = 1 && username = '$_SESSION[username]' ");
                            $ogeler = $sorgu->fetchAll();
                            ?>

                            <thead>
                            <tr>
                                <th>Başlık</th>
                                <th>Kategori</th>
                                <th>Yayın Tarihi</th>
                                <th>Durum</th>
                                <th>Düzenle</th>
                            </tr>
                            </thead>

                            <?php
                            foreach ($ogeler as $oge) {

                                echo "<tbody>".
    										"<tr>".
    												"<td>". $oge['title'] ."</td>".
    												"<td>". $oge['category_id'] ."</td>".
    												"<td>". $oge['created_at'] ."</td>".
    												"<td>". $oge['status'] ."</td>".
                                                    "<td>" . '<a href="edit-article.php">'. 'DÜZENLE' .'</a>'. "</td>".
                                            "</tr>" .
                                     "</tbody>";
                            }

                            ?>
                        </form>
                    </table>

				</div>
			</div>



</body>
</html>
