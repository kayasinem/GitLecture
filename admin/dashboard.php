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
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        body {font-family: Arial, Helvetica, sans-serif;}

        /* The Modal (background) */
        .modalInbox {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modalInbox-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .inbox-close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .inbox-close:hover,
        .inbox-close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

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
            $sorgu = $connect -> query("SELECT gonderen, alici, mesaj, created_at FROM messagges WHERE alici = '$_SESSION[username]' && status != 1 ORDER BY created_at DESC LIMIT 1");
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
                        <td><button id="inboxBtn">Göster</button></td>
                    </tr>
                    <?php

                }
                }
                catch (PDOException $e) {
                    die($e->getMessage());
                }

                ?>
            </table>
            <!-- The inboxModal -->
            <div id="inboxModal" class="modalInbox">

                <!-- Modal content -->
                <div class="modalInbox-content">
                    <span class="inbox-close">&times;</span>
                    <p><?php echo $cikti['mesaj']; ?></p>
                </div>
                <script>
                    // Get the modal
                    var modalInbox = document.getElementById('inboxModal');

                    // Get the button that opens the modal
                    var btn = document.getElementById("inboxBtn");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("inbox-close")[0];

                    // When the user clicks the button, open the modal
                    btn.onclick = function() {
                        modalInbox.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modalInbox.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modalInbox) {
                            modalInbox.style.display = "none";
                        }
                    }
                </script>
            </div>
        </div>

        <div id="sent" class="tabcontent"><br><br>
            <?php
            try {
            $sorgu = $connect -> query("SELECT gonderen, alici, mesaj, created_at FROM messagges WHERE gonderen = '$_SESSION[username]' && status != 1 ORDER BY created_at DESC LIMIT 1");
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
                        <td><button id="myBtn" name="myBtn">Göster</button></td>
                    </tr>
                    <?php

                }
                }
                catch (PDOException $e) {
                    die($e->getMessage());
                }
                ?>
            </table>
            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <p><?php echo $cikti['mesaj']; ?></p>
                </div>
                <script>
                    // Get the modal
                    var modal = document.getElementById('myModal');

                    // Get the button that opens the modal
                    var btn = document.getElementById("myBtn");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks the button, open the modal
                    btn.onclick = function() {
                        modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                        modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }
                </script>
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
                <input type="text" name="mesaj" class="box"><br><br>
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
