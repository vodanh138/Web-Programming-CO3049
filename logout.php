<?php
session_start();

// Xóa tất cả các biến phiên
$_SESSION = array();

// Hủy bỏ phiên làm việc
session_destroy();

// Chuyển hướng người dùng đến trang chính
header("Location: index.php");
exit;
?>
