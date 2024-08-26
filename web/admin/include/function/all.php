<?php

if (isset($_GET['page']) && !empty($_GET['page'])) {
	$page = (int)$_GET['page'];
} else {
	$page = 1;
}
if (isset($_GET['perPage']) && !empty($_GET['perPage'])) {
	$dataPerPage = (int)$_GET['perPage'];
} else {
	$dataPerPage = 10;
}

//PAGINATION
function Pagination($pagedefault, $limit, $querypagination)
{
	if (isset($_GET['page']) && !empty($_GET['page'])) {
		$page = (int)$_GET['page'];
	} else {
		$page = 1;
	}
	if (isset($_GET['perPage']) && !empty($_GET['perPage'])) {
		$dataPerPage = (int)$_GET['perPage'];
	} else {
		$dataPerPage = 10;
	}

	if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi'])) {
		$berdasarkan = mysql_real_escape_string($_GET['Berdasarkan']);
		$isi = mysql_real_escape_string($_GET['isi']);
		$countTotalRow = mysql_query(mysql_real_escape_string($querypagination));
	} else {
		$countTotalRow = mysql_query(mysql_real_escape_string($querypagination));
	}
	$queryResult = mysql_fetch_assoc($countTotalRow);
	$totalRow = $queryResult['total'];
	$item_per_page = mysql_real_escape_string($dataPerPage);
	$current_page  = mysql_real_escape_string($page);
	$total_records = $totalRow;
	$total_pages = floor($totalRow / $dataPerPage) + 1;
	$page_url = "";

	if (isset($_GET['perPage']) && !empty($_GET['perPage'])) {
		echo "Jumlah " . $totalRow . " data, ";
	} else {
		echo "Jumlah " . $totalRow . " data, ";
	}
	if (isset($_GET['page']) && !empty($_GET['page'])) {
		echo "Halaman " . $_GET['page'] . " Dari " . $total_pages . " Halaman<br><br>";
	} else {
		echo "Halaman " . $pagedefault . " Dari " . $total_pages . " Halaman<br><br>";
	}

	$pagination = '';
	$pagination .= '';

	$right_links    = $current_page + 3;
	$previous       = $current_page - 3;
	$next           = $current_page + 1;
	$first_link     = true;

	$previous_link = ($previous == 0) ? 1 : $previous;
	$pagination .= '<a class="btn btn-info btn-xs" href="' . $page_url . '?perPage=' . $item_per_page . '&page=1" title="First">«</a> ';
	if ($previous_link < 1) {
		$previous_link = 1;
	}
	$pagination .= '<a class="btn btn-info btn-xs" href="' . $page_url . '?perPage=' . $item_per_page . '&page=' . $previous_link . '" title="Previous">« Sebelumnya</a> ';
	for ($i = ($current_page - 2); $i < $current_page; $i++) {
		if ($i > 0) {
			$pagination .= '<a class="btn btn-info btn-xs" href="' . $page_url . '?perPage=' . $item_per_page . '&page=' . $i . '">' . $i . '</a> ';
		}
	}
	$first_link = false;

	if ($first_link) {
		$pagination .= '';
	} elseif ($current_page == $total_pages) {
		$pagination .= '<a class="btn btn-default btn-xs">' . $current_page . '</a> ';
	} else {
		$pagination .= '<a class="btn btn-default btn-xs">' . $current_page . '</a> ';
	}

	for ($i = $current_page + 1; $i < $right_links; $i++) {
		if ($i <= $total_pages) {
			$pagination .= '<a class="btn btn-info btn-xs" href="' . $page_url . '?perPage=' . $item_per_page . '&page=' . $i . '">' . $i . '</a> ';
		}
	}
	$next_link = ($i > $total_pages) ? $total_pages : $i;
	$pagination .= '<a class="btn btn-info btn-xs" href="' . $page_url . '?perPage=' . $item_per_page . '&page=' . $next_link . '" >berikutnya »</a> ';
	$pagination .= '<a class="btn btn-info btn-xs" href="' . $page_url . '?perPage=' . $item_per_page . '&page=' . $total_pages . '" title="Last">»</a> ';
	$pagination .= '';
	echo  $pagination;
}

//POTONG KALIMAT
function cutText($text, $length, $mode = 2)
{
	if ($mode != 1) {
		$char = $text{
		$length - 1};
		switch ($mode) {
			case 2:
				while ($char != ' ') {
					$char = $text{
					--$length};
				}
			case 3:
				while ($char != ' ') {
					$char = $text{
					++$num_char};
				}
		}
	}
	return substr($text, 0, $length);
}


