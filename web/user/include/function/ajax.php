<?php
include 'admin/koneksi/koneksi.php';
$tabel = $_POST['tabel'];
$field = $_POST['field'];
$isi = $_POST['isi'];
$querytabel="SELECT * FROM $tabel WHERE $field='$isi'";
$proses = mysql_query($querytabel);
$data = mysql_fetch_array($proses);
echo json_encode($data);
?>



<!-- CONTOH AJAX -->
	<script src="admin/data/js/jquery.js"></script>
	<script>
	
				// function ajax_nama_gas() { 
				
				// var input = $("#nama_gas").val();
				
				 // $.ajax({ url: 'admin/include/function/ajax.php', 
				 // type: 'POST', 
				 // dataType: 'json', 
				 // data: {'isi': input,'tabel':'data_gas','field':'nama_gas'}, success: function (proses) 
					// {

					 // $("#harga").val(proses['harga']);
					
					// } }); 
				// }
	 </script>