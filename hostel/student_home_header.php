<?php session_start();
if($_SESSION['type']!='Student')
	header('location:home.php');
?>
<html>
	<head>
	    <link href="css/navbar-fixed-top.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
		<link href="css/carousel.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>
