<?php
	require_once 'connect.php';
			if($_POST['task'] != ""){
			$task = $_POST['task'];
			
			$conn->query("INSERT INTO `task` VALUES('', '$task', '')");
			header('location:../index.php');
		}
	
?>