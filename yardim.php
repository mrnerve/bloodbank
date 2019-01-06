<?php include"conn.php"; ?>

<html>
<head>
	<title>Yardım Sayfası</title>

</head>
<body>
<h3>Yardım Sayfası</h3>
	<?php
 foreach($db->query('SELECT * FROM yardim') as $listele) {
    $yardim_Aciklama = $listele['yardim_Aciklama'];
	echo $yardim_Aciklama .'<br>';
	}
?>

</body>
</html>