<!-- เชื่อมข้อมูลกับฐานข้อมูล -->
<?php include "../connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
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
        <h2 class="display-2">ลงทะเบียน</h2>
        <p class="lead">ระบบยืมคืนอุปกรณ์เครื่องมือ สาขาวิชาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น</p>
        <hr class="my-4"> 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <ul class="list-unstyled">
                    <li><strong><u>เงื่อนไขการลงทะเบียน</u></strong></li>
                    <li>1. กำหนดรหัสผ่านให้ประกอบไปด้วยตัวอักษรภาษาอังกฤษตัวเล็ก ตัวใหญ่ และตัวเลขผสมกันอย่างน้อย 8 ตัว เช่น <span class="badge badge-warning">Password: Aaaa123456</span></li>
                    <li>2. กรอกรหัสประจำตัวและเบอร์โทรศัพท์ต้องมีขีด (-) ทุกครั้ง เช่น <span class="badge badge-warning">UserID: xxxxxxxx-x และ Tel: xxx-xxx-xxxx</span></li>
                    <li>3. ชื่อและนามสกุล ต้องกรอกเป็นภาษาอังกฤษเท่านั้น เช่น <span class="badge badge-warning">Firstname: Manchester และ Surname: United</span></li>
                </ul>
            </div>

        <center>  
            <form action="../Func_Reg.php" method="post" >

                <div class="card border-primary mb-3" style="width: 80rem;">
                    <div class="card-body">

                        <!-- Container 1 มี Id, Password -->
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">

                                    <!-- กรอก UserID -->
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">UserID</span>
                                    </div>
                                    <input required type="text" class="form-control" placeholder="กรอกรหัสประจำตัวผู้ใช้" name="id" pattern="^(\d{9,9})*-(\d{1,1})" >
                                    </div>

                                </div>
                                <div class="col-sm">

                                    <!-- กรอก Password -->
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Password</span>
                                    </div>
                                    <input required type="password" class="form-control" placeholder="กรอกรหัสผ่าน" name="psw" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" >
                                    </div>

                                </div>
                            </div>
                        </div>  
                        
                        <!-- Container 2 มี ชื่อ, เพศ, สกุล, สาขา-->
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">

                                    <!-- กรอก ชื่อจริง -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Firstname</span>
                                        </div>
                                        <input required type="text" class="form-control" placeholder="กรอกชื่อจริง" name="name" pattern="(^[A-Z][a-z]+)" >
                                    </div>

                                    <!-- เลือก เพศ -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="Dropdow_Gender">Gender</label>
                                        </div>
                                        <select required class="custom-select" id="Dropdow_Gender"name="gender" >
                                            <option value="" disabled selected>ระบุเพศ</option>
                                            <optgroup label="เพศ">
                                            <option value="ชาย">ชาย</option>
                                            <option value="หญิง">หญิง</option>
                                            <option value="เพศทางเลือก">เพศทางเลือก</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm">
                                    
                                    <!-- กรอก ชื่อสกุล -->
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Surname</span>
                                    </div>
                                    <input required type="text" class="form-control" placeholder="กรอกชื่อสกุล" name="sur" pattern="(^[A-Z][a-z]+)" >
                                    </div>

                                    <!-- เลือก สาขา -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="Dropdown_Major">Department</label>
                                        </div>
                                        <select required class="custom-select" id="Dropdown_Major" name="dept" >
                                            <option value="" disabled selected>ระบุสาขาวิชา</option>
                                            <optgroup label="สาขา">
                                            <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                                            <option value="วิทยาการคอมพิวเตอร์ โครงการพิเศษ">วิทยาการคอมพิวเตอร์ โครงการพิเศษ</option>
                                            <option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
                                            <option value="เทคโนโลยีสารสนเทศ โครงการพิเศษ">เทคโนโลยีสารสนเทศ โครงการพิเศษ</option>
                                            <option value="ภูมิศาสตร์สารสนเทศ">ภูมิศาสตร์สารสนเทศ</option>
                                            <option value="ภูมิศาสตร์สารสนเทศ โครงการพิเศษ">ภูมิศาสตร์สารสนเทศ โครงการพิเศษ</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div> 

                        <!-- Container 3 มี Roles, Mail, Phone -->
                        <div class="container">
                            <div class="row">
                                <div class="col-sm">

                                    <!-- เลือก Roles -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="Dropdown_Role">ตำแหน่ง</label>
                                        </div>
                                        <select required class="custom-select" id="Dropdown_Role" name="roles" >
                                            <option value="" disabled selected>ระบุตำแหน่ง</option>
                                            <optgroup label="ตำแหน่ง">
                                            <option value="นักศึกษา">นักศึกษา</option>
                                            <option value="อาจารย์">อาจารย์</option>
                                            <option value="พนักงาน">พนักงาน</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm">

                                    <!-- กรอก E-Mail -->
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">E-Mail</span>
                                    </div>
                                    <input required type="email" class="form-control" placeholder="กรอกอีเมล" name="email" >
                                    </div>

                                </div>
                                <div class="col-sm">

                                    <!-- กรอก Phone Number -->
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Tel</span>
                                    </div>
                                    <input required type="text" class="form-control" placeholder="กรอกเบอร์โทรศัพท์" name="phone" pattern="^[0-9]\d{2}-\d{3}-\d{4}$" >
                                    </div>

                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-lg btn-outline-success" name="submit" id="submit">ยืนยัน</button>
                            <button type="button" class="btn btn-lg btn-outline-warning" name="back" id="back" onclick="location.href='../LogIn/LogIn.php'">กลับ</button>
                            <!-- <button type="button" class="btn btn-lg btn-outline-danger">ลืมรหัสผ่าน</button> -->
                        </div>
                        
                    </div>
                </div>

            </form>
        </center>

    </div>

</body>
</html>