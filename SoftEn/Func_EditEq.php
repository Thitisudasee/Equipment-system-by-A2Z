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

        // ฟังก์ชันการอัพเดทอัพเดทข้อมูล
        $sql = "UPDATE equipments SET eq_id='$id', eq_name='$name', eq_date='$date', eq_address='$address', eq_detail='$detail', eq_status='$status', eq_image='$image' 
                WHERE equipments.eq_id='$id'";
   
        if($conn->query($sql) === TRUE) 
        {
            echo "<script>if(confirm('แก้ไขข้อมูลอุปกรณ์สำเร็จ !!')){window.location.href='Equipment/ShowEq_admin.php'};</script>";
        }
        else
        {
            echo "<script>if(confirm('แก้ไขข้อมูลอุปกรณ์สำเร็จไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!')){window.location.href='Equipment/ShowEq_admin.php'};</script>";
        }
    }
?>