<?php
$key = "FAJAR-RIDIKC-5!4!!73&)!0&";

	function encrypt($str) {
		global $key;
		$hasil = '';
		$kunci = md5($key);
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)+ord($kuncikarakter));
			$hasil .= $karakter;
			
		}
		$hasil = base64_encode($hasil);
		$hasil = urlencode($hasil);
		$hasil = str_replace('%','xxx',$hasil);
		$hasil = str_replace('&','yyy',$hasil);
		$hasil = str_replace('+','zzz',$hasil);
		
		return ($hasil);
	}
	 
	function decrypt($str) {
		global $key;
		$str = str_replace('xxx','%',$str);
		$str = str_replace('yyy','&',$str);
		$str = str_replace('zzz','+',$str);
		$str = base64_decode(urldecode($str));
		$hasil = '';
		$kunci = md5($key);
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)-ord($kuncikarakter));
			$hasil .= $karakter;
			
		}
		return $hasil;
	}
	function encryptIt($str) {
		$key = "RQ";
		$hasil = '';
		$kunci = md5($key);
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)+ord($kuncikarakter));
			$hasil .= $karakter;
			
		}
		$hasil = base64_encode($hasil);
		$hasil = urlencode($hasil);
		$hasil = str_replace('%','xxx',$hasil);
		$hasil = str_replace('&','yyy',$hasil);
		$hasil = str_replace('+','zzz',$hasil);
		
		return ($hasil);
	}

	function decryptIt($str) {
        $key = "RQ";
		$str = str_replace('xxx','%',$str);
		$str = str_replace('yyy','&',$str);
		$str = str_replace('zzz','+',$str);
		$str = base64_decode(urldecode($str));
		$hasil = '';
		$kunci = md5($key);
		for ($i = 0; $i < strlen($str); $i++) {
			$karakter = substr($str, $i, 1);
			$kuncikarakter = substr($kunci, ($i % strlen($kunci))-1, 1);
			$karakter = chr(ord($karakter)-ord($kuncikarakter));
			$hasil .= $karakter;
			
		}
		return $hasil;
}
	?>