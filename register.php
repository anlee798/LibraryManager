<?php
include_once("conn.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>图书馆管理系统注册模块</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="register">
    <form action="" method="post">
        <h2>图书馆管理系统用户账号注册</h2>
        &nbsp&nbsp用户名&nbsp：<input type="text" name="name" placeholder="请输入用户名"><br><br>
        &nbsp&nbsp用户ID&nbsp：<input type="text" name="userid" placeholder="请输入用户id"><br><br>
        设置密码：<input type="password" name="password" placeholder="请输入密码"><br><br>
        所在班级：<input type="text" name="class" placeholder="请输入所在班级"><br>
        <button type="submit" name="ok1">提交</button>
        <button type="submit" name="ok2">重置</button><br>
        <?php
        if(isset($_POST['ok1'])){
            $name = $_POST['name'];
            $arr = array();
            $id = $_POST['userid'];
            $password = md5($_POST['password']);
            $class = $_POST['class'];
            $time = date('Y-m-d h:i:s', time());
            $query = "Select * from user";
            $stmt= $dbh->query($query);
            foreach ($stmt as $row){
                array_push($arr,$row['id']);
            }
            if(in_array($id,$arr)){
                echo "<h4 style='color: #d43f3a'>账号已存在，请重新输入账号！</h4>";
            }else{
                $query2 = "Insert into user(id,pwd,name,class)values(:id,:pwd,:name,:class)";
                $stmt2 = $dbh->prepare($query2);
                $stmt2->bindParam(':id',$id);
                $stmt2->bindParam(':pwd',$password);
                $stmt2->bindParam(':name',$name);
                $stmt2->bindParam(':class',$class);
                $stmt2->execute();

//                $query2 = "Insert into user values('$id','$password','$name','$class','1','0','$time')";
//                $stmt2=$dbh->query($query2);
                if($stmt2){
                    $_SESSION['id'] = $id;
                    header('Location:admin.php');
                }else{
                    echo "<h4 style='color: #d43f3a'>账号信息有误，请重新输入账号！</h4>";
                }

            }
        }
        ?>
    </form>
    <a href="index.php" style="float: right;margin-right: 20px;">返回登录界面</a>
</div>
</body>
</html>

