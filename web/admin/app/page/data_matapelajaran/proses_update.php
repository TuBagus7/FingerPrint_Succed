<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_matapelajaran'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_matapelajaran = xss($_POST['id_matapelajaran']);
$matapelajaran = xss($_POST['matapelajaran']);


$query = mysql_query("update data_matapelajaran set 
matapelajaran='$matapelajaran'

where id_matapelajaran='$id_matapelajaran' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
