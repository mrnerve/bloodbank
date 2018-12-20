<?php include "conn.php"  ?>

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
//$sehir=$_POST['sehir'];
$semt=$_POST['semt'];
$adres=$_POST['adres'];

$ekle=$db->exec("INSERT INTO kayiticerik(KullaniciAdi,KullaniciSoyadi,TCKimlikNo,Telefon,DogumTarihi,Kangrubu,Mail,sifre,semt,
	adres) VALUES 
('$KullaniciAdi','$KullaniciSoyadi','$TCKimlikNo','$Telefon','$DogumTarihi','$Kangrubu','$Mail','$sifre','$semt',
	'$adres')");
}
//ŞEHİR KISMI silindi.

if(isset($_POST['Giris'])){
		$uyetc=$_POST['tc'];
		$sifre=$_POST['sifre'];

		$giris= $db->prepare("SELECT * FROM uyegiris where uyetc=? and sifre=? ");
   		$giris->execute(array($uyetc,$sifre));

	if($giris){
		$_SESSION['tc']=$_POST['TCKimlikNo'];
		$_SESSION['sifre']=$_POST['sifre'];
		echo "giriş başarılı";
	}
	else {
		echo "Giriş başarısız.";
	}

	}

	include 'sehirler.php';

	?>

<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giriş</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <style type="text/css">
    	#sol{float: left;}
    	#sag{float: right;}
    </style>
  </head>
  <body>


	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>
	      <div class="modal-body">
	     	<div class="row">
	     		<div class="container">
	     			<div class="col-md-12">
		     			<div class="col-md-6" style="float: left;">
		     				<form action="" method="post" id="form">
								<table>
									<h4>Üye Kayıt Formu</h4>
								
									<tr>
										<td>Ad</td>
										<td><input type="text" class="form-control" name="ad" required></td>
									</tr>
									<tr>
										<td>Soyad</td>
										<td><input type="text" name="soyad" class="form-control" required></td>
									</tr>

									<tr> 
										<td>TC no</td>
										<td><input type="text" name="tc" maxlength="11" minlength="11" class="form-control" required></td>
									</tr>
									
									<tr> 
										<td>Telefon no</td>
										<td><input type="text" name="telno"   maxlength="11" class="form-control" required></td>
									</tr>
									
									<tr> 
										<td>Doğum Tarihi</td>
										<td><input type="date" name="tarih" class="form-control"  required></td>
									</tr>
									<tr> 
										<td>Kan Grubu</td>
										<td>
											<select name="kangrubu" class="form-control">
												<option>0 Rh (+) POZİTİF</option>
												<option>0 Rh (-) NEGATİF</option>
												<option>A Rh (+) POZİTİF</option>
												<option>A Rh (-) NEGATİF</option>
												<option>B Rh (+) POZİTİF</option>
												<option>B Rh (-) NEGATİF</option>
												<option>AB Rh (+) POZİTİF</option>
												<option>AB Rh (-) NEGATİF</option>
											</select>
										</td>
									</tr>
									
									<tr> 
										<td>E-mail Adresi</td>
										<td><input type="email" name="emailadres" class="form-control" required></td>
									</tr>
										<tr>
											<td>Şifre</td>
											<td><input type="password" class= "form-control" name="sifre"></td>
										</tr>
										<!--<tr> 
										<td>Şehir</td>
										<td>
											<select name="sehir">
												<?php 
													for($i=0;$i<sizeof($sehir);$i++){
														echo '<option>'.$sehir["$i"].'</option>';
													}
												?>
											</select>
										</td>
									</tr>-->
									<tr>
										<td>Semt</td>
										<td><select name="semt" class="form-control">
												<?php 	
												$k =0;
													for($i=0;$i<38;$i++){
														echo '<option>'.$ilceler["34"]["$i"].'</option>';
													}
												?>
										</select></td>
									</tr>
										<tr> 
											<td>Adres</td>
											<td><textarea cols="25" rows="5" name="adres" class="form-control" ></textarea required></td>
										</tr>
									<tr>
										<td colspan="2"><input type="submit" name="Gonder" id="buton">
										<input type="reset" name="sil" value="Sil"></td>
									</tr>

								</table>
							</form> 
		     			</div>

		     			<div class="col-md-6" style="float:right;">
		     				<table>
								<form action="" method="post">
									<h4>Üye Giriş</h4>
									<tr> 
									<td>TC no</td>
									<td><input type="text" name="tc" maxlength="11" minlength="11" class="form-control" required></td>
								</tr>
									<tr>
										<td>
										Şifre
										</td>
										<td><input type="password" name="sifre" class="form-control" required></td>
									</tr>
									<tr>
									<td colspan="2">
										<input type="submit" name="Giris" id="buton" value="Giriş">
										<input type="reset" name="sil2" value="Sil"></td>
								</tr>
								</form>
							</table>
		     			</div>
	     			</div>
	     		</div>
	     	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script type="text/javascript">
		$('#myModal').modal({
		  show: true
		})
	</script>

  </body>
</html>