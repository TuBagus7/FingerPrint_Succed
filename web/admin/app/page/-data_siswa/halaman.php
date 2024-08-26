<?php
	if(!empty($halaman)){
		echo "ini home";
	}
	else
	{
		if(!empty($_GET['input'])){
				$input = mysql_real_escape_string($_GET['input']);
		
				if ($input=='tampil')
				{
					//TAMPIL
					include 'tampil.php'; 
				}
				if ($input=='tambah')
				{
					//TAMBAH
					include 'tambah.php'; 
				}
				elseif ($input=='detail')
				{
					//DETAIL
					include 'detail.php'; 
				}
				elseif ($input=='edit')
				{
					//EDIT
					include 'edit.php'; 
				}
				elseif ($input=='hapus')
				{
					//HAPUS
					include 'hapus.php'; 
				}
				elseif ($input=='proses_tambah')
				{
					//PROSES TAMBAH
					include 'proses_tambah.php'; 
				}
				elseif ($input=='proses_edit')
				{
					//PROSES EDIT
					include 'proses_edit.php'; 
				}
				elseif ($input=='proses_hapus')
				{
					//PROSES HAPUS
					include 'proses_hapus.php'; 
				}
				elseif ($input=='popup_hapus')
				{
					//POPUP HAPUS
					include 'tampil.php';
					popup("DATA BERHASIL DIHAPUS","SELESAI","",$url_index,$url_index);
				}
				elseif ($input=='popup_edit')
				{
					//POPUP EDIT
					include 'tampil.php';
					popup("DATA BERHASIL DIEDIT","SELESAI","",$url_index,$url_index);
				}
				elseif ($input=='popup_tambah')
				{
					//POPUP TAMBAH
					include 'tampil.php';
					popup("DATA BERHASIL DITAMBAHKAN","SELESAI","",$url_index,$url_index);
				}
				elseif ($input=='cetak')
				{
					//POPUP TAMBAH
					include 'cetak.php';
				}
				else
				{
					//LAINNYA
					echo "Mau Ngapain..? Halaman Tidak Ada.";
				}
		}
		else
		{
			//TAMPIL
			include 'tampil.php';
		}
	}
	?>
