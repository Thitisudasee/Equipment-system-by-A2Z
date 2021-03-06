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
    <title>Equipment List</title>

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
            <a class="nav-link" href="ShowEq_admin.php">รายการครุภัณฑ์</a>
        </li>
        </ul>
    </div>
    <span class="navbar-text">
            <button class="btn btn-outline-danger my-2 my-sm-0" onclick="location.href='../LogIn/Logout.php'" type="submit">ออกจากระบบ</button>
    </span>
    </nav>
    <div class="jumbotron">
        <!-- <img src="../img/KKU.png" class="kku ">
        <img src="../img/SC.png" class="sc"> -->

        <h2 class="allborder lead-8">หน้าจัดการอุปกรณ์(ผู้ดูแลระบบ)</h2>
        <p class="allborder lead">ระบบยืมและคืนอุปกรณ์เครื่องมือ สาขาวิชาวิทยาการคอมพิวเตอร์ คณะวิทยาศาสตร์ มหาวิทยาลัยขอนแก่น</p>
        <hr class="allborder my-4">

        <div class="card border-primary mb-3" style="width: flex;">
            <div class="card-body">
                <nav class="navbar navbar-light sticky-top" style="background-color: #fff;">

                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-lg btn-primary" name="add" id="add" onclick="location.href='../Equipment/InsertEquipments.php'">ลงทะเบียนอุปกรณ์</button>
                </div> 
                <div class="col-md-2 float-right">
    </div>

                <!-- <form class="form-inline" action= method="POST">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">ค้นหา</button>
                </form> -->

                </nav>

                <table class="table table-bordered table-light">
                    <thead class="thead-dark">
                        <tr>
                            <!-- <th scope="col">รูปอุปกรณ์</th> -->
                            <th scope="col">หมายเลขครุภัณฑ์</th>
                            <th scope="col">ประเภทอุปกรณ์</th>
                            <th scope="col">ชื่ออุปกรณ์</th>
                            <th scope="col">วันที่ลงทะเบียน</th>
                            <th scope="col">สถานที่จัดเก็บ</th>
                            <th scope="col">รายละเอียด</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">สิทธิ์</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">ตัวเลือก</th>
                        </tr>
                    </thead>
                    
                    <tbody>          
                    <?php

                        $sql = "SELECT * FROM `equipments` WHERE eq_hidden = 0";
                        $que = $conn->query($sql);

                        // ฟังก์ชันการใช้ลูปวนเพื่อนำข้อมูลออกตามจำนวนข้อมูลที่มี ID=001S
                        while($row = $que->fetch_assoc())
                        {
                            $eqId = $row['eq_id'];

                    ?>
                        <tr>
                            <!-- <td><img src="img_eq/<?php echo $row["eq_image"]?>"width= '80' height='60'></td> -->
                            <td><?php echo $row["eq_id"]?></td>
                            <td><?php echo $row["eq_type"]?></td>
                            <td><?php echo $row["eq_name"]?></td>
                            <td><?php echo $row["eq_date"]?></td>
                            <td><?php echo $row["eq_address"]?></td>
                            <td><?php echo $row["eq_detail"]?></td>
                            <td><?php echo $row["eq_price"]?> บาท</td>
                            <td><?php echo $row["eq_permit"]?></td>
                            <td><span class="badge badge-primary"><?php echo $row["eq_status"]?></span></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                 <!-- onclick="location.href='../Func_DelQ.php?delete=<?php echo $row['eq_id'];?>'" -->
                                    <button id="edit" type="button" class="btn btn-outline-info" name="edit" id="edit" onclick="location.href='EditEquipments.php?edit=<?php echo $row['eq_id'];?>'">แก้ไข</button>
                                    <button type="button" class="btn btn-outline-danger" name="delete" id="delete" onclick="Delete('<?php echo $eqId ?>')">ลบ</button>

                                    <script type="text/javascript">
                                        function Delete(c)
                                        {
                                            var con = confirm("ต้องการลบอุปกรณ์ชิ้นนี้หรือไม่ ?");
                                            if(con == true)
                                            {
                                                var message = "../Func_DelQ.php?delete=" + c;
                                                window.location.href= message;
                                            }
                                            else
                                            {
                                                window.location.href='ShowEq_admin.php';
                                            }
                                        }
                                    </script>

                                </div>
                            </td>
                        </tr>
                        

                    <?php 
                        // จบลูป while ID=001s
                        $eqId = $row['eq_id'];
                            include ('../modal.php');
                        } 
                    ?>
                    

                    </tbody>
                    
                </table>    
                
               
            </div>
        </div>
       
    </div>
    

</body>
</html>