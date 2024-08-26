
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
            $sql = mysql_query("SELECT * FROM data_matapelajaran where id_matapelajaran = '$proses'");
            $data = mysql_fetch_array($sql);
            ?>
            <tr>
                <td class="clleft" width="25%">Id Matapelajaran </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_matapelajaran']; ?></td>	
            </tr>

            <tr>
                <td class="clleft" width="25%">Matapelajaran </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['matapelajaran']; ?></td>
            </tr>




            </tbody>
        </table>
    </div>
</div>
