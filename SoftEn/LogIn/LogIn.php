<!-- เชื่อมข้อมูลกับฐานข้อมูล -->
<?php include "../connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LogIn</title>

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
        <h2 class="display-2">เข้าสู่ระบบ</h2>
        <p class="lead">ระบบยืมและคืนอุปกรณ์เครื่องมือ สาขาวิชาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น</p>
        <hr class="my-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><u>เงื่อนไขการเข้าสู่ระบบ</u></strong> 
                <br>
                1. ผู้ใช้จะต้องทำการลงทะเบียนผู้ใช้ในระบบก่อน จึงจะมีสิทธิ์ในการยืมคืนอุปกรณ์เครื่องมือ
                <br>
                2. ระบบขอสงวนสิทธิ์การใช้งานสำหรับผู้ใช้ในสาขาวิชาวิทยาการคอมพิวเตอร์เท่านั้น
                <br>
                3. กรอกรหัสประจำตัวต้องมีขีด (-) ทุกครั้ง เช่น <span class="badge badge-warning">UserID: xxxxxxxx-x</span>
            </div>

        <center>
            <form action="../Func_LogCheck.php" method="post">

                <div class="card border-primary mb-3" style="width: 50rem;">
                    <div class="card-body">

                        <!-- กรอก UserID -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">UserID</span>
                            </div>
                            <input type="text" class="form-control" placeholder="กรอกรหัสประจำตัวผู้ใช้" name="id" id="id" pattern="^(\d{9,9})*-(\d{1,1})" required>
                        </div>

                        <!-- กรอก Password -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Password</span>
                            </div>
                            <input type="password" class="form-control" placeholder="กรอกรหัสผ่าน" name="psw" id="psw" required>
                        </div>

                        <br>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="submit" class="btn btn-lg btn-outline-success" name="log" id="log">เข้าสู่ระบบ</button>
                            <button type="button" class="btn btn-lg btn-outline-warning" name="reg" id="reg" onclick="location.href='../Register/Registration.php'">ลงทะเบียนผู้ใช้ใหม่</button>
                            <button type="button" class="btn btn-lg btn-outline-primary" name="admin" id="admin" onclick="location.href='AdminLogIn.php'">ผู้ดูแลระบบ</button>
                            <!-- <button type="button" class="btn btn-lg btn-outline-danger">ลืมรหัสผ่าน</button> -->
                        </div>
                    </div>
                </div>

            </form>
        </center>

    </div>
    
</body>
</html>