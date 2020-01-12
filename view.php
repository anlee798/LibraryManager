<?php
include_once('header.php');
include_once("conn.php");
$query = "select * from book_info";
$stmt= $dbh->query($query);

$arr = array();
$arr2 = array();
$query2 = "select book_id,back_date from borrow_list";
$stmt2= $dbh->query($query2);
foreach ($stmt2 as $row){
    if(strtotime($row['back_date'])>time()){//仍在借出
        array_push($arr,$row['book_id']);
    }else{                                  //逾期未归
        array_push($arr2,$row['book_id']);
    }
}
echo "</table>";
?>
<div id="FanYe">
    <ul>
        <?php
            $count = 0;
            echo "<h2 style='text-align: center'>图书详情</h2>";
            foreach ($stmt as $row){
                echo "<li>";
                echo "图书号：{$row['id']}&nbsp&nbsp&nbsp&nbsp&nbsp";
                echo "图书名：{$row['name']}&nbsp&nbsp&nbsp&nbsp&nbsp";
                echo "作者：{$row['author']}&nbsp&nbsp&nbsp&nbsp&nbsp";
                if(in_array($row['id'],$arr)){
                    echo "<h4 style='color: #f0770c'>借出</h4>&nbsp&nbsp&nbsp&nbsp&nbsp";
                }else if (in_array($row['id'],$arr2)){
                    echo "<h4 style='color: #d43f3a'>逾期未归</h4>&nbsp&nbsp&nbsp&nbsp&nbsp";
                } else{
                    echo "<h4 style='color: greenyellow'>在馆</h4>&nbsp&nbsp&nbsp&nbsp&nbsp";
                }
                $id = $row['id'];
                echo "<a href='detailInfor.php?book_id=$id'>详情</a>";
                echo "</li>";
                if($count>12){
                    $count=0;
                }else{
                    $count++;
                }
            }

        ?>
    </ul>

</div>
<?php
$string = <<<EOT
<div class="layui-box layui-laypage layui-laypage-molv" id="layui-laypage-1">

            <a href="javascript:" class="layui-laypage-first" data-page="0">首页</a>
            <a href="javascript:" class="layui-laypage-pre" data-page="2">上一页</a>
            <a href="javascript:" class="layui-laypage-next" data-page="2">下一页</a>
            <a href="javascript:" class="layui-laypage-last" data-page="2">末页</a>
</div>
EOT;
echo $string;
?>


