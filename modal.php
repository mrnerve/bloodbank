<?php	
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

	$kayitKontrol = $db->prepare("SELECT * FROM kayiticerik where TCKimlikNo=?");
	$kayitKontrol -> execute(array($TCKimlikNo));
	$kayitKontrolSay = $kayitKontrol -> rowCount();
	if($kayitKontrolSay == 0)
	{
		$kayitKontrol = $db->prepare("SELECT * FROM kayiticerik where Telefon=?");
		$kayitKontrol -> execute(array($Telefon));
		$kayitKontrolSay = $kayitKontrol -> rowCount();
		if($kayitKontrolSay == 0)
		{
			$kayitKontrol = $db->prepare("SELECT * FROM kayiticerik where Mail=?");
		    $kayitKontrol -> execute(array($Mail));
		    $kayitKontrolSay = $kayitKontrol -> rowCount();
		    if($kayitKontrolSay == 0){
		    	//kayıt ekleme
			    $ekle=$db->exec("INSERT INTO kayiticerik(KullaniciAdi,KullaniciSoyadi,TCKimlikNo,Telefon,DogumTarihi,Kangrubu,Mail,sifre,semt,adres) 
			    VALUES ('$KullaniciAdi','$KullaniciSoyadi','$TCKimlikNo','$Telefon','$DogumTarihi','$Kangrubu','$Mail','$sifre','$semt','$adres')");

			    echo 'kayıt başarılı';
		    }
			else 
			{
				echo 'Mail adresi kullanılmış';
			}
		}
		else 
		{
			echo 'telefon numarası kullanılmış';
		}
		
	}
	else {
		echo "tc kullanılmış";
	}
	
}
	//ŞEHİR KISMI silindi.
	

if(isset($_POST['Giris'])) //giriş olayı
{
	$uyetc=$_POST['tc'];
	$sifre=$_POST['sifre'];

	$giris= $db->prepare("SELECT * FROM kayiticerik where TCKimlikNo=? and sifre=? ");
   	$giris->execute(array($uyetc,$sifre));
	$say = $giris->rowCount();

	if($say==1)
	{
		$_SESSION['tc']=$uyetc;
		$_SESSION['sifre']= $sifre;
		header("location: index.php");
	}
	else 
	{
		echo "Giriş başarısız.";
	}

}

	include 'sehirler.php';

?>
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
	     					<div class="col-md-6 sol">
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
											<td><input type="text" name="telno" maxlength="11" minlength="11" class="form-control" required></td>
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
														#for($i=0;$i<sizeof($sehir);$i++){
															#echo '<option>'.$sehir["$i"].'</option>';
														#}
													?>
												</select>
											</td>
										</tr>-->
										<tr>
											<td>Semt</td>
											<td>
												<select name="semt" class="form-control">
													<?php 	
														for($i=0;$i<38;$i++){
															echo '<option>'.$ilceler["34"]["$i"].'</option>';
														}
													?>
												</select>
											</td>
										</tr>
										<tr> 
											<td>Adres</td>
											<td><textarea cols="25" rows="5" name="adres" class="form-control" style="resize:none;" ></textarea required></td>
										</tr>
										<tr>
											<td colspan="2">
												<input type="submit" name="Gonder" id="buton">
												<input type="reset" name="sil" value="Sıfırla">
											</td>
										</tr>
									</table>
								</form> 
		     				</div>

				     		<div class="col-md-6 sag">
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
												<input type="reset" name="sil2" value="Sıfırla">
											</td>
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