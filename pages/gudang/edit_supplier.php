<?php
    $template = "dashboard";
    $judul = "Tambah Supplier";
    $active3 = "active";
    AksesGudang();

    $id = $_GET['id'];
    $tabel = "supplier";
    $kunci = "id_supplier='$id'";

    $tombol = $_POST['tombol'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    // Fungsi Edit Supplier
    if ($tombol) 
    {
        $field="
            nama='$nama',
            alamat='$alamat',
            telp='$telp'
        ";
        $alert=Edit_Barang($tabel,$field,$kunci);
    }

    // Fungsi Menampilkan Data
    $q = AmbilData($tabel,$kunci);
    $a = "$q[id_supplier]";
    $b = "$q[nama]";
    $c = "$q[alamat]";
    $d = "$q[telp]";

    $konten = "
        <div class='container ml-3 mt-5'>
            <form method='post' autocomplete='off'>
                <h1 class='mb-5'>Edit Supplier</h1>
                <div class='form-group'>

                    <div class='row'>
                        <div class='col-md-2'>Nama Toko</div>
                        <div class='col-md-5'>
                            <input type='text' class='form-control' name='nama' value='$b'>
                        </div>
                    </div>

                    <div class='row mt-3'>
                        <div class='col-md-2'>Alamat</div>
                        <div class='col-md-6'>
                            <input type='text' class='form-control' name='alamat' value='$c'>
                        </div>
                    </div>

                    <div class='row mt-3 mb-5'>
                        <div class='col-md-2'>Telp</div>
                        <div class='input-group col-md-3'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text'>+62</span>
                            </div>
                            <input type='text' class='form-control' name='telp' value='$d'>
                        </div>
                    </div>

                    <div class'button'>
                        <input type='submit' value='Update' class='btn btn-update' name='tombol'>
                        <a href='?page=gudang/supplier' type='submit' class='btn btn-batal'>Kembali</a>
                    </div>
                </div>
        </form>   
        </div>
    ";
?>