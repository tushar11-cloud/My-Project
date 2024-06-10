<?php
	include 'part/conn/conn.php';
	$food = $_GET['food'];
	$ID = $_GET['food_id'];
	$sql = "DELETE FROM `food_order` WHERE `food`='$food' AND id=$ID";
	$select_run = mysqli_query($conn,$sql);
	if($select_run){
		echo 'Delete successfully';
		header("location:admin_food.php");
	}
?>