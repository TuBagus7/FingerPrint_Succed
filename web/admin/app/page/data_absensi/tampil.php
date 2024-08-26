<?php

function hari_ini()
{
    $hari = date("D");

    switch ($hari) {
        case 'Sun':
            $hari_ini = "minggu";
            break;

        case 'Mon':
            $hari_ini = "senin";
            break;

        case 'Tue':
            $hari_ini = "selasa";
            break;

        case 'Wed':
            $hari_ini = "rabu";
            break;

        case 'Thu':
            $hari_ini = "kamis";
            break;

        case 'Fri':
            $hari_ini = "jumat";
            break;

        case 'Sat':
            $hari_ini = "sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return $hari_ini;
}

$hari_ini = hari_ini();
$id_guru = $_COOKIE['id'];
$cek = cek_database("", "", "", "select * from data_jadwal where hari='$hari_ini' and id_guru ='$id_guru'");
// if ($id_guru == "admin")
// {
//     $cek = "ada";
// }
// if ($cek == "ada") {
?>

<body>
    <a href="<?php index(); ?>?input=tambah">
        <?php btn_tambah('Tambah Status Absensi Khusus'); ?>
    </a>

    <a target="blank" href="cetak.php?berdasarkan=data_absensi&jenim=xls&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
        <?php btn_export('Export Excel'); ?>
    </a>

    <a target="blank" href="cetak.php?berdasarkan=data_absensi&jenim=print&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
        <?php btn_cetak('Cetak'); ?>
    </a>

    <a href="<?php index(); ?>">
        <?php btn_refresh('Refresh Data'); ?>
    </a>


    <br><br>

    <form name="formcari" id="formcari" action="" method="get">
        <fieldset>
            <table>
                <tbody>
                    <tr>
                        <td>Berdasarkan</td>
                        <td>:</td>
                        <td>
                            <!-- <input value="" name="Berdasarkan" id="Berdasarkan" > -->
                            <select class="form-control selectpicker" data-live-search="true" name="Berdasarkan" id="Berdasarkan">
                                <?php
                                $sql = "desc data_absensi";
                                $result = @mysql_query($sql);
                                while ($row = @mysql_fetch_array($result)) {
                                    echo "<option name='berdasarkan' value=$row[0]>$row[0]</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Pencarian</td>
                        <td>:</td>
                        <td>
                            <!--<input class="form-control" type="text" name="isi" value="" >--> <input type="text" name="isi" value="">
                            <?php btn_cari('Cari'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>

    <div style="overflow-x:auto;">
        <table <?php tabel(100, '%', 1, 'left'); ?>>
            <tr>

                <th>No</th>
                <!--h <th>Id Absensi </th> h-->
                <th align="center" class="th_border cell">Tanggal </th>
                <th align="center" class="th_border cell">Jam </th>
                <th align="center" class="th_border cell">Fingerprint </th>
                <th align="center" class="th_border cell">Nama </th>
                <!-- <th align="center" class="th_border cell">Kelas </th> -->
                <!-- <th align="center" class="th_border cell">Status </th> -->

            </tr>

            <tbody>
                <?php
                $no = 0;
                $startRow = ($page - 1) * $dataPerPage;
                $no = $startRow;

                if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi'])) {
                    $berdasarkan = mysql_real_escape_string($_GET['Berdasarkan']);
                    $isi = mysql_real_escape_string($_GET['isi']);
                    $querytabel = "SELECT * FROM data_absensi where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_absensi where $berdasarkan like '%$isi%'";
                } else {
                    $querytabel = "SELECT * FROM data_absensi  LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_absensi";
                }
                $proses = mysql_query($querytabel);
                while ($data = mysql_fetch_array($proses)) {
                ?>
                    <tr class="event2">



                        <td align="center" width="50"><?php $no = (($no + 1));
                                                        echo $no; ?></td>
                        <!--h <td align="center"><?php echo $data['id_absensi']; ?></td> h-->
                        <td align="center"><?php echo format_indo($data['tanggal']); ?></td>
                        <td align="center"><?php echo ($data['jam']); ?></td>
                        <td align="center"><?php echo baca_database("", "id_sidik_jari", "select * from data_mahasiswa where id_mahasiswa='$data[id_mahasiswa]'")  ?></td>
                        <td align="center"><?php echo baca_database("", "nama", "select * from data_mahasiswa where id_mahasiswa='$data[id_mahasiswa]'")  ?></td>
                        <!-- <?php $id_kelas =  baca_database("", "id_kelas", "select * from data_mahasiswa where id_mahasiswa='$data[id_mahasiswa]'")  ?>
                        <td align="center"><?php echo baca_database("", "kelas", "select * from data_kelas where id_kelas='$id_kelas'")  ?></td>
                        <td align="center"><?php echo $data['status']; ?></td> -->


                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php Pagination($page, $dataPerPage, $querypagination); ?>
    <br><br>
    <a href="kosongkan.php">
        <?php btn_hapus('Kosongkan Data'); ?>
    </a>
</body>

<?php /* } else { ?>
<br>
<br>
<br>
<br>
<br>
<br>

<center><h2>MAAF ANDA TIDAK MEMILIKI JADWAL HARI INI</h2></center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php } */ ?>