<?php
include_once('header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>图书馆管理系统</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="Login_Register" style="height: 320px;">
    <h2>借阅管理</h2>
    <form action="borrow_ope.php" method="post">
        读者ID：<input type="text" name="userid" placeholder="请输入读者id"><br><br>
        图书号：<input type="text" name="bookid" placeholder="请输入图书号"><br><br>
        <h3 id="borrowMan">操作：<input type="radio" name="operation" value="0" checked>借书&nbsp&nbsp&nbsp<input type="radio" name="operation" value="1">还书</h3>
        <button type="submit" name="ok">确定</button>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <button type="submit" name="ok2">重置</button>

    </form>
</div>
</body>

