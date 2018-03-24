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
        /* table */
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}
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
                <?php include "nav.html"; ?>

				<div class="col-sm-8 user-information">
					<h4>Kişisel Bilgiler</h4>
                    <table>
                        <tr>
                            <th>İsim</th>
                            <th>Kullanıcı Adı</th>
                            <th>Rol</th>
                        </tr>
					<?php
					// verileri çekme başlangıcı
					try {
						$sorgu = $connect -> query("SELECT fullname, username, role FROM admins WHERE username = '$_SESSION[username]' ");
						$cikti = $sorgu -> fetch(PDO::FETCH_ASSOC);

//						echo "Ad-soyad: ".$cikti["fullname"]."<br>".
//									"E-posta: ".$cikti["username"]."<br>".
//									"Rol: ".$cikti["role"]."<br>";
                        ?>
                        <tr>
                            <td><?php  echo $cikti["fullname"]; ?></td>
                            <td><?php  echo $cikti["username"]; ?></td>
                            <td><?php  echo $cikti["role"]; ?></td>
                        </tr>
                        <?php
                    }
					catch (PDOException $e) {
						die($e->getMessage());
					}


					// verileri çekme sonu

					 ?>





                    </table>


				</div>
			</div>



</body>
</html>
