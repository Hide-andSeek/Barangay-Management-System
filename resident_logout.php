<?php
DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
require "db/conn.php";

session_start();
$sth=$db->prepare("SELECT * FROM accreg_resident WHERE resident_id=?");
$sth->execute(array(
$_SESSION['email'])
);
$row=$sth->fetch(PDO::FETCH_ASSOC);
$count=$sth->rowCount();
$resident_id=$row['resident_id'];

$resident_status="offline";
		$stmt=$db->prepare('update accreg_resident SET resident_status=:resident_status where resident_id=:uid');
		$stmt->bindparam(':resident_status',$resident_status);
		$stmt->bindparam(':uid',$resident_id);
		$stmt->execute();
		
unset($_SESSION['email']);
	
	if(session_destroy())
	{
		header("Location: index.php");
	}
?>

