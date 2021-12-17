<?php 
    session_start();
    session_regenerate_id(true);
    include 'koneksi.php';

    $data = $_REQUEST;
 
    switch($data['aksi']){
        case 'tambah_pengaduan':
            if(isset($data['submit'])){
                // Default
                $unik = uniqid('PENGADUAN');
                // Ambil input dari depan
                $nik = $data['NIK'];
                $esc_nik = mysqli_real_escape_string($koneksi, $nik);
                $tujuan = $data['Tujuan'];
                $esc_tujuan = mysqli_real_escape_string($koneksi, $tujuan);
                $keperluan = $data['Keperluan'];
                $esc_keperluan = mysqli_real_escape_string($koneksi, $keperluan);
                $keterangan = $data['Keterangan'];
                $esc_keterangan = mysqli_real_escape_string($koneksi, $keterangan);
                $tanggal_kejadian = $data['TanggalKejadian'];
                $esc_tanggal_kejadian = mysqli_real_escape_string($koneksi, $tanggal_kejadian);
                // Ambil input dari depan
                $nama = $data['Nama'];
                $esc_name = mysqli_real_escape_string($koneksi, $nama);
                $no_telepon = $data['No_telepon'];
                $esc_no_telepon = mysqli_real_escape_string($koneksi, $no_telepon);
                $email = $data['Email'];
                $esc_email = mysqli_real_escape_string($koneksi, $email);
                // Default
                $pending = 'Pending';
                // File upload
                if(isset($_FILES["files"]) && !empty($_FILES["files"]["name"])){
                    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
                        $file_name = $key.$_FILES['files']['name'][$key];
                        $file_size =$_FILES['files']['size'][$key];
                        $file_tmp =$_FILES['files']['tmp_name'][$key];
                        $file_type=$_FILES['files']['type'][$key];
                        $original_filename = $_FILES['files']['name'][$key];
                        $ext = strtolower(pathinfo($_FILES["files"]["name"][$key], PATHINFO_EXTENSION));
                        if(in_array( $ext, array('jpg', 'jpeg', 'png', 'gif', 'bmp'))) {
                            $new_filename = uniqid() .  '_' . $nik . '.' . $ext;
                            move_uploaded_file($file_tmp,'admin/pengaduan/berkas/'.$new_filename);
                        }
                    }
                }
                // Eksekusi
                $query1 = "INSERT INTO pelaporan(
                    ID_Pelaporan, NIK, Tujuan, Keperluan, Keterangan, TanggalKejadian, Status)
                    VALUES ('$unik', '$esc_nik', '$esc_tujuan', '$esc_keperluan', '$esc_keterangan', '$esc_tanggal_kejadian', '$pending')";
                $exec1 = mysqli_query($koneksi, $query1);
                $query2 = "INSERT INTO penduduk(
                    Nama, NIK, No_telepon, Email)
                    VALUES ('$esc_name', '$esc_nik', '$esc_no_telepon', '$esc_email')";
                $exec2 = mysqli_query($koneksi, $query2);
                if ($new_filename != NULL){
                    $query3 = "INSERT INTO lampiran(ID_Pelaporan, lampiran) VALUES ('$unik', '$new_filename')";
                    $exec3 = mysqli_query($koneksi, $query3);
                }
                if($exec1 || $exec2 || $exec3){
                    header("location: index.php?pesan=Sukses");
                }else{
                    header("location: index.php?pesan=Gagal");
                }
            }
            break;
        case 'tambah_aspirasi':
            if(isset($data['submit'])){
                // Default
                $unik = uniqid('ASPIRASI');
                // Ambil input dari depan
                $nik = $data['NIK'];
                $esc_nik = mysqli_real_escape_string($koneksi, $nik);
                $tujuan = $data['Tujuan'];
                $esc_tujuan = mysqli_real_escape_string($koneksi, $tujuan);
                $keperluan = $data['Keperluan'];
                $esc_keperluan = mysqli_real_escape_string($koneksi, $keperluan);
                $keterangan = $data['Keterangan'];
                $esc_keterangan = mysqli_real_escape_string($koneksi, $keterangan);
                // Ambil input dari depan
                $nama = $data['Nama'];
                $esc_name = mysqli_real_escape_string($koneksi, $nama);
                $no_telepon = $data['No_telepon'];
                $esc_no_telepon = mysqli_real_escape_string($koneksi, $no_telepon);
                $email = $data['Email'];
                $esc_email = mysqli_real_escape_string($koneksi, $email);
                // Default
                $pending = 'Pending';
                // File upload
                if(isset($_FILES["files"]) && !empty($_FILES["files"]["name"])){
                    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
                        $file_name = $key.$_FILES['files']['name'][$key];
                        $file_size =$_FILES['files']['size'][$key];
                        $file_tmp =$_FILES['files']['tmp_name'][$key];
                        $file_type=$_FILES['files']['type'][$key];
                        $original_filename = $_FILES['files']['name'][$key];
                        $ext = strtolower(pathinfo($_FILES["files"]["name"][$key], PATHINFO_EXTENSION));
                        if(in_array( $ext, array('jpg', 'jpeg', 'png', 'gif', 'bmp'))) {
                            $new_filename = uniqid() .  '_' . $nik . '.' . $ext;
                            move_uploaded_file($file_tmp,'admin/pengaduan/berkas/'.$new_filename);
                        }
                    }
                }
                // Eksekusi
                $query1 = "INSERT INTO pelaporan(
                    ID_Pelaporan, NIK, Tujuan, Keperluan, Keterangan, Status)
                    VALUES ('$unik', '$esc_nik', '$esc_tujuan', '$esc_keperluan', '$esc_keterangan', '$pending')";
                $exec1 = mysqli_query($koneksi, $query1);
                $query2 = "INSERT INTO penduduk(
                    Nama, NIK, No_telepon, Email)
                    VALUES ('$esc_name', '$esc_nik', '$esc_no_telepon', '$esc_email')";
                $exec2 = mysqli_query($koneksi, $query2);
                if ($new_filename != NULL){
                    $query3 = "INSERT INTO lampiran(ID_Pelaporan, lampiran) VALUES ('$unik', '$new_filename')";
                    $exec3 = mysqli_query($koneksi, $query3);
                }
                if($exec1 || $exec2 || $exec3){
                    header("location: aspirasi.php?pesan=Sukses");
                }else{
                    header("location: aspirasi.php?pesan=Gagal");
                }
            }
            break;
        case 'login':   
            $username = $_POST['username']; //menampung data yang dikirim dari input username
            $password = $_POST['password']; //menampung data yang dikirim dari input password
            //  $passwordmd5=md5($password);
            // $data = mysqli_query($koneksi,"SELECT * from customer WHERE email='$email' and password='$password'");
            //untuk mencari data yang sesuai di database yang sesuai dengan inputan
            $data=$koneksi->query("SELECT * from msadmin WHERE username='$username' and password='$password'");
            
            $cek_login = mysqli_num_rows($data);
            //menghitung jumlah data yang didapat
            
            if($cek_login > 0){ //jika data yang ditemukan lebih dari 0
                $row = mysqli_fetch_assoc($data);
                $_SESSION['username'] = $row['username'];
                //  $_SESSION['nama'] = $row->nama;
                $_SESSION['status'] = "login";
                $_SESSION['id']= $row['id'];
                header("location:admin/index.php"); //berpindah ke halaman beranda
            }
            
            else
            {
            header("location:admin/login.php?pesan=gagal");
            //  alert("Gagal simpan Data");
            }
            break;
        case 'logout':
            unset($_SESSION['status']);
            session_unset();
            session_destroy();
            // $_SESSION['status'] = "berhasil logout";
            header("location:admin/login.php");
            break;
        default:
        echo 'Error';
        

    }
?>