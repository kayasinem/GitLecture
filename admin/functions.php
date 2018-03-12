<?php
/**
 * Created by PhpStorm.
 * User: Sebahattin ALTUNAY
 * Date: 12.03.2018
 * Time: 19:18
 */
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=oyun_tanitimi", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
function countContent($sorgu,$conn ){
    // get customers from users table
    $sorgu = $conn->prepare("SELECT COUNT(*) FROM articles");
    $sorgu->execute();
    $say = $sorgu->fetchColumn();
    return $say;
}

countContent();