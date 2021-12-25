<?php
    include_once "koneksi.php";
    if($_GET['fungsi'] == "keperluan"){
        // Keperluan
        if (!empty($_POST["id_keperluan"])) {
            $id = $_POST["id_keperluan"]; 
            $query="SELECT * FROM keperluan WHERE id=$id";
            $results = mysqli_query($koneksi, $query);

            foreach ($results as $keperluan) {
        ?>
                    <option value="<?php echo $keperluan["topik_id"];?>"><?php echo $keperluan["keperluan"];?></option>       
        <?php
            }
        }
    }else if($_GET['fungsi'] == "kecamatan"){
        // Kecamatan
        if (!empty($_POST["id_kota"])) {
            $id = $_POST["id_kota"]; 
            $query="SELECT * FROM kecamatan WHERE id_kabkota=$id";
            $results = mysqli_query($koneksi, $query);

            foreach ($results as $keperluan) {
        ?>
                    <option value="<?php echo $keperluan["id_kecamatan"];?>"><?php echo $keperluan["nama_kecamatan"];?></option>       
        <?php
            }
        }
    }else if($_GET['fungsi'] == "desa"){
        // Desa
        if (!empty($_POST["id_kecamatan"])) {
            $id = $_POST["id_kecamatan"]; 
            $query="SELECT * FROM keldesa WHERE id_kecamatan=$id";
            $results = mysqli_query($koneksi, $query);

            foreach ($results as $hasil) {
        ?>
                    <option value="<?php echo $hasil["id_keldesa"];?>"><?php echo $hasil["nama_keldesa"];?></option>       
        <?php
            }
        }
    }
?>  