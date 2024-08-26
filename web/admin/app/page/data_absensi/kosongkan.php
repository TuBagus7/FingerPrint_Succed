<?php include '../../../include/all_include.php';


$query=mysql_query("delete from data_absensi ");

if($query){
?>
<script>location.href = "<?php index(); ?>"; </script>
<?php
}
else
{
	echo "GAGAL DIPROSES";
}
?>
