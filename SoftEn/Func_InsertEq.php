<?php
    include_once('connect.php');
    
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $category = $_POST['category'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $detail = $_POST['detail'];
        $permission = $_POST['permission'];
    
        $sql = "INSERT INTO equipments (eq_id, eq_type, eq_name, eq_date, eq_address, eq_price, eq_status, eq_detail, eq_permit) 
                VALUES ('$id', '$category', '$name', (NOW()), '$address', '$price', '$status', '$detail', '$permission')";

        $result = "SELECT * FROM equipments WHERE equipments.eq_id = '$id";
        $count = $conn->query($result);

        if ($conn->query($sql) && $id <> $row['eq_id'])
        {
            echo "<script > alert('เพิ่มอุปกรณ์สำเร็จ!!'); window.location.href = 'SoftEn/../Equipment/ShowEq_admin.php'; </script>";
        }
        else 
        {
            echo "<script> alert('เพิ่มอุปกรณ์ไม่สำเร็จ เนื่องจากหมายเลขอุปกรณ์ซ้ำกัน'); window.location.href = 'SoftEn/../Equipment/InsertEquipments.php'; </script>";
        }
    }
?>