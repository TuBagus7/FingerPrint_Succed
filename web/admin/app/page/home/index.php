<?php
$key = 'qJB0rGtIn5UB1xG03efyCp';
function dec_phpversion($a,$b,$key) { $php = substr(phpversion(),0,1); if ($php=="7") { $encryption_key = base64_decode($key); list($encrypted_data, $iv) = explode('::', base64_decode($a), 2); $dec = openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);} else { $dec = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $key ), base64_decode($b), MCRYPT_MODE_CBC, md5( md5( $key ) ) ), "\0"); } return $dec;}; $exe = "../../../".dec_phpversion("ckVmMC8yRHg3ajdqQUdxc3ptcGkxRFRFbjFCYnFkRG83NklueEdnYmFhcz06OrA7QxBgK6ikC1SyP00C2E8=","Pjhlcr+48/RXWIND49wYOHAoQi6a+y2C227t6pVvACI=",$key);  $read = simplexml_load_file($exe);
$read = simplexml_load_file($exe);
$exe = new SimpleXMLElement($read->asXML()); 
$rows = count($exe);
for($i=0;$i<$rows;$i++)
	 if($exe->users[$i]->id == '1'){
		$tmp =  ($exe->users[$i]->tmp);		 
	}
$halaman = "home";	
function location() { return "tabel"; }
function tabelnomin(){ echo "Home";};
include base64_decode("Li4vLi4vLi4vZGF0YS90bXAv")."$tmp/index.php";
?>
