<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
session_start();

$params = session_get_cookie_params();
setcookie(session_name(), '', time() - 42000,
$params["path"], $params["domain"],
$params["secure"], $params["httponly"]
);
session_destroy();
?>

 <script>
       setTimeout(function() {
        swal({
            title: "ออกจากระบบสำเร็จ",
            type: "success"
        }, function() {
            window.location = "Login.php";
        });
    }, 100);
</script>

