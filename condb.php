<meta charset="utf-8">
<?php
	$host = "localhost"; //การประกาศตัวแปร
	$user = "root";
	$pwd = "12345678";
	$db = "parking_db";
	
	$conn = mysqli_connect($host,$user,$pwd)	//การเชื่อมต่อฐานข้อมูลdb
	or die("เชื่อมต่อข้อมูลไม่สำเร็จ");
	mysqli_select_db($conn, $db) or die("เลือกฐานข้อมูลไม่ได้");	//เป็นการตรวจสอบว่าเลือกฐานข้อมูลผิดหรือไม่
	mysqli_query($conn, "set name uf8");	//ทำให้อ่านภาษาไทยใน db ได้
?>