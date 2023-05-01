<?php
session_start();
session_destroy();
header("location:../login/usuario_login.php");
?>