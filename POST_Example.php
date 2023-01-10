<?php
//Formdan gelen verileri alıp veri tabanına gönderme örneği
//Örnek olarak bir form oluşturalım
//action kısmına php dosya yolunu girerek sayfayı daha sade hale getirebilir veya otomasyon yapabilirsiniz.
//Öncelikle Form etiketine method olarak 'POST' değerini giriyoruz
//Değişken alacağımız etiketlerden (input,select vb) name değerlerini atamalıyız bu name değerlerinden bilgi alacağız.
?>
<div class="py-8 px-8 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
<div class="container max-w-screen-lg mx-auto px-5">
<form action="" method="POST" class="w-5/6 flex flex-col mx-auto justify-center py-20">
<div class="grid md:grid-cols-2 md:gap-6">
<div class="relative z-0 mb-6 w-full group">
  <input type="text" name="Ad" id="floating_first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
  <label for="floating_first_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ad</label>
</div>
<div class="relative z-0 mb-6 w-full group">
  <input type="text" name="Soyad" id="floating_last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
  <label for="floating_last_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Soyad</label>
</div>
</div>
<div class="grid md:grid-cols-2 md:gap-6">
<div class="relative z-0 mb-6 w-full group">
  <input type="text" name="Telefon" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
  <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cep Telefonu</label>
</div>
<div class="relative z-0 mb-6 w-full group">
      <input type="email" name="EPosta" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">E-Posta</label>
  </div>
</div>
<div class="grid md:grid-cols-2 md:gap-6">
<div class="relative z-0 mb-6 w-full group">
<select id="gender" name="Cinsiyet" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required >
  <option selected value="Cinsiyet">Cinsiyet</option>
  <option value="Erkek">Erkek</option>
  <option value="Kadın">Kadın</option>
</select>
</div>
</div>
<button type="submit" name="gonder" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kaydet</button>
</form>
</div>
</div>
<?php
include("DBConnection.php"); //Veritabanı bağlantımızı yapıyoruz.

//Bu işlemleri try catch ile yapmayı unutmayınız.
if(isset($_POST['gonder'])){//Formumuz gönderilmiş ise

//Formdan gelen verileri alıyoruz
$ad=$_POST['Ad'];
$soyad=$_POST['Soyad'];
$telefon=$_POST['Telefon'];
$eposta=$_POST['EPosta'];
$cinsiyet=$_POST['Cinsiyet'];

//SQL tanımımızı ayarlıyoruz
$sorgu=$vt->prepare('INSERT INTO tablo_adi SET Ad=?,Soyad=?,Telefon=?,EPosta=?,Cinsiyet=?');//Tablomuza INSERT INTO metodu ile verilerimizi ekliyorz.
$sonuc=$sorgu->execute(array($Ad,$Soyad,$Telefon,$EPosta,$Cinsiyet));//Sorgumuzu çalıştırıyoruz ve değişkenlerimizi giriyoruz.

//Kullanıcıyı bilgilendirmek amacıyla bir alert mesajı gösteriyoruz.
if($sonuc){
    echo '<script>alert("Kayıt Başarılı")</script>';
  }
  else{
    echo "<script>alert('mysqli_error($conn)')</script>";
  }
}
?>