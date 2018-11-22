<?php 
session_start();
if(!isset($_SESSION['admin_id'])){
     header("location:login.php");
} ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>E-Store Dashboard</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="#"><span>E-Store</span>Admin</a>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">Username</div>
                    <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="divider"></div>

            <ul class="nav menu">
                <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                <li><a href="manage_admin.php"><em class="fa fa-calendar">&nbsp;</em> Manage Admin</a></li>
                <li><a href="manage_user.php"><em class="fa fa-calendar">&nbsp;</em> Manage User</a></li>
                <li><a href="manage_category.php"><em class="fa fa-calendar">&nbsp;</em> Manage Category</a></li>
                <li><a href="manage_sub_category.php"><em class="fa fa-calendar">&nbsp;</em> SubCategory</a></li>
                <li><a href="manage_subsubcate.php"><em class="fa fa-calendar">&nbsp;</em>Manage SSCategory</a></li>
                <li><a href="advertisement.php"><em class="fa fa-calendar">&nbsp;</em> Advertisement</a></li>
                <li><a href="video.php"><em class="fa fa-calendar">&nbsp;</em> Video</a></li>                
                <li><a href="logout_admin.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
            </ul>
        </div><!--/.sidebar-->