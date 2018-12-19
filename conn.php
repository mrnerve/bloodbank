<?php
try{

	$db=new PDO("mysql:host=127.0.0.1;dbname=kayitbilgisi; charset:utf-8",'root','');
}
catch ( PDOException $e )
{
     print $e->getMessage();
}

?>
