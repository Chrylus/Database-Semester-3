<?php
include 'koneksi.php';
session_start();
session_regenerate_id(true);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-35959721-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-35959721-1');
    </script>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Place this data between the <head> tags of your website -->
    <title>Laporan Pengaduan Masalah BINUS@Malang</title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#d7381b">
    <meta name="apple-mobile-web-app-title" content="LAPOR!">
    <meta name="application-name" content="LAPOR!">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- App Styles -->
    <link href= 'index.css' rel="stylesheet">

    <script src="resources/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://www.lapor.go.id/combine/66cb3800f16b20b046b93a4571b46c42-1617850351">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://www.lapor.go.id/combine/15d6ac0173665e1a9057c30ca8e08f8f-1617850351"></script>
    <script src="resources/zingchart.min.js"></script>
    <link rel="icon" href="../Part-Time-Binus/user/images/Binus Logo.png">
    <link rel ="stylesheet" href = "//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <nav id="leftMenu" class="navmenu navmenu-default navmenu-inverse navmenu-fixed-left offcanvas" role="navigation">
        <ul class="nav navmenu-nav">
            <li role="presentation" class="  active">
                <a href="#" >
                    Layanan Pengaduan
                </a>
            </li>
            <li role="presentation" class="  ">
                <a href="admin/index.php" >
                    Admin
                </a>
            </li>
            <li role="presentation" class="  ">
                <?php
                if(isset($_SESSION["nik"])){
                    echo'<a href="controller.php?aksi=logout_user">
                        Logout
                    </a>';
                }
                ?>
            </li>
        </ul>
    </nav>
</head>

