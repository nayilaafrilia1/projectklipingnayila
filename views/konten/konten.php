<?php
include 'koneksi.php'; // koneksi ke database
?>

<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Data Konten</h3> <a href="tambah_konten.php" class="btn btn-primary btn-sm"> + Tambah Konten </a>
        </div>
    </div>
    
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Judul</th> <th style="width: 150px;">Tanggal Publikasi</th>
                    <th style="width: 100px;">Kategori (ID)</th>
                    <th style="width: 150px;">Foto Konten</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                
                $query = mysqli_query($koneksi, "SELECT * FROM konten ORDER BY idkonten DESC"); 
                
                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_array($query)) {
                        
                        // Menentukan Nilai Tampilan untuk Kolom yang Mungkin NULL
                        $judul_tampil = htmlspecialchars($data['judul'] ?? '--- Tidak Ada Judul ---');
                        $tanggal_tampil = $data['tanggalpublikasi'] ?? '---';
                        $kategori_tampil = $data['idkategori'] ?? 'Belum Dikategorikan'; // Ganti ID menjadi teks
                        $foto_tampil = htmlspecialchars($data['fotokonten'] ?? 'Tidak Ada Foto'); // Ganti string kosong menjadi teks
                        
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        
                        // Menampilkan Judul
                        echo "<td>" . $judul_tampil . "</td>"; 
                        
                        // Menampilkan Tanggal Publikasi
                        echo "<td>" . $tanggal_tampil . "</td>"; 
                        
                        // Menampilkan Kategori
                        echo "<td>" . $kategori_tampil . "</td>";
                        
                        // Menampilkan Foto Konten
                        echo "<td>" . $foto_tampil . "</td>"; 
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Belum ada data konten.</td></tr>"; 
                }
                ?>
            </tbody>
        </table>
    </div>
</div>