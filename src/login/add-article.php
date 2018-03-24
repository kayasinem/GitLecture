<?php
/**
 * Created by PhpStorm.
 * User: Sebahattin ALTUNAY
 * Date: 16.03.2018
 * Time: 22:48
 */
include "config.php";
$title = $_POST['title'];
$category_id = $_POST['category_id'];
$content = $_POST['content'];
$author = $_POST['author'];
$username = $_SESSION['username'];

if (isset($_POST['add'])){
    try {
        $stmt = $connect->prepare('INSERT INTO articles (title, category_id, content, author, username)
				VALUES (:title, :category_id, :content, :author, :username)');
        $stmt->execute(array(
            ':title' => $title,
            ':category_id' => $category_id,
            ':content' => $content,
            ':author' => $author,
            ':username' => $username
        ));
        header('Location: success.html');
        exit;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}