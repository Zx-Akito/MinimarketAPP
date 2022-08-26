<?php
    $template = "dashboard";
    $judul = "Edit Barang";
    $active2 = "active";
    AksesGudang();

    $id = $_GET['id'];
    $tabel = "barang";
    $kunci = "id_barang='$id'";

    $tombol = $_POST['tombol'];
    $barcode = $_POST['barcode'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    // Fungsi Edit Barang
    if ($tombol) 
    {
        $field="
            barcode='$barcode',
            nama='$nama',
            harga_jual='$harga'
        ";
        $alert=Edit_Barang($tabel,$field,$kunci);
    }

    // Fungsi Menampilkan Data
    $q = AmbilData($tabel,$kunci);
    $a = "$q[barcode]";
    $b = "$q[nama]";
    $c = "$q[harga_jual]";
    $d = "$q[stok]";
    $e = "$q[id_barang]";

    $konten = "
        <div class='container ml-3 mt-5'>
            <form method='post' autocomplete='off'>
                <h1 class='mb-5'>Edit Barang</h1>
                <div class='form-group'>

                    <div class='row'>
                        <div class='col-md-2'>Barcode</div>
                        <div class='col-md-3'>
                            <input type='text' class='form-control' name='barcode' value='$a'>
                        </div>
                    </div>

                    <div class='row mt-3'>
                        <div class='col-md-2'>Nama Barang</div>
                        <div class='col-md-5'>
                            <input type='text' class='form-control' name='nama' value='$b'>
                        </div>
                    </div>

                    <div class='row mt-3 mb-5'>
                        <div class='col-md-2'>Harga Jual</div>
                        <div class='input-group col-md-2'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text'>Rp</span>
                            </div>
                            <input type='text' class='form-control' name='harga' value='$c'>
                        </div>
                    </div>

                    <div class'button'>
                        <input type='submit' value='Update' class='btn btn-update' name='tombol'>
                        <a href='?page=gudang/barang' type='submit' class='btn btn-batal'>Kembali</a>
                    </div>
                </div>
        </form>   
        </div>
    ";
?>