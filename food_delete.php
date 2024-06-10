<?php
include 'part/conn/conn.php';

$id = $_GET['food_id'];
    $select = "DELETE FROM `food` WHERE `id`=$id";
    $select_run = mysqli_query($conn,$select);
    if($select_run){
        echo 'delete successfully';
        header('location:food_order.php');
    }
?>