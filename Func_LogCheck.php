<?php
    include_once('connect.php');

    if(isset($_POST['log']))
    {
        $usrid = $_POST['id'];
        $password = $_POST['psw'];
    }

    $sql = "SELECT * FROM user WHERE user.user_id='$usrid' AND user.password='$password'";

    if($conn->query($sql) === TRUE) 
    {
        echo "<script>if(confirm('แก้ไขข้อมูลอุปกรณ์สำเร็จ !!')){window.location.href='Equipment/ShowEquipments.php'};</script>";
    }
    else
    {
        echo "<script>if(confirm('แก้ไขข้อมูลอุปกรณ์สำเร็จไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!')){window.location.href='LogIn/LogIn.php'};</script>";
    }
?>