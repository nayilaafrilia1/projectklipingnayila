<?php
if (!isset($koneksi)) {
    include __DIR__ . '/../../koneksi.php';
}
?>

<div class="card shadow-sm border-0">
  <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
    <h3 class="card-title m-0">
      <i class="fas fa-briefcase me-2"></i>Data Jabatan
    </h3>
    <a href="index.php?halaman=tambahjabatan" class="btn btn-light btn-sm">
      <i class="fas fa-plus"></i> Tambah Jabatan
    </a>
  </div>

  <div class="card-body p-0">
    <div class="table-responsive">
      <table id="example1" class="table table-striped table-bordered m-0 text-sm">
        <thead class="text-center bg-light">
          <tr>
            <th>No.</th>
            <!-- Kolom ID Jabatan dihapus dari tampilan -->
            <th>Nama Jabatan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY idjabatan ASC");
          if ($query && mysqli_num_rows($query) > 0) {
            while ($data = mysqli_fetch_assoc($query)) {
              $id = htmlspecialchars($data['idjabatan']);
              $nama = htmlspecialchars($data['namajabatan']);
          ?>
              <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td><?= $nama; ?></td>
                <td class="text-center">
                  <a href="index.php?halaman=editjabatan&idjabatan=<?= urlencode($id); ?>" 
                     class="btn btn-warning btn-sm" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="db/dbjabatan.php?proses=hapus&idjabatan=<?= urlencode($id); ?>" 
                     class="btn btn-danger btn-sm"
                     onclick="return confirm('Yakin ingin menghapus jabatan: <?= addslashes($nama); ?>?');" 
                     title="Hapus">
                    <i class="fas fa-trash"></i>
                  </a>
                </td>
              </tr>
          <?php
            }
          } else {
            echo '<tr><td colspan="3" class="text-center">Data jabatan masih kosong.</td></tr>';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
