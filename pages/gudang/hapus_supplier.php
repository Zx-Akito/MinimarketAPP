<?php
    $id=$_GET['id'];
    AksesGudang();

    mysqli_query($koneksi, "DELETE FROM supplier WHERE id_supplier='$id'");
    header("location:index.php?page=gudang/supplier&id=true");

    $h=Hapus("supplier","id_supplier='$id'");

    if ($h) {

        header("location:?page=gudang/supplier&h=true");

    }
    else {

        header("location:?page=gudang/supplier&h=false");
        
    }
?>