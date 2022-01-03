<?php
include 'koneksi.php';
session_start();
session_regenerate_id(true);
?>
<!DOCTYPE html>
<html>
<head>
<title>Wadul - Wadah Aspirasi Daerah Unit Layanan - Mekanisme</title>

        <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/logo-wadul-white-ico.png">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/datepicker3.css" rel="stylesheet">
	<link href="assets/font-awesome.min.css" rel="stylesheet">
	<link href="assets/ionicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/owl.carousel.min.css">
	
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="assets/media-queries.css">

</head>
<body>
	<!-- Navbar belum login -->
    <?php if(!isset($_SESSION['nik'])){?>
	    <nav id="top-nav" class="navbar navbar-default">
        <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php" ><img src="images/logo-wadul.png" class="xs-image-navbar" alt="" height="35" ></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse xs-form-login" id="bs-example-navbar-collapse-1" >
            <form action="controller.php?aksi=login_masyarakat" class="navbar-form navbar-left frm-login-inline xs-form-login" method = "POST">
                <div class="form-group " >
                    <input type="email" name="email" id="password" class="form-control" placeholder="EMAIL">
                    <div class="forget"> &nbsp;</div>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD">
                </div>

               <!--  <a href="javascript:void(0)" onclick="lupapass()" title="Lupa Password" data-toggle="tooltip" data-placement="bottom" style="text-decoration: none;"> <i class=" glyphicon glyphicon-question-sign"></i> </a> -->
                <div class="form-group xs-form-login">    
                     <input class="btn btn-default" id="submit" type="submit" value="Login" name="submit" data-target="#data_submit">
                    <div class="forget">&nbsp;</div>
                </div>
                
            </form>
            <ul class="nav navbar-nav navbar-right xs-align-center">
                <li ><a href="mekanisme.php">Mekanisme</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>
    <!-- Navbar sudah login -->
    <?php } else if(isset($_SESSION['nik'])) { ?>
        <nav id="top-nav" class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="images/logo-wadul.png" alt=""  height="50" ></a>
            </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right  xs-align-center" style="padding-top: 8px;">
                    <li>
                        <a href="index.php?id=0">Pengaduan</a>
                    </li>
                    <li>
                        <a href="index.php?id=1">Aspirasi</a>
                    </li>
                    <li >
                        <a href="mekanisme.php">Mekanisme</a>
                    </li>
                    <li class="user-section">
                        <div class="dropdown">
                            <a class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> 
                                                                <img  src="images/avatar.png" alt="" width="50">
                                                        </a>
                            <ul class="dropdown-menu xs-align-center" aria-labelledby="dropdownMenu1">
                                <li><a href="#">Laporan Saya</a></li>
                                <li><a href="controller.php?aksi=logout_user">Keluar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>
    <?php } ?>
    <section class="page-penjelasan bg-halfTosca" >
        <div class="container bg-grey center" style="background-color: #D8D8D8;" >
            
                    <img src="images/posterv20.png" class="img-responsive">
            
        </div>
    </section>				
	<footer>
	<div class="row">
		<div class="col-xs-12 col-sm-4 xs-align-center">Universitas Bina Nusantara Malang<br/>Araya Mansion No. 8 - 22, Genitri, Tirtomoyo, Kec. Pakis, Kabupaten Malang, Jawa Timur 65154<br/></div>
		<div class="col-xs-12 col-sm-5 text-center xs-align-center">
			Hak Cipta @ <script>document.write(new Date().getFullYear())</script> <a href="https://www.wadul.my.id/" style="text-decoration:none;">Wadul</a><br/>Hak cipta dilindungi Undang - Undang
		</div>
	</div>
    </footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="assets/owl.carousel.js"></script>
	<script src="https://getbootstrap.com/docs/3.3/dist/js/bootstrap.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="assets/jquery.flexslider.js"></script>
	<script src="assets/bootstrap-datepicker.js"></script>
	<!-- <script src="https://pengaduan.pu.go.id/assets/common/js/tinymce/tinymce.min.js"></script> -->
	<script type="text/javascript" src="assets/ckeditor.js"></script>
	<script src="assets/cropbox.js"></script>
	<script src="assets/app.js"></script>

</body>
</html>