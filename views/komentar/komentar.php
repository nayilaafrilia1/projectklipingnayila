<?php
include 'koneksi.php'; // koneksi ke database
?>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Komentar</h3>
            <a href="tambah_komentar.php" class="btn btn-primary btn-sm">
                + Tambah Komentar
            </a>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Isi Komentar</th>
                    <th style="width: 200px;">Tanggal Komentar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM komentar ORDER BY idkomentar ASC");
                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($data['isikomentar']) . "</td>";
                        echo "<td>" . $data['tanggalkomentar'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>Belum ada komentar.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
