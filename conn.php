<?php
$dsn = 'mysql:dbname=mybook;host=localhost;charset=utf8';
$user = 'root';
$pwd = '123456';

try
{
    $dbh = new PDO($dsn, $user, $pwd);
}catch(PDOException $e)
{
    echo '数据库连接错误'.$e->getMessage();
    exit;
}
?>