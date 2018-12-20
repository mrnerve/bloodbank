<?php include "conn.php"  ?>

<?php
ob_start();
session_start();

$db= $giris->exec->("INSERT INTO duyuru where duyuru_no=? and duyuru_icerik=?") VALUES ('$duyuru_no','$duyuru_ad');

?>
<html>
	<head>
		<title>
		</title>
	</head>
	<body>
		<div>
			<div class="row">
	     		<div class="container">
	     			<div class="col-md-12">
		     			<div class="col-md-6">
		     				<form action="" method="post" id="form">
								<table>
									<h4>Duyurular</h4>
									<tr>
										<td>Duyuru Numarası:</td>
										<td><input type="text" class="form-control" name="duyuru_no" required><?php echo "$duyuru_no"; ?></td>
									</tr>

									<tr>
										<td>Duyuru adı:</td>
										<td><input type="text" class="form-control" name="duyuru_ad" required> <?php echo "$duyuru_ad"; ?></td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>