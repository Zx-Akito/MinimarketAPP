<?php
    $template = "dashboard";
    $judul = "Laporan Stok Barang";
    $active2 = "active";
    AksesGudang();

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
    <div class='container pr-5 pl-5'>
        <div class='mt-5 mb-3'>
            <h1>Laporan Stok Barang</h1>
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

        <div class'button'>
            <a href='?page=gudang/print_stok_barang' type='submit' class='btn btn-primary'>Cetak</a>
            <a href='?page=gudang/barang' type='submit' class='btn btn-batal'>Kembali</a>
        </div>

    </div>
    ";
?>