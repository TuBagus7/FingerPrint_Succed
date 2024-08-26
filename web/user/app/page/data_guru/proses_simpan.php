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


$id_guru = id_otomatis("data_guru", "id_guru", "10");
$nip = xss($_POST['nip']);
$nama = xss($_POST['nama']);
$alamat = xss($_POST['alamat']);
$no_telepon = xss($_POST['no_telepon']);
$jenim_kelamin = xss($_POST['jenim_kelamin']);
$username = xss($_POST['username']);
$password = md5($_POST['password']);


$query = mysql_query("insert into data_guru values (
'$id_guru'
 ,'$nip'
 ,'$nama'
 ,'$alamat'
 ,'$no_telepon'
 ,'$jenim_kelamin'
 ,'$username'
 ,'$password'

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