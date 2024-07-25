<?php
// error_reporting(E_ALL);
include_once 'koneksi.php';
$id = $_GET['id'];

if (isset($_POST['submit'])) {
  $id_mhs = $_POST['id'];
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

  $file_gambar = $_FILES['file_gambar'];
  $gambar = null;
  if ($file_gambar['error'] == 0) {
    $filename = str_replace(' ', '_', $file_gambar['name']);
    $destination = dirname(__FILE__) . '/gambar/' . $filename;
    if (move_uploaded_file($file_gambar['tmp_name'], $destination)) {
      $gambar = 'gambar/' . $filename;
    }
  }

  $sql = 'UPDATE gugun_mahasiswa SET ';
  $sql .= "nama = '{$nama}', nim = '{$nim}', ";
  $sql .= "no_hp = '{$no_hp}', jurusan = '{$jurusan}', agama = '{$agama}',";
  $sql .= "tgl_lahir = '{$tgl_lahir}', tempat_lahir = '{$tempat_lahir}', jenis_kelamin = '{$jenis_kelamin}', ";
  $sql .= "alamat = '{$alamat}', email = '{$email}' ";
  if (!empty($gambar))
    $sql .= ", foto = '{$gambar}' ";
  $sql .= "WHERE id='{$id_mhs}' ";
  $result = mysqli_query($conn, $sql);
  header('location: index.php');
}

$sql = "SELECT * FROM gugun_mahasiswa WHERE id='{$id}' ";
$result = mysqli_query($conn, $sql);
if (!$result) die("Error : Data tidak tersedia");
$data = mysqli_fetch_array($result);

function is_select($var, $val)
{
  if ($var == $val) return 'selected="selected"';
  return false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Ubah Data Mahasiswa</title>
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
    <h5>Ubah Data </h5>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="form-group col-md-4">
          <label for="nim">Nim :</label>
          <input type="text" name="nim" id="nim" value="<?= $data['nim'] ?>" class="form-control" readonly>
        </div>
        <div class="form-group col-md-4">
          <label for="nama">Nama :</label>
          <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>" class="form-control">
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="email">Email:</label>
          <input type="email" name="email" value="<?= $data['email'] ?>" id="email" class="form-control">
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="no_hp">No Hp:</label>
          <input type="number" name="no_hp" value="<?= $data['no_hp'] ?>" id="no_hp" class="form-control">
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="tempat_lahir">Tempat Lahir:</label>
          <input type="text" value="<?= $data['tempat_lahir'] ?>" name="tempat_lahir" id="tempat_lahir"
            class="form-control">
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="tgl_lahir">Tanggal Lahir:</label>
          <input type="text" value="<?= $data['tgl_lahir'] ?>" name="tgl_lahir" id="tgl_lahir" class="form-control">
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="jk">Jenis Kelamin :</label>
          <select name="jenis_kelamin" id="jk" class="form-control">
            <option value="Laki-laki" <?php echo is_select("Laki-laki", $data["jenis_kelamin"]); ?>>Laki-laki</option>
            <option value="Perempuan" <?php echo is_select("Perempuan", $data["jenis_kelamin"]); ?>>Perempuan</option>
          </select>
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="jurusan">Jurusan :</label>
          <select name="jurusan" id="jurusan" class="form-control">
            <option value="Teknik Informatika" <?php echo is_select("Teknik Informatika", $data["jurusan"]); ?>>Teknik
              Informatika</option>
            <option value="Teknik Industri" <?php echo is_select("Teknik Industri", $data["jurusan"]); ?>>Teknik
              Industri</option>
            <option value="Teknik Nuklir" <?php echo is_select("Teknik Nuklir", $data["jurusan"]); ?>>Teknik Nuklir
            </option>
            <option value="Teknik Lingkungan" <?php echo is_select("Teknik Lingkungan", $data["jurusan"]); ?>>Teknik
              Lingkungan</option>
            <option value="Hukum" <?php echo is_select("Hukum", $data["jurusan"]); ?>>Hukum</option>
            <option value="Manajemen" <?php echo is_select("Manajemen", $data["jurusan"]); ?>>Manajemen</option>
            <option value="PGSD" <?php echo is_select("PGSD", $data["jurusan"]); ?>>PGSD</option>
            <option value="Sastra Inggris" <?php echo is_select("Sastra Inggris", $data["jurusan"]); ?>>Sastra Inggris
            </option>
            <option value="Sastra Korea" <?php echo is_select("Sastra Korea", $data["jurusan"]); ?>>Sastra Korea
            </option>
            <option value="Sastra Jepang" <?php echo is_select("Sastra Jepang", $data["jurusan"]); ?>>Sastra Jepang
            </option>
          </select>
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="agama">Agama :</label>
          <select name="agama" id="agama" class="form-control">
            <option value="Islam" <?php echo is_select("Islam", $data["agama"]); ?>>Islam</option>
            <option value="Kristen" <?php echo is_select("Kristen", $data["agama"]); ?>>Kristen</option>
            <option value="Hindu" <?php echo is_select("Hindu", $data["agama"]); ?>>Hindu</option>
            <option value="Buddha" <?php echo is_select("Buddha", $data["agama"]); ?>>Buddha</option>
            <option value="Konghucu" <?php echo is_select("Konghucu", $data["agama"]); ?>>Konghucu</option>
          </select>
        </div>
        <div class="form-group col-md-4 mt-2">
          <label for="alamat">Alamat :</label>
          <textarea rows="5" name="alamat" id="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
        </div>
        <div class="form-group col-md-8 mt-2">
          <label for="file_gambar">File Gambar :</label>
          <div id="file-upload" class="file-upload">
            Drag and drop a file or click to select
          </div>
          <input type="file" name="file_gambar" id="file_gambar" class="form-control" style="display: none;">
        </div>
      </div>
      <input type="hidden" value="<?= $data['id'] ?>" name="id">
      <div class="form-group mt-4 col-md-12">
        <input type="submit" name="submit" value="Simpan" class="btn text-white  w-100"
          style="background-color: black;">
      </div>
    </form>
  </div>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var fileUpload = document.getElementById('file-upload');
    var fileInput = document.getElementById('file_gambar');

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