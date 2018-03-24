<!DOCTYPE html>
<html lang="en">
<head>
    <title>Anasayfa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Oyun, Aksiyon, Korku, Macera, Bulmaca, Hayatta Kalma, Strateji, Game, Gameland">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/master.css">
    <link rel="stylesheet" href="assets/css/iletisim.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .comments{
            width: 50%;
            margin-left: 25%;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">GameLand</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Anasayfa</a></li>
                <li><a href="hakkimizda.html" target="blank">Hakkımızda</a></li>
                <li><a href="iletisim.html" target= "blank">İletişim</a></li>
                <!-- <li><a href="#">Contact</a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login/index.php"><span class="glyphicon glyphicon-log-in"></span> Giriş</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="assets/img/img-1.jpg" alt="Image">
            <div class="carousel-caption">
                <h3>Başlık</h3>
                <p>Lorem ipsum...</p>
            </div>
        </div>

        <div class="item">
            <img src="assets/img/img-2.jpg" alt="Image">
            <div class="carousel-caption">
                <h3>Başlık</h3>
                <p>Lorem ipsum...</p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Önceki</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Sonraki</span>
    </a>
</div>



<h1 class="hint">Menu</h1>
<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,800' rel='stylesheet' type='text/css'>
<?php include "nav.html"; ?>

<br>
<div class="row">
    <div class="col-md-12" style= "text-align: center;">
        <h2>Son Eklenen İncelemeler</h2><br>
        <h3>Başlık</h3>
        <div class="col-sm-4 business-plan-1 text-justify">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo quis nostrud exercitation ullamco laboris nisi ut aliquip fiiea. </p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="col-sm-4 business-plan-2">

        </div>
        <div class="col-sm-4 business-plan-3">

        </div>
    </div>
</div>

<footer class="container-fluid text-center footer">
    <div class="col-md-4">
        <a href="#"><p>Gizlilik Politikası</p></a>
        <a href="#"><p>Şartlar & Koşullar</p></a>
        <a href="#"><p>Sıkça Sorulan Sorular</p></a>
    </div>

    <div class="col-md-4">
        <a href="#"><p>Hesabım</p></a>
        <a href="#"><p>Giriş Yap</p></a>
        <a href="#"><p>Hesap Oluştur!</p></a>
    </div>

    <div class="col-md-4">
        <a href="#"><p>facebook</p></a>
        <a href="#"><p>instagram</p></a>
        <a href="#"><p>twitter</p></a>
    </div><br><br><br><br>
    <div class="col-md-12">
        Git Bootcamp - 2018
    </div>
</footer>

</body>
</html>
