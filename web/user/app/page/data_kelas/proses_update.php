<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_kelas'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_kelas = xss($_POST['id_kelas']);
$kelas = xss($_POST['kelas']);


$query = mysql_query("update data_kelas set 
kelas='$kelas'

where id_kelas='$id_kelas' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
