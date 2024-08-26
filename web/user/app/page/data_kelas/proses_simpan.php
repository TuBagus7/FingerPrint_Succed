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


$id_kelas = id_otomatis("data_kelas", "id_kelas", "10");
              $kelas=xss($_POST['kelas']);


$query = mysql_query("insert into data_kelas values (
'$id_kelas'
 ,'$kelas'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
