<?php
require('admin/fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();

include ('koneksi.php');
$id = $_GET['id'];

$sql1    = "select Nama as Nama from penduduk 
                INNER JOIN pelaporan ON pelaporan.NIK = penduduk.NIK 
                    WHERE Ticket = '$id'";
$result1 = mysqli_query($koneksi, $sql1);
$data1   = mysqli_fetch_assoc($result1);
$nama = $data1['Nama'];

$sql2    = "select penduduk.NIK as NIK from penduduk 
                INNER JOIN pelaporan ON pelaporan.NIK = penduduk.NIK 
                    WHERE Ticket = '$id'";
$result2 = mysqli_query($koneksi, $sql2);
$data2   = mysqli_fetch_assoc($result2);
$nik = $data2['NIK'];

$sql3    = "select No_telepon as No_Telepon from penduduk 
                INNER JOIN pelaporan ON pelaporan.NIK = penduduk.NIK 
                    WHERE Ticket = '$id'";
$result3 = mysqli_query($koneksi, $sql3);
$data3   = mysqli_fetch_assoc($result3);
$no_telepon = $data3['No_Telepon'];

$sql4    = "select Email as Email from penduduk 
                INNER JOIN pelaporan ON pelaporan.NIK = penduduk.NIK 
                    WHERE Ticket = '$id'";
$result4 = mysqli_query($koneksi, $sql4);
$data4   = mysqli_fetch_assoc($result4);
$email = $data4['Email'];

$sql5    = "select Ticket as Ticket from pelaporan 
                INNER JOIN penduduk ON pelaporan.NIK = penduduk.NIK 
                    WHERE Ticket = '$id'";
$result5 = mysqli_query($koneksi, $sql5);
$data5   = mysqli_fetch_assoc($result5);
$ticket = $data5['Ticket'];

$sql6    = "select nama_unit as Tujuan from unit_layanan 
                INNER JOIN pelaporan ON pelaporan.Tujuan = unit_layanan.id
                INNER JOIN penduduk ON pelaporan.NIK = penduduk.NIK 
                    WHERE Ticket = '$id'";
$result6 = mysqli_query($koneksi, $sql6);
$data6   = mysqli_fetch_assoc($result6);
$tujuan = $data6['Tujuan'];

$sql7    = "select keperluan.keperluan as Keperluan from keperluan
                INNER JOIN pelaporan ON pelaporan.Tujuan = keperluan.topik_id
                INNER JOIN penduduk ON pelaporan.NIK = penduduk.NIK 
                    WHERE Ticket = '$id'";
$result7 = mysqli_query($koneksi, $sql7);
$data7   = mysqli_fetch_assoc($result7);
$keperluan = $data7['Keperluan'];

$sql8    = "select Keterangan as Keterangan from pelaporan 
                INNER JOIN penduduk ON pelaporan.NIK = penduduk.NIK 
                    WHERE Ticket = '$id'";
$result8 = mysqli_query($koneksi, $sql8);
$data8   = mysqli_fetch_assoc($result8);
$keterangan = $data8['Keterangan'];

$sql9    = "select TanggalKejadian as TanggalKejadian from pelaporan 
                INNER JOIN penduduk ON pelaporan.NIK = penduduk.NIK 
                    WHERE Ticket = '$id'";
$result9 = mysqli_query($koneksi, $sql9);
$data9   = mysqli_fetch_assoc($result9);
$tanggalkejadian = $data9['TanggalKejadian'];

$sql10    = "select nama_kabkota as KabKota from kabkota
                INNER JOIN header_pelaporan ON header_pelaporan.KabKota = kabkota.id_kabkota
                INNER JOIN pelaporan ON header_pelaporan.ID_Pelaporan = pelaporan.ID_Pelaporan
                INNER JOIN penduduk ON pelaporan.NIK = penduduk.NIK 
                    WHERE Ticket = '$id'";
$result10 = mysqli_query($koneksi, $sql10);
$data10   = mysqli_fetch_assoc($result10);
$kabkota = $data10['KabKota'];

$sql10    = "select nama_kecamatan as Kecamatan from kecamatan
                INNER JOIN kabkota ON kecamatan.id_kabkota = kabkota.id_kabkota
                INNER JOIN header_pelaporan ON header_pelaporan.KabKota = kabkota.id_kabkota
                INNER JOIN pelaporan ON header_pelaporan.ID_Pelaporan = pelaporan.ID_Pelaporan
                INNER JOIN penduduk ON pelaporan.NIK = penduduk.NIK 
                    WHERE Ticket = '$id'";
$result10 = mysqli_query($koneksi, $sql10);
$data10   = mysqli_fetch_assoc($result10);
$kecamatan = $data10['Kecamatan'];

$sql11    = "select nama_keldesa as KelDesa from keldesa
                INNER JOIN kecamatan ON keldesa.id_kecamatan = kecamatan.id_kecamatan
                INNER JOIN kabkota ON kecamatan.id_kabkota = kabkota.id_kabkota
                INNER JOIN header_pelaporan ON header_pelaporan.KabKota = kabkota.id_kabkota
                INNER JOIN pelaporan ON header_pelaporan.ID_Pelaporan = pelaporan.ID_Pelaporan
                INNER JOIN penduduk ON pelaporan.NIK = penduduk.NIK 
                    WHERE Ticket = '$id'";
$result11 = mysqli_query($koneksi, $sql11);
$data11   = mysqli_fetch_assoc($result11);
$keldesa = $data11['KelDesa'];

$date = date("Y-m-d");

$month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$tanggal_hari = (int)date('d', strtotime($date));
$bulan_hari = $month[((int)date('m', strtotime($date))) - 1];
$tahun_hari = (int)date('Y', strtotime($date));

$pdf->Image('images/logo-wadul-hitam.png',7,6,50);
$pdf->SetFont('Arial','B',10);
$pdf->Cell( 0, 10, $tanggal_hari.' '.$bulan_hari.' '.$tahun_hari , 0, 0, 'R');
$pdf->Ln(20);
// Arial bold 15
$pdf->SetFont('Arial','B',15);
// Title
$pdf->Cell( 0, 10, 'Data Pengaduan' , 0, 0, 'L');
$pdf->Ln();
$pdf->Ln(15);
$pdf->SetFont('Arial','B',14);
$pdf->Cell( 0, 10, 'Identitas', 0, 0, 'L');
$pdf->Ln();
$pdf->SetFont('Arial','I',12);
$pdf->Cell( 0, 10, 'Nama : '. $nama, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell( 0, 10, 'NIK : '. $nik, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell( 0, 10, 'Nomor Telepon : '. $no_telepon, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell( 0, 10, 'Email : '. $email, 0, 0, 'L');
$pdf->Ln(15);
$pdf->SetFont('Arial','B',14);
$pdf->Cell( 0, 10, 'Informasi Pengaduan', 0, 0, 'L');
$pdf->Ln();
$pdf->SetFont('Arial','BI',12);
$pdf->Cell( 0, 10, 'Ticket : '. $ticket, 0, 0, 'L');
$pdf->Ln();
$pdf->SetFont('Arial','I',12);
$pdf->Cell( 0, 10, 'Tujuan : '. $tujuan, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell( 0, 10, 'Keperluan : '. $keperluan, 0, 0, 'L');
$pdf->Ln(15);
$pdf->SetFont('Arial','B',14);
$pdf->Cell( 0, 10, 'Tempat dan Tanggal Kejadian', 0, 0, 'L');
$pdf->Ln();
$pdf->SetFont('Arial','I',12);
$pdf->Cell( 0, 10, 'Tanggal Kejadian : '. $tanggalkejadian, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell( 0, 10, 'Kabupaten / Kota : '. $kabkota, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell( 0, 10, 'Kecamatan : '. $kecamatan, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell( 0, 10, 'Kelurahan / Desa : '. $keldesa, 0, 0, 'L');
$pdf->Ln(15);
$pdf->Cell( 0, 10, 'Keterangan : '. $keterangan, 0, 0, 'L');
$pdf->SetFont('Arial','I',12);
$pdf->Ln();

$pdf->SetFont('Arial','I',9);
$pdf->Cell( 0, 10, 'Data ini dicetak sebagaimana kondisi terakhir yang terekam oleh sistem, dan dinyatakan sah tanpa tanda tangan administrator.', 0, 0, 'L');
$pdf->Ln();
$filename='LAPORAN_BULAN_'.$bulan_hari.'.pdf';
$pdf->Output('F', 'berkas/' . $filename, true);
$pdf->Output();
?>