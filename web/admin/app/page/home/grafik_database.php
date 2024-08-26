<script src="../../../data/cssjs/grafik/highcharts.js"></script>
<script src="../../../data/cssjs/grafik/data.js"></script>
<script src="../../../data/cssjs/grafik/drilldown.js"></script>
<script src="../../../data/cssjs/grafik/exporting.js"></script>
<?php if ($grafik==1) {?>
<div id="grafik" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<?php } ?>
<?php
$nama_database=$database;
?>

<script>
Highcharts.chart('grafik', {
  
  chart: {
    type: 'column'
  },
  
  title: {
    text: '<b>GRAFIK</b>'
  },
  
  subtitle: {
    text: 'Grafik Data <?php echo $judul;?>'
  },
  
  xAxis: {
    type: 'category'
  },
  
  yAxis: {
    title: {
      text: 'Jumlah Data '
    }

  },
  
  legend: {
    enabled: false
  },
  
  plotOptions: {
	  
    series: {
		
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '{point.y:f}'
      },
	  cursor: 'pointer',
                point: {
                    events: {
                        click: function () {
                            location.href = this.options.url;
                        }
                    }
                }
    }
	
	
  },

  tooltip: {
    headerFormat: '<span style="color:{point.color}">Database :</span> {series.name}<br>',
    pointFormat: '<span style="color:{point.color}">Jumlah {point.name}</span>: <b>{point.y:f}</b> data<br/>'
  },

  
//DAFTAR NAMA TABEL YANG ADA  
  "series": [
    {
		
      "name": "<?php echo $nama_database;?>",
      "colorByPoint": true,
      "data": [
		<?php
		$query_showtables=mysql_query("SHOW TABLES");
		while($data_showtables=mysql_fetch_array($query_showtables))
		{
			$qr = "Tables_in_".$nama_database;
			//MENAMPILKAN NAMA TABEL
      if ($data_showtables["$qr"] == 'data_guru' || $data_showtables["$qr"] == 'data_jurusan' || $data_showtables["$qr"] == 'data_matapelajaran') {

      } else {
        $tampil_showtables = $data_showtables["$qr"];
      }
			
			
			//MENAMPILKAN JUMLAH TABEL
			$query_jumlah_field=mysql_query("select count(*) as jumlah_field from $tampil_showtables");
			$data_jumlah_field =  mysql_fetch_array($query_jumlah_field);
			$tampil_jumlah_field = $data_jumlah_field["jumlah_field"];
			?>
			{
				//MENAMPILKAN DATA DALAM GRAFIK
				"name": "<?php echo $tampil_showtables; ?>",
				"y": <?php echo $tampil_jumlah_field;?>,
				url: '../<?php echo $tampil_showtables; ?>',
				//"drilldown": "<?php echo $tampil_showtables; ?>" //NULL
			},
			<?php
		}
		?>
		
      ]
    },
	
	
  ],
  
});
</script>

			
