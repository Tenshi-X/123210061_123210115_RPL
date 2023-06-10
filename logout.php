<?php
    session_start();
    session_destroy();
    $_SESSION['pesan']= "Logout success!";
    header("location:index.php?logout=success");
?>