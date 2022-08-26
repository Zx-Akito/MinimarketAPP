<?php

    $id = $_GET['id'];
    $tabel = "user";
    $kunci = "id_user='$id'";
    AksesPemilik();

    $tombol = $_POST['tombol'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];
    $status = $_POST['status'];

    if ($tombol) 
    {
        $alert=Edit_Pengguna($nama,$username,$level,$status,$id);
    }

    $q = AmbilData($tabel,$kunci);
    $a = "$q[Nama]";
    $b = "$q[Username]";
    $c = "$q[id_user]";

        switch ($q['Level']) 
        {
            case 'pemilik':

                $selected1 = 'selected';

                break;
            
            case 'gudang':

                $selected2 = 'selected';

                break;

            case 'kasir':

                $selected3 = 'selected';

                break;
        }

        switch ($q['Status']) 
        {
            case 'aktif':

                $selected4 = 'selected';

                break;
            
            case 'tidak aktif':

                $selected5 = 'selected';

                break;
        }



    $template = "dashboard";
    $judul = "Edit Pengguna";
    $active2 = "active";
    $konten = "

        <div class='container ml-3 mt-5'>
            <form method='post' autocomplete='off'>
                <h1 class='mb-5'>Edit Pengguna</h1>
                <div class='form-group'>

                    <div class='row'>
                        <div class='col-md-2'>Nama</div>
                        <div class='col-md-4'>
                            <input type='text' class='form-control' name='nama' value='$a'>
                        </div>
                    </div>
                    
                    <div class='row mt-3'>
                        <div class='col-md-2'>Username</div>
                        <div class='col-md-3'>
                            <input type='text' class='form-control' name='username' value='$b'>
                        </div>
                    </div>

                    <div class='row mt-3'>
                        <div class='col-md-2'>Level</div>
                        <div class='col-md-2'>
                            <select class='form-control mb-3' name='level'>
                                <option selected class='text-center'>- - Pilih - -</option>
                                <option value='pemilik' $selected1>Pemilik</option>
                                <option value='gudang' $selected2>Bagian Gudang</option>
                                <option value='kasir' $selected3>Kasir</option>
                            </select>
                        </div>
                    </div>

                    <div class='row mb-3'>
                        <div class='col-md-2'>Status</div>
                        <div class='col-md-2'>
                            <select class='form-control mb-3' name='status'>
                                <option selected class='text-center'>- - Pilih - -</option>
                                <option value='aktif' $selected4>Aktif</option>
                                <option value='tidak aktif' $selected5>Tidak Aktif</option>
                            </select>
                        </div>
                    </div>

                    <div class'button'>
                        <input type='submit' value='Simpan' class='btn btn-update' name='tombol'>
                        <a href='?page=pemilik/pengguna' type='submit' class='btn btn-batal'>Kembali</a>
                    </div>
                </div>
            </form>   
        </div>
    ";
    
?>