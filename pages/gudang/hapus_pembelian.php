<?php
    $id=$_GET['id'];
    $tgl=$_GET['tgl'];
    AksesGudang();

    $h=Hapus("beli_barang","id_pembelian='$id'");

    if ($h) {

        header("location:?page=gudang/pembelian&tgl=$tgl&h=true");

    }
    else {

        header("location:?page=gudang/pembelian&tgl=$tgl&h=false");
        
    }