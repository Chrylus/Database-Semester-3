<?php 
    header("Refresh: 300");
    session_start();
    if(!isset($_SESSION["id"])){
        header("location:login.php");
    }

    include '../../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Wadul Admin - Administrator</title>
    <link rel="icon" href="../../images/logo-wadul-white-ico.png">
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" href="../user/images/Binus Logo.png">
    <!-- Table sort -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link href="select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="../vendor/jquery/jquery.min.js"></script>

</head>

<body id="page-top">

    <?php
        if(isset($_GET['tambah'])){             
            echo    "<script type = 'text/javascript'>
                        Swal.fire(
                            'Sukses!',
                            'Tambah Data Berhasil!',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'admin.php';
                            } else {
                                window.location.href = 'admin.php';
                            }
                        })
                    </script>";
        } else if (isset($_GET['edit'])){             
            echo    "<script type = 'text/javascript'>
                        Swal.fire(
                            'Sukses!',
                            'Edit Data Berhasil!',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'admin.php';
                            } else {
                                window.location.href = 'admin.php';
                            }
                        })
                    </script>";
        } else if (isset($_GET['hapus'])){             
            echo    "<script type = 'text/javascript'>
                        Swal.fire(
                            'Sukses!',
                            'Hapus Data Berhasil!',
                            'success'
                        ).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'admin.php';
                            } else {
                                window.location.href = 'admin.php';
                            }
                        })
                    </script>";
        }
    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">WADUL</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item active">
                <a class="nav-link" href="#">
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
                        <a class="collapse-item" href="../pengaduan/index.php">Pengaduan</a>
                        <a class="collapse-item" href="../aspirasi/index.php">Aspirasi</a>
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
                            <a href="../../index.php" class="nav-link" style="color: #007BFF">Ke Halaman Depan</a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php 
                                    if (isset($_SESSION["id"])) {              
                                        echo($_SESSION['nama']);
                                    }
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <?php
                                if (isset($_SESSION["id"])) {              
                                        echo 
                                        '<a href="../controller.php?aksi=logout" class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout </a>';
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
                        <h1 class="h3 mb-0 text-gray-800">Data Administrator</h1>
                    </div>
                    <div class="card-body">
                    <?php if(isset($_GET['hal']) == "edit"){?>
                        <?php 
                            $query = "SELECT * FROM penduduk WHERE NIK = '$_GET[id]'";
                            $exec = mysqli_query($koneksi, $query);
                            $fetch = mysqli_fetch_array($exec);    
                        ?>
                        <form method="post" action="../../controller.php?aksi=edit_admin&id=<?=$fetch['NIK']?>">
                        <div class="complaint-form-category">
                            <input type="text" name="nama" class="form-control" placeholder="Nama *" value="<?=$fetch['Nama']?>" required></textarea>
                        </div>
                        <div class="complaint-form-category">
                            <input type="text" name="nik" class="form-control" placeholder="NIK *" value="<?=$fetch['NIK']?>" required></textarea>
                        </div>
                        <div class="complaint-form-category">
                            <input type="text" name="telepon" class="form-control" placeholder="Nomor Telepon *" value="<?=$fetch['No_telepon']?>" required></textarea>
                        </div>
                        <div class="complaint-form-category">
                            <input type="text" name="email" class="form-control" placeholder="Email *" value="<?=$fetch['Email']?>" required></textarea>
                        </div>
                        <div class="complaint-form-category">
                            <input type="password" name="password" class="form-control" placeholder="Password *" required></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <?php } else if(isset($_GET['hal']) != "edit"){?>
                        <form method="post" action="../../controller.php?aksi=tambah_admin">
                        <div class="form-group">
                            <select class="select2-single form-control" name="nik" id="nik">
                            <option disabled selected>Pilih NIK</option>
                            <?php 
                                $calon_admin = "SELECT Nama, NIK FROM penduduk 
                                WHERE NOT EXISTS 
                                (SELECT * FROM msadmin WHERE penduduk.NIK = msadmin.NIK);";
                                $exec = mysqli_query($koneksi, $calon_admin);   
                            ?>
                            <?php while($dataAdmin = mysqli_fetch_array($exec)):?>
                                <option value="<?= $dataAdmin['NIK'] ?>"><?= $dataAdmin['NIK'] ?> - <?= $dataAdmin['Nama'] ?></option>
                            <?php endwhile; ?>
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                    <?php } ?>
                    <br><br>
                    
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Admin Data</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Command</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Command</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php
                                                $no = 1;
                                                $tampil = mysqli_query($koneksi, "SELECT Nama, penduduk.NIK FROM penduduk INNER JOIN msadmin ON penduduk.NIK = msadmin.NIK order by penduduk.NIK desc");
                                                while($data = mysqli_fetch_array($tampil)) :
                                            ?>
                                            <tr>
                                                <td><?=$no++;?></td>
                                                <td><?=$data['Nama']?></td>
                                                <td>
                                                    <a href="admin.php?hal=edit&id=<?=$data['NIK']?>" class="btn btn-primary"> Edit </a>
                                                    <a href="../../controller.php?aksi=hapus_admin&id=<?=$data['NIK']?>" class="btn btn-danger"> Hapus </a>
                                                </td>
                                            </tr>
                                            <?php endwhile; //penutup perulangan while ?>           
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Row -->
                    <div class="row">

                </div>
                <!-- /.container-fluid -->

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
                    <a class="btn btn-primary" href="../../controller.php?aksi=logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="select2/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function () {


      $('.select2-single').select2();

      // Select2 Single  with Placeholder
      $('.NIK').select2({
        placeholder: "Pilih NIK",
        allowClear: true
      });

    });
  </script>
</body>

</html>