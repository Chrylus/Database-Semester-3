<?php 
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
        default:
        echo 'Error';
    }
?>