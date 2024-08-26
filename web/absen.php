<?php
include 'admin/include/koneksi/koneksi.php';

if (!(isset($_GET['absen']))) {
	die();
}

$nim =  $_GET['absen'];

// $arr = explode("-", $nim, 2);
// $nim = $arr[0];
$nim = $nim;


date_default_timezone_set('Asia/Jakarta');

// Array untuk mapping hari dalam Bahasa Indonesia
$hari_indo = array(
	'Sunday' => 'minggu',
	'Monday' => 'senin',
	'Tuesday' => 'selasa',
	'Wednesday' => 'rabu',
	'Thursday' => 'kamis',
	'Friday' => 'jumat',
	'Saturday' => 'sabtu'
);

// Mendapatkan hari ini
$hari_ini = date("l");

// Mengganti hari dalam format Indonesia
$hari_ini_indo = $hari_indo[$hari_ini];

$cekJadwal = baca_database("", "jam", "select * from data_jadwal where hari = '$hari_ini_indo'");
$cekJam = date('H:i');
$id_absensi = id_otomatis("data_absensi", "id_absensi", "10");
$tanggal = date('Y-m-d');
$jam = date('H:i:s');
$id_mahasiswa = baca_database('', 'id_mahasiswa', "select * from data_mahasiswa where id_sidik_jari='$nim'");
$status = "hadir";

$cek = cek_database("", "", "", "select * from data_absensi where tanggal='$tanggal' and id_mahasiswa='$id_mahasiswa'");

if ($cek == "nggak") {


	if ($id_mahasiswa == "") {
	} else {
		if ($cekJam <= $cekJadwal) {
			$query = mysql_query("insert into data_absensi values (
'$id_absensi'
 ,'$tanggal'
 ,'$jam'
 ,'$id_mahasiswa'
 ,'hadir'

)");
		} else {
			$query = mysql_query("insert into data_absensi values (
			'$id_absensi'
			 ,'$tanggal'
			 ,'$jam'
			 ,'$id_mahasiswa'
			 ,'terlambat'
			
			)");
		}
	}
}
// else
// {
// 	echo "SUDAH";
// }

$nimSiswa = baca_database("", "nim", "select * from data_mahasiswa where id_sidik_jari = '$nim'");
$jam = date("H:i:s");
$namaSiswa = baca_database("", "nama", "select * from data_mahasiswa where id_sidik_jari = '$nim'");

header('Content-Type: application/json');
echo json_encode(
	[
		"out_1" => $nim,
		"out_2" => $jam,
		"out_3" => $namaSiswa,
		"out_4" => "0",
		"out_5" => "0",
		"out_6" => "0",
		"out_7" => "0",
		"out_8" => "0",
		"out_9" => "0",
		"out_10" => "0"

	]
);



//BACA DATABASE
function baca_database($tabel, $field, $query)
{

	if ($query == "") {
		$sql = 'SELECT * FROM ' . $tabel;
	} else {
		$sql = $query;
	}

	$querytabelualala = $sql;
	$prosesulala = mysql_query($querytabelualala);
	$datahasilpemrosesanquery = mysql_fetch_array($prosesulala);
	$hasiltermantab = $datahasilpemrosesanquery[$field];
	return $hasiltermantab;
}

//CEK DATABASE
function cek_database($tabel, $field, $value, $query)
{
	if ($query == "") {
		$sql = "SELECT * FROM " . $tabel . " WHERE " . $field . " ='" . $value . "'";
	} else {
		$sql = $query;
	}

	$cek_user = mysql_num_rows(mysql_query($sql));
	if ($cek_user > 0) {
		$hasiltermantab = "ada";
	} else {
		$hasiltermantab = "nggak";
	}
	return $hasiltermantab;
}

//KODE OTOMATIS	 	
function id_otomatis($nama_tabel, $id_nama_tabel, $panjang_id)
{
	$cek = mysql_query("SELECT * FROM $nama_tabel");
	$rowcek = mysql_num_rows($cek);


	$kodedepan = strtoupper($nama_tabel);
	$kodedepan = str_replace("DATA_", "", $kodedepan);
	$kodedepan = str_replace("DATA", "", $kodedepan);
	$kodedepan = str_replace("TABEL_", "", $kodedepan);
	$kodedepan = str_replace("TABEL", "", $kodedepan);
	$kodedepan = str_replace("TABLE_", "", $kodedepan);
	$kodedepan = strtoupper(substr($kodedepan, 0, 3));
	$id_tabel_otomatis = $kodedepan . date('YmdHis');
	$min = pow($panjang_id, 3 - 1);
	$max = pow($panjang_id, 3) - 1;

	$kodeakhir = mt_rand($min, $max);
	return $id_tabel_otomatis . $kodeakhir;
}
