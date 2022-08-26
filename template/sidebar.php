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

    $sidebar="

        <ul class='navbar-nav bg-darkblue sidebar sidebar-dark accordion' id='accordionSidebar'>

            <!-- Sidebar - Brand -->
            <a class='sidebar-brand d-flex align-items-center justify-content-center mt-3' href='index.php'>
                <img src='../assets/img/user.png' alt='' width='80' height='80'><br><br>
            </a>

            <div class='mt-3 text-center text-white text-capitalize'>
            ".Pengguna($_SESSION['Id'])['Nama']."<br>
                <p class='font-weight-light'>".Pengguna($_SESSION['Id'])['Level']."</p>
            </div>

            <!-- Divider -->
            <hr class='sidebar-divider'>

                $menusidebar

            <!-- Sidebar Toggler (Sidebar) -->
            <div class='text-center d-none d-md-inline'>
                <button class='rounded-circle border-0' id='sidebarToggle'></button>
            </div>

        </ul>

    ";
?>