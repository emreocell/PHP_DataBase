<?php
//Bu dosya ile veritabanından verileri silmek için kullanılır.
//kullanımı : etiketin içine href olarak DeleteButton.php?satir=psatir yazılmalıdır.
//Örnek : <a href="DeleteButton.php?id=pid">Sil</a>

include("DBConnection.php"); //Veritabanı bağlantımız yapıyoruz
if(isset($_GET['pid'])){
    $sil=$vt->prepare("DELETE FROM ornek_tablo WHERE id=?"); //gelen id değerine göre satırı siliyoruz.
    $sil->execute(array($_GET['pid']));
    header("Location:Examples.php"); //Silme işleminden sonra Examples.php sayfasına yönlendiriyoruz.
}
?>