<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_tahun_ajaran'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_tahun_ajaran = xss($_POST['id_tahun_ajaran']);
$tahun_ajaran = xss($_POST['tahun_ajaran']);


$query = mysql_query("update data_tahun_ajaran set 
tahun_ajaran='$tahun_ajaran'

where id_tahun_ajaran='$id_tahun_ajaran' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
