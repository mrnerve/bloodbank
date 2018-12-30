<?php
	include_once 'sehirler.php';

	use PHPMailer\PHPMailer\PHPMailer;
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
?>
<form action="#" method="POST">
	<table>
		<h4>Kan Arama</h4>

		<tr>
			<td>Ad</td>
			<td><input type="text" class="form-control" name="araad" required></td>
		</tr>

		<tr>
			<td>Soyad</td>
			<td><input type="text" name="arasoyad" class="form-control" required></td>
		</tr>

		<tr>
			<td>TC</td>
			<td><input type="text" name="aratc" maxlength="11" minlength="11" class="form-control" required></td>
		</tr>

		<tr>
			<td>Telefon</td>
			<td><input type="text" name="aratelno" maxlength="11" minlength="11" class="form-control" required></td>
		</tr>

		<tr>
			<td>Email</td>
			<td><input type="email" name="araemailadres" class="form-control" required></td>
		</tr>

		<tr>
			<td>Kan Grubu</td>
			<td>
				<select name="arakangrubu" class="form-control">
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
			<td>Hangi semte</td>
			<td>
				<select name="arasemt" class="form-control">
					<?php 	
						for($i=0;$i<38;$i++){
							echo '<option>'.$ilceler["34"]["$i"].'</option>';
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="ara" id="buton" value="Ara">
				<input type="reset" name="sil" value="Sıfırla">
			</td>
		</tr>
	</table>
</form>
<?php 
	if(isset($_POST['ara'])){
		$ad = $_POST['araad'];
		$soyad = $_POST['arasoyad'];
		$eposta = $_POST['araemailadres'];
		$telefon = $_POST['aratelno'];
		$kanGrubu = $_POST['arakangrubu'];
		$semt = $_POST['arasemt'];
		$tc = $_POST['aratc'];

		$ekle = $db -> exec("INSERT INTO duyuru(duyuru_icerik) VALUES ('$semt çevresi $kanGrubu kana ihtiyaç vardır.')");

		foreach ($ilceyakinlik['34']["$semt"] as $key ) {
			foreach($db->query("SELECT * FROM kayiticerik where semt='$key'") as $listele) {
	    		$no = $listele['KullaniciAdi'];
				$alan1 = $listele['KullaniciSoyadi'];
				$alan2 = $listele['semt'];



				//mail işlemleri
				$mail = new PHPMailer();
				$mail->CharSet = 'UTF-8';
				$mail->isSMTP();
				$mail->SMTPKeepAlive =true;
				$mail->SMTPAuth=true;
				$mail->SMTPSecure = 'tls';
				$mail->Port=587;
				$mail->Host='smtp.gmail.com';
				
				$mail->Username = 'info.kanmerkezi@gmail.com';
				$mail->Password = 'sigach_99';

				$mail->setFrom('info.kanmerkezi@gmail.com', 'BloodBank');
				$mail->addAddress('onurpulat.op@gmail.com', 'Onur Pulat');

				$mail->isHTML(true);

				$mail->Subject = 'Sana İhtiyaç Var!';
				$mail->Body = '<h1>Acil Kan Aranıyor..</h1>'. 
							  "<h3>Ad: $ad</h3>".
							  "<h3>Soyad: $soyad</h3>".
							  "<h3>E-posta Adresi: $eposta</h3>".
							  "<h3>Telefon Numarası: $telefon</h3>".
							  "<h3>Semt: $semt</h3>".
							  "<h3>Kan Grubu: $kanGrubu</h3>"
							  ;

				$mail->send();
				header("location:index.php");
			}
		}		
	}
?>