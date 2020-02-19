<!-- เชื่อมข้อมูลกับฐานข้อมูล -->
<?php include "../connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Equipment List</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Mitr&display=swap" rel="stylesheet"> 
    <style>
        body 
        {
            font-family: 'Mitr', sans-serif;
            background-color: #E8ECEF;
		}
        .kku
        {
            width: 100px;
            height: 160px;
            float: right;
            padding-right: 60;
        }
        .sc
        {
            width: 180px;
            height: 160px;
            float: right;
            padding-right: 40px;
        }

    </style>
    
</head>
<body>

    <div class="jumbotron">
        <img src="../img/KKU.png" class="kku ">
        <img src="../img/SC.png" class="sc">
        <h2 class="display-2">หน้าแสดงอุปกรณ์เครื่องมือ</h2>
        <p class="lead">ระบบยืมและคืนอุปกรณ์เครื่องมือ สาขาวิชาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น</p>
        <hr class="my-4">

        <center>
            <div class="card border-primary mb-3" style="width: 90rem;">
                <div class="card-body">

                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">รูปอุปกรณ์</th>
                                <th scope="col">รหัสอุปกรณ์</th>
                                <th scope="col">ชื่ออุปกรณ์</th>
                                <th scope="col">วันที่ทำการซื้อ</th>
                                <th scope="col">ที่อยู่</th>
                                <th scope="col">รายละเอียด</th>
                                <th scope="col">สถานะการยืม</th>
                                <th scope="col">ตัวเลือก</th>
                            </tr>
                        </thead>
                        
                        <tbody>          
                        <?php require_once '../Func_DelQ.php'; ?>

                        <?php

                            // ฟังก์ชันการใช้ลูปวนเพื่อนำข้อมูลออกตามจำนวนข้อมูลที่มี ID=001S
                            while($row = $que->fetch_assoc())
                            {

                        ?>
                            <tr>
                                <th scope="row">1</th>
                                <td><?php echo $row["eq_id"]?></td>
                                <td><?php echo $row["eq_name"]?></td>
                                <td><?php echo $row["eq_date"]?></td>
                                <td><?php echo $row["eq_address"]?></td>
                                <td><?php echo $row["eq_detail"]?></td>
                                <td><?php echo $row["eq_status"]?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-outline-info" onclick="location.href='EditEquipments.php?edit=<?php echo $row['eq_id'];?>'">แก้ไข</button>
                                        <button type="button" class="btn btn-outline-danger" onclick="location.href='ShowEquipments.php?delete=<?php echo $row['eq_id'];?>'">ลบ</button>
                                    </div>
                                </td>
                            </tr>

                        <?php 
                            // จบลูป while ID=001s
                            } 
                        ?>

                        </tbody>
                    </table>

                    <br>

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button class="btn btn-lg btn-outline-primary" onclick="location.href='../Equipment/InsertEquipments.php'">ลงทะเบียนอุปกรณ์</button>
                        <button type="button" class="btn btn-lg btn-outline-warning" onclick="location.href='../LogIn/AdminLogIn.php'">กลับ</button>
                    </div> 
                    
                </div>
            </div>
        </center>

    </div>
    
</body>
</html>