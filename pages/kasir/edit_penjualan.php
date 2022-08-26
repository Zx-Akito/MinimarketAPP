<?php
    $template = "dashboard";
    $judul = "Edit Penjualan";
    $active5 = "active";
    AksesKasir();

    $id=$_GET['id']; //kode pemblian
    $id1=$_GET['id1'];//kode barang beli
    $aksi=$_GET['aksi'];

    $a1=$_POST['a1'];
    $a2=$_POST['a2'];
    $a3=$_POST['a3'];
    $a4=$_POST['a4'];
    $a5=$_POST['a5'];
    $tombol=$_POST['tombol'];
    $tabel="penjualan";

    switch($tombol)
    {
        case "Baru":
            
            $field="waktu, id_user, kode";

            $kode=date("YmdHis");
            $waktu=date("Y-m-d H:i:s");
            $value="'$waktu','{$_SESSION['Id']}','$kode'";
            $keterangan=TambahTrans($tabel,$field,$value);

            $kunci="kode='$kode'";
            $qjual=AmbilData($tabel,$kunci);

            header("location:?page=kasir/tambah_penjualan&id={$qjual['id_penjualan']}");
            
        break;
        case "Tambah":
            $kunci="id_barang='$a2'";
            $qjual=AmbilData("barang",$kunci);
            $harga=$qjual['harga_jual'];

            TambahTrans("jual_barang",
            "id_penjualan, id_barang, jumlah, harga",
            "'$id','$a2','$a5','$harga'");

            header("location:?page=$page&id=$id");
        break;
        case "Selesai":
            header("location:?page=kasir/penjualan");
        break;
        
    }
    switch($aksi)
    {
        case "hapus":
            Hapus("jual_barang","id_jual_barang='$id1'");
        break;
    }


    if($id!="")
    {
        $kunci="id_penjualan='$id'";
        $DataBeli=AmbilData($tabel,$kunci);
        $a1=$DataBeli['kode'];
        $a2=$DataBeli['id_barang'];

        $q=AmbilDataAll("struk_penjualan","WHERE id_penjualan='$id'");    
        foreach($q as $qbaru)
        {
            $number++;
            $data.="
                <tr>
                    <td class='text-center'>$number</td>
                    <td class='text-left'>{$qbaru['barcode']}</td>
                    <td class='text-left'>{$qbaru['nama']}</td>
                    <td class='text-center'>{$qbaru['jumlah']}</td>
                    <td class='text-right'>Rp. ".rupiah($qbaru['harga']).",-</td>              
                    <td class='text-right'>Rp. ".rupiah($qbaru['total']).",-</td>
                    <td class='text-center'>
                    <a class='btn btn-success' href='?page=$page&id=$id&id1={$qbaru['id_jual_barang']}&aksi=hapus'>
                    <i class='fas fa-times-circle'></i>
                    </a>
                    </td>
                </tr>
            ";
        }
    }


    $qbarang=AmbilDataAll("barang","");
    foreach ($qbarang as $arbarang) 
    {
        $listbarang.="
            <option value='{$arbarang['id_barang']}'> {$arbarang['nama']} </option>
        ";
    }

    $qbar = AmbilDataAll ("barang","");
    foreach ($qbar as $arbar)
    {
        if ($a2==$arbar['id_barang']) 
        {
            $listbar.="
                <option value='{$arbar['id_barang']}' selected> {$arbar['nama']} </option>
            ";
        }
        else {
            $listbar.="
                <option value='{$arbar['id_barang']}'> {$arbar['nama']} </option>
            ";
        }
    }

    if($id!="")
    {
            $TTambahan="    
                <input type='submit' name='tombol' value='Tambah' class='btn btn-primary btn-md'>
                <input type='submit' name='tombol' value='Selesai' class='btn btn-success btn-md'>
            ";
    
            $FTambahan="
                <div class='row mt-3 mb-5'>
                    <div class='col-md-2'>Jumlah</div>
                    <div class='col-md-2'>
                    <div class='input-group'>
                        <input type='text' class='form-control' name='a5'>
                    </div>
                    </div>
                </div>
            ";
    
        
        
            
    }
    else
    {
        $TTambahan="
            <input type='submit' name='tombol' value='Baru' class='btn btn-success btn-md'>
        ";

        $disabled="disabled";
    }

    $konten = "
        <div class='container mt-5'>
            <form method='post' autocomplete='off' class='ml-3 mr-3'>
                <h1 class='mb-5'>Edit Transaksi</h1>
                <div class='form-group'>
                    
                    <div class='row'>
                        <div class='col-md-2'>Kode</div>
                        <div class='col-md-3'>
                            <input type='text' class='form-control' name='a1' value='$a1' readonly>
                        </div>
                    </div>

                    <div class='row mt-3'>
                        <div class='col-md-2'>Barang</div>
                        <div class='col-md-4'>
                        <select class='form-control' name='a2' $disabled>
                            <option selected class='text-center'>- - Pilih - -</option>
                                $listbar
                        </select>
                        </div>
                    </div>
                    <P>
                    <div class'button'>
                        $FTambahan
                        $TTambahan
                    </div>
                </div>

            </form>   

            <table class='table table-sm table-bordered mt-3'>
                <thead class='thead-light'>
                    <tr class='text-center'>
                        <th scope='col'>No</th>
                        <th scope='col'>Kode Barang</th>
                        <th scope='col'>Nama Barang</th>
                        <th scope='col'>Qtr</th>
                        <th scope='col'>Harga</th>
                        <th scope='col'>Jumlah</th>
                        <th scope='col'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    $data
                </tbody>
            </table>
        </div>
    ";
?>