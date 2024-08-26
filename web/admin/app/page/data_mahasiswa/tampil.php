<body>

    <?php  //if ($_COOKIE['hak_akses'] == "admin") { 
    ?>
    <a href="<?php index(); ?>?input=tambah">
        <?php btn_tambah('Tambah Data'); ?>
    </a>
    <?php //} 
    ?>

    <a target="blank" href="cetak.php?berdasarkan=data_mahasiswa&jenim=xls&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
        <?php btn_export('Export Excel'); ?>
    </a>

    <a target="blank" href="cetak.php?berdasarkan=data_mahasiswa&jenim=print&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
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
                                $sql = "desc data_mahasiswa";
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
                <?php  //if ($_COOKIE['hak_akses'] == "admin") { 
                ?>
                <th>Action</th>
                <?php //} 
                ?>
                <th>No</th>
                <!--h <th>Id Siswa </th> h-->
                <th align="center" class="th_border cell">ID Fingerprint </th>
                <th align="center" class="th_border cell">Id User </th>
                <th align="center" class="th_border cell">Nama </th>
                <th align="center" class="th_border cell">Alamat </th>
                <th align="center" class="th_border cell">Jenis Kelamin </th>
                <!-- <th align="center" class="th_border cell">Kelas </th> -->
               

            </tr>

            <tbody>
                <?php
                $no = 0;
                $startRow = ($page - 1) * $dataPerPage;
                $no = $startRow;

                if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi'])) {
                    $berdasarkan = mysql_real_escape_string($_GET['Berdasarkan']);
                    $isi = mysql_real_escape_string($_GET['isi']);
                    $querytabel = "SELECT * FROM data_mahasiswa where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_mahasiswa where $berdasarkan like '%$isi%'";
                } else {
                    $querytabel = "SELECT * FROM data_mahasiswa  LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_mahasiswa";
                }
                $proses = mysql_query($querytabel);
                while ($data = mysql_fetch_array($proses)) {
                    $cek_id_fingerprint = baca_database("", "status", "select * from data_daftar_fingerprint where id_sidik_jari = '$data[id_sidik_jari]'");

                ?>
                    <tr class="event2">
                        <?php  //if ($_COOKIE['hak_akses'] == "admin") { 
                        ?>
                        <td class="th_border cell" align="left" width="200">
                            <table border="0">
                                <tr>
                                    <td>



                                        <?php
                                        if ($cek_id_fingerprint == 'terdaftar') {
                                        ?>
                                            <form action="../../../../" method="post">
                                                <input name="nama" value="<?php echo $data['id_sidik_jari']; ?>-<?php echo $data['nim']; ?>-<?php echo strtoupper($data['nama']); ?>" type="hidden">
                                                <input class="btn btn-primary btn-xs" type="submit" value="Perbaharui ">
                                            </form>
                                        <?php
                                        } else if ($cek_id_fingerprint == 'pendaftaran') {
                                        } else {
                                        ?>
                                            <form action="../../../../" method="post">
                                                <input name="nama" value="<?php echo $data['id_sidik_jari']; ?>-<?php echo $data['nim']; ?>-<?php echo strtoupper($data['nama']); ?>" type="hidden">
                                                <input class="btn btn-info btn-xs" type="submit" value="Buat Fingerprint">
                                            </form>
                                        <?php
                                        }


                                        ?>





                                    </td>
                                    <td>
                                        <a href="<?php index(); ?>?input=edit&proses=<?= encrypt($data['id_mahasiswa']); ?>">
                                            <?php btn_edit('Edit'); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php index(); ?>?input=hapus&proses=<?= encrypt($data['id_mahasiswa']); ?>">
                                            <?php btn_hapus('Hapus'); ?>
                                        </a>
                                    </td>



                                </tr>
                                Finggerprint :
                                <?php
                                if ($cek_id_fingerprint == 'terdaftar') {
                                    echo "<font color='green'>Tersedia.</font>";
                                } else if ($cek_id_fingerprint == 'pendaftaran') {
                                    echo "<font color='red'>Pendaftaran.. </font><br>(Refresh jika sudah mendaftarkan di mesin absen)";
                                } else {
                                    echo "Belum Tersedia.";
                                }


                                ?>
                            </table>
                        </td>
                        <?php //} 
                        ?>
                        <td align="center" width="50"><?php $no = (($no + 1));
                                                        echo $no; ?></td>
                        <!--h <td align="center"><?php echo $data['id_mahasiswa']; ?></td> h-->
                        <td align="center"><?php echo $data['id_sidik_jari']; ?></td>
                        <td align="center"><?php echo $data['nim']; ?></td>
                        <td align="center"><?php echo $data['nama']; ?></td>
                        <td align="center"><?php echo $data['alamat']; ?></td>
                        <td align="center"><?php echo $data['jenis_kelamin']; ?></td>
                        <!-- <td align="center"><?php echo baca_database("", "kelas", "select * from data_kelas where id_kelas='$data[id_kelas]'")  ?></td> -->
                       



                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php Pagination($page, $dataPerPage, $querypagination); ?>

</body>