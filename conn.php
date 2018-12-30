<?php
	try
	{
		$db = new PDO("mysql:host=127.0.0.1;dbname=kayitbilgisi; charset:utf-8",'root',''); //Veritabanı bağlantısı
		$db -> exec("SET NAMES 'utf8'; SET CHARSET 'utf8'"); //veritababı türkçe sorunu için
	}
	catch (PDOException $e)
	{
		print $e->getMessage();
	}
?>
