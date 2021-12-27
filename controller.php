<?php 
    session_start();
    session_regenerate_id(true);
    include 'koneksi.php';

    $data = $_REQUEST;
 
    switch($data['aksi']){
        case 'tambah_pengaduan':
            if(isset($data['submit'])){
                // Default
                $unik = uniqid('PGD');
                
                // Ambil input dari depan
                $nik = $data['NIK'];
                $esc_nik = mysqli_real_escape_string($koneksi, $nik);
                $tujuan = $data['unit'];
                $esc_tujuan = mysqli_real_escape_string($koneksi, $tujuan);
                $keperluan = $data['keperluan'];
                $esc_keperluan = mysqli_real_escape_string($koneksi, $keperluan);
                $keterangan = $data['Keterangan'];
                $esc_keterangan = mysqli_real_escape_string($koneksi, $keterangan);
                $tanggal_kejadian = $data['TanggalKejadian'];
                $esc_tanggal_kejadian = mysqli_real_escape_string($koneksi, $tanggal_kejadian);

                // Input daerah
                $kota = $data['kota'];
                $esc_kota = mysqli_real_escape_string($koneksi, $kota);
                $kecamatan = $data['kecamatan'];
                $esc_kecamatan = mysqli_real_escape_string($koneksi, $kecamatan);
                $keldesa = $data['keldesa'];
                $esc_keldesa = mysqli_real_escape_string($koneksi, $keldesa);

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
                            move_uploaded_file($file_tmp,'admin/berkas/'.$new_filename);
                        }
                    }
                }

                // Eksekusi Insert Pelaporan
                $query1 = "INSERT INTO pelaporan (ID_Pelaporan, NIK, Tujuan, Keperluan, Keterangan, TanggalKejadian)
                    VALUES ('$unik', '$esc_nik', '$esc_tujuan', '$keperluan', '$esc_keterangan', '$esc_tanggal_kejadian')";
                $exec1 = mysqli_query($koneksi, $query1);
                
                // Eksekusi Insert Daerah
                $query4 = "INSERT INTO header_pelaporan (ID_Pelaporan, KabKota, Kecamatan, KelDesa)
                VALUES ('$unik', '$esc_kota', '$esc_kecamatan', '$esc_keldesa')";
                $exec4 = mysqli_query($koneksi, $query4);

                // Eksekusi Ticket
                $ticket = mysqli_query($koneksi, "SELECT Ticket FROM pelaporan ORDER BY ID DESC LIMIT 1");
                $result = mysqli_fetch_array($ticket);
                $x = $result ['Ticket'];

                if ($new_filename != NULL){
                    $query3 = "INSERT INTO lampiran(ID_Pelaporan, lampiran) VALUES ('$unik', '$new_filename')";
                    $exec3 = mysqli_query($koneksi, $query3);
                }
                if($exec1){
                    header("location: index.php?Ticket=$x");
                }else{
                    header("location: index.php?pesan=$topik_id");
                }
            }
            break;
        case 'tambah_aspirasi':
            if(isset($data['submit'])){
                // Default
                $unik = uniqid('ASP');

                // Ambil input dari depan
                $nik = $data['NIK'];
                $esc_nik = mysqli_real_escape_string($koneksi, $nik);
                $tujuan = $data['unit'];
                $esc_tujuan = mysqli_real_escape_string($koneksi, $tujuan);
                $keperluan = $data['keperluan'];
                $esc_keperluan = mysqli_real_escape_string($koneksi, $keperluan);
                $keterangan = $data['Keterangan'];
                $esc_keterangan = mysqli_real_escape_string($koneksi, $keterangan);

                // Input daerah
                $kota = $data['kota'];
                $esc_kota = mysqli_real_escape_string($koneksi, $kota);
                $kecamatan = $data['kecamatan'];
                $esc_kecamatan = mysqli_real_escape_string($koneksi, $kecamatan);
                $keldesa = $data['keldesa'];
                $esc_keldesa = mysqli_real_escape_string($koneksi, $keldesa);

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
                            move_uploaded_file($file_tmp,'admin/berkas/'.$new_filename);
                        }
                    }
                }

                // Eksekusi Insert Aspirasi
                $query1 = "INSERT INTO pelaporan (ID_Pelaporan, NIK, Tujuan, Keperluan, Keterangan)
                    VALUES ('$unik', '$esc_nik', '$esc_tujuan', '$esc_keperluan', '$esc_keterangan')";
                $exec1 = mysqli_query($koneksi, $query1);

                // Eksekusi Insert Daerah
                $query4 = "INSERT INTO header_pelaporan (ID_Pelaporan, KabKota, Kecamatan, KelDesa)
                VALUES ('$unik', '$esc_kota', '$esc_kecamatan', '$esc_keldesa')";
                $exec4 = mysqli_query($koneksi, $query4);

                // Eksekusi Ticket
                $ticket = mysqli_query($koneksi, "SELECT Ticket FROM pelaporan ORDER BY ID DESC LIMIT 1");
                $result = mysqli_fetch_array($ticket);
                $x = $result ['Ticket'];

                if ($new_filename != NULL){
                    $query3 = "INSERT INTO lampiran(ID_Pelaporan, lampiran) VALUES ('$unik', '$new_filename')";
                    $exec3 = mysqli_query($koneksi, $query3);
                }
                if($exec1){
                    header("location: aspirasi.php?Ticket=$x");
                }else{
                    header("location: aspirasi.php?pesan=Gagal");
                }
            }
            break;
        case 'cek_tiket':
            if(isset($data['submit'])){
                // Search
                $query = $data['query']; 
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
                                echo "<p><h3>".$results['ticket']."</h3>".$results['status_ticket']."</p>";
                                // posts results gotten from database(title and text) you can also show id ($results['id'])
                                $x = 'Status : ' . $results['Status'];
                        }
                    }
                    else{ // if there is no matching rows do following
                        echo "No results";
                        $x = 'No Results';
                    }
                } else{ // if query length is less than minimum
                    echo "Minimum length is ".$min_length;
                    $x = $query;
                }
                header("location:Check_Ticket.php?Ticket=$x");
            }
            break;
        case 'login':
            if(isset($data['submit'])){
                $username = $_POST['username']; //menampung data yang dikirim dari input username
                $password = $_POST['password']; //menampung data yang dikirim dari input password
                $esc_username = mysqli_real_escape_string($koneksi, $username);
                $esc_password = mysqli_real_escape_string($koneksi, $password);
                $data=$koneksi->query("SELECT * FROM msadmin WHERE username='$esc_username'");
                
                $cek_login = mysqli_num_rows($data);
                //menghitung jumlah data yang didapat
                
                if($cek_login > 0){ //jika data yang ditemukan lebih dari 0
                    $row = mysqli_fetch_assoc($data);
                    $password = $row['password'];
                    $verify = password_verify($esc_password, $password);
                    if($verify){
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['nama'] = $row['name'];
                        $_SESSION['status'] = "login_admin";
                        $_SESSION['id']= $row['id'];
                        header("location:admin/index.php"); //berpindah ke halaman beranda
                    }else{
                        header("location:admin/login.php?pesan=password salah");
                    }
                }
                else{
                header("location:admin/login.php?pesan=gagal");
                //  alert("Gagal simpan Data");
                }
            }   
            break;
        case 'login_masyarakat':
                if(isset($data['submit'])){
                    $email = $data['email']; //menampung data yang dikirim dari input username
                    $esc_email = mysqli_real_escape_string($koneksi, $email);
                    $password = $data['password']; //menampung data yang dikirim dari input password
                    $esc_password = mysqli_real_escape_string($koneksi, $password);
                    //  $passwordmd5=md5($password);
                    // $data = mysqli_query($koneksi,"SELECT * from customer WHERE email='$email' and password='$password'");
                    //untuk mencari data yang sesuai di database yang sesuai dengan inputan
                    $data=$koneksi->query("SELECT * FROM penduduk WHERE Email='$esc_email'");
                    
                    $cek_login = mysqli_num_rows($data);
                    //menghitung jumlah data yang didapat
                    
                    if($cek_login > 0){ //jika data yang ditemukan lebih dari 0
                        $row = mysqli_fetch_assoc($data);
                        $password = $row['password'];
                        $verify = password_verify($esc_password, $password);
                        if($verify){
                            $_SESSION['nama'] = $row['Nama'];
                            $_SESSION['nik'] = $row['NIK'];
                            $_SESSION['telepon'] = $row['No_telepon'];
                            $_SESSION['email'] = $row['Email'];
                            $_SESSION['keadaan'] = "login";
                            header("location:index.php?=sukses");
                        }else{
                            header("location:index.php?pesan=password salah");
                        }
                         //berpindah ke halaman beranda
                    }
                    else
                    {
                    header("location:index.php?pesan=gagal");
                    //  alert("Gagal simpan Data");
                    }
                }   
                break;
        case 'daftar_masyarakat':
            // Ambil inputan dan escape dari kode sql
            $Nama=$_POST['Nama'];
            $esc_nama = mysqli_real_escape_string($koneksi, $Nama);
            $NIK=$_POST['NIK'];
            $esc_nik = mysqli_real_escape_string($koneksi, $NIK);
            $No_telepon=$_POST['No_telepon'];
            $esc_telepon = mysqli_real_escape_string($koneksi, $No_telepon);
            $Email=$_POST['Email'];
            $esc_email = mysqli_real_escape_string($koneksi, $Email);
            $Password=$_POST['Password'];
            $esc_password = mysqli_real_escape_string($koneksi, $Password);
            // Hash password
            $hash_pw = password_hash($esc_password, PASSWORD_DEFAULT); 
            $sql= "INSERT INTO `penduduk`(`Nama`, `NIK`, `No_telepon`, `Email`, `password`) VALUES ('$esc_nama','$esc_nik','$esc_telepon','$esc_email','$hash_pw')";
            $hasil=mysqli_query($koneksi,$sql);
            if($hasil){
                header("location: daftar.php?peringatan=Sukses");
            }else{
                header("location: daftar.php?peringatan=Gagal");
            }
            break;
        case 'logout':
            unset($_SESSION['status']);
            session_unset();
            session_destroy();
            // $_SESSION['status'] = "berhasil logout";
            header("location:admin/login.php");
            break;
        case 'logout_user':
            unset($_SESSION['keadaan']);
            session_unset();
            session_destroy();
            // $_SESSION['status'] = "berhasil logout";
            header("location:index.php");
            break;
        case 'tambah_admin':
            $nama = $_POST['name'];
            $nik = $_POST['nik'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            // Escape
            $esc_nama = mysqli_real_escape_string($koneksi, $nama);
            $esc_nik = mysqli_real_escape_string($koneksi, $nik);
            $esc_username = mysqli_real_escape_string($koneksi, $username);
            $esc_password = mysqli_real_escape_string($koneksi, $password);
            // Hash PW
            $hash_pw = password_hash($esc_password, PASSWORD_DEFAULT);
            $query = "INSERT INTO msadmin (name, NIK, username, password) VALUES ('$esc_nama', '$esc_nik', '$esc_username', '$hash_pw')";
            $exec = mysqli_query($koneksi, $query);
            if($exec){
                header("location: admin/super/admin.php?alert=sukses");
            }else{
                header("location: admin/super/admin.php?alert=gagal");
            }
            break;
        case 'edit_admin':
            $nama = $_POST['name'];
            $nik = $_POST['nik'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            // Escape
            $esc_id = mysqli_real_escape_string($koneksi, $id);
            $esc_nama = mysqli_real_escape_string($koneksi, $nama);
            $esc_nik = mysqli_real_escape_string($koneksi, $nik);
            $esc_username = mysqli_real_escape_string($koneksi, $username);
            $esc_password = mysqli_real_escape_string($koneksi, $password);
            // Hash PW
            $hash_pw = password_hash($esc_password, PASSWORD_DEFAULT);
            //$query = "UPDATE msadmin SET (name, username, password) VALUES ('$esc_nama', '$esc_username', '$hash_pw') WHERE id = '$_GET[id]'";
            $query = "UPDATE msadmin SET name = '$esc_nama', NIK = '$esc_nik, username = '$esc_username', password = '$hash_pw' WHERE id = '$_GET[id]'";

            $exec = mysqli_query($koneksi, $query);
            if($exec){
                header("location: admin/super/admin.php?alert=sukses");
            }else{
                header("location: admin/super/admin.php?alert=gagal");
            }
            break;
        case 'hapus_admin':
            $esc_id = mysqli_real_escape_string($koneksi, $id);
            $query = "DELETE FROM msadmin WHERE id = '$_GET[id]'";
            $exec = mysqli_query($koneksi, $query);
            if($exec){
                header("location: admin/super/admin.php?alert=sukses");
            }else{
                header("location: admin/super/admin.php?alert=gagal");
            }
            break;
        case 'edit_aspirasi':
                $Status = $_POST['Status'];
                // Escape

                //$query = "UPDATE msadmin SET (name, username, password) VALUES ('$esc_nama', '$esc_username', '$hash_pw') WHERE id = '$_GET[id]'";
                $query = "UPDATE pelaporan SET Status = '$Status' WHERE ID = '$_GET[ID]'";
    
                $exec = mysqli_query($koneksi, $query);
                if($exec){
                    header("location: admin/aspirasi/index.php?alert=sukses");
                }else{
                    header("location: admin/aspirasi/index.php?alert=gagal");
                }
                break;
        case 'edit_pengaduan':
                    $Status = $_POST['Status'];
                    // Escape
    
                    //$query = "UPDATE msadmin SET (name, username, password) VALUES ('$esc_nama', '$esc_username', '$hash_pw') WHERE id = '$_GET[id]'";
                    $query = "UPDATE pelaporan SET Status = '$Status' WHERE ID = '$_GET[ID]'";
        
                    $exec = mysqli_query($koneksi, $query);
                    if($exec){
                        header("location: admin/pengaduan/index.php?alert=sukses");
                    }else{
                        header("location: admin/pengaduan/index.php?alert=gagal");
                    }
                    break;
        default:
        echo 'Error';
    }
    
?>