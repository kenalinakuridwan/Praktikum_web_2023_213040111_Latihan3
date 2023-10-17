<?php
require 'functions.php';

$id = $_GET['id'];
$b = query("SELECT * FROM buku WHERE id = $id")[0];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BukuKu | Form Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <div class="container">
            <a class="navbar-brand" href="index.php">BukuKu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="tambah.php">Tambah Buku</a>
                    </li>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h2>Form Data Tambah Buku</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <input type="hidden" value ="<?=$b['id'];  ?>">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value ="<?=$b['judul'];  ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="penulis" name="penulis" value ="<?=$b['penulis'];  ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value ="<?=$b['penerbit'];  ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" value ="<?=$b['kategori'];  ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="text" class="form-control" id="gambar" name="gambar" value ="<?=$b['gambar'];  ?>" require>
                    </div>

                    <button type="submit" class="btn btn-primary">Ubah Data Buku</button>

                </form>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>