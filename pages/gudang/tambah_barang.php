<?php
    $template = "dashboard";
    $judul = "Tambah Barang";
    $active2 = "active";
    AksesGudang();

    $tombol=$_POST['tombol'];
    $a=$_POST['barcode'];
    $b=$_POST['nama'];
    $c=$_POST['harga'];
    $d=$_POST['stok'];

    if($tombol)
    {
        if ($a!="" AND $b!="" AND $c!="") 
        {
            $alert=TambahBarang($a,$b,$c);
        }
        else 
        {
            $alert=Toweweng("info","Peringatan","Barang gagal ditambah periksa kembali inputan");
        }
    }

    $konten = "
        <div class='container ml-3 mt-5'>
            <form method='post' autocomplete='off'>
                <h1 class='mb-5'>Tambah Barang</h1>
                <div class='form-group'>

                    <div class='row mt-3'>
                        <div class='col-md-2'>Nama Barang</div>
                        <div class='col-md-5'>
                            <input type='text' class='form-control' name='nama'>
                        </div>
                    </div>

                    <div class='row mt-3'>
                        <div class='col-md-2'>Harga Jual</div>
                        <div class='input-group col-md-3'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text'>Rp</span>
                            </div>
                            <input type='text' class='form-control' name='harga'>
                        </div>
                    </div>

                    <div class='row mt-3 mb-5'>
                        <div class='col-md-2'>Barcode</div>
                        <div class='col-md-3'>
                            <input type='text' class='form-control' name='barcode'>
                        </div>
                    </div>

                    <div class'button'>
                        <input type='submit' value='Simpan' class='btn btn-update' name='tombol'>
                        <a href='?page=gudang/barang' type='submit' class='btn btn-batal'>Kembali</a>
                    </div>

                </div>
            </form>   
        </div>
    ";
?>