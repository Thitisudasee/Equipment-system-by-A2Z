<?php
    include_once('connect.php');

    if(isset($_POST['log']))
    {
        $addid = $_POST['id'];
        $password = $_POST['psw'];

        $sql = "SELECT * FROM admin WHERE admin_id='$addid'";
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc())
        {
            if($addid == $row['admin_id'] && $password == $row['admin_password']) 
            {
                echo "<script>if(confirm('เข้าสู่ระบบสำเร็จ!!!')){window.location.href='Equipment/ShowEq_admin.php'};</script>";
            }
            else
            {
                echo "<script>if(confirm('เข้าสู่ระบบไม่สำเร็จ กรุณาลองใหม่อีกครั้ง!!!')){window.location.href='LogIn/AdminLogIn.php'};</script>";
            }
        }
    }
?>