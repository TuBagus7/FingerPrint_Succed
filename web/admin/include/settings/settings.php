
<?php
$key = 'qJB0rGtIn5UB1xG03efyCp';
if(function_exists('location'))
{
	if (location()=="admin")
	{
		$file = "include/settings/settings.xml";					
	}
	else if (location()=="login")
	{
		$file = "../include/settings/settings.xml";
	}
	else if (location()=="tabel")
	{
		$file = "../../../include/settings/settings.xml";
	}
	else if (location()=="cetak")
	{
		$file = "../../../include/settings/settings.xml";
	}
	else if (location()=="home")
	{
		$file = "admin/include/settings/settings.xml";
	}
	else if (location()=="api")
	{
		$file = "../../../../admin/include/settings/settings.xml";
	}
	else if (location()=="frame")
	{
		$file = "../../../admin/include/settings/settings.xml";
	}
	else
	{
		die();
	}
}
else
{
		$file = "../../../include/settings/settings.xml";							 
}

$read = simplexml_load_file($file); 
$exe = new SimpleXMLElement($read->asXML()); 
$rows = count($exe);
for($i=0;$i<$rows;$i++)
if($exe->users[$i]->id == '1'){
	
// Meta
$charset= $exe->users[$i]->charset;
$keywords= decryptIt($exe->users[$i]->keywords);
$description= decryptIt($exe->users[$i]->description);
$Author= decryptIt($exe->users[$i]->Author);
$icon=$exe->users[$i]->icon;
$situs= decryptIt($exe->users[$i]->situs);

// Settings Aplikasi
$logo = $exe->users[$i]->logo;
$imageerror = $exe->users[$i]->imageerror;
$avatar = $exe->users[$i]->avatar;
$background = $exe->users[$i]->background;
$bg_login = $exe->users[$i]->bg_login;

$slide1 = $exe->users[$i]->slide1;
$slide2 = $exe->users[$i]->slide2;
$slide3 = $exe->users[$i]->slide3;

$judul = $exe->users[$i]->judul;		 
$objek = $exe->users[$i]->objek;
$alamat = $exe->users[$i]->alamat;
$telepon = $exe->users[$i]->telepon;
$email = $exe->users[$i]->email;

$facebook = $exe->users[$i]->facebook;
$google = $exe->users[$i]->google;
$twitter = $exe->users[$i]->twitter;
$instagram = $exe->users[$i]->instagram;
$linkedin = $exe->users[$i]->linkedin;
$youtube = $exe->users[$i]->youtube;
$maps_x = $exe->users[$i]->maps_x;
$maps_y = $exe->users[$i]->maps_y;

$nama_aplikasi = $exe->users[$i]->nama_aplikasi;
$keterangan_aplikasi = $exe->users[$i]->keterangan_aplikasi;
$tahun =  $exe->users[$i]->tahun;
$copyright =  $exe->users[$i]->copyright;
$c_siapa =  $exe->users[$i]->c_siapa;
if (empty($_COOKIE["$c_siapa"]))
{
	$siapa = $exe->users[$i]->siapa;
}
else
{
	$siapa = decrypt($_COOKIE["$c_siapa"]);
}
$sambutan = str_replace('br', '<br>', $exe->users[$i]->sambutan);
$sambutan = str_replace('siapa',$siapa,$sambutan);
$sambutan = str_replace('judul',$judul,$sambutan);

//Setting Tampilan
$meta_head = $exe->users[$i]->meta_head;
$combosearch = $exe->users[$i]->combosearch;
$grafik = $exe->users[$i]->grafik;
$kata_sambutan = $exe->users[$i]->kata_sambutan;
$gambar_background = $exe->users[$i]->gambar_background;
$menu_setting = $exe->users[$i]->menu_setting;
$menu_admin = $exe->users[$i]->menu_admin;
$ckeditor = $exe->users[$i]->ckeditor;
$popup = $exe->users[$i]->popup;
$seo = $exe->users[$i]->seo;
$ekstensi_dilarang	= array($exe->users[$i]->ekstensi_dilarang);
$class= $exe->users[$i]->classe;

//setting laporan
$logo_laporan1 = $exe->users[$i]->logo_laporan1;
$logo_laporan2 = $exe->users[$i]->logo_laporan2;
$ttd = $exe->users[$i]->ttd."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
$array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
$hari = $array_hari[date("N")];
$tanggal = date ("j");
$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bulan = $array_bulan[date("n")];
$tahun = date("Y");
$formatwaktu = $exe->users[$i]->wilayah.", " . $hari . " " . $tanggal . " " . $bulan . " " . $tahun; 

//login	
$tabel_login = $exe->users[$i]->tabel_login;
$field_username_login = $exe->users[$i]->field_username_login;
$field_password_login = $exe->users[$i]->field_password_login;
$pesan_gagal = $exe->users[$i]->pesan_gagal;
$url_desain = $exe->users[$i]->url_desain;

}

function sambutan(){ 
	global $sambutan;
	echo $sambutan;
	};
	
function index(){
	global $url_index;
	$url_index = "index.php";
	echo $url_index;
	};
	
function admin(){
	global $url_admin;
	$url_admin = "app";
	echo $url_admin;
	};
	
function home(){
	echo "../home/index.php";
	};
	
function logout(){
	echo "../../../login/logout.php";
	};
	
function go_index_halaman(){
	?>
<script>
    location.href = "index.php";
</script>
<?php
	};
	
?>