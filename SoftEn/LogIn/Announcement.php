<?php
    include_once('../connect.php');
    
    if(isset($_POST['ann']))
    {
        $word = $_POST['word'];
    
        $sql = "UPDATE admin SET announcement='$word' WHERE admin.admin_id='admin'";

        $result = "SELECT * FROM admin WHERE admin.announcement = '$word";
        $count = $conn->query($result);

        // เช็คว่าข้อมูลถูกคิวรี่หรือไม่
        if ($conn->query($sql) === TRUE)
        {
            echo "<script > alert('ประกาศสำเร็จ!!'); window.location.href = '../Equipment/ShowEq_admin.php'; </script>";
        }
        else
        {
            echo "<script> alert('เพิ่มข้อมูลอุปกรณ์ไม่สำเร็จ เนื่องจากหมายเลขอุปกรณ์ซ้ำกัน'); window.location.href = 'ShowEq_admin.php'; </script>";
        }
    }
?>