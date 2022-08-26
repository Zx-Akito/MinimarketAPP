<?php
    $template = "dashboard";
    $judul = "Pembelian";
    $active4 = "active";
    AksesGudang();

    $id=$_GET['id'];
    $tgl=$_GET['tgl'];

    $tombol=$_POST['tombol'];
    $a1=$_POST['a1'];
    $tabel="pembelian_list";

    if($tombol)
    {
        header("location:?page=$page&tgl=$a1");
    }

    if($tgl!="")
    {
        $lain="WHERE DATE(waktu)='$tgl'";
        $q=AmbilDataAll($tabel,$lain);
        $total=0;
        foreach($q as $ar)
        {
            $no++;
            $data.="
                <tr>
                    <td class='text-center'>$no</td>
                    <td class='text-center'>{$ar['kode']}</td>
                    <td class='text-center'>{$ar['waktu']}</td>
                    <td class='text-left'>{$ar['nama']}</td>
                    <td class='text-right'>Rp. ".rupiah($ar['total']).",-</td>
                    <td class='text-center'>
                        <a class='btn btn-success' href='?page=gudang/edit_pembelian&id={$ar['id_pembelian']}'><i class='fa fa-edit'></i></a>
                        <a class='btn btn-danger' href='?page=$page&id={$ar['id_pembelian']}&p=tanya&tgl=$tgl'><i class='fas fa-times-circle'></i></a>
                    </td>
                </tr>
            ";
            $total+=$ar['total'];
        }

        $hasil="
            <table class='table table-bordered'>
                <tbody>
                    $data
                    <tr>
                        <th class='text-center'></th>
                        <th class='text-center font-weight-bold' colspan='3'>TOTAL</th>
                        <th class='text-right font-weight-bold'>Rp. ".rupiah($total).",-</th>
                        <th class='text-center'></th>
                    </tr>
                </tbody>
            </table>
        ";
    }

    $konten = "
    <div class='container pr-5 pl-5'>
        <div class='mt-5 mb-3'>
            <h1>Daftar Pembelian</h1>
        </div>

        <form method='post'>
            <div class='row ml-2'>
                <label for='inputEmail3' class=' col-form-label'>Tanggal</label>
                <div class='col-sm-3'>
                <input type='text' class='form-control' placeholder='yyyy-mm-dd' name='a1' value='$a1'>
                </div>
                <input name='tombol' type='submit' class='btn btn-primary' value='Lihat'>
            </div>
        </form>

        <table class='table table-bordered'>
            <thead class='thead-light'>
                <tr class='text-center'>
                    <th scope='col'>No</th>
                    <th scope='col'>Kode</th>
                    <th scope='col'>Waktu</th>
                    <th scope='col'>Supplier</th>
                    <th scope='col'>Jumlah</th>
                    <th scope='col'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                $data
                <th class='text-center font-weight-bold' colspan='4'>TOTAL</th>
                <th class='text-right font-weight-bold'>Rp. ".rupiah($total).",-</th>
            </tbody>
        </table>

        <div class'button'>
            <a href='?page=gudang/tambah_pembelian' type='submit' class='btn btn-primary'>Tambah</a>
        </div>
    </div>
    ";

    $p=$_GET['p'];
    switch($p)
    {
        case "tanya":
            $alert=towewengkonfirm("?page=gudang/hapus_pembelian&id=$id&tgl=$tgl");
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