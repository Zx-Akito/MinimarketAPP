<?php
    $template = "dashboard";
    $judul = "Laporan Pembelian";
    $active3 = "active";
    AksesPemilik();

    $id=$_GET['id'];
    $tgl=$_GET['tgl'];
    $tgl1=$_GET['tgl1'];

    $tombol=$_POST['tombol'];
    $a1=$_POST['a1'];
    $a2=$_POST['a2'];
    $tabel="pembelian_list";

    if($tombol)
    {
        header("location:?page=$page&tgl=$a1&tgl1=$a2");
    }

    if($tgl!="")
    {
        $lain="WHERE DATE(waktu) BETWEEN '$tgl' AND '$tgl1'";
        $q=AmbilDataAll($tabel,$lain);
        $total=0;

        foreach($q as $ar)
        {
            $no++;
            $data.="

                <tr>
                    <td class='text-center'>$no</td>
                    <td class='text-center'>{$ar['kode']}</td>
                    <td class='text-center'>{$ar['waktu']}</td>
                    <td class='text-left'>{$ar['nama']}</td>
                    <td class='text-right'>Rp. ".rupiah($ar['total']).",-</td>
                </tr>

            ";

            $total+=$ar['total'];
        }
    }

    $konten = "

    <div class='container pr-5 pl-5'>
        <div class='mt-5 mb-4'>
            <h1>Laporan Pembelian</h1>
        </div>

        <form method='post'>
            <div class='row ml-1'>
                <label for='inputEmail3' class=' col-form-label'>Tanggal</label>
                <div class='col-sm-3'>
                <input type='text' class='form-control' placeholder='yyyy-mm-dd' name=a1 value=$a1>
                </div>
                <div class='col-sm-3'>
                <input type='text' class='form-control' placeholder='yyyy-mm-dd' name=a2 value=$a2>
                </div>
                <input name='tombol' type='submit' class='btn btn-primary' value='Lihat'>
            </div>
        </form>

        <table class='table table-bordered'>
            <thead class='thead-light'>
                <tr class='text-center'>
                    <th scope='col'>No</th>
                    <th scope='col'>Kode</th>
                    <th scope='col'>Waktu</th>
                    <th scope='col'>Supplier</th>
                    <th scope='col'>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                $data
                <th class='text-center font-weight-bold' colspan='4'>TOTAL</th>
                <th class='text-right font-weight-bold'>Rp. ".rupiah($total).",-</th>
            </tbody>
        </table>
    </div>

    ";
    
?>