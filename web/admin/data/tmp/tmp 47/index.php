<?php 
    $url = '../../../data/tmp/tmp 47/vali-admin-master/';
    include '../../../include/all_include.php';
    include '../../../include/function/session.php'; 
	?>

    <link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <header class="app-header"><a class="app-header__logo" href="">Page <?php echo $siapa;?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
           
            <li><a class="dropdown-item" href="<?php home();?>"><i class="fa fa-user fa-lg"></i> Home</a></li>
            <li><a class="dropdown-item" href="<?php logout();?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo $avatar;?>" width="50" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?php echo $siapa;?></p>
          <p class="app-sidebar__user-designation">Halaman <?php tabelnomin();?></p>
        </div>
      </div>
      <ul class="app-menu">
      
        
		<!-- MENU -->
                <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                <!-- SINGLE -->
              
				
				  <li><a class="app-menu__item" href="<?php echo $i->l;?>"><i class="app-menu__icon <?php echo $i->i;?>"></i><span class="app-menu__label"><?php echo $i->n;?></span></a></li>
				
                <!-- /SINGLE -->
            <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                <!-- MULTI -->

			
			
			<li class="treeview"><a class="app-menu__item" href="<?php echo $i->l;?>" data-toggle="treeview"><i class="app-menu__icon <?php echo $i->i;?>"></i><span class="app-menu__label"><?php echo $i->n;?></span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
           
            
			
			 <?php
		$m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
     <?php if ($i1->n == 'Data Absensi') { ?> 
      <li>
      <a class="treeview-item" target="_blank" href="<?php echo $i1->l;?>">
      <i class="icon fa fa-circle-o"></i> <?php echo $i1->n;?></a>
    </li>
      <?php } else { ?>
		 <li>
      <a class="treeview-item" href="<?php echo $i1->l;?>">
      <i class="icon fa fa-circle-o"></i> <?php echo $i1->n;?></a>
    </li>
                        
                        <?php } } } ?>
			
          </ul>
        </li>
        

            <!-- /MULTI -->
            <?php }} ?>
 <!-- /MENU -->
		
		</ul>
    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> <?php tabelnomin();?></h1>
          <p> <?php echo ucwords($judul); ?></p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href=""><?php tabelnomin();?></a></li>
        </ul>
      </div>
      
     <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <?php include 'halaman.php'; ?>
          </div>
        </div>
      </div>
	  
	  
	   <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <?php echo $copyright; ?>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo $url;?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $url;?>js/popper.min.js"></script>
    <script src="<?php echo $url;?>js/bootstrap.min.js"></script>
    <script src="<?php echo $url;?>js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo $url;?>js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?php echo $url;?>js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]
      
      var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      var lineChart = new Chart(ctxl).Line(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>	