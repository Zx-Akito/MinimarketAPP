<?php
    $id=$_GET['id'];
    AksesPemilik();

    $h=Hapus("user","id_user='$id'");

    if ($h) {

        header("location:?page=pemilik/pengguna&h=true");

    }
    else {

        header("location:?page=pemilik/pengguna&h=false");
        
    }
?>