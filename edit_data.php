<?php
    include "koneksi.php";

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $apakah_proses = isset($_GET['proses']) ? $_GET['proses'] : '';
    
    $proses_ambil = mysqli_query($koneksi,"SELECT * FROM mahasiswa WHERE id = '".$id."'") 
                    or die (mysqli_error($koneksi));
                    
                    if($apakah_proses == 1){
                        $nm_mhs = $_POST['nama'];
                        $prodi_mhs = $_POST['prodi'];
                        $npm = $_POST['npm'];
                      
                        
                        $proses_update_data = mysqli_query($koneksi,"UPDATE mahasiswa SET nama_mahasiswa='$nm_mhs', prodi = '$prodi_mhs', npm = '$npm' WHERE id = '".$id."'") or die (mysqli_error($koneksi));

                            if($proses_update_data){
                                echo "
                                        <script>
                                            alert('Data Berhasil Diupdate');
                                            window.location.href='form.php';
                                            </script>";
                            } else echo "<script>
                                            alert('Data Gagal Diupdate');
                                            window.location.href='form.php';
                                        </script>";
    }                

?>