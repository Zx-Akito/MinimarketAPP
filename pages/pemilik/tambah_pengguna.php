<?php

    $template = "dashboard";
    $judul = "Tambah Pengguna";
    $active2 = "active";
    AksesPemilik();

    $tombol=$_POST['tombol'];
    $a=$_POST['nama'];
    $b=$_POST['username'];
    $c=$_POST['level'];

    if($tombol)
    {
        if ($a!="" AND $b!="" AND $c!="") 
        {
            $alert=TambahPengguna($a,$b,$c);
        }
        else 
        {
            $alert=Toweweng("info","Peringatan","Pengguna gagal ditambah periksa kembali inputan");
        }
    }

    $konten = "
        <div class='container ml-3 mt-5'>
            <form method='post' autocomplete='off'>
                <h1 class='mb-5'>Tambah Pengguna</h1>
                <div class='form-group'>

                    <div class='row'>
                        <div class='col-md-2'>Nama</div>
                        <div class='col-md-4'>
                            <input type='text' class='form-control' name='nama' value='$nama'>
                        </div>
                    </div>

                    <div class='row mt-3'>
                        <div class='col-md-2'>Username</div>
                        <div class='col-md-3'>
                            <input type='text' class='form-control' name='username' value='$username'>
                        </div>
                    </div>

                    <div class='row mt-3 mb-3'>
                        <div class='col-md-2'>Level</div>
                        <div class='col-md-2'>
                        <select class='form-control mb-3' name='level'>
                            <option selected class='text-center'>- - Pilih - -</option>
                            <option value='1'>Pemilik</option>
                            <option value='2'>Bagian Gudang</option>
                            <option value='3'>Kasir</option>
                        </select>
                        </div>
                    </div>

                    <div class'button'>
                        <input type='submit' value='Tambah' class='btn btn-update' name='tombol'>
                        <a href='?page=pemilik/pengguna' type='submit' class='btn btn-batal'>Kembali</a>
                    </div>
                </div>
        </form>   
        </div>
    ";
    
?>