<body class="page-home pd-t-0 ">
    <div class="loader-custom hidden"></div>
    <div id="search-bar"> </div>
    
    <header class="navbar-fixed-top navbar-inverse ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle navbar-toggle-left" data-toggle="offcanvas" data-target="#leftMenu" data-canvas="body">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="images/logo-wadul.png" alt="" class="img-responsive hidden-navbar-inverse">
                    <img src="images/logo-wadul.png" alt="" class="img-responsive hidden-navbar-default">
                </a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left navbar-primary">
                    <li role="presentation" class="  ">
                        <a href="#" >
                            Layanan Pengaduan
                        </a>
                    </li>
                    <li role="presentation" class="  ">
                        <a href="admin/index.php" >
                            Admin
                        </a>
                    </li>
                </ul>
                <div class="nav navbar-nav navbar-right mg-l-10">
                    <?php
                        if(isset($_SESSION["nik"])){
                            echo' <a href="controller.php?aksi=logout_user" class="btn navbar-btn pull-right btn-outline-white">
                                Logout
                            </a>';
                        }
                    ?>
                </div>    
            </div>
        </div>
    </header>

    <section id="hero">
        <div class="container">
            <div class="block block-aspiration">
                <div class="h2">Wadah Aspirasi Daerah Unit Layanan</div>
                <p>Sampaikan aspirasi Anda langsung kepada unit kerja yang berwenang</p>
                <hr>
            </div>
        </div>
        <svg width="100%" height="160px" viewBox="0 0 1300 160" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g>
                <path d="M1300,160 L-5.68434189e-14,160 L-5.68434189e-14,119 C423.103102,41.8480501 1096.33049,180.773108 1300,98 L1300,160 Z" fill="#FEF5ED" fill-rule="nonzero"></path>
                <path d="M129.77395,40.2373685 C292.925845,31.2149964 314.345174,146.772453 615.144273,151.135393 C915.94337,155.498333 1017.27057,40.8373289 1240.93447,40.8373289 C1262.89392,40.8373289 1282.20864,41.9705564 1299.18628,44.0144896 L1300,160 L-1.0658141e-14,160 L-1.0658141e-14,105 C31.4276111,70.4780448 73.5616946,43.3459311 129.77395,40.2373685 Z" fill="#FEF5ED" fill-rule="nonzero" opacity="0.3"></path>
                <path d="M69.77395,60.2373685 C232.925845,51.2149964 314.345174,146.772453 615.144273,151.135393 C915.94337,155.498333 1017.27057,0.837328936 1240.93447,0.837328936 C1263.91283,0.837328936 1283.59768,0.606916225 1300,1 L1300,160 L-1.70530257e-13,160 L-9.9475983e-14,74 C-9.9475983e-14,74 36.9912359,62.0502671 69.77395,60.2373685 Z" fill="#FEF5ED" fill-rule="nonzero" opacity="0.3"></path>
                <path d="M2.27373675e-13,68 C23.2194389,95.7701288 69.7555676,123.009338 207,125 C507.7991,129.36294 698.336099,22 922,22 C1047.38026,22 1198.02057,63.2171658 1300,101 L1300,160 L0,160 L2.27373675e-13,68 Z" fill="#FEF5ED" fill-rule="nonzero" opacity="0.3" transform="translate(650, 91) scale(-1, 1) translate(-650, -91) "></path>
            </g>
        </svg>
    </section>

    <?php
        if(isset($_GET['Ticket'])){
            $Pesan=$_GET['Ticket'];
                
            echo    "<script type = 'text/javascript'>
                        Swal.fire({
                            title: 'Mohon Catat Nomor Tiket Anda',
                            text: '$Pesan',
                            showCancelButton: true,
                            confirmButtonText: 'Cetak Bukti',
                            cancelButtonText: `Ok`,
                        }).then((result) => {
                            if (result.isConfirmed) {
                            
                            } else {
                                window.location.href = 'index.php';
                            }
                        })
                    </script>";
        }
    ?>

    <section id="complaint-box">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 mg-b-40">
                    <?php if(!isset($_SESSION['nik'])){?>
                        <form action="controller.php?aksi=login_masyarakat" method="POST" class="complaint-form" enctype="multipart/form-data">
                            <div class="complaint-form-box">
                                <br>
                                <div class="select-complaint">Sampaikan Laporan Anda</div>
                                <!-- <center><p><b>Pilih Klasifikasi Permintaan Anda</b></p></center> -->
                                <center>
                                    <a href="#" class="button1 active">Login</a>
                                    <a href="daftar.php" class="button1">Daftar</a>
                                </center>
                                <div class="complaint-help">
                                    Silahkan login terlebih dahulu 
                                    <span id="classfication_name">
                                        atau registrasi
                                    </span> bila Anda belum memiliki akun 
                                    
                                </div>
                            </div>
                            
                            <div class="complaint-form-category">
                                <input type="email" name="email" class="form-control" placeholder="Email *" required></textarea>
                            </div>
                            <div class="complaint-form-category">
                                <input type="password" name="password" class="form-control" placeholder="Password *" required></textarea>
                            </div>

                            <div class="complaint-form-footer">
                                <div class="row-flex flex-align-between">
                                    <input class="btn btn-primary" id="submit-complaint" type="submit" value="submit" name="submit" data-target="#data_submit">
                                </div>
                            </div>
                        </form>
                    <?php } else if(isset($_SESSION['nik'])) {?>
                        <form action="controller.php?aksi=tambah_pengaduan" method="POST" class="complaint-form" enctype="multipart/form-data">
                            <div class="complaint-form-box">
                                <br>
                                <div class="select-complaint">Sampaikan Laporan Anda</div>
                                <!-- <center><p><b>Pilih Klasifikasi Permintaan Anda</b></p></center> -->
                                <center>
                                    <a href="#" class="button1 active">Pengaduan</a>
                                    <a href="aspirasi.php" class="button1">Aspirasi</a>
                                    <a href="Check_Ticket.php" class="button1">Cek Tiket</a>
                                </center>
                                <div class="complaint-help">
                                    Perhatikan Cara Menyampaikan 
                                    <span id="classfication_name">
                                        Pengaduan
                                    </span> Yang Baik dan Benar 
                                    <a href="#modalPengaduan" data-toggle="modal" class="modalTrigger" id="modalToggler" data-modal-name="modalPengaduan" data-target="#bannerformmodal">
                                        <img alt="info-complaint" class="info-complaint" src="icon/info.svg" >
                                    </a>
                                </div>
                            </div>
                            
                            <div class="complaint-form-category">
                                <input type="text" name="Nama" class="form-control" value="<?php echo $_SESSION['nama_masyarakat']; ?>" placeholder="Nama *" readonly></textarea>
                            </div>
                            <div class="complaint-form-category">
                                <input type="text" name="NIK" class="form-control" value="<?php echo $_SESSION['nik']; ?>" placeholder="NIK *" readonly></textarea>
                            </div>
                            <div class="complaint-form-category">
                                <input type="text" name="No_telepon" class="form-control" value="<?php echo $_SESSION['telepon']; ?>" placeholder="No Telepon *" readonly></textarea>
                            </div>
                            <div class="complaint-form-category">
                                <input type="email" name="Email" class="form-control" value="<?php echo $_SESSION['email']; ?>" placeholder="Email *" readonly></textarea>
                            </div>
                            <div class="complaint-form-category">
                                <select name="unit" id="unit" class="select-tree-view" placeholder="Pilih Kategori Laporan Anda" name="category_id" onchange="getId(this.value);" required>
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
                            <div class="complaint-form-category">
                                <select name="keperluan" id="keperluan" class="select-tree-view" placeholder="Pilih Kategori Laporan Anda" name="category_id" required>
                                    <option value ="">Keperluan *</option>
                                </select>
                            </div>
                            <!-- Kota -->
                            <div class="complaint-form-category">
                                <select name="kota" id="kota" class="select-tree-view" placeholder="Pilih Kabupaten / Kota" name="category_id" onchange="getId2(this.value);">
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
                            <div class="complaint-form-category">
                                <select name="kecamatan" id="kecamatan" class="select-tree-view" placeholder="Pilih Kecamatan" name="category_id" onchange="getId4(this.value);">
                                    <option>Kecamatan *</option>
                                </select>
                            </div>
                            <!-- Kelurahan/Desa -->
                            <div class="complaint-form-category">
                                <select name="keldesa" id="keldesa" class="select-tree-view" placeholder="Pilih Desa/Kelurahan" name="category_id">
                                    <option>Kelurahan/Desa *</option>
                                </select>
                            </div>
                            <label for="classification_complaint" class="choose-classification">Tanggal Kejadian</label>
                            <div class="complaint-form-category">
                                <input type="date" name="TanggalKejadian" id="TanggalKejadian" class="form-control" placeholder="Tanggal Kejadian *" required></textarea>
                            </div>
                            <div class="complaint-form-category">
                                <textarea name="Keterangan" id="" rows="6" class="form-control textarea-flex autosize" placeholder="Keterangan *" required></textarea>
                            </div>
                            <label for="classification_complaint" class="choose-classification">Lampiran Masalah</label>
                            <div class="complaint-form-category">
                                <input type="file" name="files[]" id="files[]" class="form-control" accept="image"></textarea>
                            </div>

                            <div class="complaint-form-footer">
                                <div class="row-flex flex-align-between">
                                    <input class="btn btn-primary" id="submit-complaint" type="submit" value="submit" name="submit" data-target="#data_submit">
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                    
                    <div class="modal fade how-to" id="modalPengaduan" tabindex="-1" role="dialog" aria-labelledby="modalPengaduan" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header" style="padding: 15px;">
                                    <button type="button" class="close" style="top: 11px;" data-dismiss="modal" aria-hidden="true">
                                        ×
                                    </button>
                                    <h4 class="modal-title">PANDUAN PENGISIAN PENGADUAN</h4>
                                </div>
                            <img src="images/posterv20.png" width="100%">
                        </div>
                    </div>
                </div>
                <div class="modal fade how-to" id="modalAspirasi" tabindex="-1" role="dialog" aria-labelledby="modalAspirasi" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="padding: 15px;">
                                <button type="button" class="close" style="top: 11px;" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">PANDUAN PENGISIAN ASPIRASI</h4>
                            </div>
                            <img src="images/posterv20.png" width="100%">
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                <script src="resources/select2totree.css"></script>
                <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
                <link rel="stylesheet" type="text/css" href="resources/select2totree.css">  
            </div>
            <div class="col-sm-12">
                <div class="text-center text-muted h3 mg-0 mg-b-30">PROSES LAPORAN</div>
                <div class="row bs-wizard" style="border-bottom:0;">
                    <div class="col-xs-2 col-xs-offset-1 bs-wizard-step">
                        <div class="progress"><div class="progress-bar"></div></div>
                        <span class="bs-wizard-dot">
                            <!-- <i class="fa fa-pencil-square-o"></i> -->
                            <img src="icon/Laporan1.png" style="width: 100%;">
                        </span>
                        <div class="text-center bs-wizard-stepnum">Laporan</div>
                        <div class="bs-wizard-info text-center">
                            Tulis laporan atau aspirasi anda
                        </div>
                    </div>

                    <div class="col-xs-2 bs-wizard-step">
                        <div class="progress"><div class="progress-bar"></div></div>
                        <span class="bs-wizard-dot">
                            <!-- <i class="fa fa-mail-forward"></i> -->
                            <img src="icon/Verifikasi1.png" style="width: 100%;">
                        </span>
                        <div class="text-center bs-wizard-stepnum">Verifikasi</div>
                        <div class="bs-wizard-info text-center">
                            Proses verifikasi akan berjalan selama 3 hari, setelah itu akan diteruskan ke pihak yang bersangkutan
                        </div>
                    </div>

                    <div class="col-xs-2 bs-wizard-step">
                        <div class="progress"><div class="progress-bar"></div></div>
                        <span class="bs-wizard-dot">
                            <!-- <i class="fa fa-comments"></i> -->
                            <img src="icon/Tindak Lanjut1.png" style="width: 100%;">
                        </span>
                        <div class="text-center bs-wizard-stepnum">Tindak Lanjut</div>
                        <div class="bs-wizard-info text-center">
                            Pihak yang bersangkutan akan menindaklanjuti laporan yang telah anda sampaikan
                        </div>
                    </div>

                    <div class="col-xs-2 bs-wizard-step">
                        <div class="progress"><div class="progress-bar"></div></div>
                        <span class="bs-wizard-dot">
                            <!-- <i class="fa fa-commenting-o"></i> -->
                            <img src="icon/Tanggapan1.png" style="width: 100%;">
                        </span>
                        <div class="text-center bs-wizard-stepnum">Tanggapan</div>
                        <div class="bs-wizard-info text-center">
                            Anda akan diberikan waktu 5 hari untuk menanggapi balasan yang telah diberikan oleh pihak yang bersangkutan
                        </div>
                    </div>

                    <div class="col-xs-2 bs-wizard-step">
                        <div class="progress"><div class="progress-bar"></div></div>
                        <span class="bs-wizard-dot">
                            <!-- <i class="fa fa-check"></i> -->
                            <img src="icon/Selesai1.png" style="width: 100%;">
                        </span>
                        <div class="text-center bs-wizard-stepnum">Selesai</div>
                        <div class="bs-wizard-info text-center">
                                Laporan anda akan ditindaklanjuti hingga selesai
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <section class="block block-counter" id="hero" style="color:white; padding: 40px 0 40px;">
            <div class="container">
                <div class="text-center text-muted h3 mg-0 mg-b-30" style="color: white">JUMLAH LAPORAN DAN ASPIRASI SEKARANG</div>
                <?php 
                    $query = "SELECT COUNT(ID_Pelaporan) AS JumlahLaporan FROM pelaporan;";
                    $exec = mysqli_query($koneksi, $query);
                    $fetch_q = mysqli_fetch_array($exec);
                ?>
                <div class="row-flex flex-tablet text-center">
                    <div class="post post-counter" style="margin-left: auto;margin-right: auto;">
                        <div class="counter-count"> 
                            <span class="numscroller" data-min='0' data-max=<?= $fetch_q['JumlahLaporan'] ?> data-delay='2' data-increment='1000'></span></div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>

        <footer>
                <div class="post-footer">
                    <div class="footer-Hak Cipta">
                        Database-Semester 3
                    </div>
                </div>
            </div>
        </footer>

    <div class="loadedcontentmodal"></div>

    <script src="https://www.lapor.go.id/combine/412ecc180b60d48eb196db8827c68391-1634533910"></script>
    <script src="resources/dropzone.js"></script>
    <script src="https://www.lapor.go.id/combine/e0149bf6f4f799c71effe2f3272859ac-1617850352"></script>
    <script src="https://www.lapor.go.id/combine/6853ff71a407ef7906205e10eefc483e-1617850351"></script>

    <script src="resources/leaflet.js"></script>
    <script src="resources/leaflet-providers.js"></script>
    <script src="resources/leaflet.ajax.min.js"></script>
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