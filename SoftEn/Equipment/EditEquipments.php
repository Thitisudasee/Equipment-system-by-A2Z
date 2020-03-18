<!-- เชื่อมข้อมูลกับฐานข้อมูล -->
<?php include "../connect.php"; 
session_start();
// ตรวจสอบวา่ มชี อื่ ใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
if (empty($_SESSION["username"]) ) {
header("location: ../LogIn/LogIn.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Equipment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Mitr&display=swap" rel="stylesheet"> 
    <style>
		body 
        {
            font-family: 'Mitr', sans-serif;
		}
        .cardborder
        {
            margin-left: auto;
            margin-right: auto;
        }
        .btnar
        {

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
				<a class="nav-link" href="../Home/admin.php">หน้าแรก <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="../Equipment/ShowEq_admin.php">รายการครุภัณฑ์</a>
			</li>
			</ul>
		</div>
		<span class="navbar-text">
				<button class="btn btn-outline-danger my-2 my-sm-0" onclick="location.href='../LogIn/Logout.php'" type="submit">ออกจากระบบ</button>
		</span>
		</nav>
    <div class="jumbotron">
        <!-- <img src="../img/KKU.png" class="kku">
        <img src="../img/SC.png" class="sc"> -->
        <h2 class="display-4">แก้ไขข้อมูลครุภัณฑ์</h2>
        <p class="lead">ระบบยืมและคืนครุภัณฑ์เครื่องมือ สาขาวิชาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น</p>
        <hr class="my-4"> 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <ul class="list-unstyled">
                <li ><strong><u>เงื่อนไขการแก้ไขครุภัณฑ์</u></strong></li>
                <li>1. ไม่สามารถแก้ไขหมายเลขครุภัณฑ์และวันที่นำเข้าได้ </li>
                <li>2. รายละเอียดต้องเป็นยี่ห้อของครุภัณฑ์และคุณสมบัติ(ถ้ามี) เช่น <span class="badge badge-warning">Dell Optiplex 7010 DT CORE i7</span></li>
                <li>3. จำเป็นต้องกรอกทุกรายการ <span class="badge badge-danger" style="color:black"> ยกเว้น </span> สถานะ และ รายละเอียด</li> 
            </ul>
        </div>
        <!-- <center>   -->
            <form action="../Func_EditEq.php" method="post">

                <div class="cardborder card border-primary mb-3" style="width: auto ;">
                    <div class="card-body">

                        <?php
                            // ฟังก์ชันการคิวรี่ข้อมูลทั้งหมดจากฐานข้อมูล
                            $getID = $_GET['edit'];
                            $sql = "SELECT * FROM equipments where eq_id = '$getID'";
                            $que = $conn->query($sql);

                            // ฟังก์ชันการใช้ลูปวนเพื่อนำข้อมูลออกตามจำนวนข้อมูลที่มี ID=001E
                            while($row = $que->fetch_assoc())
                            {
                        ?>

                        <!-- Cantainer 1 มี หมายเลขอุปกรณ์, ประเภทอุปกรณ์ -->
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">                           

                                    <!-- กรอก หมายเลขอุปกรณ์ -->
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">หมายเลขอุปกรณ์</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="กรอกหมายเลขอุปกรณ์" value="<?php echo $row["eq_id"]?>" name="id" id="id"   pattern ="^(\d{13})?$"  required readonly>
                                    </div>

                                </div>
                                <div class="col-sm">

                                    <!-- กรอก ประเภทอุปกรณ์ -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">ประเภทอุปกรณ์</label>
                                        </div>
                                        <select type="text" class="custom-select" id="inputGroupSelect01" name="category" id="category"  require>
                                            <option readonly selected value="<?php echo $row["eq_type"]?>" >ประเภทอุปกรณ์ขณะนี้ "<?php echo $row["eq_type"]?>"</option>
                                             <!-- <optgroup label="เลือกประเภทที่ต้องการ">  -->
                                            <option value="อาคารถาวร">อาคารถาวร</option>
                                            <option value="อาคารชั่วคราว/โรงเรือน">อาคารชั่วคราว/โรงเรือน</option>
                                            <option value="สิ่งก่อสร้าง">สิ่งก่อสร้าง</option>
                                            <option value="ครุภัณฑ์สำนักงาน">ครุภัณฑ์สำนักงาน</option>
                                            <option value="ครุภัณฑ์ยานพาหนะและขนส่ง">ครุภัณฑ์ยานพาหนะและขนส่ง</option>
                                            <option value="ครุภัณฑ์ไฟฟ้าและวิทยุ">ครุภัณฑ์ไฟฟ้าและวิทยุ</option>
                                            <option value="ครุภัณฑ์โฆษณาและเผยแพร่">ครุภัณฑ์โฆษณาและเผยแพร่</option>
                                            <option value="ครุภัณฑ์การเกษตร">ครุภัณฑ์การเกษตร</option>
                                            <option value="ครุภัณฑ์โรงงาน">ครุภัณฑ์โรงงาน</option>
                                            <option value="ครุภัณฑ์ก่อสร้าง">ครุภัณฑ์ก่อสร้าง</option>
                                            <option value="ครุภัณฑ์สำรวจ">ครุภัณฑ์สำรวจ</option>
                                            <option value="ครุภัณฑ์วิทยาศาสตร์การแพทย์">ครุภัณฑ์วิทยาศาสตร์การแพทย์</option>
                                            <option value="ครุภัณฑ์คอมพิวเตอร์">ครุภัณฑ์คอมพิวเตอร์</option>
                                            <option value="ครุภัณฑ์การศึกษา">ครุภัณฑ์การศึกษา</option>
                                            <option value="ครุภัณฑ์งานบ้านงานครัว">ครุภัณฑ์งานบ้านงานครัว</option>
                                            <option value="ครุภัณฑ์กีฬา">ครุภัณฑ์กีฬา</option>
                                            <option value="ครุภัณฑ์ดนตรีและนาฏศิลป์">ครุภัณฑ์ดนตรีและนาฏศิลป์</option>
                                            <option value="ครุภัณฑ์อาวุทธ">ครุภัณฑ์อาวุธ</option>
                                            <option value="ครุภัณฑ์สนาม">ครุภัณฑ์สนาม</option>

                                        </select>
                                    </div>

                                </div>
                                
                            </div>
                        </div>  
                        
                        <!-- Cantainer 2 ชื่ออุปกรณ์, วันที่นำเข้า, ที่จัดเก็บ, สิทธิ์, ราคา, สถานะ, รายละเอียด -->
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">

                                    <!-- กรอก ชื่ออุปกรณ์ -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">ชื่ออุปกรณ์</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="กรอกชื่ออุปกรณ์" value="<?php echo $row["eq_name"]?>" name="name" id="name" required>
                                    </div>

                                    <!-- กรอก วันที่นำเข้า-->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">วันที่นำเข้า</span>
                                        </div>
                                        <input type="date" class="form-control" placeholder="กรอกวันที่นำเข้า" value="<?php echo $row["eq_date"]?>" name="date" id="date" readonly>
                                    </div>

                                    <!-- กรอก ที่จัดเก็บ -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">สถานที่จัดเก็บ</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="กรอกที่จัดเก็บ" value="<?php echo $row["eq_address"]?>" name="address" id="address" required>
                                    </div>

                                    <!-- กรอก สิทธื์ -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">สิทธิ์การเข้าถึง</label>
                                        </div>
                                        <select type="text" class="custom-select" id="inputGroupSelect01" name="permission" id="permission" required>
                                            <option readonly selected value ="<?php echo $row["eq_permit"]?>">สิทธิ์ของอุปกรณ์ขณะนี้ "<?php echo $row["eq_permit"]?>"</option>
                                            <!-- <optgroup label="สถานะที่ต้องการ"> -->
                                            <option value="นักศึกษา">นักศึกษา</option>
                                            <!-- <option value="อาจารย์">อาจารย์</option>
                                            <option value="บุคลากร">บุคลากร</option> -->
                                            <option value="อาจารย์และบุคลากร">อาจารย์และบุคลากร</option>
                                            <!-- <option value="ไม่จำกัดสิทธิ์">ไม่จำกัดสิทธิ์</option> -->
                                        </select>
                                    </div>

                                    
                                </div>
                                <div class="col-sm">

                                    <!-- กรอก ราคา -->
                                    <!-- <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">ราคาอุปกรณ์</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="กรอกราคาอุปกรณ์" value="<?php echo $row["eq_price"]?>" name="price" id="price" required >
                                    </div> -->

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">ราคาอุปกรณ์</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="กรอกราคาอุปกรณ์" value="<?php echo $row["eq_price"]?>" name="price" id="price" aria-label="Amount (to the nearest dollar)"  pattern ="^[0-9]*$" required>
                                            <div class="input-group-append">
                                            <span class="input-group-text">บาท</span>
                                        </div>
                                    </div>

                                    <!-- เลือก สถานะ -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">สถานะ</label>
                                        </div>
                                        <select type="text" class="custom-select" id="inputGroupSelect01" name="status" id="status" required>
                                            <option readonly selected value = "<?php echo $row["eq_status"]?>">สถานะของอุปกรณ์ขณะนี้ "<?php echo $row["eq_status"]?>"</option>
                                            <!-- <optgroup label="สถานะ"> -->
                                            <option value="ว่าง">ว่าง</option>
                                            <option value="ยืม">ยืม</option>
                                            <option value="ชำรุด">ชำรุด</option>
                                        </select>
                                    </div>

                                    <!-- กรอก รายระเอียด -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">รายละเอียด</label>
                                        </div>
                                        <textarea rows="3" cols="10" class="form-control" placeholder="กรอกรายละเอียด" name="detail" id="detail" ><?php echo $row["eq_detail"]?></textarea>
                                    </div>

                                </div>
                            </div>
                        </div> 
                        
                        <?php 
                            // จบลูป while ID=001E
                            } 
                        ?>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="submit" class="btn btn-lg btn-outline-success" name="submit" id="submit">ยืนยัน</button>
                            <button type="button" class="btn btn-lg btn-outline-warning" name="back" id="back" onclick="location.href='ShowEq_admin.php'">กลับ</button>
                        </div>
                        
                    </div>
                </div>

            </form>
        </center>

    </div>

</body>
</html>