 <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new.css">
 <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new2.css">
 <?php
    include '../../../include/all_include.php';



    ?>
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

 <div style="overflow-x:auto;">
     <table <?php tabel(100, '%', 1, 'left'); ?>>
         <tr>

             <th>No</th>
             <!--h <th>Id Absensi </th> h-->
             <th align="center" class="th_border cell">Tanggal </th>
             <th align="center" class="th_border cell">Jam </th>


         </tr>

         <tbody>
             <?php
                $id_mahasiswa = $_GET['id_mahasiswa'];
                $no = 0;
                $startRow = ($page - 1) * $dataPerPage;
                $no = $startRow;

                if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi'])) {
                    $berdasarkan = mysql_real_escape_string($_GET['Berdasarkan']);
                    $isi = mysql_real_escape_string($_GET['isi']);
                    $querytabel = "SELECT * FROM data_absensi where $berdasarkan like '%$isi%' AND id_mahasiswa='$id_mahasiswa' ";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_absensi where $berdasarkan like '%$isi%'";
                } else {
                    $querytabel = "SELECT * FROM data_absensi WHERE id_mahasiswa='$id_mahasiswa' ";
                }
                $proses = mysql_query($querytabel);
                while ($data = mysql_fetch_array($proses)) {
                ?>
                 <tr class="event2">



                     <td align="center" width="50"><?php $no = (($no + 1));
                                                    echo $no; ?></td>

                     <td align="center"><?php echo format_indo($data['tanggal']); ?></td>
                     <td align="center"><?php echo ($data['jam']); ?></td>


                 </tr>
             <?php } ?>
         </tbody>
     </table>
 </div>