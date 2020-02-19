<?php
    include_once('connect.php');
    
    if(isset($_POST['submit']))
    {
        $usrid = $_POST['id'];
        $password = $_POST['psw'];
        $firstnm = $_POST['name'];
        $lastnm = $_POST['sur'];
        $gender = $_POST['gender'];
        $dept = $_POST['dept'];
        $status = $_POST['roles'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
    
        $sql = "INSERT INTO user (user_id, password, firstname, lastname, gender, department, roles, email, phone) 
                VALUES ('$usrid', '$password', '$firstnm', '$lastnm', '$gender', '$dept', '$status', '$email', '$phone')";

        $result = "SELECT * FROM user WHERE user_id = '$usrid";
        $count = $conn->query($result);

        // เช็คว่าข้อมูลถูกคิวรี่หรือไม่
        if ($conn->query($sql) || $count < 0)
        {
            echo "<script > alert('ลงทะเบียนสำเร็จ'); window.location.href = 'SoftEn/../LogIn/LogIn.php'; </script>";
        }
        else
        {
            echo "<script> alert('ลงทะเบียนไม่สำเร็จ กรุณากรอกใหม่'); window.location.href = 'SoftEn/../Register/Registration.php'; </script>";
        }
    }
?>