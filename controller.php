<?php 
    include 'koneksi.php';

    $data = $_REQUEST;

    switch($data['aksi']){
        case 'tambah_pengaduan':
            if(isset($data['submit'])){
                // Ambil input dari depan
                $nama = $data['Nama'];
                // Escape 
                $esc_name = mysqli_real_escape_string($koneksi, $nama);
                // Default
                $unik = uniqid('PENGADUAN');
                $pending = 'Pending';
                // Eksekusi
                $query = "INSERT INTO pelaporan(
                    ID_Pelaporan, NIK, Tujuan, Keperluan, Keterangan, TanggalKejadian, Status)
                    VALUES ('$unik', )";
                $data = mysqli_query($koneksi, $query);
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