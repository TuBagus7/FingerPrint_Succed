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


$id_tahun_ajaran = id_otomatis("data_tahun_ajaran", "id_tahun_ajaran", "10");
              $tahun_ajaran=xss($_POST['tahun_ajaran']);


$query = mysql_query("insert into data_tahun_ajaran values (
'$id_tahun_ajaran'
 ,'$tahun_ajaran'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
