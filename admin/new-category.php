<?php
/**
 * Created by PhpStorm.
 * User: Sebahattin ALTUNAY
 * Date: 11.03.2018
 * Time: 14:59
 */

include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Oyun Tasarımı | Edit Article</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="index.html" class="logo"><b>Yönetim Paneli</b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
        </div>
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="login.html">Çıkış</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <?php include "sidebar.php"; ?>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            <h3><i class="fa fa-angle-right"></i> Formlar</h3>
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-10">
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Kategori Ekle</h4>
                        <?php
                        $name = isset($_POST['name']) ? $_POST['name'] : '';


                        try {
                            $sql = "INSERT INTO `categories` (`name`) VALUES ('$name')";
                            // use exec() because no results are returned
                            if (isset($_POST['publish'])){
                                $conn->exec($sql);
                                echo '<script>
                                alert("Kategori başarıyla eklendi.");
                                </script>';
                            }
                        }
                        catch(PDOException $e)
                        {
                            echo $sql . "<br>" . $e->getMessage();
                        }

                        ?>
                        <form align="center" class="form-horizontal style-form" method="post">
                            <div align="center" class="form-group">
                                <div class="col-sm-6">
                                    <form action="add_category.php" method="post">
                                        <input type="text" name="name" class="form-control" placeholder="Yeni kategori giriniz!"><br>
                                        <button name="publish" class="btn-success">EKLE</button>
                                    </form>
                                </div>
                            </div>
                        </form>
                        <div class="categories">
                            <?php
                            try{
                                $query=$conn->prepare("Select 'name' from categories");
                                $query->excute(array(
                                    'name'
                                ));
                                while($row=$query->fetch(PDO::FETCH_OBJ)) {
                                    /*its getting data in line.And its an object*/
                                    echo $row->name;
                                }
                            }catch(PDOException  $e ){
                                echo "Error: ".$e;
                            }
                            ?>
                        </div>
                    </div>
                </div><!-- col-lg-12-->
            </div><!-- /row -->


        </section><! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            2018 - Sebahattin Altunay
            <a href="form_component.html#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


<!--common script for all pages-->
<script src="assets/js/common-scripts.js"></script>

<!--script for this page-->
<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

<!--custom switch-->
<script src="assets/js/bootstrap-switch.js"></script>

<!--custom tagsinput-->
<script src="assets/js/jquery.tagsinput.js"></script>

<!--custom checkbox & radio-->

<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


<script src="assets/js/form-component.js"></script>


<script>
    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>

</body>
</html>




