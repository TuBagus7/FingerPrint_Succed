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
$id_sidik_jari = xss($_POST['id_sidik_jari']);
$nim = xss($_POST['nim']);
$nama = xss($_POST['nama']);
$alamat = xss($_POST['alamat']);
$jenim_kelamin = xss($_POST['jenim_kelamin']);
//   $id_kelas=xss($_POST['id_kelas']);
$username = xss($_POST['username']);
$password = md5($_POST['password']);


$query = mysql_query("insert into data_mahasiswa values (
'$id_mahasiswa'
,'$id_sidik_jari'
 ,'$nim'
 ,'$nama'
 ,'$alamat'
 ,'$jenim_kelamin'
 ,''
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