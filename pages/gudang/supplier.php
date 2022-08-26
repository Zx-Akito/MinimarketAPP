<?php
    $template = "dashboard";
    $judul = "Supplier";
    $active3 = "active";
    AksesGudang();

    $id=$_GET['id'];
    $keyword = $_POST['keyword'];
    $cari = $_POST['cari'];
    $table = "supplier";

    $q = mysqli_query ($koneksi, "SELECT * FROM supplier order by id_supplier DESC");

    if ($cari) {
        $key = "nama LIKE '%$keyword%' OR alamat LIKE '%$keyword%'";
        $q = Cari($table,$key);
    }

    foreach($q as $a)
            {
                $no++;
                $data.="
                    <tr>
                        <th scope='row' class='text-center'>$no</th>
                        <td>{$a['nama']}</td>
                        <td class='text-capitalize'>{$a['alamat']}</td>
                        <td class='text-center'>+62 {$a['telp']}</td>
                        <td class='text-center'>
                            <a class='btn btn-success' href='?page=gudang/edit_supplier&id={$a['id_supplier']}'><i class='fas fa-edit'></i></a>
                            <a class='btn btn-danger' href='?page=$page&id={$a['id_supplier']}&p=tanya'><i class='fas fa-times-circle'></i></i></a>
                        </td>
                    </tr>
                ";
            }

    $konten = "
    <div class='container pr-5 pl-5'>
        <div class='mt-5 mb-3'>
            <h1>Daftar Supplier</h1>
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
                    <th scope='col'>Nama Toko</th>
                    <th scope='col'>Alamat</th>
                    <th scope='col'>Telp</th>
                    <th scope='col'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                $data
            </tbody>
        </table>

        <div class'button'>
            <a href='?page=gudang/tambah_supplier' type='submit' class='btn btn-primary'>Tambah</a>
        </div>
    </div>
    ";

    $p=$_GET['p'];
    switch($p)
    {
        case "tanya":
            $alert=towewengkonfirm("?page=gudang/hapus_supplier&id=$id");
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