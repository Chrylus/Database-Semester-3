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
    $password = $_POST['password']; //menampung data yang dikirim dari input password
    $esc_email = mysqli_real_escape_string($koneksi, $email);
    $esc_password = mysqli_real_escape_string($koneksi, $password);
    $data=$koneksi->query("SELECT * FROM penduduk WHERE Email='$esc_email'");
            
    $cek_login = mysqli_num_rows($data);
            
    if($cek_login > 0){ //jika data yang ditemukan lebih dari 0
        $row = mysqli_fetch_assoc($data);
        $password = $row['password'];
        $verify = password_verify($esc_password, $password);
        if($verify){
            session_start();
            session_regenerate_id(true);
            $_SESSION['nama'] = $row['Nama'];
            $_SESSION['nik'] = $row['NIK'];
            $_SESSION['telepon'] = $row['No_telepon'];
            $_SESSION['email'] = $row['Email'];
            $_SESSION['status'] = "login";
            $response = array(
                'nama' => $row['Nama'],
                'nik' => $row['NIK'],
                'telepon' => $row['No_telepon'],
                'email' => $row['Email'],
                'status' => $_SESSION['status']
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        }else{
            $response = array(
                'status' => 'password salah'
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        }
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
    $password = $_POST['password'];
    // Escape
    $esc_nama = mysqli_real_escape_string($koneksi, $nama);
    $esc_nik = mysqli_real_escape_string($koneksi, $nik);
    $esc_telepon = mysqli_real_escape_string($koneksi, $telepon);
    $esc_email = mysqli_real_escape_string($koneksi, $email);
    $esc_password = mysqli_real_escape_string($koneksi, $password);
    // Hash
    $hash_pw = password_hash($esc_password, PASSWORD_DEFAULT);
    // Execute
    $data=$koneksi->query("INSERT INTO penduduk(Nama, NIK, No_telepon, Email, password) 
    VALUES ('$esc_nama', '$esc_nik', '$esc_telepon', '$esc_email', '$hash_pw')");
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

function lihat_keperluan(){
    global $koneksi;
    $query = "SELECT * FROM unit_layanan WHERE id = '$_GET[id]'";
    $exec1 = mysqli_query($koneksi, $query);
    while($fetch = mysqli_fetch_array($exec1)){
        $response = array(
            'nama_unit' => $fetch['nama_unit']
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

function cek_tiket(){

    global $koneksi;
    // Search
    $query = $_POST['query']; 
    // gets value sent over search form
    $min_length = 3;
    // you can set minimum length of the query if you want
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to >
        
        $query = mysqli_real_escape_string($koneksi, $query);
        // makes sure nobody uses SQL injection
        
        $raw_results = mysqli_query($koneksi, "SELECT * FROM pelaporan
            WHERE (`Ticket` LIKE '%".$query."%') OR (`Ticket` LIKE '%".$query."%')");
            
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                $response = array(
                    'status' => $results['Status']
                );
                header('Content-Type: application/json');
                echo json_encode($response);
            }
        }
        else{ // if there is no matching rows do following
            $response = array(
                'status' => 'gagal'
            );
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }else{ // if query length is less than minimum
        $response = array(
            'status' => 'panjang minimum tidak terpenuhi'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} 
?>