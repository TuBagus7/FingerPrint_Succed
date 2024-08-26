<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_jadwal'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}


$id_jadwal = id_otomatis("data_jadwal", "id_jadwal", "10");
              $hari=xss($_POST['hari']);
              $jam=xss($_POST['jam']);
            


$query = mysql_query("insert into data_jadwal values (
'$id_jadwal'
 ,'$hari'
 ,'$jam'
 

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
