<?php
session_start();

//session_destroy(); //การทำลายทั้งหมดมีกี่ตัวก็ชั่ง

unset ($_SESSION['aid']);
unset ($_SESSION['aname']); 
echo "<script>";
echo "window.location='login2.php';";
echo "</script>";

?>