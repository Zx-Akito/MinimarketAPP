<?php
    $id=$_GET['id'];
    $tgl=$_GET['tgl'];
    AksesKasir();

    $h=Hapus("jual_barang","id_penjualan='$id'");

    if ($h) {

        header("location:?page=kasir/penjualan&tgl=$tgl&h=true");

    }
    else {

        header("location:?page=kasir/penjualan&tgl=$tgl&h=false");
        
    }
?>