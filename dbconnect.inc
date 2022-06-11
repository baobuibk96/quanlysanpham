<?php
$link= mysqli_connect("localhost","root","") or die ("khong the ket noi duoc co so du lieu".mysql_error());
mysqli_select_db($link, "quanlysanpham") or die ("khong the ket noi duoc co so du lieu".mysql_error());
mysqli_query($link, "SET NAMES utf8");
?>
