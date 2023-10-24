<?php
function getConnect(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "pweb1";
    $connect = mysqli_connect($host,$user,$pass);
    mysqli_select_db($connect,$database);
    return $connect;
}
?>