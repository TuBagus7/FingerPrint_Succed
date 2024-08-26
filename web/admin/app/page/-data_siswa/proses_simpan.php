<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_mahasiswa'])) {
        
?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
<?php
    die();
}


$id_mahasiswa = id_otomatis("data_mahasiswa", "id_mahasiswa", "10");
$nim = xss($_POST['nim']);
$nama = xss($_POST['nama']);
$alamat = xss($_POST['alamat']);
$jenim_kelamin = xss($_POST['jenim_kelamin']);
$id_kelas = xss($_POST['id_kelas']);
$id_tahun_ajaran = xss($_POST['id_tahun_ajaran']);


$query = mysql_query("insert into data_mahasiswa values (
'$id_mahasiswa'
 ,'$nim'
 ,'$nama'
 ,'$alamat'
 ,'$jenim_kelamin'
 ,'$id_kelas'
 ,'$id_tahun_ajaran'

)");

if ($query) {
?>
    <script>
        location.href = "<?php index(); ?>?input=popup_tambah";
    </script>
<?php
} else {
    echo "GAGAL DIPROSES";
}
?>