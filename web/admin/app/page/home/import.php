
<?php


require_once '../../../data/cssjs/phpoffice/vendor/autoload.php'; 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function export($tabel)
{
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$kolom =0;
$sql = "desc $tabel";
$result = @mysql_query($sql);
while($row = @mysql_fetch_array($result))
{
	$kolom = $kolom +1;
	$nama_kolom = $row[0];
	$sheet->setCellValueByColumnAndRow($kolom,1,$nama_kolom);

$sheet->setCellValueByColumnAndRow($kolom,2,"Data $kolom");

if(preg_match("/id/i", $nama_kolom)) {
  $sheet->setCellValueByColumnAndRow($kolom,2,"{id}");
}

if(preg_match("/tanggal/i", $nama_kolom)) {
  $sheet->setCellValueByColumnAndRow($kolom,2,"{tanggal}");
}

}
	
$writer = new Xlsx($spreadsheet);
$namafile = "../../../../admin/upload/".$tabel.".xlsx";
$writer->save($namafile);
return ($namafile);
}

function import($tabel,$lokasi)
{
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load($lokasi);
$worksheet = $spreadsheet->getActiveSheet();
$rows = $worksheet->toArray();
unset($rows[0]); 
foreach ($rows as $key => $Row) {

$kolom =0;
$value="INSERT INTO $tabel VALUES(";	
$sql = "desc $tabel";
$result = @mysql_query($sql);
while($row = @mysql_fetch_array($result))
{
	$nama_kolom = $Row[$kolom];
	if (!($nama_kolom==""))
	{
		
		if ($nama_kolom == "{id}")
			{
				$nama_kolom = id_otomatis($tabel,"id_$tabel","10");
			}
		if ($nama_kolom == "{tanggal}")
			{
				$nama_kolom = date('Y-m-d');
			}

		$nama_kolom = mysql_real_escape_string($nama_kolom);
		
		if ($kolom ==0)
		{
			$value =$value."'".$nama_kolom."'";
		}
		else
		{
			$value =$value.",'".$nama_kolom."'";
		}
	}
	$kolom = $kolom +1;
}
	$query = $value.");";
	$proses=mysql_query($query);
	if($proses){
	print (date("Y-m-d H:i:s")." - <b>Import Baris ($key) </b> ".str_repeat('.', 10-strlen(""))."<font color='green'><b>load</b></font> ".str_repeat('.', 10-strlen(""))."..<b><font color='green'>BERHASIL</font></b><br>");
	}
	else
	{
		print (date("Y-m-d H:i:s")." - <b>Import Baris ($key) </b> ".str_repeat('.', 10-strlen(""))."<font color='red'><b>Load</b></font> ".str_repeat('.', 10-strlen(""))."..<b><font color='red'>GAGAL</font></b><br>");
	}
	}
}

if (isset($_GET['contoh']))
{
	$nama = $_GET['contoh'];
	$lokasi = export($nama);
	?>
	<center>
	<br>
	<h2> FORMAT CONTOH TELAH DIBUAT</h2>
	<h3>Silahkan Download File Excel</h3>
	<br>
	<br>
	<a class="btn btn-primary" href="?import=x&tabel=<?php echo $nama;?>">Kembali</a>
	<a target="blank" class="btn btn-success" href="<?php echo $lokasi;?>">Download Format Contoh Excel</a>
	<br>
	<br>
	<br>
		<br>
	<br>
	<br>
	</center>
	<?php

}
else
{
	?>
	
	<center>
	<br>
	<h2> IMPORT DATABASE DARI FILE EXCEL</h2>
	
<?php if (!(isset($_GET['tabel'])))
{ 
	//PILIH TABEL
	?>
	Silahkan Pilih Nama Tabel Dibawah ini. <br>
	<hr>
	<table border="0"  width="40%">
	<?php 
	$result = mysql_query("show tables"); 
	while($table = mysql_fetch_array($result)) { 
	?>
	<tr>
	<td>
	<b><?php echo($table[0]); ?></b>
	</td>
	<td>
	<b>( <?php total($table[0],""); ?> Data )</b>
	</td>
	<td>
	<a href="?import=x&tabel=<?php echo($table[0]); ?>" class="btn btn-info">Pilih</a>
	</td>
	</tr>
	<?php
	}
	?>
	</table>
	<hr>
	
<?php 
} else {
	
	//SUDAH PILIH TABEL
	if (!(isset($_POST['upload']))) { ?>
	<h4>TABEL <?php echo strtoupper($_GET['tabel']);?></h4>
	Silahkan Import File Excel Sesuai dengan Format. <br>
	Buat contoh format import dan download jika belum memiliki format import excel.
	<br>
	<br>
	<a class="btn btn-primary" href="?import=x">Kembali</a>
	<a  target="blank" class="btn btn-warning" href="?import=x&contoh=<?php echo $_GET['tabel'];?>">Buat Contoh Format import</a>
	<br>
	<br>
	Silahkan Pilih file dan Proses Import File Excel jika telah memiliki Format Import.
	<br>
	<br>
	<table>
		<form action="?import=x&tabel= <?php echo ($_GET['tabel']);?>" method="post" enctype="multipart/form-data" >
			 <tr>
				<td width="25%" class="leftrowcms">					
				<label >PILIH FILE <span class="highlight"></span></label>
			   </td>
				<td width="2%">:</td>
				<td>
				<input name="filemhsw" type="file" required="required">
				</td>
			 </tr>
			 
			 
			  
			 <tr>
				<td width="25%" class="leftrowcms">					
				<label > <span class="highlight"></span></label>
				</td>
				<td width="2%"></td>
				<td>
				
				
				</td>
			 </tr>
		
	</table>
	<input name="upload" class="btn btn-success" type="submit" value="Proses Import file Excel">	
	</form>
	<br>	
	<br>
	<br><?php }
}
}	

	if (isset($_POST['upload'])) {
		
		$lokasi = "../../../../admin/upload/".date('ymdhis-').basename($_FILES['filemhsw']['name']);
		move_uploaded_file($_FILES['filemhsw']['tmp_name'],$lokasi);
		echo "<br><h5><b>Read File ( ".$_FILES['filemhsw']['name']." ) Success..</h5></b>";
		$tabel = $_GET['tabel'];
		
		
		import($tabel,$lokasi);
		
		echo "<h5><b>Proses Import Selesai..</h5></b>";
		?>
		<a href="?import=x" class="btn btn-primary" >Proses Selesai, Kembali Kemenu Import</a>
		<?php
		
	} 
	?>
	
	<br>
	<br>
	<br>
	<br>
	
	