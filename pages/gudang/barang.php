<?php
    $template = "dashboard";
    $judul = "Barang";
    $active2 = "active";
    AksesGudang();

    $id=$_GET['id'];
    $keyword = $_POST['keyword'];
    $cari = $_POST['cari'];
    $table = "barang";
    
    $q = mysqli_query ($koneksi, "SELECT * FROM barang order by id_barang DESC");

    if ($cari) {
        $key = "barcode LIKE '%$keyword%' OR nama LIKE '%$keyword%'";
        $q = Cari($table,$key);
    }

    foreach($q as $a)
            {
                $no++;
                $data.="
                    <tr>
                        <th scope='row' class='text-center'>$no</th>
                        <td class='text-center'>{$a['barcode']}</td>
                        <td class='text-capitalize'>{$a['nama']}</td>
                        <td class='text-right'>Rp. ".rupiah($a['harga_jual']).",-</td>
                        <td class='text-center'>{$a['stok']}</td>
                        <td class='text-center'>
                            <a class='btn btn-success' href='?page=gudang/edit_barang&id={$a['id_barang']}'><i class='fa fa-edit'></i></a>
                            <a class='btn btn-danger' href='?page=$page&id={$a['id_barang']}&p=tanya'><i class='fas fa-times-circle'></i></a>
                        </td>
                    </tr>
                ";
            }

    $konten = "
    <div class='container pr-5 pl-5'>
        <div class='mt-5 mb-3'>
            <h1>Daftar Barang</h1>
        </div>

        <form method='post'>
            <div class='input-group'>
                <div class='col-sm-3 ml-auto'>
                    <input type='text' class='form-control' name='keyword' autofocus>
                </div>
                <input name='cari' type='submit' class='btn btn-primary' value='Cari'>
            </div>
        </form>

        <table class='table table-bordered'>
            <thead class='thead-light'>
                <tr class='text-center'>
                    <th scope='col'>No</th>
                    <th scope='col'>Kode Barcode</th>
                    <th scope='col'>Nama Barang</th>
                    <th scope='col'>Harga Jual</th>
                    <th scope='col'>Stok</th>
                    <th scope='col'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                $data
            </tbody>
        </table>

        <div class'button'>
            <a href='?page=gudang/tambah_barang' type='submit' class='btn btn-primary'>Tambah</a>
            <a href='?page=gudang/laporan_stok' type='submit' class='btn btn-batal'>Cetak</a>
        </div>
    </div>
    ";

    $p=$_GET['p'];
    switch($p)
    {
        case "tanya":
            $alert=towewengkonfirm("?page=gudang/hapus_barang&id=$id");
        break;
    }

    $h=$_GET['h'];
    switch($h)
    {
        case "true":
            $alert=toweweng("success","Data telah dihapus");
        break;
        case "false":
            $alert=toweweng("info","Maaf Data tidak dapat dihapus");
        break;
    }
?>