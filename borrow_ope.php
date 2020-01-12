<?php
include_once("conn.php");
if(isset($_POST['ok'])){
    $num = $_POST['operation'];
    $userid = $_POST['userid'];
    $bookid = $_POST['bookid'];
    if($num==0){//借书操作
        $time = time();
        $borrow_data = date("Y-m-d",$time);
        $back_data = date("Y-m-d",strtotime("+3 month"));
        $query = "insert into borrow_list values('$bookid','$userid','$borrow_data','$back_data')";
        $dbh->query($query);
    }else{//还书操作
        $query = "delete from borrow_list where book_id='$bookid' and user_id='$userid'";
        $dbh->query($query);
    }
    header("Location:userborrowInf.php?user_id=$userid");
}
if (isset($_POST['ok2'])){
    header("Location:borrowmanager.php");
}
?>