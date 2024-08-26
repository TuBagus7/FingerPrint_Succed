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
$id_sidik_jari = xss($_POST['id_sidik_jari']);
$nim = xss($_POST['nim']);
$nama = xss($_POST['nama']);
$alamat = xss($_POST['alamat']);
$jenis_kelamin = xss($_POST['jenis_kelamin']);
// $id_kelas = xss($_POST['id_kelas']);
$username = xss($_POST['username']);
$password = md5($_POST['password']);

$query = mysql_query("update data_mahasiswa set 
id_sidik_jari='$id_sidik_jari',
nim='$nim',
nama='$nama',
alamat='$alamat',
jenis_kelamin='$jenis_kelamin',
username='$username',
password='$password'

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