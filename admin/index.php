<?php
    header("Refresh: 300");
    session_start();
    if(!isset($_SESSION["id"])) {
        header("location:login.php");
    }

    include ("../koneksi.php");

    //Tampilan Tiket di Dashboard Atas
    $sql1    = "select count(Status) as Pending_Pelaporan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%')";
    // Kalau mau kasih syarat bulan dan tahun sama
    // AND MONTH (TanggalLaporan) = MONTH (CURDATE()) AND YEAR (TanggalLaporan) = YEAR (CURDATE())
    $result1 = mysqli_query($koneksi, $sql1);
    $data1   = mysqli_fetch_assoc($result1);

    $sql2    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%')";
    // Kalau mau kasih syarat bulan dan tahun sama
    // AND MONTH (TanggalLaporan) = MONTH (CURDATE()) AND YEAR (TanggalLaporan) = YEAR (CURDATE()) 
    $result2 = mysqli_query($koneksi, $sql2);
    $data2   = mysqli_fetch_assoc($result2);
    

    $sql3    = "select count(ID_Pelaporan) as Total_Ticket from pelaporan";
    $result3 = mysqli_query($koneksi, $sql3);
    $data3   = mysqli_fetch_assoc($result3);
    
    $sql4    = "select count(NIK) as Total_Penduduk from penduduk";
    $result4 = mysqli_query($koneksi, $sql4);
    $data4   = mysqli_fetch_assoc($result4);

    $sql5    = "select count(id_kabkota) as Total_KabKota from kabkota";
    $result5 = mysqli_query($koneksi, $sql5);
    $data5   = mysqli_fetch_assoc($result5);

    $sql6    = "select count(id_kecamatan) as Total_Kecamatan from kecamatan";
    $result6 = mysqli_query($koneksi, $sql6);
    $data6   = mysqli_fetch_assoc($result6);

    $sql7    = "select count(id_keldesa) as Total_KelDesa from keldesa";
    $result7 = mysqli_query($koneksi, $sql7);
    $data7   = mysqli_fetch_assoc($result7);

    $sql8    = "select count(NIK) as Total_Admin from msadmin";
    $result8 = mysqli_query($koneksi, $sql8);
    $data8   = mysqli_fetch_assoc($result8);
    //End of Tampilan Tiket di Dashboard Atas

    //buat chart titik untuk aspirasi pending
    $sql9    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 1 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result9 = mysqli_query($koneksi, $sql9);
    $data9   = mysqli_fetch_assoc($result9);

    $sql10    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 2 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result10 = mysqli_query($koneksi, $sql10);
    $data10   = mysqli_fetch_assoc($result10);

    $sql11    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 3 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result11 = mysqli_query($koneksi, $sql11);
    $data11   = mysqli_fetch_assoc($result11);

    $sql12    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 4 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result12 = mysqli_query($koneksi, $sql12);
    $data12   = mysqli_fetch_assoc($result12);

    $sql13    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 5 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result13 = mysqli_query($koneksi, $sql13);
    $data13   = mysqli_fetch_assoc($result13);

    $sql14    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 6 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result14 = mysqli_query($koneksi, $sql14);
    $data14   = mysqli_fetch_assoc($result14);

    $sql15    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 7 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result15 = mysqli_query($koneksi, $sql15);
    $data15   = mysqli_fetch_assoc($result15);

    $sql16    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 8 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result16 = mysqli_query($koneksi, $sql16);
    $data16   = mysqli_fetch_assoc($result16);

    $sql17    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 9 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result17 = mysqli_query($koneksi, $sql17);
    $data17   = mysqli_fetch_assoc($result17);

    $sql18    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 10 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result18 = mysqli_query($koneksi, $sql18);
    $data18   = mysqli_fetch_assoc($result18);

    $sql19    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 11 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result19 = mysqli_query($koneksi, $sql19);
    $data19   = mysqli_fetch_assoc($result19);

    $sql20    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 12 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result20 = mysqli_query($koneksi, $sql20);
    $data20   = mysqli_fetch_assoc($result20);
    //buat chart titik untuk Pengaduan pending

    $sql21    = "select count(Status) as Pending_Pengaduan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND MONTH (TanggalLaporan) = 1 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result21 = mysqli_query($koneksi, $sql21);
    $data21   = mysqli_fetch_assoc($result21);

    $sql22    = "select count(Status) as Pending_Pengaduan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND MONTH (TanggalLaporan) = 2 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result22 = mysqli_query($koneksi, $sql22);
    $data22   = mysqli_fetch_assoc($result22);

    $sql23    = "select count(Status) as Pending_Pengaduan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND MONTH (TanggalLaporan) = 3 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result23 = mysqli_query($koneksi, $sql23);
    $data23   = mysqli_fetch_assoc($result23);

    $sql24    = "select count(Status) as Pending_Pengaduan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND MONTH (TanggalLaporan) = 4 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result24 = mysqli_query($koneksi, $sql24);
    $data24   = mysqli_fetch_assoc($result24);

    $sql25    = "select count(Status) as Pending_Pengaduan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = 5 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result25 = mysqli_query($koneksi, $sql25);
    $data25   = mysqli_fetch_assoc($result25);

    $sql26    = "select count(Status) as Pending_Pengaduan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND MONTH (TanggalLaporan) = 6 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result26 = mysqli_query($koneksi, $sql26);
    $data26   = mysqli_fetch_assoc($result26);

    $sql27    = "select count(Status) as Pending_Pengaduan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND MONTH (TanggalLaporan) = 7 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result27 = mysqli_query($koneksi, $sql27);
    $data27   = mysqli_fetch_assoc($result27);

    $sql28    = "select count(Status) as Pending_Pengaduan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND MONTH (TanggalLaporan) = 8 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result28 = mysqli_query($koneksi, $sql28);
    $data28   = mysqli_fetch_assoc($result28);

    $sql29    = "select count(Status) as Pending_Pengaduan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND MONTH (TanggalLaporan) = 9 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result29 = mysqli_query($koneksi, $sql29);
    $data29   = mysqli_fetch_assoc($result29);

    $sql30    = "select count(Status) as Pending_Pengaduan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND MONTH (TanggalLaporan) = 10 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result30 = mysqli_query($koneksi, $sql30);
    $data30   = mysqli_fetch_assoc($result30);

    $sql31    = "select count(Status) as Pending_Pengaduan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND MONTH (TanggalLaporan) = 11 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result31 = mysqli_query($koneksi, $sql31);
    $data31   = mysqli_fetch_assoc($result31);

    $sql32    = "select count(Status) as Pending_Pengaduan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND MONTH (TanggalLaporan) = 12 AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
    $result32 = mysqli_query($koneksi, $sql32);
    $data32   = mysqli_fetch_assoc($result32);

     //buat tabel chart pie
     $sql33    = "select count(Status) as Pending_Pelaporan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
     $result33 = mysqli_query($koneksi, $sql33);
     $data33   = mysqli_fetch_assoc($result33);
 
     $sql34    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND YEAR (TanggalLaporan) = YEAR (CURDATE())";
     $result34 = mysqli_query($koneksi, $sql34);
     $data34   = mysqli_fetch_assoc($result34);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wadul Admin - Dashboard</title>
    <link rel="icon" href="../images/logo-wadul-white-ico.png">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script> 

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">WADUL</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item">
                <a class="nav-link" href="super/admin.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Admin</span></a>
            </li> 

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Lihat Laporan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan:</h6>
                        <a class="collapse-item" href="pengaduan/index.php">Pengaduan</a>
                        <a class="collapse-item" href="aspirasi/index.php">Aspirasi</a>
                    </div>
                </div>
            </li>      

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a href="../index.php" class="nav-link" style="color: #007BFF">Ke Halaman Depan</a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> 
                                    <?php 
                                        if (isset($_SESSION["id"])) 
                                        {              
                                            echo($_SESSION['nama']);
                                        }
                                    ?> 
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <?php
                                    if (isset($_SESSION["id"])) {              
                                        echo 
                                            '<a href="../controller.php?aksi=logout" class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout 
                                            </a>';
                                    }
                                ?>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="create_pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Ticket Pelaporan Pending -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "pengaduan/index.php">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Pending Pelaporan Ticket </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data1['Pending_Pelaporan'];?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Ticket Aspirasi Pending -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "aspirasi/index.php">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"> Pending Aspirasi Ticket</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data2['Pending_Aspirasi'];?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Total Ticket -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "#">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Total Ticket </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $data3['Total_Ticket'];?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-ticket-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "#">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Total Pengguna </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data4['Total_Penduduk'];?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-male fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "#">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Total Kabupaten dan Kota </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data5['Total_KabKota'];?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-building fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "#">
                                <div class="card border-left-secondary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Total Kecamatan </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data6['Total_Kecamatan'];?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-building fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "#">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Total Kelurahan dan Desa </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data7['Total_KelDesa'];?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-building fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href = "#">
                                <div class="card border-left-dark shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Total Admin </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data8['Total_Admin'];?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-male fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pending Tiket</h6>
                                    <!-- <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="layanan"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Tiket</h6>
                                    <!-- <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart pt-2 pb-1">
                                        <canvas id="jenis_tiket"></canvas>
                                    </div>
                                    <!-- <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- function for chart -->
                    <script>
                         $(function () {

                            var ctx = document.getElementById("layanan").getContext('2d');
                            Chart.defaults.global.defaultFontFamily = 'Lato';
                            Chart.defaults.global.defaultFontSize = 12;
                            Chart.defaults.global.defaultFontColor = '#777';

                                        var datafirst = {
                                            label: "Aspirasi",
                                            data: [<?php echo $data9['Pending_Aspirasi'];?>,
                                                    <?php echo $data10['Pending_Aspirasi'];?>,
                                                    <?php echo $data11['Pending_Aspirasi'];?>,
                                                    <?php echo $data12['Pending_Aspirasi'];?>,
                                                    <?php echo $data13['Pending_Aspirasi'];?>,
                                                    <?php echo $data14['Pending_Aspirasi'];?>,
                                                    <?php echo $data15['Pending_Aspirasi'];?>,
                                                    <?php echo $data16['Pending_Aspirasi'];?>,
                                                    <?php echo $data17['Pending_Aspirasi'];?>,
                                                    <?php echo $data18['Pending_Aspirasi'];?>,
                                                    <?php echo $data19['Pending_Aspirasi'];?>,
                                                    <?php echo $data20['Pending_Aspirasi'];?>,
                                                ],
                                            backgroundColor: 'rgba(255, 99, 132, 0.6)'
                                        };
                                        var datasecond = {
                                            label: "Pengaduan",
                                            data: [ <?php echo $data21['Pending_Pengaduan'];?>,
                                                    <?php echo $data22['Pending_Pengaduan'];?>,
                                                    <?php echo $data23['Pending_Pengaduan'];?>,
                                                    <?php echo $data24['Pending_Pengaduan'];?>,
                                                    <?php echo $data25['Pending_Pengaduan'];?>,
                                                    <?php echo $data26['Pending_Pengaduan'];?>,
                                                    <?php echo $data27['Pending_Pengaduan'];?>,
                                                    <?php echo $data28['Pending_Pengaduan'];?>,
                                                    <?php echo $data29['Pending_Pengaduan'];?>,
                                                    <?php echo $data30['Pending_Pengaduan'];?>,
                                                    <?php echo $data31['Pending_Pengaduan'];?>,
                                                    <?php echo $data32['Pending_Pengaduan'];?>,
                                                ],
                                            backgroundColor: 'rgba(54, 162, 235, 0.6)'
                                        };
                                        
                                        var data = {      
                                            labels: [
                                                'Januari',
                                                'Februari',
                                                'Maret',
                                                'April',
                                                'Mei',
                                                'Juni',
                                                'Juli',
                                                'Agustus',
                                                'September',
                                                'Oktober',
                                                'November',
                                                'Desember'
                                            ],
                                            datasets: [datafirst, datasecond]
                                        };
                                        var myDoughnutChart = new Chart(ctx, {
                                            type: 'line',
                                            data: data,
                                            options:{
                                                legend:{
                                                    display:true,
                                                    position:'right',
                                                    labels:{
                                                        fontColor:'#000'
                                                    }
                                                },
                                                layout:{
                                                    padding:{
                                                        left:0,
                                                        right:0,
                                                        bottom:80,
                                                        top:0
                                                    }
                                                },
                                                tooltips:{
                                                    enabled:true
                                                }
                                            }
                                            });
                                        var ctx2 = document.getElementById("jenis_tiket").getContext('2d');
                                         Chart.defaults.global.defaultFontFamily = 'Lato';
                                         Chart.defaults.global.defaultFontSize = 12;
                                        Chart.defaults.global.defaultFontColor = '#777';
                                        var data2 = {
                                            datasets: [{
                                                data: [<?php echo $data33['Pending_Pelaporan'];?> , <?php echo $data34['Pending_Aspirasi'];?>],
                                                backgroundColor: [
                                                    'rgba(54, 162, 235, 0.6)',
                                                    'rgba(255, 99, 132, 0.6)',
                                                ],
                                                borderWidth:1,
                                                borderColor:'#777',
                                                hoverBorderWidth:3,
                                                hoverBorderColor:'#000'
                                            }],
                                            labels: [
                                                'Pengaduan',
                                                'Aspirasi'
                                            ]
                                        };
                                        
                                        var myDoughnutChart2 = new Chart(ctx2, {
                                            type: 'pie',
                                            data: data2,
                                            options:{
                                                legend:{
                                                    display:true,
                                                    position:'right',
                                                    labels:{
                                                        fontColor:'#000'
                                                    }
                                                },
                                                layout:{
                                                    padding:{
                                                        left:0,
                                                        right:0,
                                                        bottom:0,
                                                        top:0
                                                    }
                                                },
                                                tooltips:{
                                                    enabled:true
                                                }
                                            }
                                            });
                                        });                     
                    </script> 
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="Hak Cipta text-center my-auto">
                        <span>Hak Cipta &copy; Wadul 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../controller.php?aksi=logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>