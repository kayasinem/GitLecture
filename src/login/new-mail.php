<?php
/**
 * Created by PhpStorm.
 * User: Sebahattin ALTUNAY
 * Date: 17.03.2018
 * Time: 13:11
 */

require 'config.php';
if(empty($_SESSION['name']))
    header('Location: index.php');

if(isset($_POST['send'])) {

    // Get data from FROM
    $gonderen = $_POST['gonderen'];
    $alici = $_POST['alici'];
    $mesaj = $_POST['mesaj'];

    if($errMsg == ''){
        try {
            $stmt = $connect->prepare('INSERT INTO messagges (gonderen, alici, mesaj)
				VALUES (:gonderen, :alici, :mesaj)');
            $stmt->execute(array(
                ':gonderen' => $gonderen,
                ':alici' => $alici,
                ':mesaj' => $mesaj
            ));
            header('Location: success.html');
            exit;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
