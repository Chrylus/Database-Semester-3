<?php 

require 'koneksi.php';

if(!empty($_GET['function']) && function_exists($_GET['function'])){
    if (empty($_GET['key'])) {
        echo '<p>Key is required</p>';
      	$response = array(
            'status' => 403,
            'message' => 'Forbidden'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        if (base64_encode($_GET['key']) == 'YnV3aW5ha2VyZW4=') {
            $_GET['function']();
        } else {
          	$response = array(
                'status' => 401,
                'message' => 'Unauthorized access'
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }
} else {
        $response = array(
        'status' => 404,
        'message' => 'Not Found'
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}


function login(){
    global $koneksi;
    $email = $_POST['email']; //menampung data yang dikirim dari input username
    $nik = $_POST['nik']; //menampung data yang dikirim dari input password
    $esc_email = mysqli_real_escape_string($koneksi, $email);
    $esc_nik = mysqli_real_escape_string($koneksi, $nik);
    $data=$koneksi->query("SELECT * FROM penduduk WHERE Email='$esc_email' and NIK='$esc_nik'");
            
    $cek_login = mysqli_num_rows($data);
            
    if($cek_login > 0){ //jika data yang ditemukan lebih dari 0
        $row = mysqli_fetch_assoc($data);
        session_start();
        session_regenerate_id(true);
        $_SESSION['nama'] = $row['Nama'];
        $_SESSION['nik'] = $row['NIK'];
        $_SESSION['telepon'] = $row['No_telepon'];
        $_SESSION['email'] = $row['Email'];
        $response = array(
            'nama' => $row['Nama'],
            'nik' => $row['NIK'],
            'telepon' => $row['No_telepon'],
            'email' => $row['Email']
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }else{
        $response = array(
            'status' => 'gagal'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

function register(){
    global $koneksi;
    // Ambil inputan
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];  
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];
    // Escape
    $esc_nama = mysqli_real_escape_string($koneksi, $nama);
    $esc_nik = mysqli_real_escape_string($koneksi, $nik);
    $esc_telepon = mysqli_real_escape_string($koneksi, $telepon);
    $esc_email = mysqli_real_escape_string($koneksi, $email);
    // Execute
    $data=$koneksi->query("INSERT INTO penduduk(Nama, NIK, No_telepon, Email) 
    VALUES ('$esc_nama', '$esc_nik', '$esc_telepon', '$esc_email')");
    if($data){
        $response = array(
            'status' => 'success'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }else{
        $response = array(
            'status' => 'gagal'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

function logout() {
    $logout = $_POST['logout'];
    if($logout == "logout"){
        session_unset();
        session_destroy();
        $response = array(
            'status' => 'success'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

function tambah_pengaduan(){
    global $koneksi;
    // Default
    $unik = uniqid('PENGADUAN');
    // Ambil input dari depan
    $nik = $_POST['NIK'];
    $esc_nik = mysqli_real_escape_string($koneksi, $nik);
    $tujuan = $_POST['Tujuan'];
    $esc_tujuan = mysqli_real_escape_string($koneksi, $tujuan);
    $keperluan = $_POST['Keperluan'];
    $esc_keperluan = mysqli_real_escape_string($koneksi, $keperluan);
    $keterangan = $_POST['Keterangan'];
    $esc_keterangan = mysqli_real_escape_string($koneksi, $keterangan);
    $tanggal_kejadian = $_POST['TanggalKejadian'];
    $esc_tanggal_kejadian = mysqli_real_escape_string($koneksi, $tanggal_kejadian);
    // Default
    $pending = 'Pending';
    $tanggal = date("Y-m-d");
    // Eksekusi
    $query1 = "INSERT INTO `pelaporan` (`ID_Pelaporan`, `NIK`, `Tujuan`, `Keperluan`, `Keterangan`, `TanggalLaporan`, `TanggalKejadian`, `Status`) VALUES ('$unik', '$esc_nik', '$esc_tujuan', '$esc_keperluan', '$esc_keterangan', '$tanggal', '$esc_tanggal_kejadian', '$pending')";
    $exec1 = mysqli_query($koneksi, $query1);
    
    if($exec1){
        $response = array(
            'status' => 'success'
        );
        
    }else{
        $response = array(
            'status' => 'gagal'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

?>