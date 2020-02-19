<!-- เชื่อมข้อมูลกับฐานข้อมูล -->
<?php include "../connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InsertData</title>
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
        <h2 class="display-2">ลงทะเบียนอุปกรณ์</h2>
        <p class="lead">ระบบยืมและคืนอุปกรณ์เครื่องมือ สาขาวิชาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น</p>
        <hr class="my-4"> 
    
        <center>  
            <form action="../Func_InsertEq.php" method="post">

                <div class="card border-primary mb-3" style="width: 80rem;">
                    <div class="card-body">

                        <!-- Cantainer 1 มี หมายเลข, ชื่อ -->
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">

                                    <!-- กรอก หมายเลขอุปกรณ์ -->
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">หมายเลขอุปกรณ์</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="กรอกหมายเลขอุปกรณ์" name="id" required>
                                    </div>

                                </div>
                                <div class="col-sm">

                                    <!-- กรอก ชื่ออุปกรณ์ -->
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">ชื่ออุปกรณ์</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="กรอกชื่ออุปกรณ์" name="name" required>
                                    </div>

                                </div>
                                
                            </div>
                        </div>  
                        
                        <!-- Cantainer 2 วันที่นำเข้า, ที่จัดเก็บ, สถานะ, รายละเอียด, รูปภาพ -->
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">

                                    <!-- กรอก วันที่นำเข้า-->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">วันที่นำเข้า</span>
                                        </div>
                                        <input type="date" class="form-control" placeholder="กรอกวันที่นำเข้า" name="date" required>
                                    </div>

                                    <!-- กรอก ที่จัดเก็บ -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">ที่จัดเก็บ</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="กรอกที่จัดเก็บ" name="address" required>
                                    </div>

                                    <!-- เลือก รูปภาพ -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">เลือกรูปภาพ</label>
                                        </div>
                                        <form class="imgForm" action="leanform.php" method="post" enctype="multipart/form-data" required>
                                        <input type="file" name="image">
                                    </div>
                                    
                                </div>
                                <div class="col-sm">

                                    <!-- เลือก สถานะ -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">สถานะการยืม</label>
                                        </div>
                                        <select type="text" class="custom-select" id="inputGroupSelect01" name="status" required>
                                            <option disabled selected>ระบุสถานะ</option>
                                            <optgroup label="สถานะที่ต้องการ">
                                            <option selected>ว่าง</option>
                                        </select>
                                    </div>

                                    <!-- กรอก รายระเอียด -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">รายละเอียด</label>
                                        </div>
                                        <textarea rows="3" cols="10" class="form-control" placeholder="กรอกรายระเอียด" name="detail" required ></textarea>
                                    </div>

                                </div>
                            </div>
                        </div> 

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-lg btn-outline-success" name="submit">ยืนยัน</button>
                            <button type="button" class="btn btn-lg btn-outline-warning" onclick="location.href='ShowEquipments.php'">กลับ</button>
                        </div>
                        
                    </div>
                </div>

            </form>
        </center>

    </div>

</body>
</html>