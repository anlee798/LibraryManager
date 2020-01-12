<?php
include_once("conn.php");
include_once('header.php');
$id = $_GET['book_id'];
$query = "select * from book_info where id='$id'";
$stmt= $dbh->query($query);
$query2 = "select * from borrow_list where book_id = '$id'";
$stmt2 = $dbh->query($query2);
?>
<div id="book_detiail">
    <h2>图书详情</h2>
    <?php
        foreach ($stmt as $row){
            echo "<h3>图书名：".$row['name']."</h3>";
            echo "<h3>作者：".$row['author']."</h3>";
            echo "<h3>出版社：".$row['press']."</h3>";
            echo "<h3>出版时间：".$row['press_time']."</h3>";
            echo "<h3>价格：".$row['price']."</h3>";
            echo "<h3>ISBN：".$row['ISBN']."</h3>";
            echo "作品简介：".$row['name']."</br>";
            echo "<p>".$row['desc']."</p>";
        }
        if($stmt2->rowCount()!=0){
            foreach ($stmt2 as $row)
            echo "<table border='1px black solid'>";
            echo "<tr>";
            echo "<th>借出人ID</th>";
            echo "<th>应还日期</th>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>{$row['user_id']}</td>";
            echo "<td>{$row['back_date']}</td>";
            echo "</tr>";
            echo "</table>";
        }
    ?>
</div>







