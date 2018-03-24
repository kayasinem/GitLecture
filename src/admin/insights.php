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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div>
            <h4>Sistem İstatiksel Bilgiler</h4><hr>

                <div class="col-sm-3 add-customer">
                    <p><i class="fa fa-users fa-3x"></i></p>
                    <?php
								$sorgu = $connect->prepare("SELECT COUNT(*) FROM authors");
								$sorgu->execute();
								$say = $sorgu->fetchColumn();

                    echo 'Toplam Yazar Sayısı: ' . $say;
                    ?>
                </div>

                <div class="col-sm-3 add-customer">
                    <p><i class="fa fa-comments fa-3x"></i></p>
                    <?php
                    $sorgu = $connect->prepare("SELECT COUNT(*) FROM comments");
                    $sorgu->execute();
                    $say = $sorgu->fetchColumn();

                    echo 'Toplam Yorum Sayısı: ' . $say;
                    ?>
                </div>

                <div class="col-sm-3 add-customer">
                    <p><i class="fa fa-pencil fa-3x"></i></p>
                    <?php
                    $sorgu = $connect->prepare("SELECT COUNT(*) FROM articles");
                    $sorgu->execute();
                    $say = $sorgu->fetchColumn();

                    echo 'Toplam İçerik Sayısı: ' . $say;
                    ?>
                </div>
        </div>
    </div>
</div>

</body>
</html>
