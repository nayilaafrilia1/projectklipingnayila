<?php
include "koneksi.php";
?>

<section class="content">
  <div class="card text-xs">
    <div class="card-header bg-primary">
      <h2 class="card-title">Tambah Konten</h2>
    </div>

    <div class="card-body">
      <form action="db/dbkonten.php?proses=tambah" method="POST" enctype="multipart/form-data">
        <div class="card-body-sm ml-2">

          <!-- Judul Konten -->
          <div class="form-group">
            <label for="judul">JudulKonten</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul konten" required>
          </div>

          <!-- Isi Konten -->
          <div class="form-group">
            <label for="isikonten">IsiKonten</label>
            <textarea class="form-control" id="isikonten" name="isikonten" rows="5" placeholder="Masukkan isi konten" required></textarea>
          </div>

          <!-- Tanggal Publikasi -->
          <div class="form-group">
            <label for="tanggalpublikasi">Tanggal Publikasi</label>
            <input type="date" class="form-control" id="tanggalpublikasi" name="tanggalpublikasi" required>
          </div>

          <!-- Pilih Admin -->
          <div class="form-group">
            <label>Pilih Admin</label>
            <select class="form-control" name="idadmin" required>
              <option value="" disabled selected>-- Pilih Admin --</option>
              <?php
              $sqladmin = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY namaadmin ASC");
              while ($dataadmin = mysqli_fetch_array($sqladmin)) {
                  echo "<option value='{$dataadmin['idadmin']}'>{$dataadmin['namaadmin']}</option>";
              }
              ?>
            </select>
          </div>

          <!-- Pilih Kategori -->
          <div class="form-group">
            <label>Pilih Kategori</label>
            <select class="form-control" name="idkategori" required>
              <option value="" disabled selected>-- Pilih Kategori --</option>
              <?php
              $sqlkategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY namakategori ASC");
              while ($datakategori = mysqli_fetch_array($sqlkategori)) {
                  echo "<option value='{$datakategori['idkategori']}'>{$datakategori['namakategori']}</option>";
              }
              ?>
            </select>
          </div>

          <!-- Pilih Komentar (Opsional) -->
          <div class="form-group">
            <label>Pilih Komentar (Opsional)</label>
            <select class="form-control" name="idkomentar">
              <option value="">-- Tidak Ada Komentar --</option>
              <?php
              $sqlkomentar = mysqli_query($koneksi, "SELECT * FROM komentar ORDER BY idkomentar ASC");
              while ($datakomen = mysqli_fetch_array($sqlkomentar)) {
                  echo "<option value='{$datakomen['idkomentar']}'>".substr($datakomen['isikomentar'],0,50)."...</option>";
              }
              ?>
            </select>
          </div>

          <!-- Upload Foto -->
          <div class="form-group">
            <label for="fotokonten">Upload Foto Konten</label>
            <input type="file" name="fotokonten" id="fotokonten" class="form-control" accept="image/*">
            <small class="text-muted">Upload gambar konten (opsional)</small>
          </div>

        </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-primary float-right ml-3"><i class="fa fa-save"></i> Simpan</button>
          <button type="reset" class="btn btn-warning float-right"><i class="fa fa-retweet"></i> Reset</button>
        </div>

      </form>
    </div>
  </div>
</section>
