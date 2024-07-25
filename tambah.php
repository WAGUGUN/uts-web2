<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
  $nim = $_POST['nim'];
  $jurusan = $_POST['jurusan'];
  $email = $_POST['email'];
  $nama = $_POST['nama'];
  $no_hp = $_POST['no_hp'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $alamat = $_POST['alamat'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $agama = $_POST['agama'];

  $file_gambar = $_FILES['foto'];
  $foto = null;
  if ($file_gambar['error'] == 0) {
    $filename = str_replace(' ', '_', $file_gambar['name']);
    $destination = dirname(__FILE__) . '/gambar/' . $filename;
    if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
      $foto = 'gambar/' . $filename;
    }
  }

  $sql = 'INSERT INTO gugun_mahasiswa (nim, nama, email, no_hp, tempat_lahir, tgl_lahir, jenis_kelamin, jurusan, agama, alamat, foto)';
  $sql .= "VALUES ('{$nim}', '{$nama}', '{$email}', '{$no_hp}', '{$tempat_lahir}', '{$tgl_lahir}', '{$jenis_kelamin}', '{$jurusan}', '{$agama}', '{$alamat}', '{$foto}')";

  $result = mysqli_query($conn, $sql);
  header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Tambah Data Mahasiswa</title>
  <style>
  .file-upload {
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px dashed #ccc;
    border-radius: 5px;
    padding: 20px;
    cursor: pointer;
    text-align: center;
    color: #aaa;
  }

  .file-upload.dragover {
    border-color: #000;
    color: #000;
  }
  </style>
</head>

<body>
  <nav class="nav nav-primary" style="background-color: black;">
    <div class="container py-4">
      <h2 class="text-white">GUGUN GUNAWAN</h2>
    </div>
  </nav>
  <div class="container">
    <h4 class="mt-4">Tambah Data Mahasiswa</h4>
    <form action="tambah.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="nim">Nim :</label>
          <input type="text" name="nim" id="nim" class="form-control">
        </div>
        <div class="form-group col-md-4">
          <label for="nama">Nama :</label>
          <input type="text" name="nama" id="nama" class="form-control">
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="email">Email :</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="no_hp">No HP :</label>
          <input type="number" name="no_hp" id="no_hp" class="form-control">
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="tempat_lahir">Tempat Lahir :</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="tgl_lahir">Tanggal Lahir :</label>
          <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="jenis_kelamin">Jenis Kelamin :</label>
          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="jurusan">Jurusan :</label>
          <select name="jurusan" id="jurusan" class="form-control">
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Industri">Teknik Industri</option>
            <option value="Teknik Nuklir">Teknik Nuklir</option>
            <option value="Teknik Lingkungan">Teknik Lingkungan</option>
            <option value="Hukum">Hukum</option>
            <option value="Manajemen">Manajemen</option>
            <option value="PGSD">PGSD</option>
            <option value="Sastra Inggris">Sastra Inggris</option>
            <option value="Sastra Jepang">Sastra Jepang</option>
            <option value="Sastra Korea">Sastra Korea</option>
          </select>
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="agama">Agama :</label>
          <select name="agama" id="agama" class="form-control">
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
            <option value="Konghucu">Konghucu</option>
          </select>
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="alamat">Alamat :</label>
          <textarea name="alamat" id="alamat" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group col-md-8 mt-2">
          <label for="file_gambar">File Gambar :</label>
          <div id="file-upload" class="file-upload">
            Drag and drop a file or click to select
          </div>
          <input type="file" name="foto" id="foto" class="form-control" style="display: none;">
        </div>
      </div>
      <div class="form-group mt-4 col-md-12">
        <input type="submit" name="submit" value="Simpan" class="btn text-white w-100" style="background-color: black;">
      </div>
    </form>
  </div>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var fileUpload = document.getElementById('file-upload');
    var fileInput = document.getElementById('foto');

    fileUpload.addEventListener('click', function() {
      fileInput.click();
    });

    fileUpload.addEventListener('dragover', function(e) {
      e.preventDefault();
      e.stopPropagation();
      fileUpload.classList.add('dragover');
    });

    fileUpload.addEventListener('dragleave', function(e) {
      e.preventDefault();
      e.stopPropagation();
      fileUpload.classList.remove('dragover');
    });

    fileUpload.addEventListener('drop', function(e) {
      e.preventDefault();
      e.stopPropagation();
      fileUpload.classList.remove('dragover');
      if (e.dataTransfer.files.length > 0) {
        fileInput.files = e.dataTransfer.files;
        fileUpload.innerText = e.dataTransfer.files[0].name;
      }
    });

    fileInput.addEventListener('change', function() {
      if (fileInput.files.length > 0) {
        fileUpload.innerText = fileInput.files[0].name;
      }
    });
  });
  </script>
</body>

</html>