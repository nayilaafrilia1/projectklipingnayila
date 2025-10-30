<?php
// Pastikan koneksi ke database
if (!isset($koneksi)) {
    include __DIR__ . '/../../koneksi.php';
}

// Aktifkan error reporting untuk debugging (opsional saat produksi dimatikan)
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!-- CSS Agar Semua Teks Rata Kiri -->
<style>
    table th, table td {
        text-align: left !important;
        vertical-align: middle !important;
    }
</style>

<section class="content">
    <div class="card shadow-sm">
        <div class="card-header bg-gradient-primary">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title text-white m-0">Data Komentar</h3>
                <a href="index.php?halaman=tambahkomentar" class="btn btn-light btn-sm">
                    <i class="fas fa-comment-dots"></i> Tambah Komentar
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="example1" class="table table-striped table-bordered m-0 text-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%">No.</th>
                            <th>Isi Komentar</th>
                            <th width="20%">Tanggal</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = "SELECT * FROM komentar ORDER BY idkomentar DESC";
                        $data = mysqli_query($koneksi, $query);

                        if (!$data) {
                            echo '<tr><td colspan="4" class="text-danger">Query gagal: ' . mysqli_error($koneksi) . '</td></tr>';
                        } elseif (mysqli_num_rows($data) > 0) {
                            while ($d = mysqli_fetch_assoc($data)) {
                                $id = htmlspecialchars($d['idkomentar']);
                                $isi = nl2br(htmlspecialchars($d['isikomentar']));
                                $tanggal = htmlspecialchars($d['tanggalkomentar'] ?? '-');
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $isi; ?></td>
                                    <td><?= $tanggal; ?></td>
                                    <td>
                                        <a href="index.php?halaman=editkomentar&idkomentar=<?= urlencode($id); ?>" 
                                           class="btn btn-warning btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="db/dbkomentar.php?proses=hapus&idkomentar=<?= urlencode($id); ?>" 
                                           class="btn btn-danger btn-sm" title="Hapus"
                                           onclick="return confirm('Yakin ingin menghapus komentar ini?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo '<tr><td colspan="4">Belum ada komentar.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            <small class="text-muted">
                &copy; <?= date('Y'); ?> Sistem CMS - Data Komentar
            </small>
        </div>
    </div>
</section>