//COMBO DATABASE
function combo_database($tabel, $field, $query)
{
	if ($query == '') {
		$sql = mysql_query("SELECT * FROM $tabel");
	} else {
		$sql = mysql_query("$query");
	}
	if (mysql_num_rows($sql) != 0) {
		while ($data = mysql_fetch_assoc($sql)) {
			echo '<option>' . $data["$field"] . '</option>';
		}
	}
}

//COMBO DATABASE
function combo_database_v2($tabel, $id_field, $field, $query)
{
	if ($query == '') {
		$sql = mysql_query("SELECT * FROM $tabel");
	} else {
		$sql = mysql_query("$query");
	}
	if (mysql_num_rows($sql) != 0) {
		while ($data = mysql_fetch_assoc($sql)) {
?>
			<option value="<?php echo $data["$id_field"]; ?>"> <?php echo $data["$field"]; ?> </option>
		<?php
		}
	}
}


//COMBO DATABASE 2
function combo_database2($tabel, $field1, $field2, $query)
{
	if ($query == '') {
		$sql = mysql_query("SELECT * FROM $tabel");
	} else {
		$sql = mysql_query("$query");
	}
	if (mysql_num_rows($sql) != 0) {
		while ($data = mysql_fetch_assoc($sql)) {
		?>
			<option value="<?php echo $data["$field1"] ?>"><?php echo $data["$field1"] . " ( " . $data["$field2"] . ")" ?></option>';
		<?php
		}
	}
}

//COMBO DATABASE 3
function combo_database3($tabel, $field1, $field2, $field3, $pembuka_pemisah, $penutup_pemisah, $query)
{
	if ($query == '') {
		$sql = mysql_query("SELECT * FROM $tabel");
	} else {
		$sql = mysql_query("$query");
	}
	if (mysql_num_rows($sql) != 0) {
		while ($data = mysql_fetch_assoc($sql)) {
		?>
			<option value="<?php echo $data["$field1"] ?>">
				<?php echo $pembuka_pemisah . $data["$field1"] . $penutup_pemisah . $pembuka_pemisah . $data["$field2"] . $penutup_pemisah . $pembuka_pemisah . $data["$field3"] . $penutup_pemisah; ?>
			</option>';
	<?php
		}
	}
}

//COMBO ENUM
function combo_enum($tabel, $field, $query)
{
	global $database;
	$result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
       WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = '$tabel' AND COLUMN_NAME = '$field'")
		or die(mysql_error());

	$row = mysql_fetch_array($result);
	$enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE']) - 6))));

	foreach ($enumList as $value)
		$selectDropdown .= "<option>$value</option>";
	echo $selectDropdown;
	return $selectDropdown;
}


