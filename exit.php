<?php
//session_destroy();
session_start();
session_unset();
header("Refresh: 0; URL=../index.php");
exit();
?>