<?php

    //Fungsi Login
    function Login($username="",$password="")
    {
        global $koneksi;
    
        $sql = "SELECT * FROM user WHERE md5(Username)=md5('$username') AND Password=md5('$password')";
        $result = mysqli_query($koneksi,$sql);
        $row = mysqli_num_rows($result);

        if ($row) {
            $data=mysqli_fetch_assoc($result);
            $_SESSION['Id'] = $data['id_user'];
            $_SESSION['JenisLog'] = $data['Level'];
            header("location:index.php");
        }else 
            {
                return Toweweng("error","Login Gagal","Username atau password salah");
            }

    }

    //level pengguna
    function Level($data)
    {
        switch($data)
        {
            case "pemilik":return "<p class='text-success'>Pemilik</p>";break;
            case "gudang":return "<p class='text-danger'>Gudang</p>";break;
            case "kasir":return "<p class='text-primary'>Kasir</p>";break;
        }
    }

    //level status
    function Status($data)
    {
        switch($data)
        {
            case "aktif":return "<p class='text-white badge badge-success pl-3 pr-3 pt-2 pb-2 badge-pill'>Aktif</p>";break;
            case "tidak aktif":return "<p class='text-white badge badge-danger pl-3 pr-3 pt-2 pb-2 badge-pill'>Tidak Aktif</p>";break;
        }
    }

    //Fungsi SweetAlert
    function Toweweng($jenis="",$peringatan="",$keterangan="")
    {
        return "
            <script>
                Swal.fire(
                    '".$peringatan."',
                    '".$keterangan."',
                    '".$jenis."'
                )
            </script>
        ";
    }

    //Fungsi Ambil Data di Database
    function AmbilData($tabel,$kunci)
    {
        global $koneksi;

        $query = "SELECT * FROM $tabel WHERE $kunci";
        $query = mysqli_query ($koneksi,$query);
        return mysqli_fetch_assoc ($query);
    }

    //Fungsi Untuk Data Pengguna
    function Pengguna($kunci)
    {
        global $koneksi;

        $Query=mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$kunci'");
        return mysqli_fetch_assoc($Query);
    
    }

    //Fungsi Tambah Pengguna
    function TambahPengguna ($a,$b,$c)
    {
        global $koneksi;

        $q = "INSERT INTO user (Nama, Username, Level) values ('$a','$b','$c')";
        $hasil = mysqli_query($koneksi,$q);

        if ($hasil) {

            $alert=Toweweng("success","Berhasil","Pengguna telah ditambahkan");
        }
        else {

            $alert=Toweweng("error","Gagal","Pengguna gagal ditambahkan");
        }

        return $alert;
    }

    //Fungsi Edit Pengguna
    function Edit_Pengguna($nama,$username,$level,$status,$id)
    {

        global $koneksi;

        $q = "UPDATE user SET Nama='$nama', Username='$username', Level='$level', Status='$status' WHERE id_user='$id'";
        $hasil= mysqli_query($koneksi,$q);

        if ($hasil) 
        {
            $alert=Toweweng("success","Berhasil","Data berhasil diupdate");
        }
        else 
        {
            $alert=Toweweng("error","Gagal","Data gagal diupdate");
        }

        return $alert;
    }

    //Fungsi Reset Password Pengguna
    function ResetPassword ($a3,$kunci)
    {
        global $koneksi;

        $q = "UPDATE user SET Password=md5('$a3') WHERE id_user='$kunci'";
        $hasil = mysqli_query($koneksi,$q);

        if ($hasil) {

            $alert=Toweweng("success","Berhasil","Password berhasil direset");
        }else {

            $alert=Toweweng("error","Gagal","Password gagal direset");
        }

        return $alert;
    }

    //Fungsi Tambah Barang
    function TambahBarang ($a,$b,$c)
    {
        global $koneksi;

        $q = "INSERT INTO barang (barcode, nama, harga_jual) values ('$a','$b','$c')";
        $hasil = mysqli_query($koneksi,$q);

        if ($hasil) {

            $alert=Toweweng("success","Berhasil","Barang berhasil ditambahkan");
        }
        else {

            $alert=Toweweng("error","Gagal","Barang gagal ditambahkan");
        }

        return $alert;
    }
    
    //Fungsi Edit Barang
    function Edit_Barang($tabel,$field,$kunci)
    {
        global $koneksi;

        $q = "UPDATE $tabel SET $field WHERE $kunci";
        $hasil = mysqli_query ($koneksi,$q);

        if ($hasil) {
            $alert=Toweweng("success","Berhasil","Data berhasil diupdate");
        }
        else {
            $alert=Toweweng("error","Gagal","Data gagal diupdate");
        }

        return $alert;
    }

    //Fungsi Tambah Supplier
    function TambahSupplier ($a,$b,$c)
    {
        global $koneksi;

        $q = "INSERT INTO supplier (nama, alamat, telp) values ('$a','$b','$c')";
        $hasil = mysqli_query($koneksi,$q);

        if ($hasil) {

            $alert=Toweweng("success","Berhasil","Supplier berhasil ditambahkan");
        }
        else {

            $alert=Toweweng("error","Gagal","Supplier gagal ditambahkan");
        }

        return $alert;
    }

    //Fungsi Ambil Data Supplier Untuk Tambah Pembelian
    function AmbilDataAll ($tabel,$lain)
    {
        global $koneksi;
        $query = "SELECT * FROM $tabel $lain";
        return mysqli_query ($koneksi,$query);
    }

    function AmbilDatatrans ($field,$tabel,$lain)
    {
        global $koneksi;
        $query = "SELECT * $field FROM $tabel $lain";
        return mysqli_query ($koneksi,$query);
    }

    //Query Fungsi Tambah Transaksi
    function TambahTrans($tabel,$field,$value)
    {
        global $koneksi;

        $q="
            INSERT INTO $tabel 
            ($field) 
            VALUES ($value)
        ";

        return mysqli_query($koneksi,$q);
    }
    
    

    //QUERY Tambah
    function Tambah($tabel,$field,$value)
    {
        global $koneksi;

        $q = "INSERT INTO $tabel ($field) values ($value)";
        return mysqli_query($koneksi,$q);
    }

    //Query Edit/UPDATE
    function Edit($tabel,$field,$kunci)
    {
        global $koneksi;

        $q="update $tabel set $field where $kunci";
        $hasil=mysqli_query($koneksi,$q);
        if($hasil)
        {
            $keterangan=Toweweng("success","Data berhasil disimpan","");
        }
        else
        {
            $keterangan=Toweweng("error","Data gagal disimpan","");
        }

        return $keterangan;
    }

    //Query Hapus
    function Hapus($tabel,$kunci)
    {
        global $koneksi;
        $q="DELETE FROM $tabel where $kunci";
        return mysqli_query($koneksi,$q);
    }

    //Fungsi Merupiahkan Angka
    function rupiah($angka)
    {
        return number_format($angka,0,',','.');
    }

    //Alert Sweet konfirmasi
    function towewengkonfirm($linkdirect)
    {
        return "
        <script>
            Swal.fire({
                title: 'Yakin data akan dihapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '".$linkdirect."';
                }
            })
        </script>
        "; 
    }

    function AksesPemilik()
    {
        if ($_SESSION['JenisLog']!="pemilik") {
            header("location:index.php?page=beranda");
        }
    }

    function AksesGudang()
    {
        if ($_SESSION['JenisLog']!="gudang") {
            header("location:index.php?page=beranda");
        }
    }

    function AksesKasir()
    {
        if ($_SESSION['JenisLog']!="kasir") {
            header("location:index.php?page=beranda");
        }
    }

    function Cari($table,$key)
    {
        global $koneksi;

        $q = "SELECT * FROM $table WHERE $key";
        return mysqli_query($koneksi,$q);
    }

?>