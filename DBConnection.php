<?php
try{
    $host = ""; //Kullandığımız veritabanı sunucusunun adresi
    $dbName = ""; //Veritabanı adı
    $username = ""; //Veritananı için kullanıcı adı
    $password = ""; //Veritananı için şifre

$vt = new PDO("mysql:host=$host;dbname=$dbName;charset=UTF8","$username",$password);
}
catch(PDOException $e){
    echo $e->getMessage();
}
?>