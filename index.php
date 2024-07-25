<?php
include("koneksi.php");

$sql = 'SELECT * FROM gugun_mahasiswa';
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Data Mahasiswa</title>
</head>

<body>
  <nav class="nav nav-primary" style="background-color: black;">
    <div class="container py-4">
      <h2 class="text-white">GUGUN GUNAWAN</h2>
    </div>
  </nav>
  <div class="container mt-4">
    <div class="d-flex justify-content-between">
      <h5>Data Mahasiswa Universitas OKSPORT</h5>
      <a href="tambah.php" class="btn mb-4 text-white" style="background-color: black;">+ Tambah Mahasiswa</a>
    </div>
    <div class="mb-3">
      <div class="col-md-4">
        <label for="searchInput" class="form-label">Cari data mahasiswa :</label>
        <input type="text" id="searchInput" class="form-control" placeholder="Cari data mahasiswa...">
      </div>
    </div>
    <div class="main">
      <table class="table table-bordered" id="mahasiswaTable" style="font-size: 14px">
        <tr style="font-family: Fira Code; background-color: black;" class="text-white">
          <th>No</th>
          <th>Foto</th>
          <th>Nim</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Jurusan</th>
          <th>Tempat Tgl Lahir</th>
          <th>No HP</th>
          <th>Agama</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Aksi</th>
        </tr>
        <?php if ($result) : ?>
        <?php $no = 1; ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><img width="100px" src="<?= $row['foto']; ?>" alt="<?= $row['nama']; ?>"></td>
          <td><?= $row['nim']; ?></td>
          <td><?= $row['nama']; ?></td>
          <td><?= $row['email']; ?></td>
          <td><?= $row['jurusan']; ?></td>
          <td><?= $row['tempat_lahir']; ?>, <?= $row['tgl_lahir']; ?></td>
          <td><?= $row['no_hp']; ?></td>
          <td><?= $row['agama']; ?></td>
          <td><?= $row['jenis_kelamin']; ?></td>
          <td><?= $row['alamat']; ?></td>
          <td><a type="button" class="btn btn-sm btn-secondary mt-2 mr-2" href="ubah.php?id=<?= $row['id']; ?>">Edit</a>
            <a type="button" onclick="return confirm('yakin ingin menghapus data ini? ')"
              class="btn btn-sm text-white mt-2" style="background-color: red;"
              href="hapus.php?id=<?= $row['id']; ?>">Hapus</a>
          </td>
        </tr>
        <?php endwhile;
        else : ?>
        <tr>
          <td colspan="12"> Belum ada data</td>
        </tr>
        <?php endif; ?>
      </table>
    </div>
  </div>
  <script>
  // Fungsi untuk melakukan filter pada tabel
  function filterTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('mahasiswaTable');
    const trs = table.getElementsByTagName('tr');

    for (let i = 1; i < trs.length; i++) {
      const tds = trs[i].getElementsByTagName('td');
      let match = false;
      for (let j = 0; j < tds.length; j++) {
        if (tds[j]) {
          if (tds[j].innerText.toLowerCase().indexOf(filter) > -1) {
            match = true;
            break;
          }
        }
      }
      if (match) {
        trs[i].style.display = '';
      } else {
        trs[i].style.display = 'none';
      }
    }
  }

  // Tambahkan event listener untuk input pencarian
  document.getElementById('searchInput').addEventListener('keyup', filterTable);
  </script>
</body>

</html>