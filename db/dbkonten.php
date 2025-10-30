<?php
include "../koneksi.php";
$proses = $_GET['proses'];

if($proses=="tambah"){
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isikonten = mysqli_real_escape_string($koneksi, $_POST['isikonten']);
    $idadmin = $_POST['idadmin'];
    $idkategori = $_POST['idkategori'];
    $idkomentar = !empty($_POST['idkomentar']) ? $_POST['idkomentar'] : NULL;

    $foto = '';
    if(!empty($_FILES['fotokonten']['name'])){
        $foto = time().'_'.$_FILES['fotokonten']['name'];
        move_uploaded_file($_FILES['fotokonten']['tmp_name'], "../foto/konten/$foto");
    }

    $query = "INSERT INTO konten (judul, isikonten, fotokonten, idadmin, idkategori, idkomentar, tanggalpublikasi)
              VALUES ('$judul', '$isikonten', '$foto', '$idadmin', '$idkategori', ".($idkomentar!==NULL?"'$idkomentar'":"NULL").", NOW())";
    mysqli_query($koneksi, $query);
    header("location:../index.php?halaman=konten");
}

elseif($proses=="edit"){
    $idkonten = $_POST['idkonten'];
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $isikonten = mysqli_real_escape_string($koneksi, $_POST['isikonten']);
    $idadmin = $_POST['idadmin'];
    $idkategori = $_POST['idkategori'];
    $idkomentar = !empty($_POST['idkomentar']) ? $_POST['idkomentar'] : NULL;

    $updateFoto = "";
    if(!empty($_FILES['fotokonten']['name'])){
        $foto = time().'_'.$_FILES['fotokonten']['name'];
        move_uploaded_file($_FILES['fotokonten']['tmp_name'], "../foto/konten/$foto");
        $updateFoto = ", fotokonten='$foto'";
    }

    $query = "UPDATE konten SET 
                judul='$judul',
                isikonten='$isikonten',
                idadmin='$idadmin',
                idkategori='$idkategori',
                idkomentar=".($idkomentar!==NULL?"'$idkomentar'":"NULL")."
                $updateFoto
              WHERE idkonten='$idkonten'";
    mysqli_query($koneksi, $query);
    header("location:../index.php?halaman=konten");
}

elseif($proses=="hapus"){
    $idkonten = $_GET['idkonten'];
    mysqli_query($koneksi, "DELETE FROM konten WHERE idkonten='$idkonten'");
    header("location:../index.php?halaman=konten");
}
?>
