<?php
    include_once "koneksi.php";
    if (!empty($_POST["id"])) {
        $id = $_POST["id"]; 
        $query="SELECT * FROM keperluan WHERE id=$id";
        $results = mysqli_query($koneksi, $query);

        foreach ($results as $keperluan) {
?>
            <option value="<?php echo $keperluan["topik_id"];?>"><?php echo $keperluan["keperluan"];?></option>       
<?php
        }
    }
?>  