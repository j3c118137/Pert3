<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <title>Aksi</title>
    </head>
       
<?php
include "koneksi.php";
        $nimget = $_GET['nim'];
        $r = mysqli_query($kon,"SELECT * FROM mahasiswa where NIM='".$nimget."'");
        $brs=mysqli_fetch_assoc($r);
        $nim = $brs['NIM'];
        $nama = $brs['nama'];
        $jk = $brs['jk'];
        $agama = $brs['agama'];

        //misah Olahraga Favorite
        $olahraga = $brs['olahraga'];
        $olahpisah = explode(',', $olahraga);
    if ($_GET['aksi']=="edit"){
        ?>
        <body style="background-image: linear-gradient(to left, rgb(252, 140, 252), rgb(154, 39, 154));">
        <div class="container">
            <div class="card" style="margin-top:10%;margin-left:15%;margin-right:15%;border-radius:25px;">
                <div class="card-body">
                <h2 class="card-title">Form Edit </h5>
                <hr>
                <center>
                    <img style="width:80px; border-radius:30%;" src="<?php echo "image/".$brs['nama_file'];?>" alt="">
                </center>
                    <form style="margin-left:5%;" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-4">
                                        <label>NIM</label>
                                        <input type="text" class="form-control" name="nim" placeholder="Cth: J3C118137" value="<?php echo $nim;?>" required disabled>
                                    </div>
                                    <div class="col-6">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Isi Nama Anda..." value="<?php echo $nama;?>" required>
                                    </div>
                                </div>

                                <div class="row" style="margin-top:1.5%">
                                    <div class="col-4">
                                        <label>Jenis Kelamin</label><br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jk" value="L" required id="lakilaki" <?php if(($jk)=='Laki-laki') echo 'checked'?>>
                                            <label class="form-check-label" for="lakilaki">Laki - laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jk" value="P" required id="perempuan" <?php if(($jk)=='Perempuan') echo 'checked'?>>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <label for="exampleFormControlSelect2">Agama</label>
                                        <select class="form-control" id="exampleFormControlSelect2" required name="agama">
                                            <option value="Islam" <?php if(($agama)=='Islam') echo "selected='selected'";?>>Islam</option>
                                            <option value="Kristen Protestan" <?php if(($agama)=='Kristen Protestan') echo "selected='selected'";?>>Kristen Protestan</option>
                                            <option value="Kristen Katolik" <?php if(($agama)=='Kristen Katolik') echo "selected='selected'";?>>Kristen Katolik</option>
                                            <option value="Hindu" <?php if(($agama)=='Hindu') echo "selected='selected'";?>>Hindu</option>
                                            <option value="Budha" <?php if(($agama)=='Budha') echo "selected='selected'";?>>Budha</option>
                                            <option value="Konghucu" <?php if(($agama)=='Konghucu') echo "selected='selected'";?>>Konghucu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row" style="margin-top:1.5%">
                                    <div class="col-4">
                                        <label for="">Olahraga Favorit</label>
                                        <div class="form-check" style="margin-left:2%;">
                                            <?php if(in_array('Sepak Bola', $olahpisah))
                                                    echo '<input class="form-check-input" type="checkbox" name="olahraga[]" value="Sepak Bola" id="Bola" checked>';
                                                else {
                                                    echo '<input class="form-check-input" type="checkbox" name="olahraga[]" value="Sepak Bola" id="Bola">';
                                                }
                                            ?>
                                            <label class="form-check-label" for="Bola">
                                                Sepak Bola
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin-left:2%;">
                                            <?php if(in_array('Basket', $olahpisah))
                                                    echo '<input class="form-check-input" type="checkbox" name="olahraga[]" value="Basket" id="Basket" checked>';
                                                else {
                                                    echo '<input class="form-check-input" type="checkbox" name="olahraga[]" value="Basket" id="Basket">';
                                                }
                                            ?>
                                            <label class="form-check-label" for="Basket">
                                                Basket
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin-left:2%;">
                                            <?php if(in_array('Futsal', $olahpisah))
                                                    echo '<input class="form-check-input" type="checkbox" name="olahraga[]" value="Futsal" id="Futsal" checked>';
                                                else {
                                                    echo '<input class="form-check-input" type="checkbox" name="olahraga[]" value="Futsal" id="Futsal">';
                                                }
                                            ?>
                                            <label class="form-check-label" for="Futsal">
                                                Futsal
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin-left:2%;">
                                            <?php if(in_array('Renang', $olahpisah))
                                                    echo '<input class="form-check-input" type="checkbox" name="olahraga[]" value="Renang" id="Renang" checked>';
                                                else {
                                                    echo '<input class="form-check-input" type="checkbox" name="olahraga[]" value="Renang" id="Renang">';
                                                }
                                            ?>
                                            <label class="form-check-label" for="Renang">
                                                Renang
                                            </label>
                                        </div>
                                        <div class="form-check" style="margin-left:2%;">
                                            <?php if(in_array('Badminton', $olahpisah))
                                                    echo '<input class="form-check-input" type="checkbox" name="olahraga[]" value="Badminton" id="Badminton" checked>';
                                                else {
                                                    echo '<input class="form-check-input" type="checkbox" name="olahraga[]" value="Badminton" id="Badminton">';
                                                }
                                            ?>
                                            <label class="form-check-label" For="Badminton">
                                                Badminton
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Ubah Photo Profile</label><br/>  
                                        <input name="file" id="file" type="file">
                                    </div>
                                </div>
                                <hr>
                                <div style="float:right">
                                    <input type="hidden" name="aksi" value="edit">
                                    <input type="hidden" name="aksi" value="<?php echo $brs['NIM'];?>">
                                    <a style="border-radius:10px;" class="btn btn-secondary" href="data_view.php" role="button">Kembali</a>
                                    <button style="border-radius:10px;" class="btn btn-primary" type="submit" name="saveEdit">Simpan Perubahan</button>
                                </div>
            <?php
            if (isset($_POST['saveEdit'])){
                
                //Upload File
                $ekstensi_diperbolehkan	= array('png','jpg');
                $namaimg = $_FILES['file']['name'];
                $x = explode('.', $namaimg);
                $ekstensi = strtolower(end($x));
                $ukuran	= $_FILES['file']['size'];
                $file_tmp = $_FILES['file']['tmp_name'];
                

                $namaEdit = $_POST['nama'];
                $jkEdit = $_POST['jk'];
                $jk_temp = "";
                $agamaEdit = $_POST['agama'];
                $olahragas = $_POST['olahraga'];
                $olah = "";
                $i = 0;
                $len_olahraga = count($olahragas);

                //gabung checkbox jadi satu
                foreach($olahragas as $olah1) {
                    if ($i == $len_olahraga - 1){
                        $olah .= $olah1;
                    }else {
                        $olah .= $olah1.",";
                    }
                    $i++;
                }

                //logika if jenis kelamin
                if($jkEdit == "L") {
                    $jk_temp = "Laki-laki";
                }else {
                    $jk_temp ="Perempuan";
                }

                //Ngecek ngupload foto atau engga
                if (file_exists($_FILES['file']['tmp_name']) || is_uploaded_file($_FILES['file']['tmp_name'])) {
                    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                        if($ukuran < 1044070){			
                            move_uploaded_file($file_tmp, 'image/'.$namaimg);
                            $check = mysqli_query($kon,"UPDATE mahasiswa SET 
                                                                nama = '".$namaEdit."',
                                                                jk = '".$jk_temp."',
                                                                agama = '".$agamaEdit."',
                                                                olahraga = '".$olah."',
                                                                nama_file = '".$namaimg."'
                                                        WHERE mahasiswa.NIM = '".$nim."'");
                            if($check){
                                echo "<script>Swal.fire({
                                            icon: 'success',title: 'Data Berhasil disimpan!',showConfirmButton: true
                                        }).then((result) => {
                                            window.location.href = `data_view.php`
                                        }); </script>"; 
                            }else{
                                echo"<script>Swal.fire({
                                        icon: 'error',title: 'Data Gagal disimpan!',showConfirmButton: true
                                    }).then((result) => {
                                        window.location.href = `aksi.php`
                                    });</script>"; 
                            }
                        }else{
                            echo"<script>Swal.fire({
                                icon: 'error',title: 'Ukuran File Terlalu Besar',showConfirmButton: true
                            }).then((result) => {
                                window.location.href = `aksi.php`
                            });</script>"; 
                        }
                    }else{
                        echo"<script>Swal.fire({
                                icon: 'error',title: 'Extensi file tidak diperbolehkan! masukkan file berekstensi png/jpeg',showConfirmButton: true
                            }).then((result) => {
                                window.location.href = `aksi.php`
                            }); </script>"; 
                    }
    
                } else {
                    $check = mysqli_query($kon,"UPDATE mahasiswa SET 
                                                        nama = '".$namaEdit."',
                                                        jk = '".$jk_temp."',
                                                        agama = '".$agamaEdit."',
                                                        olahraga = '".$olah."'
                                                WHERE mahasiswa.NIM = '".$nim."'");
                    if($check){
                        echo "<script>Swal.fire({
                                            icon: 'success',title: 'Data Berhasil di Edit!',showConfirmButton: true
                                        }).then((result) => {
                                            window.location.href = `data_view.php`
                                        }); </script>"; 
                    }else{
                        echo"<script>Swal.fire({
                                        icon: 'error',title: 'Data Gagal disimpan!',showConfirmButton: true
                                    }).then((result) => {
                                        window.location.href = `data_view.php`
                                    });</script>"; 
                    }
                }
            }

                ?>
        </form>
    <?php
                
     } else {
        ?>
        <body style="background-image: linear-gradient(to left, rgb(252, 140, 252), rgb(154, 39, 154));">
        <div class="container">
            <div class="card" style="margin-top:10%;margin-left:5%;margin-right:5%;border-radius:25px;">
                <div class="card-body"> 
        <h2>Konfirmasi Penghapusan Data</h2>
        <hr/>

        <center>
        <img style="width:150px;" src="image/exlamation.png" alt="">
        <form>
            Anda yakin akan menghapus Data <b><?php echo $brs['nama']; ?></b>?<br/><br/>
            <input class="btn btn-success" type="submit" name="sub" value="Yakin!">
            <input class="btn btn-danger" type="submit" name="sub" value="Tidak">
            <input type="hidden" name="nim" value="<?php echo $_GET["nim"]; ?>">
            <input type="hidden" name="aksi" value="<?php echo "delete"; ?>">
            <?php
                if (isset($_GET['sub'])){
                    if($_GET['sub']=="Tidak"){
                        echo "<script>Swal.fire({
                            icon: 'error',title: 'Penghapusan Data dibatalkan!',showConfirmButton: true
                        }).then((result) => {
                            window.location.href = `data_view.php`
                        }); </script>";
                        }
                    else{
                        mysqli_query($kon,"DELETE FROM `mahasiswa` WHERE `NIM` = '".$nim."'");
                        echo "<script>Swal.fire({
                            icon: 'success',title: 'Berhasil Menghapus Data!',showConfirmButton: true
                        }).then((result) => {
                            window.location.href = `data_view.php`
                        }); </script>"; 
                    }
                }
            }
            ?>
        </form>
        </center>
        
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script> <!-- data table -->
    </body>
</html>