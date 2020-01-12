<?php
include_once("conn.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>图书馆管理系统</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="Login_Register">
    <h2>图书馆管理系统</h2>
    <form action="login.php" method="post">
        用户名：<input type="text" name="userid" placeholder="请输入用户id"><br><br>
        密&nbsp&nbsp&nbsp&nbsp码：<input type="password" name="password" placeholder="请输入密码"><br><br>
        <button type="submit" name="ok1">登录</button>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <button type="submit" name="ok2">注册</button>
    </form>
</div>
</body>
