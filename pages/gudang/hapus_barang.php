<?php
    $id=$_GET['id'];
    AksesGudang();

    $h=Hapus("barang","id_barang='$id'");

    if ($h) {

        header("location:?page=gudang/barang&h=true");

    }
    else {

        header("location:?page=gudang/barang&h=false");
        
    }
?>