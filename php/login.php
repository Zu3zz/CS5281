<?php

// 获取用户登录信息
$name = $_POST["name"];
$email = $_POST["email"];
$user_password = $_POST["password"];

// 连接数据库
$host = '127.0.0.1';
$user = 'root';
$password = '773835';
$dbName = 'petstar';

$link = new mysqli($host, $user, $password, $dbName);

if ($link->connect_error) {
    die("连接失败：" . $link->connect_error);
}
// 获取usr数据库
$sql_1 = "select * from user where name = '$name'";

$res = $link->query($sql_1);
$data = $res->fetch_all();

$state = 1; // 0 为登录成功 1 失败 2 邮箱错误 3 密码错误
if (count($data) <= 0) {
    $state = 1;
} else {
    $current_email = $data['0'][2];
    $current_password = $data['0'][3];
    if ($current_email != $email) {
        $state = 2;
    }
    if ($current_password != $user_password) {
        $state = 3;
    }
    $state = 0;
}
switch ($state){
    case 0:
        echo '登录成功';
        header();
        break;
    case 2:
        echo '邮箱错误';
        break;
    case 3:
        echo '密码错误';
        break;
    default:
        echo '登录失败';
        break;
}