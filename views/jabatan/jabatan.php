<?php
include 'koneksi.php'; // koneksi ke database
?>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Jabatan</h3> <a href="tambah_jabatan.php" class="btn btn-primary btn-sm"> + Tambah Jabatan </a>
        </div>
    </div>
    
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Jabatan</th> </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // Changed: SELECT * FROM kategori ORDER BY idkategori ASC
                // New: SELECT * FROM jabatan ORDER BY idjabatan ASC
                $query = mysqli_query($koneksi, "SELECT * FROM jabatan ORDER BY idjabatan ASC"); 
                
                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        // Changed: $data['namakategori']
                        // New: $data['namajabatan']
                        echo "<td>" . htmlspecialchars($data['namajabatan']) . "</td>"; 
                        echo "</tr>";
                    }
                } else {
                    // Pesan dan colspan disesuaikan untuk Jabatan (colspan='2')
                    echo "<tr><td colspan='2' class='text-center'>Belum ada data jabatan.</td></tr>"; 
                }
                ?>
            </tbody>
        </table>
    </div>
</div>