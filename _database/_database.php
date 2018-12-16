<?php include"conn.php"; ?>

<?php
ob_start();
session_start();

if(isset($_POST['Gonder']))
{
$KullaniciAdi=$_POST['ad'];
$KullaniciSoyadi=$_POST['soyad'];
$TCKimlikNo=$_POST['tc'];
$Telefon=$_POST['telno'];
$DogumTarihi=$_POST['tarih'];
$Kangrubu=$_POST['kangrubu'];
$Mail=$_POST['emailadres'];
$sifre=$_POST['sifre'];
$sehir=$_POST['sehir'];
$semt=$_POST['semt'];
$adres=$_POST['adres'];
}

$ekle=$db->exec("INSERT INTO kayiticerik(KullaniciAdi,KullaniciSoyadi,TCKimlikNo,Telefon,DogumTarihi,Kangrubu,Mail,sifre,sehir,semt,
	adres) VALUES 
('$KullaniciAdi','$KullaniciSoyadi','$TCKimlikNo','$Telefon','$DogumTarihi','$Kangrubu','$Mail','$sifre','$sehir','$semt',
	'$adres')");
if($ekle)
{
echo "Yeni kayıt eklendi.";
}
else
{
	echo "Kayıt işlemi başarısız.";
}


?>