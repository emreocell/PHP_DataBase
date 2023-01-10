<?php

//Bu dosya veritabanındaki verileri güncellemek için kullanılır.
//Kullanımı : etiketin içine href olarak UpdateButton.php?satir=psatir yazılmalıdır.
//Örnek : <a href="UpdateButton.php?id=pid">Güncelle</a>

include("DBConnection.php"); //Veritabanı bağlantımız yapıyoruz

//Güncel değerler için form oluşturalım
?>
<form action="" method="POST">
    <input name="Ad" id="ad" type="text">
    <label for="ad">Yeni Ad =</label>
    <input name="Soyad" id="soyad" type="text">
    <label for="soyad">Yeni Soyad =</label>
    <button name="update" type="submit">Güncelle</button>
</form>
<?php
if(isset($_POST['update'])){
    $ad=$_POST['Ad'];
    $soyad=$_POST['Soyad'];
    $id=$_GET['pid'];
    $guncelle=$vt->prepare("UPDATE tablo_adi SET Ad=?,Soyad=? WHERE id=?");//Gelen id değerine göre satırı güncelliyoruz.
    $guncelle->execute(array($ad,$soyad,$id));//Güncelleme işlemini gerçekleştiriyoruz.
    header("Location:Examples.php"); //Güncelleme işleminden sonra Examples.php sayfasına yönlendiriyoruz.
}

?>