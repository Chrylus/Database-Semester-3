<?php
 header("Refresh: 300");
 session_start();
 if(!isset($_SESSION["id"])) {
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

    <title>Wadul Admin - Pengaduan</title>
    <link rel="icon" href="../../images/logo-wadul-white-ico.png">
    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.html">
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
            <li class="nav-item ">
                <a class="nav-link" href="../super/admin.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Admin</span></a>
            </li> 
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
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
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a href="../../index.php" class="nav-link" style="color: #007BFF">Ke Halaman Depan</a>
                        </li>
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php 
                        if (isset($_SESSION["id"])) 
                        {              
                            echo($_SESSION['nama']);
                        }
                    ?> </span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
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
                        <h1 class="h3 mb-0 text-gray-800">Laporan Pengaduan</h1>
                    </div>
                    <div class="card-body">
                    <?php if(isset($_GET['hal']) == "edit"){?>
                        <?php 
                            $id = $_GET['id'];
                            $query = "SELECT * FROM pelaporan WHERE ID = '$id'";
                            $exec = mysqli_query($koneksi, $query);
                            $fetch = mysqli_fetch_array($exec);    
                        ?>
                        <form method="post" action="../../controller.php?aksi=edit_pengaduan&id=<?=$fetch['ID']?>">
                        <div class="complaint-form-category">
                            <input type="text" name="Status" class="form-control" placeholder="Status *" value="<?=$fetch['Status']?>" required></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <?php } else if(isset($_GET['hal']) != "edit"){?>
                        <form method="post" action="#">
                        <div class="complaint-form-category">
                            <input type="text" name="Status" class="form-control" placeholder="Klik edit pada pengaduan yang diinginkan *" readonly></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    <?php } ?>
                    <br><br>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <tr>
                                            
                                            <th>ID Pelaporan</th>
                                            <th>NIK</th>
                                            <th>Unit Layanan</th>
                                            <th>Keperluan</th>
                                            <th>Tanggal Laporan</th>
                                            <th>Status</th>
                                            <th>Ticket</th>
                                            <th>Edit</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            
                                            <th>ID_Pelaporan</th>
                                            <th>NIK</th>
                                            <th>Unit_Layanan</th>
                                            <th>Keperluan</th>
                                            <th>Tanggal_Laporan</th>
                                            <th>Status</th>
                                            <th>Ticket</th>
                                            <th>Edit</th>
                                            <th>Detail</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $tampil = "SELECT 
                                        pelaporan.ID AS 'ID',
										pelaporan.ID_Pelaporan AS 'ID_Pelaporan', 
                                        pelaporan.NIK AS 'NIK',
                                        unit_layanan.nama_unit AS 'Nama_unit', 
                                        keperluan.Keperluan AS 'Keperluan', 
                                        pelaporan.Keterangan AS 'Keterangan',
                                        pelaporan.TanggalLaporan AS 'TanggalLaporan',
                                        pelaporan.TanggalKejadian AS 'TanggalKejadian',
                                        pelaporan.Status AS 'Status',
                                        pelaporan.Ticket AS 'Ticket'
                                        FROM pelaporan
                                        INNER JOIN  unit_layanan ON pelaporan.Tujuan = unit_layanan.id
                                        INNER JOIN keperluan ON pelaporan.Keperluan=keperluan.topik_id
                                        WHERE pelaporan.ID_Pelaporan LIKE 'PGD%'
                                        ORDER BY pelaporan.ID_Pelaporan DESC";
                                        $execute = mysqli_query($koneksi, $tampil); 
                                    ?>
                                            <?php $no = 1; while($fetch_t = mysqli_fetch_array($execute)):?>
                                                <?php
                                                    $nik = $fetch_t['NIK']; 
                                                    $query = "SELECT Nama FROM penduduk WHERE NIK='$nik'";
                                                    $exec = mysqli_query($koneksi, $query);
                                                    $fetch_n = mysqli_fetch_array($exec);
                                                    
                                                    $id = $fetch_t['ID_Pelaporan'];
                                                    $query2 = "SELECT lampiran AS 'Lampiran' FROM lampiran WHERE ID_Pelaporan='$id'";
                                                    $exec2 = mysqli_query($koneksi, $query2);
                                                    $fetch_n2 = mysqli_fetch_array($exec2);

                                                    $query3 = "SELECT nama_kabkota AS 'KabKota' FROM kabkota INNER JOIN header_pelaporan ON header_pelaporan.KabKota = id_kabkota WHERE ID_Pelaporan='$id'";
                                                    $exec3 = mysqli_query($koneksi, $query3);
                                                    $fetch_n3 = mysqli_fetch_array($exec3);

                                                    $query4 = "SELECT nama_kecamatan AS 'Kecamatan' FROM kecamatan INNER JOIN header_pelaporan ON header_pelaporan.Kecamatan = id_kecamatan WHERE ID_Pelaporan='$id'";
                                                    $exec4 = mysqli_query($koneksi, $query4);
                                                    $fetch_n4 = mysqli_fetch_array($exec4);

                                                    $query5 = "SELECT nama_keldesa AS 'KelDesa' FROM keldesa INNER JOIN header_pelaporan ON header_pelaporan.KelDesa = id_keldesa WHERE ID_Pelaporan='$id'";
                                                    $exec5 = mysqli_query($koneksi, $query5);
                                                    $fetch_n5 = mysqli_fetch_array($exec5);
                                                ?>
                                                <tr>
                                                    <td><span id="ID_Pelaporan<?=$fetch_t['ID']?>"><?=$fetch_t['ID_Pelaporan']?></span></td>
                                                    <td><span id="NIK<?=$fetch_t['ID']?>"><?=$fetch_t['NIK']?></span></td>
                                                    <td><span id="Nama_unit<?=$fetch_t['ID']?>"><?=$fetch_t['Nama_unit']?></span></td>
                                                    <td><span id="Keperluan<?=$fetch_t['ID']?>"><?=$fetch_t['Keperluan']?></span></td>
                                                    <td><span id="TanggalLaporan<?=$fetch_t['ID']?>"><?=$fetch_t['TanggalLaporan']?></span></td>
                                                    <td><span id="Status<?=$fetch_t['ID']?>"><?=$fetch_t['Status']?></span></td>
                                                    <td><span id="Ticket<?=$fetch_t['ID']?>"><?=$fetch_t['Ticket']?></span></td>
                                                    <td>
                                                    <a href="index.php?hal=edit&id=<?=$fetch_t['ID']?>" class="btn btn-primary"> Edit </a></td>
                                                    <td>
                                                    <span hidden id="Nama<?=$fetch_t['ID']?>"><?=$fetch_n['Nama']?></span>
                                                    <span hidden id="Keterangan<?=$fetch_t['ID']?>"><?=$fetch_t['Keterangan']?></span>
                                                    <?php if(isset($fetch_n2['Lampiran'])){?>
                                                        <span hidden id="Lampiran<?=$fetch_t['ID']?>"><?=$fetch_n2['Lampiran']?></span>
                                                    <?php } else if(!isset($fetch_n2['Lampiran'])){ ?>
                                                        <span hidden id="Lampiran<?=$fetch_t['ID']?>">0</span>
                                                    <?php } ?>
                                                    <span hidden id="TanggalKejadian<?=$fetch_t['ID']?>"><?=$fetch_t['TanggalKejadian']?></span>
                                                    <span hidden id="KabKota<?=$fetch_t['ID']?>"><?=$fetch_n3['KabKota']?></span>
                                                    <span hidden id="Kecamatan<?=$fetch_t['ID']?>"><?=$fetch_n4['Kecamatan']?></span>
                                                    <span hidden id="KelDesa<?=$fetch_t['ID']?>"><?=$fetch_n5['KelDesa']?></span>
                                                    <button type="button" class="btn btn-primary edit" value="<?php echo $fetch_t['ID']; ?>"><span class="glyphicon glyphicon-edit"></span>Detail</button>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

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
    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">ID Pelaporan</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_id_pelaporan">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">Ticket</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_ticket">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">Nama Lengkap</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_nama">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">NIK</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_nik">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">Unit Layanan</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_tujuan">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">Keperluan</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_keperluan">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">Keterangan</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_keterangan">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">Lampiran</span>
                            <a href = "../berkas/" target="_blank" id="m_lampiran">
                        </a>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">Tanggal Pelaporan</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_tanggal_pelaporan">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">Tanggal Kejadian</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_tanggal_kejadian">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">Kabupaten / Kota</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_kabupaten_kota">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">Kecamatan</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_kecamatan">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">Kelurahan / Desa</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_kelurahan_desa">
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon" style="width:150px;">Status</span>
                        <input type="text" style="width:350px;" class="form-control" id="m_status">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
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
    <script>
       $(document).ready(function(){
        $('.edit').on('click', function(){
            var id=$(this).val();
            var id_pelaporan=$('#ID_Pelaporan'+id).text();
            var ticket=$('#Ticket'+id).text();
            var nama=$('#Nama'+id).text();
            var nik=$('#NIK'+id).text();
            var tujuan=$('#Nama_unit'+id).text();
            var keperluan=$('#Keperluan'+id).text();
            var keterangan=$('#Keterangan'+id).text();
            var lampiran=$('#Lampiran'+id).text();
            var tanggal_pelaporan=$('#TanggalLaporan'+id).text();
            var tanggal_kejadian=$('#TanggalKejadian'+id).text();
            var kabupaten_kota=$('#KabKota'+id).text();
            var kecamatan=$('#Kecamatan'+id).text();
            var kelurahan_desa=$('#KelDesa'+id).text();
            var status=$('#Status'+id).text();
            
            $('#detailModal').modal('show');
            $('#m_id_pelaporan').val(id_pelaporan);
            $('#m_ticket').val(ticket);
            $('#m_nama').val(nama);
            $('#m_nik').val(nik);
            $('#m_tujuan').val(tujuan);
            $('#m_keperluan').val(keperluan);
            $('#m_keterangan').val(keterangan);
            $('#m_lampiran').html(lampiran);
            if(lampiran === '0'){
                console.log(lampiran)
                $('#m_lampiran').replaceWith('<span id="m_lampiran">Tidak Ada Data</span>');
            }else{
                console.log(lampiran)
                $('#m_lampiran').replaceWith(`<a href='../berkas/${lampiran}' id="m_lampiran">${lampiran}</a>`);
            }
            $('#m_tanggal_pelaporan').val(tanggal_pelaporan);
            $('#m_tanggal_kejadian').val(tanggal_kejadian);
            $('#m_kabupaten_kota').val(kabupaten_kota);
            $('#m_kecamatan').val(kecamatan);
            $('#m_kelurahan_desa').val(kelurahan_desa);
            $('#m_status').val(status);
        });
    });
    </script>
    
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>