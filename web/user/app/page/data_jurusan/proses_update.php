<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_jurusan'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_jurusan = xss($_POST['id_jurusan']);
$jurusan = xss($_POST['jurusan']);


$query = mysql_query("update data_jurusan set 
jurusan='$jurusan'

where id_jurusan='$id_jurusan' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
