<!DOCTYPE html>
<html>
    <head>
        <title>Form Pendataan</title>
    </head>
    <body>
        <form method="post">  
            <table border="1">
                <tr>
                    <th>NIM</th>
                    <td>
                        <input type="text" name="nim" required="">
                    </td>
                </tr>
                <tr>
                    <th>Program Studi</th>
                    <td>
                        <select name="prog_studi" required="">
                            <option value="" disabled selected>Pilih Program Studi</option>
                            <option value="A11">Teknik Informatika S1</option>
                            <option value="A12">Sistem Informatika S1</option>
                            <option value="A22">Teknik Informatika D3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Nilai Tugas</th>
                    <td>
                        <input type="text" name="ntugas" required="">
                    </td>
                </tr>
                <tr>
                    <th>Nilai UTS</th>
                    <td>
                        <input type="text" name="nuts" required="">
                    </td>
                </tr>
                <tr>
                    <th>Nilai UAS</th>
                    <td>
                        <input type="text" name="nuas" required="">
                    </td>
                </tr>
                <tr>
                    <th rowspan="3">Catatan Khusus</th>
                    <td>
                        <input type="checkbox" name="checkbox1" value="Kehadiran >= 70%">
                        <label>Kehadiran >= 70%</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="checkbox2" value="Interaktif dikelas">
                        <label>Interaktif dikelas</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="checkbox3" value="Kehadiran >= 70%">
                        <label>Tidak terlambat mengumpulkan tugas</label>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="proses" value="Simpan">
                    </td>
                </tr>
            </table>
        </form>
        </br>
        </br>
        <hr>
        </br>
        </br>
    </body>
</html>

<?php

$nilai_akhir = 0;

if(isset($_POST['proses'])){

    $nim = $_POST['nim'];
    $kode_ps = $_POST['prog_studi'];
    $ntugas = $_POST['ntugas'];
    $nuts = $_POST['nuts'];
    $nuas = $_POST['nuas'];
    $cat_1 = '';
    $cat_2 = '';
    $cat_3 = '';

    if (isset($_POST['checkbox1'])) {
        $cat1 = $_POST['checkbox1'];
        $cat_1 = '<li>'.$cat1.'</li>';
    }

    if (isset($_POST['checkbox2'])) {
        $cat2 = $_POST['checkbox2'];
        $cat_2 = '<li>'.$cat2.'</li>';
    }

    if (isset($_POST['checkbox3'])) {
        $cat3 = $_POST['checkbox3'];
        $cat_3 = '<li>'.$cat3.'</li>';
    }

    if($kode_ps == 'A11'){
        $prog_studi = 'Teknik Informatika S1';
    }elseif ($kode_ps == 'A12') {
        $prog_studi = 'Sistem Informatika S1';
    }elseif ($kode_ps == 'A22') {
        $prog_studi = 'Teknik Informatika D3';
    }

    if (is_numeric($ntugas) && is_numeric($nuas) && is_numeric($nuts)) {
        if ($ntugas <= 100 && $nuts <= 100 && $nuas <= 100) {
            $nilai_akhir = (0.4*$ntugas) + (0.3*$nuts) + (0.3*$nuas);
            $status = '';
            if ($nilai_akhir >= 60) {
                $status = "LULUS";
            }else{
                $status = "TIDAK LULUS";
            }
            $nilai_lulus = '';
            if ($nilai_akhir > 84 ) {
                $nilai_lulus = 'A';
            }elseif ($nilai_akhir >= 70 && $nilai_akhir <= 84) {
                $nilai_lulus = 'B';
            }elseif ($nilai_akhir >= 60 && $nilai_akhir <= 69) {
                $nilai_lulus = 'C';
            }elseif ($nilai_akhir >= 50 && $nilai_akhir <= 59) {
                $nilai_lulus = 'D';
            }else{
                $nilai_lulus = 'E';
            }

            echo '<table border="1">
                    <tr>
                        <th>Program Studi</th>
                        <th>NIM</th>
                        <th>Nilai Akhir</th>
                        <th>Status</th>
                        <th>Catatan Khusus</th>
                    </tr>
                    <tr>
                        <td>'.$prog_studi.'</td>
                        <td>'.$nim.'</td>
                        <td>'.$nilai_lulus.'</td>
                        <td>'.$status.'</td>
                        <td><ul>'.$cat_1.''.$cat_2.''.$cat_3.'</ul></td>
                    </tr>
                </table>';

        }else{
            echo "<h3>Maaf nilai yang anda inputkan lebih dari 100 !</h3>";
        }
    }else{
        echo "<h3>Maaf nilai yang anda inputkan salah !</h3>";
    }
}

echo "";

?>