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
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <style>
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
	<?php include 'cust-dash-header.php'; ?>
			<?php
				if(isset($errMsg)){
					echo $errMsg;
				}
			?>
			<div class="col-sm-10 dash-wrap">
            <?php include "nav.html"; ?>

				<div class="col-sm-8 user-information">
					<h4>Yazar İletişim Bölümü</h4>
                    <hr>
                    <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'inbox')"><i class="fa fa-inbox"></i> Gelen Kutusu</button>
                        <button class="tablinks" onclick="openCity(event, 'sent')"><i class="fa fa-send"></i> Gönderilen Mesajlar</button>
                        <button class="tablinks" onclick="openCity(event, 'new')"><i class="fa fa-pencil"></i> Yeni Mesaj</button>
                    </div>

                    <div id="inbox" class="tabcontent">
                        <?php
                        try {
                        $sorgu = $connect -> query("SELECT gonderen, alici, mesaj, created_at FROM messagges WHERE alici = '$_SESSION[username]' && status != 1 ORDER BY created_at DESC ");
                        $cikti = $sorgu -> fetchAll();
                        ?>
                        <table>
                            <tr>
                                <th>Gönderen</th>
                                <th>Alici</th>
                                <th>Tarih</th>
                                <th>Oku</th>
                            </tr>

                            <?php
                            foreach ($cikti as $cikti){
                                ?>
                                <tr>
                                    <td><?php  echo $cikti["gonderen"]; ?></td>
                                    <td><?php  echo $cikti["alici"]; ?></td>
                                    <td><?php  echo $cikti["created_at"]; ?></td>
                                    <td><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#gelen">Göster</button></td>
                                </tr>
                                <?php

                            }
                            }
                            catch (PDOException $e) {
                                die($e->getMessage());
                            }

                            ?>
                        </table>
                        <div class="modal fade" id="gelen" role="dialog">
                            <div class="modal-dialog">

                                <!-- Inbox content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><?php  echo $cikti["gonderen"]; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><?php  echo $cikti["mesaj"]; ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" name="read" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                        <?php
                                        if (isset($_POST['read'])){
                                            try {
                                                $sql = "UPDATE messagges SET status = 1 WHERE username = '$_SESSION[username]'";
                                                $stmt = $connect->prepare($sql);
                                                $stmt->execute($sql);

                                            }
                                            catch(PDOException $e) {
                                                $errMsg = $e->getMessage();
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="sent" class="tabcontent"><br><br>
                        <?php
                        try {
                            $sorgu = $connect -> query("SELECT gonderen, alici, mesaj, created_at FROM messagges WHERE gonderen = '$_SESSION[username]' && status != 1 ORDER BY created_at DESC ");
                            $cikti = $sorgu -> fetchAll();
                        ?>
                            <table>
                                <tr>
                                    <th>Gönderen</th>
                                    <th>Alici</th>
                                    <th>Tarih</th>
                                    <th>Oku</th>
                                </tr>

                        <?php
                            foreach ($cikti as $cikti){
                                ?>
                                <tr>
                                    <td><?php  echo $cikti["gonderen"]; ?></td>
                                    <td><?php  echo $cikti["alici"]; ?></td>
                                    <td><?php  echo $cikti["created_at"]; ?></td>
                                    <td><button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#giden">Göster</button></td>
                                </tr>
                                <?php

                            }
                        }
                        catch (PDOException $e) {
                            die($e->getMessage());
                        }
                        ?>
                             </table>
                        <!-- Sent -->
                        <div class="modal fade" id="giden" role="dialog">
                            <div class="modal-dialog">

                                <!-- Sent content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><?php  echo $cikti["alici"]; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p><?php  echo $cikti["mesaj"]; ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="new" class="tabcontent">
                        <h3>Yeni Mesaj</h3>
                        <form action="new-mail.php" method="post">
                            <label for="gonderen">Gönderen: </label><br>
                            <input type="text" name="gonderen" class="box"><br>
                            <label for="alici">Alıcı:      </label><br>
                            <input type="text" name="alici" class="box"><br>
                            <label for="mesaj">Mesaj: </label><br>
                            <textarea name="mesaj" id="" cols="30" rows="10"></textarea><br><br>
                            <input class="btn-success" type="submit" name="send" value="GÖNDER">
                        </form>
                    </div>
                    <script>
                        function openCity(evt, cityName) {
                            var i, tabcontent, tablinks;
                            tabcontent = document.getElementsByClassName("tabcontent");
                            for (i = 0; i < tabcontent.length; i++) {
                                tabcontent[i].style.display = "none";
                            }
                            tablinks = document.getElementsByClassName("tablinks");
                            for (i = 0; i < tablinks.length; i++) {
                                tablinks[i].className = tablinks[i].className.replace(" active", "");
                            }
                            document.getElementById(cityName).style.display = "block";
                            evt.currentTarget.className += " active";
                        }
                    </script>
				</div>
			</div>



</body>
</html>
