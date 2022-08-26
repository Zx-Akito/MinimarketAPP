<?php

    $tombol=$_POST['login'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    if ($tombol) {
        $alert=Login($username,$password);
    }

    if ($_SESSION['Id']) {
        header('Location:index.php');
        $alert=Toweweng("success","Berhasil","Password berhasil direset");
    }

    $template = "depan";
    $judul    = "Login";
    $konten   = "
        <div class='container mt-4'>
            <div class='row'>
                <div class='col-lg-6 animate__animated animate__fadeInLeft'>
                    <div class='mt-5 text-white'>
                        <h1>Selamat Datang</h1>
                        <p class=''>Di Web Pembayaran Minimarket</p>
                        <img src='./assets/img/logo.png' class='logo-1'>
                    </div>
                </div>

                <div class='col-lg-6 mt-5'>
                    <div class='card'>
                        <div class='card-body'>
                        <h5 class='card-title'>Login</h5>
                        <form method='post' autocomplete='off'>
                            <div class='form-group'>
                            <label>Username</label>
                            <input name='username' type='text' class='form-control' aria-describedby='emailHelp'>
                            </div>
                            <div class='form-group'>
                            <label for='exampleInputPassword1'>Password</label>
                            <input name='password' type='password' class='form-control' id='exampleInputPassword1'>
                            </div>
                                <input name='login' type='submit' class='btn btn-primary' value='Masuk'>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";

?>