
<?php
include 'koneksi.php';
session_start();
session_regenerate_id(true);
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
		<title>Saran & Pengaduan Kementrian PUPR</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="assets/favicon.ico">
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
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD">
                </div>

               <!--  <a href="javascript:void(0)" onclick="lupapass()" title="Lupa Password" data-toggle="tooltip" data-placement="bottom" style="text-decoration: none;"> <i class=" glyphicon glyphicon-question-sign"></i> </a> -->
                <div class="form-group xs-form-login">    
                     <input class="btn btn-default" id="submit" type="submit" value="Login" name="submit" data-target="#data_submit">
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
                <a class="navbar-brand" href="index.php?id=0"><img src="images/logo-wadul.png" alt=""  height="50" ></a>
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
    
    <?php 
    
        $query = "SELECT * FROM pelaporan WHERE ID_Pelaporan = '$id'";
        $exec = mysqli_query($koneksi, $query);
        $fetch = mysqli_fetch_array($exec);

        $unit = $fetch['Tujuan']; 
        $data_unit = "SELECT * FROM unit_layanan WHERE id = '$unit'";
        $exec_unit = mysqli_query($koneksi, $data_unit);
        $fetch_unit = mysqli_fetch_array($exec_unit);  
    ?>
    
	<section class="page-saranPengaduanShow bg-tosca">
	<div class="container" style="min-height: 535px;">
				<div class="row">
			<div class="col-sm-10 col-sm-offset-1">					
				<div class="row">
					<div class="row">
						<div class="col-sm-9">
							<h1><?= $fetch_unit['nama_unit']?> - <?= $fetch['Ticket']?></h1>
						</div>
					</div>
                    <?php 
                        $jenis = $_GET['jenis'];
                        if($jenis == 0){ ?>
                            <h2>Pengaduan</h2>
                        <?php } else if($jenis == 1){ ?>
                            <h2>Aspirasi</h2>
                    <?php } ?>
					<div class="row">
						<div class="col-sm-9 col-xs-12">
							<div class="form-group content justify col-sm-12">
								<p><?= $fetch['Keterangan']?></p>
							</div>
							
							
							<div class="form-group col-sm-9 col-xs-12">
								<h2>LAMPIRAN</h2>
                                <?php 
                                    $q_lampiran = "SELECT lampiran FROM lampiran WHERE ID_Pelaporan = '$id'";
                                    $exec_lampiran = mysqli_query($koneksi, $q_lampiran);
                                    $fetch_lampiran = mysqli_fetch_array($exec_lampiran);
                                ?>
                                <?php if(empty($fetch_lampiran['lampiran'])){?>
								    <p>Tidak ada lampiran</p>
                                <?php } else {	?>
                                    <a href="berkas/<?= $fetch_lampiran['lampiran']?>">
                                        <p><?= $fetch_lampiran['lampiran']?></p>
                                    </a>
                                <?php } ?>
                            </div>
					</div>
					<div class="col-sm-3 col-xs-12">
                        <?php 
                            $date = $fetch['TanggalLaporan'];
                            $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                            $tanggal_hari = (int)date('d', strtotime($date));
                            $bulan_hari = $month[((int)date('m', strtotime($date))) - 1];
                            $tahun_hari = (int)date('Y', strtotime($date));
                        ?>
						<div class="form-group">
							<h3>TANGGAL</h3>
							<?=$tanggal_hari.' '.$bulan_hari.' '.$tahun_hari?><br/>						
                        </div>
                        <?php
                            // Ambil dari header
                            $header = "SELECT * FROM header_pelaporan WHERE ID_Pelaporan='$id'";
                            $exec_header = mysqli_query($koneksi, $header);
                            $fetch_header = mysqli_fetch_array($exec_header);
                            // Cek dari header
                            $id_kabkota = $fetch_header['KabKota'];
                            $id_kecamatan = $fetch_header['Kecamatan'];
                            $id_keldesa =  $fetch_header['KelDesa'];
                            $kabkota = "SELECT nama_kabkota FROM kabkota WHERE id_kabkota = '$id_kabkota'";
                            $kecamatan = "SELECT nama_kecamatan FROM kecamatan WHERE id_kecamatan = '$id_kecamatan'";
                            $keldesa = "SELECT nama_keldesa FROM keldesa WHERE id_keldesa = '$id_keldesa'";
                            // Execute
                            $exec_kabkota = mysqli_query($koneksi, $kabkota);
                            $exec_kecamatan = mysqli_query($koneksi, $kecamatan);
                            $exec_keldesa = mysqli_query($koneksi, $keldesa);
                            // Fetch
                            $fetch_kabkota = mysqli_fetch_array($exec_kabkota);
                            $fetch_kecamatan = mysqli_fetch_array($exec_kecamatan);
                            $fetch_keldesa = mysqli_fetch_array($exec_keldesa);
                            // Isi
                            $area_kabkota = $fetch_kabkota['nama_kabkota'];
                            $area_kecamatan = $fetch_kecamatan['nama_kecamatan'];
                            $area_keldesa = $fetch_keldesa['nama_keldesa'];
                        ?>
						<div class="form-group">
							<h3>AREA</h3>
							<?=$area_kabkota.','.' '.$area_kecamatan.','.' '.$area_keldesa?>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div class="list-tindaklanjut">
				<div class="Tindaklanjut ">
					<h4>Status Tanggapan</h4>
					<div class="demo-topleft"></div>
				</div>
				<?php 
                
                    $komentar = "SELECT * FROM diskusi";
                    $exec_komentar = mysqli_query($koneksi, $komentar);
                
                ?>
                <?php while ($row = mysqli_fetch_array($exec_komentar)) { ?>
                    <div class="keterangan-tindaklanjut">
                        <div class="form-group">
                            <?php
                                $nik = $row['NIK']; 
                                $admin = "SELECT name FROM msadmin WHERE NIK = '$nik'";
                                $penduduk = "SELECT Nama FROM penduduk WHERE NIK = '$nik'";
                                $exec_admin = mysqli_query($koneksi, $admin);
                                $exec_penduduk = mysqli_query($koneksi, $penduduk);
                                $row_admin = mysqli_num_rows($exec_admin);
                                $row_penduduk = mysqli_num_rows($exec_penduduk);
                                if($row_admin > 0 && $row_penduduk == 0){
                                    $fetch_admin = mysqli_fetch_assoc($exec_admin);
                                }else if($row_admin == 0 && $row_penduduk > 0){
                                    $fetch_penduduk = mysqli_fetch_array($exec_penduduk);
                                }else if($row_admin > 0 && $row_penduduk > 0){
                                    $fetch_penduduk = mysqli_fetch_array($exec_penduduk);
                                }else if($row_admin == 0 && $row_penduduk == 0){
                                    echo "Error";
                                }
                            ?>
                            <div class="title">
                                <?php if($row_admin > 0 && $row_penduduk == 0) {?>
                                    <div class="col-sm-12">
                                        <img src="https://pengaduan.pu.go.id/assets/common/images/chat.png" alt="" width="30">
                                        Admin - <?= $fetch_admin['name']?>						
                                    </div>
                                <?php } else if($row_admin == 0 && $row_penduduk > 0) { ?>
                                    <div class="col-sm-12">
                                        <img src="https://pengaduan.pu.go.id/assets/common/images/chat.png" alt="" width="30">
                                        <?= $fetch_penduduk['Nama']?>							
                                    </div>
                                <?php } else if($row_admin == 0 && $row_penduduk == 0) { ?>
                                    <div class="col-sm-12">
                                        <img src="https://pengaduan.pu.go.id/assets/common/images/chat.png" alt="" width="30">
                                        ERROR							
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="desc col-md-12">
                                <p><?= $row['isi']?></p>	
                            </div>
                            <?php 
                                $date = $row['tanggal'];
                                $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                $tanggal_hari = (int)date('d', strtotime($date));
                                $bulan_hari = $month[((int)date('m', strtotime($date))) - 1];
                                $tahun_hari = (int)date('Y', strtotime($date));
                            ?>
                            <div class="detail"  style="margin-left: 13px;"> 
                                <span><?=$tanggal_hari.' '.$bulan_hari.' '.$tahun_hari?></span> | 
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <br>
                <form method="post" action="controller.php?aksi=komentar">
                    <div class="form-group">
                        <textarea name="isi" id="isi" rows="6" class="form-control" placeholder="Komentar"></textarea>
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="jenis" id="jenis" value="<?= $jenis?>"></input>
                        <input type="hidden" name="Ticket" id="Ticket" value="<?=$fetch['Ticket']?>"></input>
                        <input type="hidden" name="id" id="id" value="<?= $id?>"></input>
                        <input type="hidden" name="nik" id="nik" value="<?= $_SESSION['nik']?>"></input>
                        <button class="btn btn-flatYellow" type="submit" value="submit" name ="submit" style="font-size: 17px;color: #6241b5; font-weight: 600;">KIRIM</button>
                    </div>
                </form>
			</div>
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