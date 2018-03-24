<?php
/**
 * Created by PhpStorm.
 * User: Sebahattin ALTUNAY
 * Date: 24.03.2018
 * Time: 02:17
 */

include "config.php";

    function getAction($connect){
        try {
            $sorgu = $connect -> query("SELECT * FROM articles WHERE category_id = 'korku'  ORDER BY created_at DESC");
            $cikti = $sorgu -> fetchAll();

            foreach ($cikti as $item) {
                echo $item['title'] . '<br>'.
                     $item['category_id']. '<br>'.
                     $item['content'] . '<hr>';
            }
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    getAction($connect);