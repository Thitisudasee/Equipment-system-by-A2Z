<?php 

    include_once('connect.php');

    // ฟังก์ชันการคิวรี่ข้อมูลทั้งหมดจากฐานข้อมูล
    $sql = "SELECT * FROM equipments";
    $que = $conn->query($sql);
    
    // ฟังก์ชันการลบข้อมูล
    if(isset($_GET['delete']))
    {
        $del = $_GET['delete'];
        $sql = "DELETE FROM equipments where eq_id=$del";
        $del = $conn->query($sql);
    }
?>