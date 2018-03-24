<?php
/**
 * Created by PhpStorm.
 * User: Sebahattin ALTUNAY
 * Date: 23.03.2018
 * Time: 23:43
 */
?>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
    include_once "config.php";
    function actionComments($connect){
        if (isset($_POST['comment'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment_content = $_POST['comment_content'];
            try {
                $stmt = $connect->prepare('INSERT INTO action_comments (name, email, comment_content) VALUES (:name, :email, :comment_content)');
                $stmt->execute(array(
                    ':name' => $name,
                    ':email' => $email,
                    ':comment_content' => $comment_content
                ));
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        // yorumları çekme başlangıcı
        try {
            $sorgu = $connect -> query("SELECT name, comment_content FROM action_comments ORDER BY created_at DESC");
            $cikti = $sorgu -> fetchAll();

            foreach ($cikti as $item) {
                echo '<span><i class="fa fa-user fa-2x"></i></span> ' . $item["name"]."<br>".
                    $item["comment_content"]."<hr>";
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
        // yorum çekme sonu
    }

    function puzzleComments($connect){
        if (isset($_POST['comment'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment_content = $_POST['comment_content'];
            try {
                $stmt = $connect->prepare('INSERT INTO puzzle_comments (name, email, comment_content) VALUES (:name, :email, :comment_content)');
                $stmt->execute(array(
                    ':name' => $name,
                    ':email' => $email,
                    ':comment_content' => $comment_content
                ));
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        // yorumları çekme başlangıcı
        try {
            $sorgu = $connect -> query("SELECT name, comment_content FROM puzzle_comments ORDER BY created_at DESC");
            $cikti = $sorgu -> fetchAll();

            foreach ($cikti as $item) {
                echo '<span><i class="fa fa-user fa-2x"></i></span> ' . $item["name"]."<br>".
                    $item["comment_content"]."<hr>";
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
        // yorum çekme sonu
    }

    function survivalComments($connect){
        if (isset($_POST['comment'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment_content = $_POST['comment_content'];
            try {
                $stmt = $connect->prepare('INSERT INTO survival_comments (name, email, comment_content) VALUES (:name, :email, :comment_content)');
                $stmt->execute(array(
                    ':name' => $name,
                    ':email' => $email,
                    ':comment_content' => $comment_content
                ));
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        // yorumları çekme başlangıcı
        try {
            $sorgu = $connect -> query("SELECT name, comment_content FROM survival_comments ORDER BY created_at DESC");
            $cikti = $sorgu -> fetchAll();

            foreach ($cikti as $item) {
                echo '<span><i class="fa fa-user fa-2x"></i></span> ' . $item["name"]."<br>".
                    $item["comment_content"]."<hr>";
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
        // yorum çekme sonu
    }

    function korkuComments($connect){
        if (isset($_POST['comment'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment_content = $_POST['comment_content'];
            try {
                $stmt = $connect->prepare('INSERT INTO korku_comments (name, email, comment_content) VALUES (:name, :email, :comment_content)');
                $stmt->execute(array(
                    ':name' => $name,
                    ':email' => $email,
                    ':comment_content' => $comment_content
                ));
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        // yorumları çekme başlangıcı
        try {
            $sorgu = $connect -> query("SELECT name, comment_content FROM korku_comments ORDER BY created_at DESC");
            $cikti = $sorgu -> fetchAll();

            foreach ($cikti as $item) {
                echo '<span><i class="fa fa-user fa-2x"></i></span> ' . $item["name"]."<br>".
                    $item["comment_content"]."<hr>";
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
        // yorum çekme sonu
    }

    function strategyComments($connect){
        if (isset($_POST['comment'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $comment_content = $_POST['comment_content'];
            try {
                $stmt = $connect->prepare('INSERT INTO strategy_comments (name, email, comment_content) VALUES (:name, :email, :comment_content)');
                $stmt->execute(array(
                    ':name' => $name,
                    ':email' => $email,
                    ':comment_content' => $comment_content
                ));
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        // yorumları çekme başlangıcı
        try {
            $sorgu = $connect -> query("SELECT name, comment_content FROM strategy_comments ORDER BY created_at DESC");
            $cikti = $sorgu -> fetchAll();

            foreach ($cikti as $item) {
                echo '<span><i class="fa fa-user fa-2x"></i></span> ' . $item["name"]."<br>".
                    $item["comment_content"]."<hr>";
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
        // yorum çekme sonu
    }

    ?>

</body>
</html>