//CETAK BERDASARKAN
function cetakberdasarkan($tabel, $jenim, $pakaiperperiode)
{ ?>
	<style type="text/css">
		#tampil_modal {
			padding-top: 5em;
			background-color: rgba(0, 0, 0, 0.8);
			position: fixed;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			z-index: 10;
			display: block;
		}

		#modal {
			padding: 15px;
			font-size: 16px;
			background: #e74c3c;
			color: #000;
			width: 540px;
			border-radius: 15px;
			margin: 0 auto 20px;
			padding-bottom: 50px;
			z-index: 9;
		}

		#modal_atas {
			width: 540px;
			color: #fff;
			background: #c0392b;
			padding: 15px;
			margin-left: -15px;
			font-size: 18px;
			margin-top: -15px;
			border-top-left-radius: 15px;
			border-top-right-radius: 15px;
		}

		#oke {
			background: #c0392b;
			border: none;
			float: right;
			width: 80px;
			height: 30px;
			color: #fff;
			margin-right: 5px;
			cursor: pointer;
		}
	</style>
	<?php
	$ket = strtoupper($tabel);
	if ($jenim == "xls") {
		$judulcetak = "Export Ms.Excel";
	} elseif ($jenim == "doc") {
		$judulcetak = "Export Ms.Word";
	} else {
		$judulcetak = "Cetak Laporan";
	}
	?>
	<div id="tampil_modal">
		<div id="modal">
			<div id="modal_atas"><?php echo $judulcetak; ?></div>
			<br>
			<form action="cetak.php" method="get">

				<div class="item form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_admin">Berdasarkan<span class="required">:</span>
					</label>
					<br>
					<select data-style="btn-default" class="selectpicker show-tick form-control" name="apa" data-live-search="true" data-size="7">

						<?php

						$sql = "desc $tabel";
						$result = @mysql_query($sql);
						while ($row = @mysql_fetch_array($result)) {
							echo "<option  data-icon='glyphicon glyphicon-search'  data-tokens='berdasarkan' name='apa' value=$row[0]>$row[0]</option>";
						}
						?>

					</select>
					<div class="input-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_admin">Pencarian
							<span class="required">:</span>
						</label><br>
						<span class="input-group-addon" id="basic-addon1">
							<i class="fa fa-indent"></i>
						</span>
						<input class="form-control col-md-7 col-xs-12" name="isi" type="text">
					</div>

					<?php if ($pakaiperperiode == "ya") { ?>
						<div class="input-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_admin">Dari Tanggal
								<span class="required">:</span>
							</label><br>
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-calendar"></i>
							</span>
							<input class="form-control col-md-7 col-xs-12" name="periode1" placeholder="periode1" type="date">
						</div>

						<div class="input-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_admin">Sampai Tanggal
								<span class="required">:</span>
							</label><br>
							<span class="input-group-addon" id="basic-addon1">
								<i class="fa fa-calendar"></i>
							</span>
							<input class="form-control col-md-7 col-xs-12" name="periode2" placeholder="periode2" type="date">
						</div>
					<?php } ?>
					<input name="jenim" value="<?php echo $jenim; ?>" type="hidden">
					<button type="submit" id="oke">Cetak</button>
					</a>
				</div>
			</form>
			<!-- <a href="index.php"><button id="oke">Batal</button></a> -->
		</div>
	</div>
	<?php }

//HEADER CETAK
function cetakapa($cetakapa)
{
	if ($cetakapa == "xls") {
		header("Content-Type: application/force-download");
		header("Cache-Control: no-cache, must-revalidate");
		header("content-disposition: attachment;filename=laporan_%tabel%_" . date('dmY') . ".xls");
	} elseif ($cetakapa == "doc") {
		header("Content-Type: application/force-download");
		header("Cache-Control: no-cache, must-revalidate");
		header("content-disposition: attachment;filename=laporan_%tabel%_" . date('dmY') . ".doc");
	} elseif ($cetakapa == "pdf") {
		header("Content-Type: application/force-download");
		header("Cache-Control: no-cache, must-revalidate");
		header("content-disposition: attachment;filename=laporan_%tabel%_" . date('dmY') . ".pdf");
	} elseif ($cetakapa == "print") {
	?>
		<script>
			window.print();
		</script>
	<?php
	}
}

//POPUP
function popup($pesan, $judul, $button, $link_oke, $link_back)
{
	?>
	<div class="popup-wrapper" id="popup">
		<div class="popup-container">
			<h1><?php echo $judul; ?></h1>
			<p style="font-size:19px;"><?php echo $pesan; ?></p>
			<a href="<?php echo $link_oke; ?>"><?php btn_ya("OK") ?></a>
			<a class="popup-close" href="<?php echo $link_back; ?>">X</a>
		</div>
	</div>
	<?php
}

//KEYPRESS
function action($proses)
{
	echo "onkeyup='$proses();' onchange='$proses();' onkeyup='$proses();' onkeydown='$proses();' onclick='$proses();'";
}

//TOTAL
function total($tabel, $query)
{
	if ($query == "") {
		$sql = 'SELECT * FROM ' . $tabel;
	} else {
		$sql = $query;
	}
	$query = mysql_query($sql);
	$count = mysql_num_rows($query);
	echo "$count";
}

//TOTALR
function totalr($tabel, $query)
{
	if ($query == "") {
		$sql = 'SELECT * FROM ' . $tabel;
	} else {
		$sql = $query;
	}
	$query = mysql_query($sql);
	$count = mysql_num_rows($query);
	return $count;
}

//TANGGAL OTOMATIS
function tanggal_otomatis()
{
	$tanggal = date("Y-m-d");
	echo $tanggal;
}

//FORMAT INDO
function format_indo($t)
{
	$bulan = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $t);
	return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

//FORMAT RUPIAH
function rupiah($rp)
{
	echo "Rp.";
	echo number_format($rp, 0, ",", ".");
}

