<?php
include 'part/conn/conn.php';
$id = $_GET['id'];

$select = "DELETE FROM `cart` WHERE `food_id`= $id ";
$select_run = mysqli_query($conn, $select);
// if ($select_run) {
//     echo 'Deleted';
    $sql = "SELECT * FROM `food` WHERE `id`=$id";
    $sql_s = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($sql_s)) {
        header('location:cart.php?food_id='.null.'&&food='.null.'avatar='.null);
    }
// }
?>
