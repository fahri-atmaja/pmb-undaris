<?php 
        echo "Koreksi data anda dibawah ini dengan sebenar-benarnya :
            <form action='https://siakad.undaris.ac.id/pendaftaran.php' method='POST' target='_BLANK'>
                <table border='0px'>
                        <tr>
                            <td>NIK</td><td>:</td><td><input type='text' name='nik' value='$array[nik]'></td>
                        </tr>
                        <tr>
                            <td>NISN *wajib ada dan benar</td><td>:</td><td><input type='text' name='nisn' value='$array[nisn]'></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td><td>:</td><td><input type='text' name='nama' value='$array[nama]'></td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td><td>:</td><td><input type='text' name='tpt_lahir' value='$array[tpt_lahir]'></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td><td>:</td><td><input type='text' name='tgl_lahir' value='$array[tgl_lahir]'></td>
                        </tr>
                        <tr>
                            <td>Email</td><td>:</td><td><input type='text' name='email' value='$array[email]'></td>
                        </tr>
                        <tr>
                            <td>Alamat</td><td>:</td><td><input type='text' name='alamat' value='$array[alamat]'></td>
                        </tr>
                        <tr>
                            <td>Asal Sekolah atau Kampus</td><td>:</td><td><input type='text' name='asal_sekolah' value='$array[asal_sekolah]'></td>
                        </tr>
                        <tr>
                            <td>Nama Ayah</td><td>:</td><td><input type='text' name='nmayah' value='$array[nmayah]'></td>
                        </tr>
                        <tr>
                            <td>Nama Ibu</td><td>:</td><td><input type='text' name='nmibu' value='$array[nmibu]'></td>
                        </tr>
                        <tr>
                            <td>No WA</td><td>:</td><td><input type='text' name='nohp' value='$array[nohp]'></td>
                        </tr>
                </table>
                    <input type='hidden' name='jenkel' value='$array[jenkel]'>
                    <input type='hidden' name='kdagama' value='$array[kdagama]'>
                    <input type='hidden' name='prodi_id' value='$array[prodi_id]'>
                    <input type='hidden' name='konsentrasi_id' value='$array[konsentrasi_id]'>
                    <button type='submit' name='submit'>PROSES DATA</button>
            </form>";
?>