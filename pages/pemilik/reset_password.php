<?php

    $template = "dashboard";
    $judul = "Reset Password";
    $active2 = "active";
    AksesPemilik();

    $tombol = $_POST['tombol'];
    $id = $_GET['id'];
    $tabel = "user";
    $kunci = "id_user='$id'";

    if ($tombol) {
        $random=rand(1000,9999);
        $alert=ResetPassword($random,$id);
    }

    // Fungsi Menampilkan Data
    $q = AmbilData($tabel,$kunci);
    $a = "$q[Nama]";
    $b = "$q[Username]";
    $c = "$q[Password]";

    $konten = "
        <div class='container ml-3 mt-5'>
            <form method='post' autocomplete='off'>
                <h1 class='mb-5'>Reset Password</h1>
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

                    <div class='row mt-3 mb-3'>
                        <div class='col-md-2'>Password</div>
                        <div class='col-md-2'>
                            <input type='text' class='form-control' name='password' value='$random' readonly>
                        </div>
                    </div>

                    <div class'button'>
                        <input type='submit' value='Reset' class='btn btn-primary' name='tombol'>
                        <a href='?page=pemilik/pengguna' type='submit' class='btn btn-batal'>Kembali</a>
                    </div>
                </div>
        </form>   
        </div>
    ";
    
?>