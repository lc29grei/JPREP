<?php
  session_start();
		if(!isset($_SESSION['assignmentProblemArray']))
		{
			$_SESSION['assignmentProblemArray'] = array();
			array_push($_SESSION['assignmentProblemArray'], $_POST['problemId']);
		}
		else
		{
			array_push($_SESSION['assignmentProblemArray'], $_POST['problemId']);
		}
		// print_r($_GET['id']);
		header("location: create_new_assignment.php?id=".$_GET['id']."");
?>