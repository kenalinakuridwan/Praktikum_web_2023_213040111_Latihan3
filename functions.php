<?php 

function koneksi() {

    //koneksi ke mysql
$conn = mysqli_connect('localhost', 'root', '', 'pw_database_buku') or die('koneksi ke database GAGAL!');

return $conn;
}

function query ($query) {

    $conn = koneksi();
    $result = mysqli_query($conn, "SELECT * FROM buku") or die('QUERY GAGAL' . mysqli_error($conn));


    $rows = [];
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

return $rows;
}

function tambah($data) {
    $conn = koneksi();

    //sanitasi data
    $judul = mysqli_real_escape_string($conn, htmlspecialchars($data['judul']));
    $penulis = mysqli_real_escape_string($conn, htmlspecialchars($data['penulis']));
    $penerbit = mysqli_real_escape_string($conn, htmlspecialchars($data['penerbit']));
    $kategori = mysqli_real_escape_string($conn, htmlspecialchars($data['kategori']));
    $gambar = mysqli_real_escape_string($conn, htmlspecialchars($data['gambar']));


    //insert data
    $query = "INSERT INTO buku
                 VALUES (null, '$judul', '$penulis', '$penerbit', '$kategori', '$gambar')";

    //insert data ke tabel buku
    mysqli_query($conn, $query) or die('QUERY GAGAL' . mysqli_error($conn));

    //kembalikan nilai keberhasilan
    return mysqli_affected_rows($conn);
}

function hapus($id) {
$conn = koneksi();
mysqli_query($conn, "DELETE FROM buku WHERE id = $id") or die('QUERY GAGAL' . mysqli_error($conn));

return mysqli_affected_rows($conn);
}

function ubah($data) {
    $conn = koneksi();

    //sanitasi data
    $id = $data['id'];
    $judul = mysqli_real_escape_string($conn, htmlspecialchars($data['judul']));
    $penulis = mysqli_real_escape_string($conn, htmlspecialchars($data['penulis']));
    $penerbit = mysqli_real_escape_string($conn, htmlspecialchars($data['penerbit']));
    $kategori = mysqli_real_escape_string($conn, htmlspecialchars($data['kategori']));
    $gambar = mysqli_real_escape_string($conn, htmlspecialchars($data['gambar']));


    //insert data
    $query = "UPDATE buku
                SET
                judul = '$judul, 
                penulis = '$penulis, 
                penerbit = '$penerbit, 
                kategori = '$kategori, 
                gambar = '$gambar
                    WHERE id =$id
                "; 
    //insert data ke tabel buku
    mysqli_query($conn, $query) or die('QUERY GAGAL' . mysqli_error($conn));

    //kembalikan nilai keberhasilan
    return mysqli_affected_rows($conn);

}
