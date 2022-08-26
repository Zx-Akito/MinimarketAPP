<?php
    $template  = "print";
    $judul = "Cetak Laporan";
    AksesGudang();

    $nama=Pengguna($_SESSION['Id'])['Nama'];
    $q = mysqli_query ($koneksi, "SELECT * FROM barang order by id_barang DESC");
    foreach($q as $a)
            {
                $no++;
                $data.="
                    <tr>
                        <th scope='row' class='text-center'>$no</th>
                        <td class='text-center'>{$a['barcode']}</td>
                        <td class='text-capitalize'>{$a['nama']}</td>
                        <td class='text-center'>{$a['stok']}</td>
                    </tr>
                ";
            }

    $konten = "

        <div class='text-center mb-5'>
            <h1>Laporan Stok Barang</h1>
            Tanggal ".date("d-m-Y")."
            <hr class='sidebar-divider ml-5 mr-5'>
        </div>

        <table class='table table-bordered'>
            <thead class='thead-light'>
                <tr class='text-center'>
                    <th scope='col'>No</th>
                    <th scope='col'>Kode Barang</th>
                    <th scope='col'>Nama Barang</th>
                    <th scope='col'>Stok</th>
                </tr>
            </thead>
            <tbody>
                $data
            </tbody>
        </table>

        <div style='margin-top:2cm;float:right'>
            <h5>Subang, ".date("d-m-Y")."</h5>
            <h5 class='mr-4'>Bagian Gudang</h5>

            <div style='margin-top:5cm'>
                <p>$nama</p>
            </div>
        <div>

    ";
?>