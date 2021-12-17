<?php 
    include 'koneksi.php';

    $data = $_REQUEST;

    switch($data['aksi']){
        case 'tambah':
            if(isset($data['submit'])){
                // Ambil input dari depan
                $nama = $data['Nama'];
                // Escape 
                $esc_name = mysqli_real_escape_string($koneksi, $nama);
                // Eksekusi 
                $query = $koneksi->prepare("INSERT INTO pelaporan VALUES (?)");
                $query->bind_param('s', $esc_name);
            }
            break;
        default:
        echo 'Error';
    }
?>