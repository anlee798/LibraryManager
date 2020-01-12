<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>图书馆管理系统</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="style/jquery-3.3.1.js"></script>
    <script src="style/JQ.js"></script>
</head>
<body>
<div id="header">
    <h1>图书馆管理系统</h1>
    <ul>
        <a href="admin.php"><li>主页</li></a>
        <a href="view.php"><li>图书管理</li></a>
        <a href="usermanager.php"><li>用户管理</li></a>
        <a href="borrowmanager.php"><li>借阅管理</li></a>
    </ul>
    <h4>
        <?php
            session_start();
            echo "用户：".$_SESSION['id']; ?>
    </h4>&nbsp&nbsp&nbsp&nbsp&nbsp
    <a href="index.php">退出</a>
</div>
</body>