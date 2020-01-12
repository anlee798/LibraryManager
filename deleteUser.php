<?php
include_once("header.php");
include_once("conn.php");
$id = $_GET['user_id'];
$query = "Delete from user where id='$id'";
$smtm = $dbh->query($query);
$query2 = "Delete from borrow_list where user_id='$id'";
$smtm2 = $dbh->query($query2);
echo "<h2 style='text-align: center; margin-top: 150px;'>删除成功！</h2>";
?>