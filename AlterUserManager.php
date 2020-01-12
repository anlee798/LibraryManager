<?php
include_once('header.php');
include_once("conn.php");
$userid = $_GET['user_id'];
$query ="Select * from user where id='$userid'";
$stmt=$dbh->query($query);
foreach ($stmt as $row){
    $row['id'];
    $row['name'];
    $row['class'];
}
echo "<div id='alter'>";
echo "<h3>用户ID：{$row['id']}</h3>";
echo "<h4>修改信息</h4>";
echo "<form action='' method='post'>";
echo "姓名：<input type='text' name='name' value='{$row['name']}'><br>";
echo "班级：<input type='text' name='class' value='{$row['class']}'><br>";
echo "<button type='submit' name='ok'>提交修改信息</button>";
echo "</form></div>";
if(isset($_POST['ok'])){
    $newName = $_POST['name'];
    $newClass = $_POST['class'];
    $query2 = "update user 
                set class='$newClass',`name` = '$newName' 
                where id='$userid'";
    $stmt=$dbh->query($query2);
    echo "<h2 style='text-align: center;'>修改用户信息成功</h2>";
    //header('Location:admin.php');
}
?>







