<!--管理员登录管理界面主页面-->
<?php
include_once('header.php');
include_once("conn.php");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>图书馆管理系统</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">

</head>
<body>
<div id="userinfo">
    <h2>个人信息</h2>
    <?php
        $id = $_SESSION['id'];
        $query = "select * from user where id='$id'";
        $stmt= $dbh->query($query);
        foreach ($stmt as $row){
            echo "<h3>用户ID&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp{$row['id']}</h3>";
            echo "<h3>用户姓名&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp{$row['name']}</h3>";
            echo "<h3>用户班级&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp{$row['class']}</h3>";
            if($row['status']==1){
                echo "<h3>用户状态&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp正常</h3>";
            }else{
                echo "<h3>用户状态&nbsp&nbsp&nbsp：&nbsp&nbsp&nbsp挂失</h3>";
            }

        }
        echo "<a href='AlterUserManager.php?user_id=$id' style='float: right;margin-right: 100px'>修改个人信息</a><br>";
        ?>
    <?php
    $query = "SELECT book_id,name,borrow_date,back_date 
            FROM borrow_list a,book_info b 
            WHERE a.book_id = b.id AND a.user_id='$id'";
    $stmt= $dbh->query($query);

    echo "<table border='1px gray solid' width='600px' align='center' cellpadding='0' cellspacing='0'>";
    echo "<caption><h2>个人借阅信息界面</h2></caption>";
    echo "<tr style='line-height: 40px;'><th>图书号</th><th>图书名称</th><th>借书时间</th><th>应还时间</th><th>详情</th></tr>";
    $time = time();
    $borrow_data = date("Y-m-d",$time);
    $a = strtotime($borrow_data);
    foreach ($stmt as $row){
        echo "<tr style='text-align: center;line-height: 40px'>";
        echo "<td>".$row['book_id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['borrow_date']."</td>";
        echo "<td>".$row['back_date']."</td>";
        $b = strtotime($row['back_date']);
        if($a<=$b){
            echo "<td><span style='color: #5cb85c'>正常</span></td>";
        }else{
            echo "<td><a href='borrowmanager.php' style='color: #d43f3a;text-decoration: none;'>逾期</a></td>";
        }
        echo "</tr>";
    }
    echo "</table>"
    ?>
</div>
</body>
</html>

