<?php
  function addProblem () {
	if(!isset($_SESSION['assignmentProblemArray']) and isset($_GET['problemId']))
	{
	$_SESSION['assignmentProblemArray'] = array();
	array_push($_SESSION['assignmentProblemArray'], $_GET['problemId']);
	}
	else if (isset($_GET['problemId']))
	{
		array_push($_SESSION['assignmentProblemArray'], $_GET['problemId']);
	}
  } 
?>