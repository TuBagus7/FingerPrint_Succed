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

$id_absensi = xss($_POST['id_absensi']);
$tanggal = xss($_POST['tanggal']);
$id_mahasiswa = xss($_POST['id_mahasiswa']);
// $status = xss($_POST['status']);


$query = mysql_query("update data_absensi set 
tanggal='$tanggal',
id_mahasiswa='$id_mahasiswa'

where id_absensi='$id_absensi' ") or die(mysql_error());

if ($query) {
?>
    <script>
        location.href = "<?php index(); ?>?input=popup_edit";
    </script>
<?php
} else {
    echo "GAGAL DIPROSES";
}
?>