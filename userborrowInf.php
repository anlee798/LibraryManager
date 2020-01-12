<?php
include_once("header.php");
include_once("conn.php");
$id = $_GET['user_id'];
?>

<?php

$query = "SELECT book_id,name,borrow_date,back_date 
            FROM borrow_list a,book_info b 
            WHERE a.book_id = b.id AND a.user_id='$id'";
$stmt= $dbh->query($query);

echo "<table border='1px gray solid' width='600px' align='center' style='margin-top: 120px;' cellpadding='0' cellspacing='0'>";
echo "<caption><h2>用户借阅信息界面</h2></caption>";
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
