<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
    <div class="content-box-content">
        <table <?php tabel_in(100, '%', 0, 'center'); ?>>
            <tbody>

                <?php
                if (!isset($_GET['proses'])) {
                        
                ?>
                    <script>
                        alert("AKSES DITOLAK");
                        location.href = "index.php";
                    </script>
                <?php
                    die();
                }
                $proses = decrypt(mysql_real_escape_string($_GET['proses']));
                $sql = mysql_query("SELECT * FROM data_guru where id_guru = '$proses'");
                $data = mysql_fetch_array($sql);
                ?>
                <tr>
                    <td class="clleft" width="25%">Id Guru </td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['id_guru']; ?></td>
                </tr>

                <tr>
                    <td class="clleft" width="25%">Nip </td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['nip']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Nama </td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['nama']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Alamat </td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['alamat']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">No Telepon </td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['no_telepon']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Jenim Kelamin </td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['jenim_kelamin']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Username </td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['username']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Password </td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['password']; ?></td>
                </tr>




            </tbody>
        </table>
    </div>
</div>