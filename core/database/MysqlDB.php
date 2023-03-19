<?php


try {
    $conn = new PDO('mysql:host=localhost;dbname=php_cms' , 'root' , '');
    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    return $conn;
}catch (Exception $e){
    dd('not connect to database. error:' . $e->getMessage());
}
