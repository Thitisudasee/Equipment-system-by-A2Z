<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php
include "connect2.php";
session_start();
$stmt = $pdo->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
$stmt->bindParam(1, $_POST["id"]);
$stmt->bindParam(2, $_POST["psw"]);
$stmt->execute();
$row = $stmt->fetch();

if (!empty($row)) {

session_regenerate_id();
$_SESSION["fullname"] = $row["firstname"]; 
$_SESSION["username"] = $row["email"];
$role = $row['roles'];
	if($role == 1)
	{
	echo "<script>if(confirm('เข้าสู่ระบบสำเร็จ !!')){window.location.href='Home/std.php'};</script>";
	}
	elseif($role == 2)
	{
	echo "<script>if(confirm('เข้าสู่ระบบสำเร็จ !!')){window.location.href='Home/teacher.php'};</script>"; 
	}
	elseif($role == 3)
	{
	echo "<script>if(confirm('เข้าสู่ระบบสำเร็จ !!')){window.location.href='Home/admin.php'};</script>";
	}
} 
else { 
	echo "<script>if(confirm('เข้าสู่ระบบไม่สำเร็จ Username หรือ Password ผิด กรุณากรอกใหม่อีกครั้ง !!')){window.location.href='LogIn/login.php'}else{window.location.href='LogIn/login.php'};</script>";}
?>

 