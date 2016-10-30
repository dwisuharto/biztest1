<!DOCTYPE html>
<html lang="en">
<head>
<title>Word Scrambler Admin Page</title>
<link rel="stylesheet" type="text/css" media="screen" href="/assets/bower_components/bootstrap/dist/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="/assets/bower_components/font-awesome/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="/assets/css/style.css"/>
<script type="text/javascript" src="/assets/bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<header class="col-lg-12">
		<h1 align="center">Word Scrambler Game Admin Page</h1>
	</header>

    <div class="sidebar col-lg-2">
        <ul>
            <li><a href="<?php echo url(); ?>">Home</a></li>
            <li><a href="<?php echo url("words"); ?>">Words</a></li>
            <li><a href="<?php echo url("auth/signout"); ?>">Sign Out</a></li>
        </ul>
    </div>

	<div class="content col-lg-10">
		<div class="col-lg-12">
