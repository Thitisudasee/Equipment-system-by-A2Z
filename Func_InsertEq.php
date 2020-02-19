<?php
    include_once('connect.php');
    
    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $address = $_POST['address'];
        $detail = $_POST['detail'];
        $status = $_POST['status'];
        $image = $_POST['image'];
    
        $sql = "INSERT INTO equipments (eq_id, eq_name, eq_date, eq_address, eq_detail, eq_status, eq_image) 
                VALUES ('$id', '$name', '$date', '$address', '$detail', '$status', '$image')";

        $result = "SELECT * FROM equipments WHERE eq_id = '$id";
        $count = $conn->query($result);

        // เช็คว่าข้อมูลถูกคิวรี่หรือไม่
        if ($conn->query($sql) || $count < 0)
        {
            echo "<script > alert('เพิ่มข้อมูลอุปกรณ์สำเร็จ!!'); window.location.href = 'SoftEn/../Equipment/ShowEquipments.php'; </script>";
        }
        else
        {
            echo "<script> alert('เพิ่มข้อมูลอุปกรณ์ไม่สำเร็จ เนื่องจากหมายเลขอุปกรณ์ซ้ำกัน'); window.location.href = 'SoftEn/../Equipment/InsertEquipments.php'; </script>";
        }
    }
?>