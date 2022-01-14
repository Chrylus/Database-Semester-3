
<?php
    include 'koneksi.php';
    session_start();
    session_regenerate_id(true);
    $id = $_GET['jenis'];
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
	<link href="assets/bootstrap.min.css" rel="stylesheet">
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
                            <input type="email" name="email" id="email" class="form-control" placeholder="EMAIL" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD" required>
                        </div>

                    <!--  <a href="javascript:void(0)" onclick="lupapass()" title="Lupa Password" data-toggle="tooltip" data-placement="bottom" style="text-decoration: none;"> <i class=" glyphicon glyphicon-question-sign"></i> </a> -->
                        <div class="form-group xs-form-login">    
                            <input class="btn btn-default" id="submit" type="submit" value="Login" name="submit">
                        </div>
                        
                    </form>
                    <ul class="nav navbar-nav navbar-right xs-align-center">
                        <li><a href="admin/login.php">Admin</a></li>
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
                            <a href="admin/login.php">Admin</a>
                        </li>
                        <li>
                            <a href="index.php?id=0">Pengaduan</a>
                        </li>
                        <li>
                            <a href="index.php?id=1">Aspirasi</a>
                        </li>
                        <li>
                            <a href="index.php?id=2">Cek Tiket</a>
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
                                    <li><a href="index.php?id=3">Laporan Saya</a></li>
                                    <li><a href="controller.php?aksi=logout_user">Keluar</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    <?php } ?>
    <!-- Pengaduan -->
	<?php if($id == 0) { ?>
        <?php
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $query = "SELECT * FROM pelaporan
                            INNER JOIN unit_layanan ON pelaporan.Tujuan = unit_layanan.id
                            INNER JOIN penduduk ON pelaporan.NIK = penduduk.NIK
                                WHERE (Keterangan LIKE '%$cari%' 
                                    OR unit_layanan.nama_unit LIKE '%$cari%' 
                                    OR penduduk.Nama LIKE '%$cari%' 
                                    OR pelaporan.Ticket LIKE '%$cari%')
                                    AND (ID_Pelaporan LIKE 'PGD%')
                                        ORDER BY TanggalLaporan DESC";
            }else{
                $query = "SELECT * FROM pelaporan WHERE ID_Pelaporan LIKE 'PGD%' ORDER BY TanggalLaporan DESC";
            } 
            $exec = mysqli_query($koneksi, $query);
            
            $jumlahDataHalaman = 5;
            $totalData = mysqli_num_rows($exec);
            $jumlahHalaman = ceil($totalData/$jumlahDataHalaman);

            $halamanAktif = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

            $awalData = ($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;

            $query.=" LIMIT $awalData, $jumlahDataHalaman";
            $exec = mysqli_query($koneksi,$query);
            
        ?>
        <section class="page-saranPengaduanAdd bg-halfTosca">
	    <div class="container bg-tosca2">
		    <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="list-saranPengaduan-all">
                        <h3>DAFTAR PENGADUAN</h3>
                        <div class="search xs-search " >
                            <form action="laporan.php" id="form-src" method="GET">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" disabled="disabled" style="border-right: none;height: 40px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    </span>
                                    <input type="hidden" name="jenis" value="0">
                                    <input type="text" name="cari" placeholder = "Pencarian" class="form-control" id="search">
                                </div><!-- /input-group -->
                            </form>
                        </div>
                        <?php while ($row = mysqli_fetch_array($exec)) { ?>
                            <?php
                                    $unit = $row['Tujuan']; 
                                    $data_unit = "SELECT * FROM unit_layanan WHERE id = '$unit'";
                                    $exec_unit = mysqli_query($koneksi, $data_unit);
                                    $fetch_unit = mysqli_fetch_array($exec_unit);
                                   
                                    $nik_pnd = $row['NIK'];
                                    $nama_pend = "SELECT Nama FROM penduduk WHERE NIK = '$nik_pnd'";
                                    $exec_pnd = mysqli_query($koneksi, $nama_pend);
                                    $fetch_penduduk = mysqli_fetch_array($exec_pnd);

                                    $date = $row['TanggalLaporan'];
                                    $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                    $tanggal_hari = (int)date('d', strtotime($date));
                                    $bulan_hari = $month[((int)date('m', strtotime($date))) - 1];
                                    $tahun_hari = (int)date('Y', strtotime($date));
                            ?>
                            <div class="form-group">
                                <div class="title"><a href="detail_ticket.php?id=<?= $row['ID_Pelaporan']?>&jenis=0" style="text-decoration:none;"><?=$fetch_unit['nama_unit']?> - <?=$row['Ticket']?></a> &nbsp;		
                                </div>
                                <div class="desc">
                                    <?=$row['Keterangan']?>
                                </div>
                                <div class="detail">  
                                    <span><?=$tanggal_hari.' '.$bulan_hari.' '.$tahun_hari?></span> |  
                                    <span><?=$fetch_penduduk['Nama']?></span>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="center">
                            <ul class='pagination' >
                                <!-- Tidak ada cari -->
                                <?php if(!isset($_GET['cari'])): ?>
                                <li class='disabled'>
                                    <?php for($i=1; $i<=$jumlahHalaman; $i++): ?>
                                        <?php  if($halamanAktif == $i): ?>
                                            <li class='active'>
                                                <a href='#'>
                                                    <?= $i ?>
                                                    <span class='sr-only'>
                                                    </span>
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="?halaman=<?= $i ?>&jenis=0" data-ci-pagination-page="<?= $i ?>">
                                                    <?= $i ?>
                                                </a>
                                            </li>
                                        <?php  endif; ?>
                                    <?php endfor; ?>
                                </li>
                                <!-- Ada cari -->
                                <?php else: ?>
                                <li class='disabled'>
                                    <?php for($i=1; $i<=$jumlahHalaman; $i++): ?>
                                        <?php  if($halamanAktif == $i): ?>
                                            <li class='active'>
                                                <a href='#'>
                                                    <?= $i ?>
                                                    <span class='sr-only'>
                                                    </span>
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="?halaman=<?= $i ?>&jenis=0&cari=<?= $cari ?>" data-ci-pagination-page="<?= $i ?>">
                                                    <?= $i ?>
                                                </a>
                                            </li>
                                        <?php  endif; ?>
                                    <?php endfor; ?>
                                </li>
                                <?php endif; ?>
                            </ul>					
                        </div>
			</div>
		</div>
	</div>
	 </section>
    <!-- Aspirasi -->
    <?php } else if($id == 1) { ?>
        <section class="page-saranPengaduanAdd bg-halfTosca">
        <?php
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $query = "SELECT * FROM pelaporan
                            INNER JOIN unit_layanan ON pelaporan.Tujuan = unit_layanan.id
                            INNER JOIN penduduk ON pelaporan.NIK = penduduk.NIK
                                WHERE (Keterangan LIKE '%$cari%' 
                                    OR unit_layanan.nama_unit LIKE '%$cari%' 
                                    OR penduduk.Nama LIKE '%$cari%' 
                                    OR pelaporan.Ticket LIKE '%$cari%')
                                    AND (ID_Pelaporan LIKE 'ASP%')
                                        ORDER BY TanggalLaporan DESC";
            }else{
                $query = "SELECT * FROM pelaporan WHERE ID_Pelaporan LIKE 'ASP%' ORDER BY TanggalLaporan DESC";
            } 
            $exec = mysqli_query($koneksi, $query);

            $jumlahDataHalaman = 5;
            $totalData = mysqli_num_rows($exec);
            $jumlahHalaman = ceil($totalData/$jumlahDataHalaman);

            $halamanAktif = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

            $awalData = ($jumlahDataHalaman * $halamanAktif) - $jumlahDataHalaman;

            $query.=" LIMIT $awalData, $jumlahDataHalaman";
            $exec = mysqli_query($koneksi,$query);
               
        ?>
        <section class="page-saranPengaduanAdd bg-halfTosca">
	    <div class="container bg-tosca2">
		    <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="list-saranPengaduan-all">
                        <h3>DAFTAR ASPIRASI</h3>
                        <div class="search xs-search " >
                            <form action="laporan.php" id="form-src" method="GET">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" disabled="disabled" style="border-right: none;height: 40px;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                    </span>
                                    <input type="hidden" name="jenis" value="1">
                                    <input type="text" name="cari" placeholder = "Pencarian" class="form-control" id="search">
                                </div><!-- /input-group -->
                            </form>
                        </div>
                        <?php while ($row = mysqli_fetch_array($exec)) { ?>
                            <?php
                                    $unit = $row['Tujuan']; 
                                    $data_unit = "SELECT * FROM unit_layanan WHERE id = '$unit'";
                                    $exec_unit = mysqli_query($koneksi, $data_unit);
                                    $fetch_unit = mysqli_fetch_array($exec_unit);
                                   
                                    $nik_pnd = $row['NIK'];
                                    $nama_pend = "SELECT Nama FROM penduduk WHERE NIK = '$nik_pnd'";
                                    $exec_pnd = mysqli_query($koneksi, $nama_pend);
                                    $fetch_penduduk = mysqli_fetch_array($exec_pnd);

                                    $date = $row['TanggalLaporan'];
                                    $month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
                                    $tanggal_hari = (int)date('d', strtotime($date));
                                    $bulan_hari = $month[((int)date('m', strtotime($date))) - 1];
                                    $tahun_hari = (int)date('Y', strtotime($date));
                            ?>
                            <div class="form-group">
                                <div class="title"><a href="detail_ticket.php?id=<?= $row['ID_Pelaporan']?>&jenis=0" style="text-decoration:none;"><?=$fetch_unit['nama_unit']?> - <?=$row['Ticket']?></a> &nbsp;		
                                </div>
                                <div class="desc">
                                    <?=$row['Keterangan']?>
                                </div>
                                <div class="detail">  
                                    <span><?=$tanggal_hari.' '.$bulan_hari.' '.$tahun_hari?></span> |  
                                    <span><?=$fetch_penduduk['Nama']?></span>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="center">
                            <ul class='pagination' >
                                <!-- Tidak ada cari -->
                                <?php if(!isset($_GET['cari'])): ?>
                                <li class='disabled'>
                                    <?php for($i=1; $i<=$jumlahHalaman; $i++): ?>
                                        <?php  if($halamanAktif == $i): ?>
                                            <li class='active'>
                                                <a href='#'>
                                                    <?= $i ?>
                                                    <span class='sr-only'>
                                                    </span>
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="?halaman=<?= $i ?>&jenis=1" data-ci-pagination-page="<?= $i ?>">
                                                    <?= $i ?>
                                                </a>
                                            </li>
                                        <?php  endif; ?>
                                    <?php endfor; ?>
                                </li>
                                <!-- Ada cari -->
                                <?php else: ?>
                                <li class='disabled'>
                                    <?php for($i=1; $i<=$jumlahHalaman; $i++): ?>
                                        <?php  if($halamanAktif == $i): ?>
                                            <li class='active'>
                                                <a href='#'>
                                                    <?= $i ?>
                                                    <span class='sr-only'>
                                                    </span>
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="?halaman=<?= $i ?>&jenis=1&cari=<?= $cari ?>" data-ci-pagination-page="<?= $i ?>">
                                                    <?= $i ?>
                                                </a>
                                            </li>
                                        <?php  endif; ?>
                                    <?php endfor; ?>
                                </li>
                                <?php endif; ?>
                            </ul>					
                        </div>
			</div>
		</div>
	</div>
	 </section>
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
	<script src="assets/bootstrap.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="assets/jquery.flexslider.js"></script>
	<script src="assets/bootstrap-datepicker.js"></script>
	<!-- <script src="https://pengaduan.pu.go.id/assets/common/js/tinymce/tinymce.min.js"></script> -->
	<script type="text/javascript" src="assets/ckeditor.js"></script>
	<script src="assets/cropbox.js"></script>
	<script src="assets/app.js"></script>
	
</body>
</html>