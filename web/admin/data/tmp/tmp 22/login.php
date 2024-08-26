<?php
 
$default_url = '../data/tmp/tmp 22';
$tema = '22-dashgumfree_v2';
$url = $default_url.'/'.$tema;
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../include/function/login.php';?>    
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <link href="<?php echo $url;?>/assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $url;?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo $url;?>/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo $url;?>/assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>
	  <div id="login-page">
	  	<div class="container">
		      <form class="form-login" action="" method="post">
		        <h2 class="form-login-heading">Form Login</h2>
		        <div class="login-wrap">
		            <input type="text" name="username" class="form-control" placeholder="User ID" autofocus>
		            <br>
		            <input type="password" name="password" class="form-control" placeholder="Password">
		            
		            <br>
					 <a href ="../../" class="btn btn-default" type="button">Cancel</a>
		                          <input name="login" class="btn btn-theme" type="submit" value="Login">
		            <hr>
		        </div>
		
		         
		      </form>	  	
	  	
	  	</div>
	  </div>


    <script src="<?php echo $url;?>/assets/js/jquery.js"></script>
    <script src="<?php echo $url;?>/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $url;?>/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo $bg_login;?>", {speed: 500});
    </script>
  </body>

</html>
