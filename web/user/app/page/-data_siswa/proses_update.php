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

$id_mahasiswa = xss($_POST['id_mahasiswa']);
$nim = xss($_POST['nim']);
$nama = xss($_POST['nama']);
$alamat = xss($_POST['alamat']);
$jenim_kelamin = xss($_POST['jenim_kelamin']);
$id_kelas = xss($_POST['id_kelas']);
$id_tahun_ajaran = xss($_POST['id_tahun_ajaran']);


$query = mysql_query("update data_mahasiswa set 
nim='$nim',
nama='$nama',
alamat='$alamat',
jenim_kelamin='$jenim_kelamin',
id_kelas='$id_kelas',
id_tahun_ajaran='$id_tahun_ajaran'

where id_mahasiswa='$id_mahasiswa' ") or die(mysql_error());

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