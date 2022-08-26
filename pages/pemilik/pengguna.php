<?php

    $template = "dashboard";
    $judul = "Pengguna";
    $active2 = "active";
    AksesPemilik();

    $id=$_GET['id'];
    $keyword = $_POST['keyword'];
    $cari = $_POST['cari'];
    $table = "user";

    $q = mysqli_query ($koneksi, "SELECT * FROM user order by Level DESC");

    if ($cari)
    {
        $key = "Nama LIKE '%$keyword%' OR Username LIKE '%$keyword%' OR Level LIKE '%$keyword%' OR Status LIKE '%$keyword%'";
        $q = Cari($table,$key);
    }

        foreach($q as $a)
            {
                $no++;
                $data.="

                    <tr>
                        <th scope='row' class='text-center'>$no</th>
                        <td>{$a['Nama']}</td>
                        <td>{$a['Username']}</td>
                        <td class='text-center text-capitalize'>".Status($a['Status'])."</td>
                        <td class='text-center'>".Level($a['Level'])."</td>
                        <td class='text-center'>
                            <a class='btn btn-success' href='?page=pemilik/edit_pengguna&id={$a['id_user']}'><i class='fas fa-edit'></i></a>
                            <a class='btn btn-warning' href='?page=pemilik/reset_password&id={$a['id_user']}'><i class='fa-solid fa-lock'></i></a>
                            <a class='btn btn-danger' href='?page=$page&id={$a['id_user']}&p=tanya'><i class='fas fa-times-circle'></i></a>
                        </td>
                    </tr>

                ";
            }

    $konten = "
    
        <div class='container pr-5 pl-5'>
            <div class='mt-5 mb-3'>
                <h1>Daftar Pengguna</h1>
            </div>

            <form method='post'>
                <div class='input-group'>
                    <div class='col-sm-3 ml-auto'>
                        <input type='text' class='form-control' name='keyword' autofocus>
                    </div>
                    <input name='cari' type='submit' class='btn btn-primary' value='Cari'>
                </div>
            </form>

            <table class='table table-bordered' id='table'>
                <thead class='thead-light'>
                    <tr class='text-center'>
                        <th scope='col'>No</th>
                        <th scope='col'>Nama</th>
                        <th scope='col'>Username</th>
                        <th scope='col'>Status</th>
                        <th scope='col'>Level</th>
                        <th scope='col'>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    $data
                </tbody>
            </table>

            <a class='btn btn-primary' href='?page=pemilik/tambah_pengguna' role='button'>Tambah</a>
        </div>
        
    ";

    $p=$_GET['p'];
    switch($p)
    {
        case "tanya":

            $alert=towewengkonfirm("?page=pemilik/hapus_pengguna&id=$id");

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