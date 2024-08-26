
	<?php
$default_url = '../data/tmp/tmp 47';
$tema = 'vali-admin-master/';
$url = $default_url.'/'.$tema;
?>
<?php include '../include/function/login.php';?>


    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h5> <?php echo ucwords($judul); ?></h5>
      </div>
      <div class="login-box">
        <form class="login-form" action="" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>FORM LOGIN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input  class="form-control" name="username" type="text" placeholder="Username">
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input type="password" name="password" class="form-control" placeholder="Password" >
          </div>
          <div class="form-group">
            <div class="utility">
              
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="submit" type='submit' name="login" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGIN</button>
			
			<a href="../../" class="btn btn-primary btn-block"><i class="fa fa-sign-out fa-lg fa-fw"></i>CANCEL</a>
							
          </div>
        </form>
       
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo $url;?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $url;?>js/popper.min.js"></script>
    <script src="<?php echo $url;?>js/bootstrap.min.js"></script>
    <script src="<?php echo $url;?>js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo $url;?>js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>