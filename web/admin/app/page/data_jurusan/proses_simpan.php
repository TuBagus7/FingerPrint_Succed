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


$id_jurusan = id_otomatis("data_jurusan", "id_jurusan", "10");
              $jurusan=xss($_POST['jurusan']);


$query = mysql_query("insert into data_jurusan values (
'$id_jurusan'
 ,'$jurusan'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
