<?php
include "koneksi.php";
?>

<!-- ====== STYLE PERATAAN RATA KIRI ====== -->
<style>
  table th, table td {
    text-align: left !important;
    vertical-align: middle !important;
  }
</style>

<!-- ====== HEADER HALAMAN ====== -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard v2</h1>
      </div>
    </div>
  </div>
</section>

<!-- ====== ISI HALAMAN ====== -->
<section class="content">
  <div class="card shadow-sm border-0">

    <!-- Header -->
    <div class="card-header bg-gradient-primary text-white">
      <div class="d-flex justify-content-between align-items-center">
        <h5 class="m-0"><i class="fas fa-newspaper me-2"></i> Halaman Tampil Konten</h5>
        <a href="index.php?halaman=tambahkonten" class="btn btn-light btn-sm">
          <i class="fas fa-plus"></i> Tambah Konten
        </a>
      </div>
    </div>

    <!-- Tabel -->
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-sm align-middle mb-0">
          <thead class="table-primary">
            <tr>
              <th style="width: 40px;">No</th>
              <th>Judul</th>
              <th>Isi Konten</th>
              <th>Foto</th>
              <th>Tanggal Publikasi</th>
              <th>Admin</th>
              <th>Kategori</th>
              <th style="width: 100px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $sql = mysqli_query($koneksi, "
              SELECT k.*, a.namaadmin, c.namakategori
              FROM konten k
              LEFT JOIN admin a ON k.idadmin = a.idadmin
              LEFT JOIN kategori c ON k.idkategori = c.idkategori
              ORDER BY k.idkonten DESC
            ");

            while ($data = mysqli_fetch_array($sql)) {
              $isiSingkat = strlen($data['isikonten']) > 80 
                ? substr($data['isikonten'], 0, 80) . "..." 
                : $data['isikonten'];

              $fotoPath = "foto/konten/" . $data['fotokonten'];
              $foto = (!empty($data['fotokonten']) && file_exists($fotoPath))
                ? "<img src='$fotoPath' width='60' height='60' class='rounded border'>"
                : "<span class='text-muted'>Tidak ada</span>";

              echo "
              <tr>
                <td>$no</td>
                <td>{$data['judul']}</td>
                <td>{$isiSingkat}</td>
                <td>$foto</td>
                <td>{$data['tanggalpublikasi']}</td>
                <td>{$data['namaadmin']}</td>
                <td>{$data['namakategori']}</td>
                <td>
                  <a href='index.php?halaman=editkonten&idkonten={$data['idkonten']}' class='btn btn-sm btn-warning' title='Edit'>
                    <i class='fa fa-edit'></i>
                  </a>
                  <a href='db/dbkonten.php?proses=hapus&idkonten={$data['idkonten']}' class='btn btn-sm btn-danger' title='Hapus' onclick=\"return confirm('Yakin ingin menghapus konten ini?');\">
                    <i class='fa fa-trash'></i>
                  </a>
                </td>
              </tr>";
              $no++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Footer -->
    <div class="card-footer text-muted text-sm">
      <i class="fas fa-info-circle me-1"></i> Menampilkan data konten dari database
    </div>
  </div>
</section>
