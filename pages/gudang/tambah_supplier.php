<?php
    $template = "dashboard";
    $judul = "Tambah Supplier";
    $active3 = "active";
    AksesGudang();

    $tombol=$_POST['tombol'];
    $a=$_POST['nama'];
    $b=$_POST['alamat'];
    $c=$_POST['telp'];
    $d=$_POST['id_supplier'];

    if($tombol)
    {
        if ($a!="" AND $b!="" AND $c!="") 
        {
            $alert=TambahSupplier($a,$b,$c);
        }
        else 
        {
            $alert=Toweweng("info","Peringatan","Supplier gagal ditambah periksa kembali inputan");
        }
    }

    $konten = "
        <div class='container ml-3 mt-5'>
            <form method='post' autocomplete='off'>
                <h1 class='mb-5'>Tambah Supplier</h1>
                <div class='form-group'>

                    <div class='row'>
                        <div class='col-md-2'>Nama</div>
                        <div class='col-md-5'>
                            <input type='text' class='form-control' name='nama'>
                        </div>
                    </div>

                    <div class='row mt-3'>
                        <div class='col-md-2'>Alamat</div>
                        <div class='col-md-6'>
                            <input type='text' class='form-control' name='alamat'>
                        </div>
                    </div>

                    <div class='row mt-3 mb-3'>
                        <div class='col-md-2'>Telp</div>
                        <div class='input-group col-md-3'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text'>+62</span>
                            </div>
                            <input type='text' class='form-control' name='telp' placeholder='89540023xxx'>
                        </div>
                    </div>

                    <div class'button'>
                        <input type='submit' value='Tambah' class='btn btn-update' name='tombol'>
                        <a href='?page=gudang/supplier' type='submit' class='btn btn-batal'>Kembali</a>
                    </div>

                </div>
            </form>   
        </div>
    ";
?>