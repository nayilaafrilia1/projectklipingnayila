<?php
include "koneksi.php";
$idkonten = $_GET['idkonten'];
$sql = mysqli_query($koneksi, "SELECT * FROM konten WHERE idkonten='$idkonten'");
$data = mysqli_fetch_array($sql);
?>

<section class="content">
  <div class="card">
    <div class="card-header bg-gradient-primary mb-3">
      <div class="row">
        <div class="col"><h5>Edit Konten</h5></div>
        <div class="col text-right">
          <a href="index.php?halaman=konten" class="btn btn-light btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </div>
    </div>

    <div class="card-body">
      <form action="db/dbkonten.php?proses=edit" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idkonten" value="<?= $data['idkonten']; ?>">

        <div class="form-group">
          <label>Judul Konten</label>
          <input type="text" class="form-control" name="judul" value="<?= $data['judul']; ?>" required>
        </div>

        <div class="form-group">
          <label>Isi Konten</label>
          <textarea class="form-control" name="isikonten" rows="5" required><?= $data['isikonten']; ?></textarea>
        </div>

        <div class="form-group">
          <label>Tanggal Publikasi</label>
          <input type="date" class="form-control" name="tanggalpublikasi" value="<?= $data['tanggalpublikasi']; ?>" required>
        </div>

        <!-- Admin -->
        <div class="form-group">
          <label>Admin</label>
          <select class="form-control" name="idadmin" required>
            <option value="" disabled>-- Pilih Admin --</option>
            <?php
            $sqlAdmin = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY namaadmin ASC");
            while ($admin = mysqli_fetch_array($sqlAdmin)) {
              $selected = ($data['idadmin'] == $admin['idadmin']) ? "selected" : "";
              echo "<option value='{$admin['idadmin']}' $selected>{$admin['namaadmin']}</option>";
            }
            ?>
          </select>
        </div>

        <!-- Kategori -->
        <div class="form-group">
          <label>Kategori</label>
          <select class="form-control" name="idkategori" required>
            <option value="" disabled>-- Pilih Kategori --</option>
            <?php
            $sqlKategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY namakategori ASC");
            while ($kategori = mysqli_fetch_array($sqlKategori)) {
              $selected = ($data['idkategori'] == $kategori['idkategori']) ? "selected" : "";
              echo "<option value='{$kategori['idkategori']}' $selected>{$kategori['namakategori']}</option>";
            }
            ?>
          </select>
        </div>

        <!-- Komentar -->
        <div class="form-group">
          <label>Komentar (Opsional)</label>
          <select class="form-control" name="idkomentar">
            <option value="">-- Tidak Ada --</option>
            <?php
            $sqlKomentar = mysqli_query($koneksi, "SELECT * FROM komentar ORDER BY isikomentar ASC");
            while ($komentar = mysqli_fetch_array($sqlKomentar)) {
              $selected = ($data['idkomentar'] == $komentar['idkomentar']) ? "selected" : "";
              echo "<option value='{$komentar['idkomentar']}' $selected>".substr($komentar['isikomentar'],0,50)."...</option>";
            }
            ?>
          </select>
        </div>

        <!-- Foto -->
        <div class="form-group">
          <label>Foto Konten</label>
          <input type="file" name="fotokonten" class="form-control" accept="image/*">
          <?php if(!empty($data['fotokonten'])){ ?>
            <p>Foto saat ini:</p>
            <img src="foto/konten/<?= $data['fotokonten']; ?>" width="120" class="rounded">
          <?php } ?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </form>
    </div>
  </div>
</section>
