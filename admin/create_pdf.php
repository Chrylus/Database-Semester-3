<?php
require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();

include ('../koneksi.php');
//Tampilan Tiket di Dashboard Atas
$sql1    = "select count(Status) as Pending_Pelaporan from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%PGD%') AND MONTH (TanggalLaporan) = MONTH (CURDATE()) AND YEAR (TanggalLaporan) = YEAR (CURDATE())";

$result1 = mysqli_query($koneksi, $sql1);
$data1   = mysqli_fetch_assoc($result1);
$pending_pel = $data1['Pending_Pelaporan'];

$sql2    = "select count(Status) as Pending_Aspirasi from pelaporan WHERE (Status = 'Pending') AND (ID_Pelaporan LIKE '%ASP%') AND MONTH (TanggalLaporan) = MONTH (CURDATE()) AND YEAR (TanggalLaporan) = YEAR (CURDATE()) ";

$result2 = mysqli_query($koneksi, $sql2);
$data2   = mysqli_fetch_assoc($result2);
$pending_asp = $data2['Pending_Aspirasi'];

$sql3    = "select count(ID_Pelaporan) as Total_Ticket from pelaporan";
$result3 = mysqli_query($koneksi, $sql3);
$data3   = mysqli_fetch_assoc($result3);
$total_ticket = $data3['Total_Ticket'];

$sql4    = "select count(NIK) as Total_Penduduk from penduduk";
$result4 = mysqli_query($koneksi, $sql4);
$data4   = mysqli_fetch_assoc($result4);
$total_penduduk = $data4['Total_Penduduk'];

$sql5    = "select count(id_kabkota) as Total_KabKota from kabkota";
$result5 = mysqli_query($koneksi, $sql5);
$data5   = mysqli_fetch_assoc($result5);
$total_kabkota = $data5['Total_KabKota'];

$sql6    = "select count(id_kecamatan) as Total_Kecamatan from kecamatan";
$result6 = mysqli_query($koneksi, $sql6);
$data6   = mysqli_fetch_assoc($result6);
$total_kec = $data6['Total_Kecamatan'];

$sql7    = "select count(id_keldesa) as Total_KelDesa from keldesa";
$result7 = mysqli_query($koneksi, $sql7);
$data7   = mysqli_fetch_assoc($result7);
$total_keldesa = $data7['Total_KelDesa'];

$sql8    = "select count(id) as Total_Admin from msadmin";
$result8 = mysqli_query($koneksi, $sql8);
$data8   = mysqli_fetch_assoc($result8);
$total_admin = $data8['Total_Admin'];
//End of Tampilan Tiket di Dashboard Atas

$date = date("Y-m-d");

$month = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$tanggal_hari = (int)date('d', strtotime($date));
$bulan_hari = $month[((int)date('m', strtotime($date))) - 1];
$tahun_hari = (int)date('Y', strtotime($date));

$pdf->Image('../images/logo-wadul-hitam.png',7,6,50);
$pdf->SetFont('Arial','B',10);
$pdf->Cell( 0, 10, $tanggal_hari.' '.$bulan_hari.' '.$tahun_hari , 0, 0, 'R');
$pdf->Ln(20);
// Arial bold 15
$pdf->SetFont('Arial','B',15);
// Title
$pdf->Cell( 0, 10, 'Laporan Bulanan Wadul' , 0, 0, 'L');
$pdf->SetFont('Arial','I',12);
$pdf->Ln(15);
$pdf->Cell( 0, 10, 'Statistik Data', 0, 0, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Cell( 0, 10, 'Jumlah Pelaporan Pending : '. $pending_pel, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell( 0, 10, 'Jumlah Aspirasi Pending : '. $pending_asp, 0, 0, 'L');
$pdf->Ln(15);
$pdf->SetFont('Arial','I',12);
$pdf->Cell( 0, 10, 'Statistik Pengguna', 0, 0, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Cell( 0, 10, 'Jumlah Pengguna : '. $total_penduduk, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell( 0, 10, 'Jumlah Kabupaten dan Kota : '. $total_kabkota, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell( 0, 10, 'Jumlah Kecamatan : '. $total_kec, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell( 0, 10, 'Jumlah Kelurahan dan Desa : '. $total_keldesa, 0, 0, 'L');
$pdf->Ln();
$pdf->Cell( 0, 10, 'Jumlah Admin : '. $total_admin, 0, 0, 'L');
$pdf->Ln(15);
$pdf->SetFont('Arial','I',9);
$pdf->Cell( 0, 10, 'Data ini dicetak sebagaimana kondisi terakhir yang terekam oleh sistem, dan dinyatakan sah tanpa tanda tangan administrator.', 0, 0, 'L');
$pdf->Ln();
$filename='LAPORAN_BULAN_'.$bulan_hari.'.pdf';
$pdf->Output('F', 'berkas/' . $filename, true);
$pdf->Output();
?>