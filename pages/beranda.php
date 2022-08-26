<?php

    switch($_SESSION['JenisLog'])
        {
            case "pemilik":
                include("./template/menu_pemilik.php");
            break;
            case "gudang":
                include("./template/menu_gudang.php");
            break;
            case "kasir":
                include("./template/menu_kasir.php");
            break;
        }

    $template ="dashboard";
    $judul ="Beranda";
    $active1 = "active";
    $konten ="

        <div class='container'>
            <div class='animate__animated animate__fadeInLeft ml-5'>
                <h1>Selamat Datang</h1>
                <h3>".Pengguna($_SESSION['Id'])['Nama']."</h3>
            </div>
        </div>

    ";

?>