//BACA DATABASE
function baca_database($tabel, $field, $query)
{

	if ($query == "") {
		$sql = 'SELECT * FROM ' . $tabel;
	} else {
		$sql = $query;
	}

	$querytabelualala = $sql;
	$prosesulala = mysql_query($querytabelualala);
	$datahasilpemrosesanquery = mysql_fetch_array($prosesulala);
	$hasiltermantab = $datahasilpemrosesanquery[$field];
	return $hasiltermantab;
}

//CEK DATABASE
function cek_database($tabel, $field, $value, $query)
{
	if ($query == "") {
		$sql = "SELECT * FROM " . $tabel . " WHERE " . $field . " ='" . $value . "'";
	} else {
		$sql = $query;
	}

	$cek_user = mysql_num_rows(mysql_query($sql));
	if ($cek_user > 0) {
		$hasiltermantab = "ada";
	} else {
		$hasiltermantab = "nggak";
	}
	return $hasiltermantab;
}

//BACA SESSION
function baca_session($namasession)
{
	session_save_path($_SERVER['DOCUMENT_ROOT'] . "/../tmp");
	session_id("login");
	if (session_status() == PHP_SESSION_NONE) {
		@session_start();
	}
	$hasiltermantab = $_SESSION[$namasession];
	return $hasiltermantab;
}

//SIMPAN SESSION
function simpan_session($namasession, $apa)
{
	session_save_path($_SERVER['DOCUMENT_ROOT'] . "/../tmp");
	session_id("login");
	if (session_status() == PHP_SESSION_NONE) {
		@session_start();
	}
	$_SESSION[$namasession] = $apa;
}

//CEK SESSION
function cek_session($namasession)
{
	session_save_path($_SERVER['DOCUMENT_ROOT'] . "/../tmp");
	session_id("login");
	if (session_status() == PHP_SESSION_NONE) {
		@session_start();
	}
	if (empty($_SESSION[$namasession])) {
		$hasiltermantab = "nggak";
	} else {
		$hasiltermantab = "ada";
	}
	return $hasiltermantab;
}

//HALAMAN
function halaman()
{
	if (!empty($_GET['halaman'])) {
		$halaman = $_GET['halaman'];
		$cari = 'components/halaman/' . $halaman . '.php';
		if (file_exists($cari)) {
			include 'components/halaman/' . $halaman . '.php';
		} else {
			echo "MAAF HALAMAN TIDAK TERSEDIA.";
		}
	} else {
		//HOME
		include 'components/halaman/home.php';
	}
}

//KEKATA
function kekata($x)
{
	$x = abs($x);
	$angka = array(
		"", "satu", "dua", "tiga", "empat", "lima",
		"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"
	);
	$temp = "";
	if ($x < 12) {
		$temp = " " . $angka[$x];
	} else if ($x < 20) {
		$temp = kekata($x - 10) . " belas";
	} else if ($x < 100) {
		$temp = kekata($x / 10) . " puluh" . kekata($x % 10);
	} else if ($x < 200) {
		$temp = " seratus" . kekata($x - 100);
	} else if ($x < 1000) {
		$temp = kekata($x / 100) . " ratus" . kekata($x % 100);
	} else if ($x < 2000) {
		$temp = " seribu" . kekata($x - 1000);
	} else if ($x < 1000000) {
		$temp = kekata($x / 1000) . " ribu" . kekata($x % 1000);
	} else if ($x < 1000000000) {
		$temp = kekata($x / 1000000) . " juta" . kekata($x % 1000000);
	} else if ($x < 1000000000000) {
		$temp = kekata($x / 1000000000) . " milyar" . kekata(fmod($x, 1000000000));
	} else if ($x < 1000000000000000) {
		$temp = kekata($x / 1000000000000) . " trilyun" . kekata(fmod($x, 1000000000000));
	}
	return $temp;
}

//TERBILANG
function terbilang($x)
{
	if ($x < 0) {
		$hasil = "minus " . trim(kekata($x));
	} else {
		$hasil = trim(kekata($x));
	}

	$hasil = ucwords($hasil);
	return $hasil;
}

