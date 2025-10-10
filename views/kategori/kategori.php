<?php
include 'koneksi.php'; // koneksi ke database
?>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Kategori</h3>
            <a href="tambah_kategori.php" class="btn btn-primary btn-sm"> 
                + Tambah Kategori 
            </a>
        </div>
    </div>
    
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Kategori</th> 
                    </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY idkategori ASC"); 
                
                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($data['namakategori']) . "</td>"; 
                        // Baris yang menampilkan tombol Aksi (Edit/Hapus) telah dihapus
                        echo "</tr>";
                    }
                } else {
                    // colspan disesuaikan menjadi 2 karena hanya ada 2 kolom (No dan Nama Kategori)
                    echo "<tr><td colspan='2' class='text-center'>Belum ada kategori.</td></tr>"; 
                }
                ?>
            </tbody>
        </table>
    </div>
</div>