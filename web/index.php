<?php


include "admin/include/koneksi/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


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

    $id_pendaftaran = id_otomatis("data_daftar_fingerprint", "id_daftar_fingerprint", "10");

    // Mengambil nilai dari input siswa        
    $nama_siswa = $_POST['nama'];

    // Memproses nilai siswa dengan format "7-0847-ridho"
    $siswa_data = explode('-', $nama_siswa);

    //proses simpan data ke database
    $cek_status = cek_database("", "status", "", "select * from data_daftar_fingerprint where status = 'pendaftaran'");
    $cek = cek_database("", "id_sidik_jari", "", "select * from data_daftar_fingerprint where id_sidik_jari = '$siswa_data[0]'");

    if ($cek_status == 'nggak') {
        if ($cek != 'ada') {
            $query = mysql_query("insert into data_daftar_fingerprint values (
                    '$id_pendaftaran'
                    ,'$siswa_data[0]'
                    ,'$siswa_data[1]'
                    ,'pendaftaran'
                    
                    )");
        } else {
            $query = mysql_query("delete from data_daftar_fingerprint where id_sidik_jari = '$siswa_data[0]'");
        }
    }




    /*
        // Membuat array asosiatif untuk menyimpan data dalam format yang diinginkan
        $json_data = array(
            "out_1" => $siswa_data[0],
            "out_2" => $siswa_data[1],
            "out_3" => $siswa_data[2],
            "out_4" => "0",
            "out_5" => "0",
            "out_6" => "0",
            "out_7" => "0",
            "out_8" => "0",
            "out_9" => "0",
            "out_10" => "0"
        );

        // Membaca file JSON yang sudah ada
        $existing_data = file_get_contents('fingerprint.json');
        $existing_data = json_decode($existing_data, true);

        // Menambahkan data baru ke array
        $existing_data[] = $json_data;

        // Mengonversi array ke format JSON
        $json_string = json_encode($existing_data, JSON_PRETTY_PRINT);

        // Menyimpan JSON ke file
        file_put_contents('fingerprint.json', $json_string); */
?>
    <script>
        location.href = "admin/app/page/data_mahasiswa";
    </script>
<?php

} else if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location:admin');
}
?>