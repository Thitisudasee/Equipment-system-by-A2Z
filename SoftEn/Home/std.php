<?php include "../connect.php"; 
session_start();
// ตรวจสอบวา่ มชี อื่ ใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
if (empty($_SESSION["username"]) ) {
header("location: ../LogIn/LogIn.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student</title>
	<?php
        include 'bootstrap.php';
    ?>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Mitr&display=swap" rel="stylesheet"> 
        <style>
        body 
        {
            font-family: 'Mitr', sans-serif;
		}
        .kku
        {
            position: absolute;
            right: 0px;
            width: 7%;
            height: 20%;
            /* border: 3px solid #222; */
            padding: 5px;
            margin-top: 5px;
            margin-right: 50px;
        }
        .sc
        {
            position: absolute;
            right: 0px;
            width: 10%;
            height: 20%;
            border: 3px solid #fff;
            padding: 1px;
            margin-top: 200px;
            margin-right: 50px;
        }
        .eq
        {
            padding-right: 90px;
            padding-left: 90px;
            padding-top: 20px;
        }
        .allbordder
        {
            margin-top: 30px;
            margin-left: 30px;
            margin-right : 20px;
        }
        .tbbor
        {
            /* margin-left: 5px; */
            margin-right : 50px;
        }
        .navbor
        {
            margin-left: 5px;
            margin-right : 5px;
        }
        .flexbox
        {
            display:
        }
        .logout
        {          
            padding-right: flex;   
        }

    </style>
	
</head>
<body>
	<div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">A2Z</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="std.php">หน้าแรก <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../Equipment/ShowEq_user.php">รายการครุภัณฑ์</a>
			</li>
			</ul>
		</div>
		<span class="navbar-text">
				<button class="btn btn-outline-danger my-2 my-sm-0" onclick="location.href='../LogIn/Logout.php'" type="submit">ออกจากระบบ</button>
		</span>
		</nav>
			<h2 class="allborder lead-8">สวัสดี  คุณ<?=$_SESSION["fullname"]?></h2>
	
	</div>
	

</body>
</html>