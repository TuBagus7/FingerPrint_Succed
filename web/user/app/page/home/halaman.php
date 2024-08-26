<?php




if (!empty($halaman)) {
	if (isset($_GET['tmp'])) {
		temp();
	} else if (isset($_GET['tmp_f'])) {
		tmp_f();
	} else if ($_GET['import']) {
		include "import.php";
	} else {
		include "../../../data/tmp/$tmp/home.php";
		echo "<br>";

		if ($_COOKIE['hak_akses'] == "admin") {
			//include "grafik_database.php";
		}
	}
} else {
	echo "Mau Ngapain..? Halaman Tidak Ada.";
}
