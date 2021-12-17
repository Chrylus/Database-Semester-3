<?php 
    session_start();
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

                $nama = $data['Nama'];
                $esc_name = mysqli_real_escape_string($koneksi, $nama);
                $no_telepon = $data['No_telepon'];
                $esc_no_telepon = mysqli_real_escape_string($koneksi, $no_telepon);
                $email = $data['Email'];
                $esc_email = mysqli_real_escape_string($koneksi, $email);

                $pending = 'Pending';
                // Eksekusi
                $query = "INSERT INTO pelaporan(
                    ID_Pelaporan, NIK, Tujuan, Keperluan, Keterangan, TanggalKejadian, Status)
                    VALUES ('$unik', '$esc_nik', '$esc_tujuan', '$esc_keperluan', '$esc_keterangan', '$esc_tanggal_kejadian', '$pending')";
                $exec1 = mysqli_query($koneksi, $query);
                $query2 = "INSERT INTO penduduk(
                    Nama, NIK, No_telepon, Email)
                    VALUES ('$esc_name', '$esc_nik', '$esc_no_telepon', '$esc_email')";
                $exec2 = mysqli_query($koneksi, $query2);
            }
            break;
        case 'tambah_aspirasi':
            if(isset($data['submit'])){
                // Ambil input dari depan
                $nama = $data['Nama'];
                // Escape 
                $esc_name = mysqli_real_escape_string($koneksi, $nama);
                // Default
                $unik = uniqid('ASPIRASI');
                // Eksekusi 
                
            }
            break;
        case 'login':   
            $username = $_POST['username']; //menampung data yang dikirim dari input username
            $password = $_POST['password']; //menampung data yang dikirim dari input password
            //  $passwordmd5=md5($password);
            // $data = mysqli_query($koneksi,"SELECT * from customer WHERE email='$email' and password='$password'");
            //untuk mencari data yang sesuai di database yang sesuai dengan inputan
            $data=$koneksi->query("SELECT * from msadmin WHERE username='$username' and password='$password'");
            
            $row=mysqli_fetch_object($data);
            //untuk menjadikan data yang didapat menjadi objek
            
            $cek_login = mysqli_num_rows($data);
            //menghitung jumlah data yang didapat
            

            if($cek_login > 0) //jika data yang ditemukan lebih dari 0
            {
            $_SESSION['username'] = $username;
            //  $_SESSION['nama'] = $row->nama;
            $_SESSION['status'] = "login";
            $_SESSION['id']= $row->id;
            header("location:admin/index.html"); //berpindah ke halaman beranda
            }
            
            else
            {
            header("location:login.php?pesan=gagal");
            //  alert("Gagal simpan Data");
            }
            

        default:
        echo 'Error';
        

    }
?>