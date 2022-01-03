
<?php
include 'koneksi.php';
session_start();
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html>
<head>
<title>Wadul - Wadah Aspirasi Daerah Unit Layanan</title>

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
    <!-- Body belum login -->
    <?php if(!isset($_SESSION['nik'])) { ?>
        <section class="bg-tosca">
            <div class="container">
                <div class="owl-carousel owl-theme register-slide">
                    <div class="item"><img src="assets/regist-slide1.png" alt=""></div>
                    <div class="item"><img src="assets/regist-slide2.png" alt=""></div>
                    <div class="item"><img src="assets/regist-slide3.png" alt=""></div>
                    <div class="item"><img src="assets/regist-slide4.png" alt=""></div>
                    <div class="item"><img src="assets/regist-slide5.png" alt=""></div>
                </div>
            </div>
        </section>

        <section class="frm-register ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <form action="controller.php?aksi=daftar_masyarakat" method="POST" id="registrasi" name="myForm">
                            <div class="form-label form-group text-center">
                                <b>Wadah Aspirasi Daerah Unit Layanan</b>
                                <div class="thin">Sampaikan aspirasi Anda langsung kepada unit kerja yang berwenang</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nama *" name="Nama" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="NIK *" name="NIK" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nomor Telepon *" name="No_telepon" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="Email" placeholder="Email *" required="required" value="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group" >
                                        <div class="input-group " id = "form-pass">
                                            <input type="password"  name="password" id="input-password" class="form-control" placeholder="Password"  title="Password Min 8 karakter" value="">
                                            <span class="input-group-addon" style="border: none;">
                                                <input type="checkbox" name="show" id="show"> Tampilkan
                                            </span>
                                        </div><!-- /input-group -->
                                    </div>
                                </div>
                                <div class="col-sm-8" >
                                    <div class="form-group">
                                    <span id='message2'></span>
                                </div>
                                </div>
                                
                                <div class="col-sm-12 text-center">
                                    <div class="form-group">
                                        <button class="btn btn-sm" value="submit" type="submit" style="color: #6241b5;	width: 200px; padding: 5px 10px; min-width: 95%;font-size: 17px; font-weight: 600; color: #ffff; background-color: #c02f2f;">DAFTAR</button>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
    <!--Body sudah login  -->
    <?php } else if(isset($_SESSION['nik'])) { ?>
        <?php 
            $id = $_GET['id'];    
        ?>
        <!-- Pengaduan -->
        <?php if($id == 0){?>
            <section class="page-saranPengaduanAdd bg-halfTosca">
            <div class="container bg-tosca2">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <form action="controller.php?aksi=tambah_pengaduan" role="form" enctype="multipart/form-data" method="POST" id="form" >
                            <h1>SAMPAIKAN PENGADUAN ANDA</h1>
                            <div class="form-group">
                                <select name="unit" id="unit" class="form-control" placeholder="Pilih Unit Layanan" name="category_id" onchange="getId(this.value);" required>
                                    <option value="">Unit Layanan *</option>
                                    <?php
                                        $query = "SELECT * FROM unit_layanan";
                                        $results=mysqli_query($koneksi, $query);
                                        //loop
                                        foreach ($results as $unit){
                                    ?>
                                    <option value="<?php echo $unit["id"];?>"><?php echo $unit["nama_unit"];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="keperluan" id="keperluan" class="form-control" placeholder="Pilih Kategori Laporan Anda" name="category_id" required>
                                    <option value ="">Keperluan *</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="kota" id="kota" class="form-control" placeholder="Pilih Kabupaten / Kota" name="category_id" onchange="getId2(this.value);">
                                    <option>Kabupaten / Kota *</option>
                                    <?php
                                        $query = "SELECT * FROM kabkota";
                                        $results=mysqli_query($koneksi, $query);
                                        //loop
                                        foreach ($results as $unit){
                                    ?>
                                    <option value="<?php echo $unit["id_kabkota"];?>"><?php echo $unit["nama_kabkota"];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <!-- Kecamatan -->
                            <div class="form-group">
                                <select name="kecamatan" id="kecamatan" class="form-control" placeholder="Pilih Kecamatan" name="category_id" onchange="getId4(this.value);">
                                    <option>Kecamatan *</option>
                                </select>
                            </div>
                            <!-- Kelurahan/Desa -->
                            <div class="form-group">
                                <select name="keldesa" id="keldesa" class="form-control" placeholder="Pilih Desa/Kelurahan" name="category_id">
                                    <option>Kelurahan/Desa *</option>
                                </select>
                            </div>
                            <label>Tanggal Kejadian</label>
                            <div class="form-group">
                                <input type="date" name="TanggalKejadian" id="TanggalKejadian" class="form-control" placeholder="Tanggal Kejadian *" required></textarea>
                            </div>
                            <div class="form-group">
                                <textarea name="Keterangan" rows="6" class="form-control" placeholder="Keterangan *"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12" style="padding-left: 0px;">
                                    <div class="col-md-12 col-xs-12">
                                        <input type="file" name="files[]" id="files[]" class="form-control" accept="image"></textarea>
                                    </div>		
                                </div>
                            </div>
                            
                            <br>
                            <div class="text-center">
                                <button class="btn btn-flatYellow" type="submit" value="submit" name ="submit" style="font-size: 17px;color: #6241b5; font-weight: 600;">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                                <div class="col-sm-10 col-sm-offset-1">
                        <div class="list-saranPengaduan">
                            <h3>DAFTAR PENGADUAN</h3>

                                                <div class="form-group xs-title">
                                    <div class="title"><a href="https://pengaduan.pu.go.id/home/saran_pengaduan_show/rmxuyLXaiJNEa6eeX_UDQCAiu1ZXiBBr6sGZP2_bxEo" style="text-decoration:none;">P3TGAI</a> &nbsp;
                                        <i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i>	
                                        
                                    </div>
                                    <div class="desc">
                                        Kepada yth kementrian pupr.

            Mohon dengan hormat untuk mendapatkan bantuan program P3TGAI di Daerah irigasi Kuton desa Bligo kecamatan Ngluwar kab Magelang Jawa tengah. Saluran saat ini masih salura							</div>
                                    <div class="detail"> 
                                        <span>1 Tindakan</span> | 
                                        <span>02-Jan-2022</span> | 
                                        <span>21:17</span> WIB | 
                                        <span>Hartoto Toto</span>
                                    </div>
                                </div>
                                                <div class="form-group xs-title">
                                    <div class="title"><a href="https://pengaduan.pu.go.id/home/saran_pengaduan_show/uO5Ua1-P1qxOisvn2Nv6eRHkvH9NZDMAsZR9W4NBLVk" style="text-decoration:none;">Jalan rusak berlarut2 tidak ada perbaikan </a> &nbsp;
                                        <i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i>	
                                        
                                    </div>
                                    <div class="desc">
                                        Aslm wr wb&nbsp;

            Terima kasih sudah di beri kesempatan untuk melapor jalan yg dekat rumah saya berlokasi di Citeureup jl Industri pasar Citeureup&nbsp;dan lanjut kearah kanto kepala desa tarikolot 							</div>
                                    <div class="detail"> 
                                        <span>1 Tindakan</span> | 
                                        <span>02-Jan-2022</span> | 
                                        <span>20:24</span> WIB | 
                                        <span>Himawan  Supiharnowo</span>
                                    </div>
                                </div>
                                                <div class="form-group xs-title">
                                    <div class="title"><a href="https://pengaduan.pu.go.id/home/saran_pengaduan_show/l1jFuwzQz12ok-DfEoGdO08Xk7R9a3MPuTqh8pJgjRU" style="text-decoration:none;">Uang DP perumahan saya belom balik sepenuhnya</a> &nbsp;
                                        <i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i>	
                                        
                                    </div>
                                    <div class="desc">
                                        Aslm wr wb&nbsp;

            Sebelumnya saya berterima kasih&nbsp;

            Tolong bantuannya untuk Tim PUPR di tahun 2019 saya pengajuan rumah subsidi ke Perumahan Bumi Tajur Raya yang bertempatan di Citeureup Taju							</div>
                                    <div class="detail"> 
                                        <span>2 Tindakan</span> | 
                                        <span>02-Jan-2022</span> | 
                                        <span>20:12</span> WIB | 
                                        <span>Himawan  Supiharnowo</span>
                                    </div>
                                </div>
                                                <div class="form-group xs-title">
                                    <div class="title"><a href="https://pengaduan.pu.go.id/home/saran_pengaduan_show/OK9fBpHBtRko5qygjFttNt9wYSZwSQBpDSrrWIXHuww" style="text-decoration:none;">MCK SUDAH TIDAK BISA DIPAKAI MINTA DI RENOVASI</a> &nbsp;
                                        <i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i>	
                                        
                                    </div>
                                    <div class="desc">
                                        Mohon bantuannya untuk renovasi mck yang ada di lingkungan rumah kami,sudah sangat tidak layak dipakai dan sudah sangat hancur ,sedanngkan mck yang pakai sampai 2 RT,yaitu RT.005 dan RT.006,mohon diti							</div>
                                    <div class="detail"> 
                                        <span>1 Tindakan</span> | 
                                        <span>01-Jan-2022</span> | 
                                        <span>23:20</span> WIB | 
                                        <span>Iqbal Priyatna</span>
                                    </div>
                                </div>
                                                <div class="form-group xs-title">
                                    <div class="title"><a href="https://pengaduan.pu.go.id/home/saran_pengaduan_show/9E8z1wm4DHpRwts-1aLn_YTJhdJbTTLvUaZtMMyJSGQ" style="text-decoration:none;">jalan rusak</a> &nbsp;
                                        <i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i>	
                                        
                                    </div>
                                    <div class="desc">
                                        didepan rumah saya terdapat jalanan yang bolong yang harus ditambal dimana alamatnya adalah jalan menteng granit rt 005 rw 009 no 2 kelurahan pasar manggis kecamtan menteng atas jakarta selatan&nbsp;
                                    </div>
                                    <div class="detail"> 
                                        <span>2 Tindakan</span> | 
                                        <span>29-Des-2021</span> | 
                                        <span>14:30</span> WIB | 
                                        <span>Anonim</span>
                                    </div>
                                </div>
                                                <div class="password text-center xs-title">
                                <a href="https://pengaduan.pu.go.id//home/saran_pengaduan_all" class="btn btn-flatYellow" style="font-size: 17px;color: #6241b5; font-weight: 600;">Lihat Laporan Lain</a>
                            </div>	
                        </div>
                    </div>
                            </div>
            </div>
            </section>
        <!-- Aspirasi -->
        <?php } else if($id == 1){?>
            <section class="page-saranPengaduanAdd bg-halfTosca">
            <div class="container bg-tosca2">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <form action="controller.php?aksi=tambah_aspirasi" role="form" enctype="multipart/form-data" method="POST" id="form" >
                            <h1>SAMPAIKAN ASPIRASI ANDA</h1>
                            <div class="form-group">
                                <select name="unit" id="unit" class="form-control" placeholder="Pilih Unit Layanan" name="category_id" onchange="getId(this.value);" required>
                                    <option value="">Unit Layanan *</option>
                                    <?php
                                        $query = "SELECT * FROM unit_layanan";
                                        $results=mysqli_query($koneksi, $query);
                                        //loop
                                        foreach ($results as $unit){
                                    ?>
                                    <option value="<?php echo $unit["id"];?>"><?php echo $unit["nama_unit"];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="keperluan" id="keperluan" class="form-control" placeholder="Pilih Kategori Laporan Anda" name="category_id" required>
                                    <option value ="">Keperluan *</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="kota" id="kota" class="form-control" placeholder="Pilih Kabupaten / Kota" name="category_id" onchange="getId2(this.value);">
                                    <option>Kabupaten / Kota *</option>
                                    <?php
                                        $query = "SELECT * FROM kabkota";
                                        $results=mysqli_query($koneksi, $query);
                                        //loop
                                        foreach ($results as $unit){
                                    ?>
                                    <option value="<?php echo $unit["id_kabkota"];?>"><?php echo $unit["nama_kabkota"];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <!-- Kecamatan -->
                            <div class="form-group">
                                <select name="kecamatan" id="kecamatan" class="form-control" placeholder="Pilih Kecamatan" name="category_id" onchange="getId4(this.value);">
                                    <option>Kecamatan *</option>
                                </select>
                            </div>
                            <!-- Kelurahan/Desa -->
                            <div class="form-group">
                                <select name="keldesa" id="keldesa" class="form-control" placeholder="Pilih Desa/Kelurahan" name="category_id">
                                    <option>Kelurahan/Desa *</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea name="Keterangan" rows="6" class="form-control" placeholder="Keterangan *"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12" style="padding-left: 0px;">
                                    <div class="col-md-12 col-xs-12">
                                        <input type="file" name="files[]" id="files[]" class="form-control" accept="image"></textarea>
                                    </div>		
                                </div>
                            </div>
                            
                            <br>
                            <div class="text-center">
                                <button class="btn btn-flatYellow" type="submit" value="submit" name = "submit" style="font-size: 17px;color: #6241b5; font-weight: 600;">SUBMIT</butt>
                            </div>
                        </form>
                    </div>
                                <div class="col-sm-10 col-sm-offset-1">
                        <div class="list-saranPengaduan">
                            <h3>DAFTAR ASPIRASI</h3>

                                                <div class="form-group xs-title">
                                    <div class="title"><a href="https://pengaduan.pu.go.id/home/saran_pengaduan_show/rmxuyLXaiJNEa6eeX_UDQCAiu1ZXiBBr6sGZP2_bxEo" style="text-decoration:none;">P3TGAI</a> &nbsp;
                                        <i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i>	
                                        
                                    </div>
                                    <div class="desc">
                                        Kepada yth kementrian pupr.

            Mohon dengan hormat untuk mendapatkan bantuan program P3TGAI di Daerah irigasi Kuton desa Bligo kecamatan Ngluwar kab Magelang Jawa tengah. Saluran saat ini masih salura							</div>
                                    <div class="detail"> 
                                        <span>1 Tindakan</span> | 
                                        <span>02-Jan-2022</span> | 
                                        <span>21:17</span> WIB | 
                                        <span>Hartoto Toto</span>
                                    </div>
                                </div>
                                                <div class="form-group xs-title">
                                    <div class="title"><a href="https://pengaduan.pu.go.id/home/saran_pengaduan_show/uO5Ua1-P1qxOisvn2Nv6eRHkvH9NZDMAsZR9W4NBLVk" style="text-decoration:none;">Jalan rusak berlarut2 tidak ada perbaikan </a> &nbsp;
                                        <i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i>	
                                        
                                    </div>
                                    <div class="desc">
                                        Aslm wr wb&nbsp;

            Terima kasih sudah di beri kesempatan untuk melapor jalan yg dekat rumah saya berlokasi di Citeureup jl Industri pasar Citeureup&nbsp;dan lanjut kearah kanto kepala desa tarikolot 							</div>
                                    <div class="detail"> 
                                        <span>1 Tindakan</span> | 
                                        <span>02-Jan-2022</span> | 
                                        <span>20:24</span> WIB | 
                                        <span>Himawan  Supiharnowo</span>
                                    </div>
                                </div>
                                                <div class="form-group xs-title">
                                    <div class="title"><a href="https://pengaduan.pu.go.id/home/saran_pengaduan_show/l1jFuwzQz12ok-DfEoGdO08Xk7R9a3MPuTqh8pJgjRU" style="text-decoration:none;">Uang DP perumahan saya belom balik sepenuhnya</a> &nbsp;
                                        <i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i>	
                                        
                                    </div>
                                    <div class="desc">
                                        Aslm wr wb&nbsp;

            Sebelumnya saya berterima kasih&nbsp;

            Tolong bantuannya untuk Tim PUPR di tahun 2019 saya pengajuan rumah subsidi ke Perumahan Bumi Tajur Raya yang bertempatan di Citeureup Taju							</div>
                                    <div class="detail"> 
                                        <span>2 Tindakan</span> | 
                                        <span>02-Jan-2022</span> | 
                                        <span>20:12</span> WIB | 
                                        <span>Himawan  Supiharnowo</span>
                                    </div>
                                </div>
                                                <div class="form-group xs-title">
                                    <div class="title"><a href="https://pengaduan.pu.go.id/home/saran_pengaduan_show/OK9fBpHBtRko5qygjFttNt9wYSZwSQBpDSrrWIXHuww" style="text-decoration:none;">MCK SUDAH TIDAK BISA DIPAKAI MINTA DI RENOVASI</a> &nbsp;
                                        <i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i>	
                                        
                                    </div>
                                    <div class="desc">
                                        Mohon bantuannya untuk renovasi mck yang ada di lingkungan rumah kami,sudah sangat tidak layak dipakai dan sudah sangat hancur ,sedanngkan mck yang pakai sampai 2 RT,yaitu RT.005 dan RT.006,mohon diti							</div>
                                    <div class="detail"> 
                                        <span>1 Tindakan</span> | 
                                        <span>01-Jan-2022</span> | 
                                        <span>23:20</span> WIB | 
                                        <span>Iqbal Priyatna</span>
                                    </div>
                                </div>
                                                <div class="form-group xs-title">
                                    <div class="title"><a href="https://pengaduan.pu.go.id/home/saran_pengaduan_show/9E8z1wm4DHpRwts-1aLn_YTJhdJbTTLvUaZtMMyJSGQ" style="text-decoration:none;">jalan rusak</a> &nbsp;
                                        <i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i><i class="fa fa-star fa-1x icon-grey "data-toggle="tooltip" title = Belum&nbsp;Mendapatkan&nbsp;Rating></i>	
                                        
                                    </div>
                                    <div class="desc">
                                        didepan rumah saya terdapat jalanan yang bolong yang harus ditambal dimana alamatnya adalah jalan menteng granit rt 005 rw 009 no 2 kelurahan pasar manggis kecamtan menteng atas jakarta selatan&nbsp;
                                    </div>
                                    <div class="detail"> 
                                        <span>2 Tindakan</span> | 
                                        <span>29-Des-2021</span> | 
                                        <span>14:30</span> WIB | 
                                        <span>Anonim</span>
                                    </div>
                                </div>
                                                <div class="password text-center xs-title">
                                <a href="https://pengaduan.pu.go.id//home/saran_pengaduan_all" class="btn btn-flatYellow" style="font-size: 17px;color: #6241b5; font-weight: 600;">Lihat Laporan Lain</a>
                            </div>	
                        </div>
                    </div>
                            </div>
            </div>
            </section>
        <?php } ?>
    <?php } ?>
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
    <script>
        function getId(val){
            //We create ajax function
            $.ajax({
                type: "POST",
                url: "getdata.php?fungsi=keperluan",
                data: "id_keperluan="+val,
                success: function(data){
                    $("#keperluan").html(data);
                }
            });
        }
    </script>
    <!-- Kecamatan -->
    <script>
        function getId2(val){
            //We create ajax function
            $.ajax({
                type: "POST",
                url: "getdata.php?fungsi=kecamatan",
                data: "id_kota="+val,
                success: function(data){
                    $("#kecamatan").html(data);
                }
            });
        }
    </script>
    <!-- Desa -->
    <script>
        function getId4(val){
            //We create ajax function
            $.ajax({
                type: "POST",
                url: "getdata.php?fungsi=desa",
                data: "id_kecamatan="+val,
                success: function(data){
                    $("#keldesa").html(data);
                }
            });
        }
    </script>
</body>
</html>