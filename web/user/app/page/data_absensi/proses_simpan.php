<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_absensi'])) {
        
?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
<?php
    die();
}


$id_absensi = id_otomatis("data_absensi", "id_absensi", "10");
$tanggal = xss($_POST['tanggal']);
$id_mahasiswa = xss($_POST['id_mahasiswa']);
// $status = xss($_POST['status']);


$query = mysql_query("insert into data_absensi values (
'$id_absensi'
 ,'$tanggal'
 ,'$jam'
 ,'$id_mahasiswa'
 ,''
 

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