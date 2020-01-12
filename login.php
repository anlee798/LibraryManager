<!--用户登录判断界面-->
<?php
session_start();
include_once("conn.php");
if(isset($_POST['ok1'])){//点击登录按钮
    $userid = $_POST['userid'];
    $password = md5($_POST['password']);
    $strQuery = "select * from user where id = '$userid' and pwd ='$password'";
    $stmt= $dbh->query($strQuery);
    if($stmt->rowCount()==0){
        echo "账号或密码错误，请重新输入！";
    }else{                      //账号密码正确，成功进入系统
        date_default_timezone_set('PRC');//设置默认时区
        $nowTime = date('Y-m-d H:i:s',time());
        $updatetime = "update user set last_login_time = '$nowTime' where id=$userid";
        $st = $dbh->query($updatetime);
        $_SESSION['id'] = $userid;
        header('Location:admin.php');
    }
}
if(isset($_POST['ok2'])){//点击注册按钮
    header('Location:register.php');
}
?>
