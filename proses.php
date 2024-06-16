<?php

    include "koneksi.php";

        //mengambil data inputan
        $nama_mhs = $_POST['nama'];
        $prodi_mhs = $_POST['prodi'];
        $npm = $_POST['npm'];
        $perulangan = $_POST['ulangi'];

        $proses =  mysqli_query($koneksi,"INSERT INTO mahasiswa (nama_mahasiswa, prodi, npm) 
        VALUES ('".$nama_mhs."','".$prodi_mhs."','".$npm."') ")
        or die (mysqli_error($koneksi));

        if($proses){
            echo "
                    <script>
                        alert('Data Berhasil Disimpan');
                        window.location.href='form.php';
                        </script>";
        } else echo "<script>
                        alert('Data Gagal Disimpan');
                        window.location.href='form.php';
                    </script>";

?>