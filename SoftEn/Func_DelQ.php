<?php 
    include_once('connect.php');
   
    if(isset($_GET['delete']))
    {
        $del = $_GET['delete'];
        $sql = "DELETE FROM equipments where equipments.eq_id = '$del'";
        $del = $conn->query($sql);
    }
    if($conn->query($sql) == TRUE) 
    {
        echo "<script>if(alert('ลบข้อมูลอุปกรณ์สำเร็จ !!')){window.location.href='ShowEq_admin.php'};</script>";
        header("location: Equipment/ShowEq_admin.php");
    }
    else
    {
        echo "<script>if(alert('ลบข้อมูลอุปกรณ์สำเร็จไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!')){window.location.href='Equipment/ShowEq_admin.php'};</script>";
    }
?>