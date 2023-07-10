<?php

//panggil koneksi database
include "koneksi.php";

//uji jika tombol simpan diklik
if (isset($_POST['bsimpan'])) {

    //persiapan simpan data baru
    $simpan = mysqli_query($koneksi, "INSERT INTO dsn (id, nama, nidn, jenpen)
                                      VALUES ('$_POST[tid]',
                                              '$_POST[tnama]',
                                              '$_POST[tnidn]',                   
                                              '$_POST[tjenpen]') ");
    //jika simpan sukses
    if ($simpan){
        echo "<script>
                alert('Simpan data Sukses!');
                document.location='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Simpan data Gagal!');
                document.location='index.php';
              </script>";
        }
}

//uji jika tombol ubah diklik
if (isset($_POST['bubah'])) {

    //persiapan ubah data
    $ubah = mysqli_query($koneksi, "UPDATE dsn SET 
                                                    id = '$_POST[tid]',
                                                    nama = '$_POST[tnama]',
                                                    nidn = '$_POST[tnidn]',
                                                    jenpen = '$_POST[tjenpen]'
                                                WHERE id = '$_POST[id]'
                                                    ");
    //jika ubah sukses
    if ($ubah){
        echo "<script>
                alert('Ubah data Sukses!');
                document.location='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Ubah data Gagal!');
                document.location='index.php';
              </script>";
        }
}

//uji jika tombol hapus diklik
if (isset($_POST['bhapus'])) {

    //persiapan hapus data
    $hapus = mysqli_query($koneksi, "DELETE FROM dsn WHERE id = '$_POST[id]' ");
                                                    
    //jika hapus sukses
    if ($hapus){
        echo "<script>
                alert('Hapus data Sukses!');
                document.location='index.php';
              </script>";
    } else {
        echo "<script>
                alert('Hapus data Gagal!');
                document.location='index.php';
              </script>";
        }
}
