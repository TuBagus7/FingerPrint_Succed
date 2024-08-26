<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_guru'])) {
        
?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
<?php
    die();
}

$id_guru = xss($_POST['id_guru']);
$nip = xss($_POST['nip']);
$nama = xss($_POST['nama']);
$alamat = xss($_POST['alamat']);
$no_telepon = xss($_POST['no_telepon']);
$jenim_kelamin = xss($_POST['jenim_kelamin']);
$username = xss($_POST['username']);
$password = md5($_POST['password']);


$query = mysql_query("update data_guru set 
nip='$nip',
nama='$nama',
alamat='$alamat',
no_telepon='$no_telepon',
jenim_kelamin='$jenim_kelamin',
username='$username',
password='$password'

where id_guru='$id_guru' ") or die(mysql_error());

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