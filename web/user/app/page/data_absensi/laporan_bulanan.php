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

                    HARIAN

                </strong>
            </center>
        </td>
    </tr>

    <tr>
        <td class="auto-style2"><?php echo $alamat; ?></td>
    </tr>
</table>
<!-- <form method="GET">
    <label for="tanggal">Filter Perbulan:</label>

    <input type="hidden" name="Berdasarkan" value="tanggal">

    <input type="date" id="tanggal1" name="tanggal1">
    <input type="date" id="tanggal2" name="tanggal2">
    <input type="submit" value="Filter">
</form> -->
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
        <?php
        $no = 0;
        $startRow = ($page - 1) * $dataPerPage;
        $no = $startRow;

        // Mendapatkan tanggal hari ini dalam format yang sesuai dengan basis data
        $tanggal_hari_ini = date('Y-m-d');
        $id_mahasiswa = decrypt($_COOKIE['kodene']);
        $querytabel = "SELECT * FROM data_absensi WHERE tanggal = '$tanggal_hari_ini' AND id_mahasiswa = '$id_mahasiswa' LIMIT $startRow, $dataPerPage";

        $proses = mysql_query($querytabel);
        while ($data = mysql_fetch_array($proses)) {
        ?>
            <tr>
                <td>
                    <?php $no = (($no + 1));
                    echo $no; ?>
                </td>
                <td><?php echo baca_database("", "nama", "select * from data_mahasiswa where id_mahasiswa='$data[id_mahasiswa]'") ?></td>
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