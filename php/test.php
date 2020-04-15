<?php
// 连接数据库 user 和 password 改成自己的
$host = '127.0.0.1';
$user = 'root';
$password = '773835';
$dbName = 'petstar';

// 创建连接
$conn = new mysqli($host, $user, $password, $dbName);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}