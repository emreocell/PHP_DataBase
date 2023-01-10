<?php

include("DBConnection.php"); //Veritabanı bağlantımız yapıyoruz

$sorgu=$vt->prepare(""); //Kendi SQL sorgunuza göre şekillendire bilirsiniz.
$sorgu->execute(); //Sorgumuzu çalıştırıyoruz ve eğer değişken(ler) varsa onları da tanımlıyoruz.
$objeler=$sorgu->fetchAll(PDO::FETCH_OBJ); //Bütün verileri obje olarak alıyoruz. Duruma göre farklı kullanabilirsiniz.

//Örnek Kullanım :
$kontrol=2; //Örnek olarak bir id değeri giriyoruz.
$quest=$vt->prepare("SELECT * FROM ornek_tablo WHERE id=?"); //id'si değişkenden gelen bilgiye göre bütün satırları alıyoruz.
$quest->execute(array($kontrol));
$sonuc=$quest->fetchAll(PDO::FETCH_OBJ);

foreach($sonuc as $row){
    echo $row->id; //id değerini yazdırıyoruz.
    //echo $row->satir; satırlarınızı bu şekilde yazdırabiliriz.
    //echo ile beraber html etiketlerini de kullanabilir.
    //echo '<p class="example-class">'.$row->satir.'</p>'; gibi
}

//Etiketleri kullanarak sorgumuzu değiştirelim
if(isset($_GET['ppage'])){//Sayfa numarası varsa
    $page=$_GET['ppage'];//$page değişkenine eşitliyoruz
}
else{//sayfa değişkeni yoksa
    $page=1;//$page değişkenine 1 değerini atıyoruz
}
$obj_per_page=25;//Sayfa başına gösterilecek obje sayısı
$start_from=($page-1)*$obj_per_page;//Sayfanın başlangıç değeri
$sql=$vt->prepare("SELECT id,ad,soyad FROM onaybekliyor ORDER BY id DESC LIMIT $start_from,$obj_per_page");//Sorgumuzu hazırlıyoruz
$sql->execute();//Sorgumuzu çalıştırıyoruz
$butunUye=$sql-> fetchAll(PDO::FETCH_OBJ);//Sorgumuzdan gelen verileri obje olarak alıyoruz
foreach($butunUye as $row){//Verileri döngüye sokuyoruz
    echo $row->id;//id değerini yazdırıyoruz
    echo $row->ad;//ad değerini yazdırıyoruz
    echo $row->soyad;//soyad değerini yazdırıyoruz
}
?>
<a href="Examples.php?ppage=2">Sayfa 2</a>
<?php
//a etiketine tıklandığında $page değişkenimiz 2 değerini alacaktır
//Bu şekilde sayfalama yapabilirsiniz.
?>