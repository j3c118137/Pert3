<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <title>Form Input Data</title>
  </head>
  <body style="background-image: linear-gradient(to left, rgb(252, 140, 252), rgb(154, 39, 154));">
    <div class="container">
        <div class="card" style="margin-top:10%;margin-left:15%;margin-right:15%;border-radius:25px;">
            <div class="card-body">
                <h2 class="card-title">Form Pendaftaran</h5>
                <hr>
                <form style="margin-left:5%;" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-4">
                            <label>NIM</label>
                            <input type="text" class="form-control" name="nim" placeholder="Cth: J3C118137" required>
                        </div>
                        <div class="col-6">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Isi Nama Anda..." required>
                        </div>
                    </div>

                    <div class="row" style="margin-top:1.5%">
                        <div class="col-4">
                            <label>Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" value="L" required id="lakilaki">
                                <label class="form-check-label" for="lakilaki">Laki - laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" value="P" required id="perempuan">
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        <div class="col-5">
                            <label for="exampleFormControlSelect2">Agama</label>
                            <select class="form-control" id="exampleFormControlSelect2" required name="agama">
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Kristen Katolik">Kristen Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>

                    <div class="row" style="margin-top:1.5%">
                        <div class="col-4">
                            <label for="">Olahraga Favorit</label>
                            <div class="form-check" style="margin-left:2%;">
                                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Sepak Bola" id="Bola">
                                <label class="form-check-label" for="Bola">
                                    Sepak Bola
                                </label>
                            </div>
                            <div class="form-check" style="margin-left:2%;">
                                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Basket" id="Basket">
                                <label class="form-check-label" for="Basket">
                                    Basket
                                </label>
                            </div>
                            <div class="form-check" style="margin-left:2%;">
                                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Futsal" id="Futsal">
                                <label class="form-check-label" for="Futsal">
                                    Futsal
                                </label>
                            </div>
                            <div class="form-check" style="margin-left:2%;">
                                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Renang" id="Renang">
                                <label class="form-check-label" for="Renang">
                                    Renang
                                </label>
                            </div>
                            <div class="form-check" style="margin-left:2%;">
                                <input class="form-check-input" type="checkbox" name="olahraga[]" value="Badminton" id="Badminton">
                                <label class="form-check-label" For="Badminton">
                                    Badminton
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <label>Photo Profile</label>
                            <input name="file" id="file" type="file" required>
                        </div>
                    </div>
                    <hr>
                    <div style="float:right">
                        <a style="border-radius:10px;" class="btn btn-secondary" href="data_view.php" role="button">Kembali</a>
                        <button style="border-radius:10px;" class="btn btn-primary" type="submit" name="simpan">Simpan Data</button>
                    </div>

                    <?php
                        include "koneksi.php";
                        if(isset($_POST['simpan'])) {
                            //upload file
                            $ekstensi_diperbolehkan	= array('png','jpg');
                            $namaimg = $_FILES['file']['name'];
                            $x = explode('.', $namaimg);
                            $ekstensi = strtolower(end($x));
                            $ukuran	= $_FILES['file']['size'];
                            $file_tmp = $_FILES['file']['tmp_name'];

                            //deklarasi satu satu biar enak pas dipanggil
                            $nim = $_POST['nim'];
                            $nama = $_POST['nama'];
                            $jk = $_POST['jk'];
                            $jk_temp = "";
                            $agama = $_POST['agama'];
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
                            if($jk == "L") {
                                $jk_temp = "Laki-laki";
                            }else {
                                $jk_temp ="Perempuan";
                            }

                            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                                if($ukuran < 1044070){			
                                    move_uploaded_file($file_tmp, 'image/'.$namaimg);
                                    $check = mysqli_query($kon,"INSERT INTO mahasiswa  (NIM, nama, jk, agama, olahraga, nama_file) 
                                                VALUES ('".$nim."', '".$nama."', '".$jk_temp."', '".$agama."', '".$olah."', '".$namaimg."')");
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
                                                        window.location.href = `form.php`
                                                    });</script>"; 
                                    }
                                }else{
                                    echo"<script>Swal.fire({
                                                    icon: 'error',title: 'Ukuran File Terlalu Besar',showConfirmButton: true
                                                }).then((result) => {
                                                    window.location.href = `form.php`
                                                });</script>"; 
                                }
                            }else{
                                echo"<script>Swal.fire({
                                                    icon: 'error',title: 'Extensi file tidak diperbolehkan! masukkan file berekstensi png/jpeg',showConfirmButton: true
                                                }).then((result) => {
                                                    window.location.href = `form.php`
                                                }); </script>"; 
                            }
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
    <script>

function myFunction() {

        Swal.fire({
            icon: 'success',
            title: 'Berhasil Dibeli!',
            // imageUrl: 'image/'+gambar+'.jpg',
            // imageWidth: 100,
            // imageHeight: 100,
            // imageAlt: 'Custom image',
            showConfirmButton: true
            }).then((result) => {
                window.location.href = `data_view.php`
                }); 
    }

    </script>
    </body>
</html>