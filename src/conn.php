<?php
$hostname = "localhost"; //主机名,可以用IP代替
$database = "protein"; //数据库名
$username = "root"; //数据库用户名
$password = ""; //数据库密码
$conn = mysqli_connect($hostname, $username, $password) ;
mysqli_select_db( $conn,$database);
$db = @ mysqli_select_db( $conn,$database);
if(!$db)
{
    echo "<font color='black'>SQL ERROR</font>";
    die("QUERY ERROR");
}
?>
