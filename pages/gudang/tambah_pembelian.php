<?php
    $template = "dashboard";
    $judul = "Tambah Pembelian";
    $active4 = "active";
    AksesGudang();

    $id=$_GET['id']; //kode pemblian
    $id1=$_GET['id1'];//kode barang beli
    $aksi=$_GET['aksi'];

    $a1=$_POST['a1'];
    $a2=$_POST['a2'];
    $a3=$_POST['a3'];
    $a4=$_POST['a4'];
    $a5=$_POST['a5'];
    $tombol=$_POST['tombol'];
    $tabel="pembelian";

    switch($tombol)
    {
        case "Baru":
            
            $field="waktu, id_supplier, id_user, kode";

            $kode=date("YmdHis");
            $waktu=date("Y-m-d H:i:s");
            $value="'$waktu','$a2','{$_SESSION['Id']}','$kode'";
            $keterangan=TambahTrans($tabel,$field,$value);

            $kunci="kode='$kode'";
            $qbeli=AmbilData($tabel,$kunci);

            header("location:?page=gudang/tambah_pembelian&id={$qbeli['id_pembelian']}");
            
        break;
        
        case "Tambah":

            TambahTrans("beli_barang",
            "id_barang,id_pembelian,jumlah, harga",
            "'$a3','$id','$a5','$a4'");

            header("location:?page=$page&id=$id");
        break;

        case "Selesai":
            header("location:?page=$page");
        break;
        
    }
    switch($aksi)
    {
        case "hapus":
            Hapus("beli_barang","id_beli_barang='$id1'");
        break;
    }


    if($id!="")
    {
        $kunci="id_pembelian='$id'";
        $DataBeli=AmbilData($tabel,$kunci);
        $a1=$DataBeli['kode'];
        $a2=$DataBeli['id_supplier'];

        $q=AmbilDataAll("list_beli_barang","WHERE id_pembelian='$id'");    
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
                    <a class='btn btn-danger' href='?page=$page&id=$id&id1={$qbaru['id_beli_barang']}&aksi=hapus'>
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

    $qsup = AmbilDataAll ("supplier","");
    foreach ($qsup as $arsup)
    {
        if ($a2==$arsup['id_supplier']) 
        {
            $listsup.="
                <option value='{$arsup['id_supplier']}' selected> {$arsup['nama']} </option>
            ";
        }
        else {
            $listsup.="
                <option value='{$arsup['id_supplier']}'> {$arsup['nama']} </option>
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
                <div class='row'>
                    <div class='col-md-2'>Barang</div>
                    <div class='col-md-4'>
                        <select class='form-control' name='a3'>
                            <option selected class='text-center'>- - Pilih - -</option>
                                $listbarang
                        </select>
                    </div>
                </div>

                <div class='row mt-3'>
                    <div class='col-md-2'>Harga</div>
                    <div class='col-md-3'>
                        <div class='input-group'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text' id='basic-addon1'>Rp</span>
                            </div>
                            <input type='text' class='form-control' name='a4'>
                        </div>
                    </div>
                </div>

                <div class='row mt-3 mb-5'>
                    <div class='col-md-2'>Jumlah</div>
                    <div class='col-md-2'>
                    <div class='input-group'>
                        <input type='text' class='form-control' name='a5'>
                    </div>
                    </div>
                </div>
            ";
    
        
        $disabled="disabled";
            
    }
    else
    {
        $TTambahan="
            <input type='submit' name='tombol' value='Baru' class='btn btn-success btn-md'>
        ";
    }

    $konten = "
        <div class='container mt-5'>
            <form method='post' autocomplete='off' class='ml-3 mr-3'>
                <h1 class='mb-5'>Tambah Pembelian</h1>
                <div class='form-group'>
                    
                    <div class='row'>
                        <div class='col-md-2'>Kode</div>
                        <div class='col-md-3'>
                            <input type='text' class='form-control' name='a1' value='$a1' readonly>
                        </div>
                    </div>

                    <div class='row mt-3'>
                        <div class='col-md-2'>Supplier</div>
                        <div class='col-md-3'>
                        <select class='form-control mb-3' name='a2' $disabled>
                            <option selected class='text-center'>- - Pilih - -</option>
                                $listsup
                        </select>
                        </div>
                    </div>

                    <div class'button'>
                        $FTambahan
                        $TTambahan
                        <a href='?page=gudang/pembelian' type='submit' class='btn btn-batal'>Kembali</a>
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