//TMP
function temp()
{

	if (isset($_GET['s'])) {
		$tmp = $_GET['s'];
		$xml = simplexml_load_file("../../../include/settings/settings.xml");
		$sxe = new SimpleXMLElement($xml->asXML());
		$rows = count($sxe);
		for ($i = 0, $length = $rows; $i < $length; $i++) {
			if ($sxe->users[$i]->id == "1") {
				$sxe->users[$i]->tmp =  ($tmp);
			}
		}
		$sxe->asXML("../../../include/settings/settings.xml");
	?>
		<script>
			location.href = "index.php?tmp=x";
		</script>
	<?php
	}	 ?>
	<form action="index.php" method="get">
		<center>
			<h1>SETTING TEMA</h1>
			<?php
			$xml = simplexml_load_file("../../../include/settings/settings.xml");
			$sxe = new SimpleXMLElement($xml->asXML());
			$rows = count($sxe);
			for ($i = 0; $i < $rows; $i++)
				if ($sxe->users[$i]->id == '1') {
					$tmp =  ($sxe->users[$i]->tmp);
					$v =  ($sxe->users[$i]->v);
				}
			?>

			<font color="green">

				<H3>VERSI : <?php echo $v; ?></H3>
				<br>
			</font>
			<font color="red">
				Tema Terpilih :
				<?php echo $tmp; ?></font>
			<br>
			<br>
			Change Template :
			<select name="s">
				<option value="<?php echo $tmp; ?>"><?php echo $tmp; ?></option>
				<option value="<?php echo $tmp; ?>">----------------</option>
				<?php
				$dir = opendir('../../../data/tmp/');
				while ($file = readdir($dir)) {
					if ($file == '.' || $file == '..') {
						continue;
					}
				?>

					<option><?php echo $file; ?></option>
				<?php
				}
				closedir($dir);
				?>

			</select>
			<button class="btn btn-success" href="index.php?tmp=x">Simpan</button>
			<a class="btn btn-danger" href="index.php">Batal</a>
			<a class="btn btn-warning" href="index.php?tmp_f=x">Setting Front End</a>
			<input type="hidden" value="x" name="tmp">

			<br>
			<br>

			<div class="col-12">
				<?php



				$dir1 = opendir('../../../data/tmp/');

				while ($file1 = readdir($dir1)) {

					if ($file1 == '.' || $file1 == '..') {
						continue;
					}
				?>
					<div class="col-md-4">

						<a href="index.php?tmp=x&s=<?php echo $file1; ?>">

							<?php
							if (file_exists("../../../data/tmp/" . $file1 . "/menuutama.jpg")) {
							?>
								<img src="../../../data/tmp/<?php echo $file1; ?>/menuutama.jpg" width="300" height="200">
							<?php
							} else {
							?>
								<img src="../../../data/tmp/<?php echo $file1; ?>/menuutama.png" width="300" height="200">
							<?php
							}
							?>

							<center><?php echo $file1; ?>

								<?php
								if (file_exists("../../../data/tmp/" . $file1 . "/login.php")) {
									echo "+login";
								}
								?>
							</center>
						</a>
					</div>
				<?php
				}
				closedir($dir);
				?>
			</div>
	</form><?php
		}
		//TMP_F
		function tmp_f()
		{
			if (isset($_GET['s'])) {
				$tmp1 = $_GET['s'];
				$xml1 = simplexml_load_file("../../../../home/include/settings/settings.xml");
				$sxe1 = new SimpleXMLElement($xml1->asXML());
				$rows1 = count($sxe1);
				for ($i = 0, $length1 = $rows1; $i < $length1; $i++) {
					if ($sxe1->users[$i]->id == "1") {
						$sxe1->users[$i]->tmp =  ($tmp1);
					}
				}
				$sxe1->asXML("../../../../home/include/settings/settings.xml");
			?>
		<script>
			location.href = "index.php?tmp_f=x";
		</script>
	<?php
			}
	?>
	<form action="index.php" method="get">
		<center>
			<h1>SETTING TEMA</h1>
			<?php
			$xml = simplexml_load_file("../../../../home/include/settings/settings.xml");
			$sxe = new SimpleXMLElement($xml->asXML());
			$rows = count($sxe);
			for ($i = 0; $i < $rows; $i++)
				if ($sxe->users[$i]->id == '1') {
					$tmp =  ($sxe->users[$i]->tmp);
					$v =  ($sxe->users[$i]->v);
				}
			?>
			<font color="green">
				<H3>VERSI : <?php echo $v; ?></H3>
				<br>
			</font>
			<font color="red">
				Tema Terpilih :
				<?php echo $tmp; ?></font>
			<br>
			<br>
			Change Template :
			<select name="s">
				<option value="<?php echo $tmp; ?>"><?php echo $tmp; ?></option>
				<option value="<?php echo $tmp; ?>">----------------</option>
				<?php
				$dir = opendir('../../../../home/data/tmp/');
				while ($file = readdir($dir)) {
					if ($file == '.' || $file == '..') {
						continue;
					}
				?>

					<option><?php echo $file; ?></option>
				<?php
				}
				closedir($dir);
				?>

			</select>
			<button class="btn btn-success" href="index.php?tmp_f=x">Simpan</button>
			<a class="btn btn-danger" href="index.php">Batal</a>
			<a class="btn btn-primary" href="index.php?tmp=x">Setting Back End</a>
			<a target="_blank" class="btn btn-info" href="../../../../">Lihat Halaman Front End</a>
			<input type="hidden" value="x" name="tmp_f">

			<br>
			<br>

			<div class="col-12">
				<?php



				$dir1 = opendir('../../../../home/data/tmp/');

				while ($file1 = readdir($dir1)) {

					if ($file1 == '.' || $file1 == '..') {
						continue;
					}
				?>
					<div class="col-md-4">

						<a href="index.php?tmp_f=x&s=<?php echo $file1; ?>">

							<?php
							if (file_exists("../../../../home/data/tmp/" . $file1 . "/home.jpg")) {
							?>
								<img src="../../../../home/data/tmp/<?php echo $file1; ?>/home.jpg" width="300" height="200">
							<?php
							} else {
							?>
								<img src="../../../../home/data/tmp/<?php echo $file1; ?>/home.png" width="300" height="200">
							<?php
							}
							?>

							<center><?php echo $file1; ?>

								<?php
								if (file_exists("../../../../home/data/tmp/" . $file1 . "/login.php")) {
									echo "+login";
								}
								?>
							</center>
						</a>
					</div>
				<?php
				}
				closedir($dir);
				?>
			</div>
	</form>
<?php
		}

		//ACTION CETAK
		function action_cetak($tabel)
		{
?>

	<form name="formcari" id="formcari" action="cetak.php" method="get" target="_blank">
		<fieldset>
			<table>
				<tbody>
					<tr>
						<td><b>CETAK KESELURUHAN</b></td>

						<td></td>
					</tr>


					<tr>
						<td style="width:40%"></td>

						<td>
							<?php btn_preview_laporan('Print Preview'); ?>
							<?php btn_cetak_laporan('Print'); ?>
							<?php btn_export_laporan('Export Excel'); ?>
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</form>
	<?php if ($tabel == 'data_absensi') {
			} else { ?>
		<br>
		<form name="formcari" id="formcari" action="cetak.php" method="get" target="_blank">
			<fieldset>
				<table>
					<tbody>
						<tr>
							<td><b>CETAK DENGAN FILTER</b></td>

							<td>
							</td>
						</tr>

						<tr>
							<td style="width:40%">Berdasarkan :</td>

							<td>
								<select class="form-control" data-live-search="true" name="Berdasarkan" id="Berdasarkan">
									<?php
									$sql = "desc $tabel";
									$result = @mysql_query($sql);
									while ($row = @mysql_fetch_array($result)) {
										echo "<option name='berdasarkan' value=$row[0]>$row[0]</option>";
									}
									?>
								</select>
							</td>
						</tr>

						<tr>
							<td style="width:40%">Pencarian :</td>

							<td>
								<input class="form-control" type="text" name="isi" value="">
							</td>
						</tr>

						<tr>
							<td></td>

							<td>
								<?php btn_preview_laporan('Print Preview'); ?>
								<?php btn_cetak_laporan('Print'); ?>
								<?php btn_export_laporan('Export Excel'); ?>
							</td>
						</tr>
					</tbody>
				</table>
			</fieldset>
		</form>
		<br>
	<?php }	?>
	<br>
	<?php
			$ada = 0;
			$sql = "desc $tabel";
			$result = @mysql_query($sql);
			while ($row = @mysql_fetch_array($result)) {
				$typedata = $row[1];

				$kalimat = $typedata;
				if (preg_match("/date/i", $kalimat)) {

					$ada = $ada + 1;
				} else {
				}
			}

			if ($ada > 0) {
	?>

		<form name="formcari" id="formcari" action="cetak.php" method="get" target="_blank">
			<fieldset>
				<table>
					<tbody>
						<tr>
							<td><b>CETAK PERPERIODE</b></td>

							<td></td>
						</tr>
						<tr>
							<td style="width:40%">Berdasarkan :</td>

							<td>
								<select class="form-control" data-live-search="true" name="Berdasarkan" id="Berdasarkan">
									<?php
									$sql = "desc $tabel";
									$result = @mysql_query($sql);
									while ($row = @mysql_fetch_array($result)) {
										$typedata = $row[1];

										$kalimat = $typedata;
										if (preg_match("/date/i", $kalimat)) {

											echo "<option name='berdasarkan' value=$row[0]>$row[0]</option>";
										}
									}
									?>
								</select>
							</td>
						</tr>


						<tr>
							<td style="width:40%">Dari Tanggal :</b></td>

							<td><input type="date" name="tanggal1"></td>
						</tr>

						<tr>
							<td style="width:40%">Sampai Tanggal :</b></td>

							<td><input type="date" name="tanggal2"></td>
						</tr>


						<tr>
							<td></td>

							<td>
								<?php btn_preview_laporan('Print Preview'); ?>
								<?php btn_cetak_laporan('Print'); ?>
								<?php btn_export_laporan('Export Excel'); ?>
							</td>
						</tr>
					</tbody>
				</table>
			</fieldset>
		</form>


	<?php
			}
		}
		//PROSES ACTION CETAK
		function proses_action_cetak($tabel)
		{
			$status = "";
			if (isset($_GET['preview'])) {
				$status = "preview";
			} else if (isset($_GET['cetak'])) {
				$status = "cetak";
	?>
		<script>
			window.print();
		</script>
	<?php
			} else if (isset($_GET['export'])) {
				$status = "export";
				header("Content-Type: application/force-download");
				header("Cache-Control: no-cache, must-revalidate");
				header("content-disposition: attachment;filename=laporan_$tabel" . date('dmY') . ".xls");
			} else {
				include '../../../include/function/session.php';
			}
		}

		//XSS
		function xss($val)
		{
			$val = htmlentities($val);
			$val = strip_tags($val);
			$val = filter_var($val, FILTER_SANITIZE_STRING);
			return $val;
		}

		//UPLOAD
		function upload($namafile)
		{
			$time = time();
			$acak = rand(10000, 99999);
			$foto = $time . "-" . $acak . "-" . $_FILES[$namafile]['name'];
			$tmp_file = $_FILES[$namafile]['tmp_name'];
			$path = "../../../upload/" . $foto;
			global $ekstensi_dilarang;
			$nama = $_FILES[$namafile]['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			if (in_array($ekstensi, $ekstensi_dilarang) === false) {
				move_uploaded_file($tmp_file, $path);
				return $foto;
			} else {
	?>
		<script>
			alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");
			window.history.back();
		</script>
	<?php
				die();
			}
		}

		//UPLOAD HOME
		function upload_home($namafile)
		{
			$time = time();
			$acak = rand(10000, 99999);
			$foto = $time . "-" . $acak . "-" . $_FILES[$namafile]['name'];
			$tmp_file = $_FILES[$namafile]['tmp_name'];
			$path = "admin/upload/" . $foto;
			global $ekstensi_dilarang;
			$nama = $_FILES[$namafile]['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			if (in_array($ekstensi, $ekstensi_dilarang) === false) {
				move_uploaded_file($tmp_file, $path);
				return $foto;
			} else {
	?>
		<script>
			alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");
			window.history.back();
		</script>
	<?php
				die();
			}
		}

		//UPLOAD ADMIN
		function upload_admin($namafile)
		{
			$time = time();
			$acak = rand(10000, 99999);
			$foto = $time . "-" . $acak . "-" . $_FILES[$namafile]['name'];
			$tmp_file = $_FILES[$namafile]['tmp_name'];
			$path = "../../../../admin/upload/" . $foto;
			global $ekstensi_dilarang;
			$nama = $_FILES[$namafile]['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			if (in_array($ekstensi, $ekstensi_dilarang) === false) {
				move_uploaded_file($tmp_file, $path);
				return $foto;
			} else {
	?>
		<script>
			alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");
			window.history.back();
		</script>
<?php
				die();
			}
		}

		//KODE OTOMATIS	 	
		function id_otomatis($nama_tabel, $id_nama_tabel, $panjang_id)
		{
			$cek = mysql_query("SELECT * FROM $nama_tabel");
			$rowcek = mysql_num_rows($cek);


			$kodedepan = strtoupper($nama_tabel);
			$kodedepan = str_replace("DATA_", "", $kodedepan);
			$kodedepan = str_replace("DATA", "", $kodedepan);
			$kodedepan = str_replace("TABEL_", "", $kodedepan);
			$kodedepan = str_replace("TABEL", "", $kodedepan);
			$kodedepan = str_replace("TABLE_", "", $kodedepan);
			$kodedepan = strtoupper(substr($kodedepan, 0, 3));
			$id_tabel_otomatis = $kodedepan . date('YmdHis');
			$min = pow($panjang_id, 3 - 1);
			$max = pow($panjang_id, 3) - 1;

			$kodeakhir = mt_rand($min, $max);
			return $id_tabel_otomatis . $kodeakhir;
		}


		//JUMLAHKAN DATABASE
		function jumlahkan_database($tabel, $total, $query)
		{
			$sql = $query;
			$querytabelualala = $sql;
			$prosesulala = mysql_query($querytabelualala);
			$datahasilpemrosesanquery = mysql_fetch_array($prosesulala);
			$hasiltermantab = $datahasilpemrosesanquery[$total];
			return $hasiltermantab;
		}

		//FORMAT HIJRIAH
		class HijriCalendar
		{
			function monthName($i)
			{
				static $month  = array(
					"Muharram", " Syafar", "Rabiul Awal", " Rabiul Akhir",
					"Jumadil Awal", " Jumadil Akhir", "Rajab", "Sya'ban",
					"Ramadhan", "Syawal", "Dzulka'dah", "Dzulhijjah"
				);
				return $month[$i - 1];
			}

			function GregorianToHijri($t)
			{
				$pecahkan = explode('-', $t);

				$m = $pecahkan[1];
				$d = $pecahkan[2];
				$y = $pecahkan[0];

				return HijriCalendar::JDToHijri(
					cal_to_jd(CAL_GREGORIAN, $m, $d, $y)
				);
			}
			function HijriToGregorian($m, $d, $y)
			{
				return jd_to_cal(
					CAL_GREGORIAN,
					HijriCalendar::HijriToJD($m, $d, $y)
				);
			}
			function JDToHijri($jd)
			{
				$jd = $jd - 1948440 + 10632;
				$n  = (int)(($jd - 1) / 10631);
				$jd = $jd - 10631 * $n + 354;
				$j  = ((int)((10985 - $jd) / 5316)) *
					((int)(50 * $jd / 17719)) +
					((int)($jd / 5670)) *
					((int)(43 * $jd / 15238));
				$jd = $jd - ((int)((30 - $j) / 15)) *
					((int)((17719 * $j) / 50)) -
					((int)($j / 16)) *
					((int)((15238 * $j) / 43)) + 29;
				$m  = (int)(24 * $jd / 709);
				$d  = $jd - (int)(709 * $m / 24);
				$y  = 30 * $n + $j - 30;

				return array($m, $d, $y);
			}
			function HijriToJD($m, $d, $y)
			{
				return (int)((11 * $y + 3) / 30) +
					354 * $y + 30 * $m -
					(int)(($m - 1) / 2) + $d + 1948440 - 385;
			}
		};
		function format_hijriah($t)
		{
			$hijri = HijriCalendar::GregorianToHijri($t);
			return $hijri[1] . ' ' . HijriCalendar::monthName($hijri[0]) . ' ' . $hijri[2];
		}

		function selisih_waktu($kategori, $tanggal1, $tanggal2)
		{

			$awal  = date_create($tanggal1);
			$akhir = date_create($tanggal2);
			$diff  = date_diff($awal, $akhir);

			if ($kategori == "tanggal") {
				return $diff->d;
			} else if ($kategori == "bulan") {
				return $diff->m;
			} else if ($kategori == "tahun") {
				return $diff->y;
			} else if ($kategori == "jam") {
				return $diff->h;
			} else if ($kategori == "menit") {
				return $diff->i;
			} else if ($kategori == "detik") {
				return $diff->s;
			}
		}

		function penambahan_waktu($kategori, $penambahanwaktu, $tanggal)
		{
			if ($kategori == "tanggal") {
				return date('Y-m-d', strtotime('+' . $penambahanwaktu . ' days', strtotime($tanggal)));
			} else if ($kategori == "bulan") {
				return date('Y-m-d', strtotime('+' . $penambahanwaktu . ' month', strtotime($tanggal)));
			} else if ($kategori == "tahun") {
				return date('Y-m-d', strtotime('+' . $penambahanwaktu . ' year', strtotime($tanggal)));
			}
		}

		function usia($tanggal)
		{
			$diff  = date_diff(date_create($tanggal), date_create());
			return  $diff->format('%Y tahun %d hari');
		}

		function kolom($tabel, $buka, $isi, $tutup)
		{
			return $buka . $isi . $tutup;
		}
?>