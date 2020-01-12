<?php
include_once('header.php');
include_once("conn.php");
$userid = $_SESSION['id'];
$flag = 0;
$queryUser = "select * from user where id = '$userid'";
$st = $dbh->query($queryUser);
foreach ($st as $row){
    if($row['admin']==1){
        $flag = 1;
    }
}
if($flag==0){
    echo "<h1 style='margin: 200px auto;text-align: center;'>你不具有此权限！</h1>";
}else{
    $query = "select * from user";
    $stmt= $dbh->query($query);
    echo "<table border='1px gray solid' width='600px' align='center' cellpadding='0' cellspacing='0'>";
    echo "<caption><h2>用户管理界面</h2></caption>";
    echo "<tr style='line-height: 40px;'><th>用户ID</th><th>姓名</th><th>班级</th><th>最后登录时间</th><th>操作</th></tr>";
    foreach ($stmt as $row){
        if($row['admin']!=1){
            echo "<tr style='text-align: center;line-height: 40px'>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['class']."</td>";
            echo "<td>".$row['last_login_time']."</td>";
            $id = $row['id'];
            echo "<td>"."<a href='userborrowInf.php?user_id=$id'>详情</a>"."&nbsp&nbsp&nbsp<a href='AlterUserManager.php?user_id=$id'>修改</a>"."&nbsp&nbsp&nbsp<a href='deleteUser.php?user_id=$id'>删除</a>"."</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
}
?>
