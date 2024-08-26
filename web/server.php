<?php
include "admin/include/koneksi/koneksi.php";

if (isset($_GET['pendaftaran'])) {

    if (isset($_GET['pendaftaran'])) {

        echo $id_pendaftaran = $_GET['pendaftaran'];

        $query = mysql_query("update data_daftar_fingerprint set 
                status='terdaftar'       
    where id_sidik_jari='$id_pendaftaran' ") or die(mysql_error());
    }
    //     else if (isset($_GET['absen'])) {

    //      function baca_database($tabel,$field,$query)
    // {

    // 	if ($query=="")
    // 	{
    // 		$sql = 'SELECT * FROM '.$tabel;
    // 	}
    // 	else
    // 	{
    // 		$sql = $query;
    // 	}

    // 	$querytabelualala=$sql;
    // 	$prosesulala = mysql_query($querytabelualala);
    // 	$datahasilpemrosesanquery = mysql_fetch_array($prosesulala);
    // 	$hasiltermantab = $datahasilpemrosesanquery[$field];
    // 	return $hasiltermantab;
    // }
    //     $id_absen = $_GET['absen'];
    //     $nimSiswa = baca_database("","nim","select * from data_mahasiswa where id_sidik_jari = '$id_absen'");
    //     $namaSiswa = baca_database("","nama","select * from data_mahasiswa where id_sidik_jari = '$id_absen'");

    // header('Content-Type: application/json');
    // echo json_encode(
    //     [
    //         "out_1"=> $id_absen,
    //         "out_2"=> $nimSiswa,
    //         "out_3"=> $namaSiswa,
    //         "out_4"=> "0",
    //         "out_5"=> "0",
    //         "out_6"=> "0",
    //         "out_7"=> "0",
    //         "out_8"=> "0",
    //         "out_9"=> "0",
    //         "out_10"=> "0"

    //     ]);

    //     header('location:absen.php?proses=' . $id_absen);

    //     }
} else {

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
    $sql = "select * from data_daftar_fingerprint where status = 'pendaftaran'";
    $result = mysql_query($sql);
    $data = mysql_fetch_array($result);

    $nama = baca_database("", "nama", "select * from data_mahasiswa where nim = '$data[nim]'");
    header('Content-Type: application/json');
    echo json_encode(
        [
            "out_1" => $data['id_sidik_jari'],
            "out_2" => $data['nim'],
            "out_3" => $nama,
            "out_4" => "0",
            "out_5" => "0",
            "out_6" => "0",
            "out_7" => "0",
            "out_8" => "0",
            "out_9" => "0",
            "out_10" => "0"

        ]
    );
}
