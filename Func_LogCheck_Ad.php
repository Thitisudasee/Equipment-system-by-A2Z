<?php
    include_once('connect.php');

    if(isset($_POST['log']))
    {
        $userid = $_POST['id'];
        $password = $_POST['psw'];

        $sql = "SELECT * FROM user WHERE user_id='$userid'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc())
        {
   
            if($userid ==  $row['user_id'] &&  $password == $row['password']) 
            {
                echo "<script>if(confirm('เข้าสู่ระบบสำเร็จ !!')){window.location.href='Equipment/ShowEq_user.php'};</script>";
            }
            else
            {
                echo "<script>if(confirm('เข้าสู่ระบบไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!')){window.location.href='LogIn/LogIn.php'};</script>";
            }
        }
    }
?>