 <?php
	include '../include/all_include.php';

	if (isset($_POST["login"])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = mysql_real_escape_string($username);
		$password = md5(mysql_real_escape_string($password));
		$r = mysql_query("select * from data_mahasiswa where password='$password' and username='$username'");
		$data = mysql_fetch_array($r);
		if (empty($username) && empty($password)) {
			simpan_gagal();
			echo "<script>alert('$pesan_gagal');</script>";
	?><script>
 			location.href = "<?php index(); ?>";
 		</script><?php
				} else if (empty($username)) {
					simpan_gagal();
					echo "<script>alert('$pesan_gagal');</script>";
					?><script>
 			location.href = "<?php index(); ?>";
 		</script><?php
				} else if (empty($password)) {
					simpan_gagal();
					echo "<script>alert('$pesan_gagal');</script>";
					?><script>
 			location.href = "<?php index(); ?>";
 		</script><?php
				} else
if (mysql_num_rows($r) == 1) {
					kosongkan_gagal();

					$jenenge = encrypt($data["username"]);
					setcookie('jenenge', $jenenge, time() + (6000 * 6000), '/');
					$kodene = encrypt($data["id_mahasiswa"]);
					setcookie('kodene', $kodene, time() + (6000 * 6000), '/');

					$ip = $_SERVER['REMOTE_ADDR'];
					$useragent = $_SERVER['HTTP_USER_AGENT'];
					$token = sha1($ip . $useragent . $key);
					$token = crypt($token, $key);
					setcookie('token', $token, time() + (6000 * 6000), '/');
					echo "<script> window.location = '../'</script>";
				} else {
					simpan_gagal();
					echo "<script>alert('$pesan_gagal');</script>";
					?><script>
 			location.href = "<?php index(); ?>";
 		</script><?php
				}
			}



			//GAGAL
			function simpan_gagal()
			{
				if (isset($_COOKIE['gagal'])) {
					$gagal = $_COOKIE['gagal'] + 1;
				} else {
					$gagal = 1;
				}
				setcookie('gagal', $gagal, time() + (6000 * 6000), '/');



				if ($gagal >= 3) {
					?>


 		<div id="pesan"></div>
 		<script src="../data/cssjs/jquery/jquery.js"></script>
 		<script>
 			var url = "index.php?gagal=0"; // url tujuan
 			var count = 30 // dalam detik
 			function countDown() {
 				if (count > 0) {
 					count--;
 					var waktu = count + 1;
 					$('#pesan').html('<br><br><br><br><br><br><br><br><br><br><br><center><h3>Anda Telah Salah Memasukkan Password 3x <br> Akses Diblokir Sementara <br> Anda Akan Dapat Kembali Login Dalam ' + waktu + ' detik. </h3>');
 					setTimeout("countDown()", 1000);
 				} else {
 					window.location.href = url;
 				}
 			}
 			countDown();
 		</script>

 	<?php
					die();
				}
			}

			function kosongkan_gagal()
			{
				if (isset($_COOKIE['gagal'])) {
					setcookie('gagal', '', 0, '/');
				}
			}

			if (isset($_GET["gagal"])) {
				setcookie('gagal', "0", time() + (6000 * 6000), '/');
		?><script>
 		location.href = "<?php index(); ?>";
 	</script><?php
			}
				?>