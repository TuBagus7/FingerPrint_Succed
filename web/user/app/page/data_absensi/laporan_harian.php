 <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new.css">
 <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new2.css">
 <table border="0" style="width: 100%">
     <tr>
         <td class="auto-style1" rowspan="3" width="101">
             <img alt="" height="100" src="<?php echo $logo_laporan1; ?>" width="100">
         </td>

         <td class="auto-style1">
             <center>
                 <h2 class="auto-style1"><?php echo $judul; ?></h2>
             </center>
         </td>

         <td class="auto-style1" rowspan="3" width="101">
             <img alt="" height="100" src="<?php echo $logo_laporan2; ?>" width="100">
         </td>
     </tr>


     <tr>
         <td class="auto-style2">
             <center>
                 <strong>LAPORAN

                     <?php
                        $tabelnya = "data_absensi";
                        $tabelnya = str_replace("_", " ", $tabelnya);
                        $tabelnya = str_replace("data", "", $tabelnya);
                        $tabelnya = strtoupper($tabelnya);
                        echo $tabelnya;
                        ?>

                 </strong>
             </center>
         </td>
     </tr>

     <tr>
         <td class="auto-style2"><?php echo $alamat; ?></td>
     </tr>
 </table>
 <form method="GET">
     <label for="tanggal">Filter Perbulan:</label>

     <input type="hidden" name="Berdasarkan" value="tanggal">

     <input type="date" id="tanggal1" name="tanggal1">
     <input type="date" id="tanggal2" name="tanggal2">
     <input type="submit" value="Filter">
     <a href="print1.php" class="btn btn-success">Tampilkan Absensi Hari Ini</a>
     <a href="print2.php" class="btn btn-danger">Akumulasi Kehadiran</a>
 </form>
 <table>
     <thead>
         <tr>
             <th>No.</th>
             <th>Nama User</th>
             <th>Tanggal</th>
             <th>Waktu Masuk</th>
         </tr>
     </thead>
     <tbody>
     <tbody>
         <?php
            $no = 0;
            $startRow = ($page - 1) * $dataPerPage;
            $no = $startRow;

            $id_mahasiswa = decrypt($_COOKIE['kodene']);
            if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi'])) {
                $berdasarkan = mysql_real_escape_string($_GET['Berdasarkan']);
                $isi = mysql_real_escape_string($_GET['isi']);
                $querytabel = "SELECT * FROM data_absensi where $berdasarkan like '%$isi%' AND id_mahasiswa='$id_mahasiswa' ";
            } else if (isset($_GET['tanggal1']) && !empty($_GET['tanggal1'])) {
                $berdasarkan = mysql_real_escape_string($_GET['Berdasarkan']);
                $tanggal1 = mysql_real_escape_string($_GET['tanggal1']);
                $tanggal2 = mysql_real_escape_string($_GET['tanggal2']);
                $tanggal1_indo = format_indo($tanggal1);
                $tanggal2_indo = format_indo($tanggal2);
                $querytabel = "SELECT * FROM data_absensi where ($berdasarkan BETWEEN '$tanggal1' AND '$tanggal2') AND id_mahasiswa='$id_mahasiswa'";
            } else {
                $querytabel = "SELECT * FROM data_absensi WHERE id_mahasiswa='$id_mahasiswa'  LIMIT $startRow ,$dataPerPage";
            }
            $proses = mysql_query($querytabel);
            while ($data = mysql_fetch_array($proses)) {
            ?>
             <tr>
                 <td>
                     <?php $no = (($no + 1));
                        echo $no; ?>
                 </td>
                 <td><?php echo baca_database("", "nama", "select * from data_mahasiswa where id_mahasiswa='$data[id_mahasiswa]'")  ?></td>
                 <td><?= $data['tanggal']; ?></td>
                 <td><?= $data['jam']; ?></td>
             </tr>
         <?php } ?>
     </tbody>
 </table>
 <style>
     table {
         width: 100%;
         border-collapse: collapse;
     }

     th,
     td {
         border: 1px solid #ddd;
         padding: 8px;
         text-align: left;
     }

     th {
         background-color: #f2f2f2;
     }
 </style>