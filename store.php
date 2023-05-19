<?php

require_once "connect.php";
global $connect;

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$count = $_POST['count'];

$sql = "INSERT INTO products(name, description, price, count) values('$name', '$description', '$price', '$count')";
$connect->query($sql);

header("Location: index.php");