<?php include "header.php"  ?>

<?php
	if(empty($_SESSION['tc']) && empty($_SESSION['sifre']))
	{
		include 'modal.php';
	}
	else
	{
		include 'sehirler.php';
		echo '<a href="logout.php">Çıkış Yap</a>';
	}
	
?>
<?php include 'kanislemi.php'; ?>

<?php include 'footer.php' ?>


			
