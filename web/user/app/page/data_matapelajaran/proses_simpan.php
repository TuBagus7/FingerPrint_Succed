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


$id_matapelajaran = id_otomatis("data_matapelajaran", "id_matapelajaran", "10");
              $matapelajaran=xss($_POST['matapelajaran']);


$query = mysql_query("insert into data_matapelajaran values (
'$id_matapelajaran'
 ,'$matapelajaran'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
