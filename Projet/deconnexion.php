<?php 
session_start();
session_destroy();
header('Location:qcm1.php');
exit;
?>