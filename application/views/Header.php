<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Word Infection</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link href="https://fonts.googleapis.com/css?family=Bad+Script|Quicksand:300,400,700&subset=cyrillic" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>css/virus.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>css/animate123.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>css/style123.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>css/nav123.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
	
</head>

<body>
    <div class="wrapper">
        <!-- HEADER -->
        <nav>
            <headertitle class="title-toggle">
                Word Infection
            </headertitle>
            <div class="toggle t-head">
                <p id="headertitle">
                    Word Infection
                </p>
                <i class="fa fa-bars menu" aria-hidden="true"></i>
            </div>
            <ul id="head-ul">
                <?php if($this->session->has_userdata('userAccount')){?>
				<?php if($this->session->has_userdata('pretest')){?>
				<li><a href="<?= base_url();?>Game_Menu">Play</a></li>
				<?php }?>
				<li><a href="<?= base_url();?>AccountController/Logout">Logout</a></li>
				<?php } else{?>
				<!-- // <li><a href="<?= base_url();?>ExcelController/download">Download</a></li> -->
				<li><a href="<?= base_url();?>Account/Registration">Register</a></li>
				<li><a href="<?= base_url();?>Account/Login">Login</a></li>
				<?php }?>
            </ul>
        </nav>
        <!-- HEADER END -->