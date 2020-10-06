<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>List Mahasiswa</title>
  </head>
  <body style="background-image: linear-gradient(to left, rgb(252, 140, 252), rgb(154, 39, 154));">
    <div class="container">
        <div class="card" style="margin-top:10%;margin-left:5%;margin-right:5%;border-radius:25px;">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h2 class="card-title">View Data</h5>
                    </div>
                    <div class="col">
                        <a style="float:right;" class="btn btn-success" href="form.php" role="button"><i class="fa fa-plus-circle"></i> Tambah Data Baru</a>
                    </div>                    
                </div>         
                <hr>
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Agama</th>
                            <th>Olahraga Favorit</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    include "koneksi.php";
                    $r = mysqli_query($kon,"SELECT * FROM mahasiswa");
                    $i = 1;
                    
                    while($brs=mysqli_fetch_assoc($r)) {
                    ?>
                        <tr>
                            <td><?php echo $brs['NIM'];?></td>
                            <td><?php echo $brs['nama'];?></td>
                            <td><?php echo $brs['jk'];?></td>
                            <td><?php echo $brs['agama'];?></td>
                            <td><?php echo $brs['olahraga'];?></td>
                            <td><img style="width:30px;" src="<?php echo "image/".$brs['nama_file'];?>" alt=""></td> 
                            <td>
                                <a href="aksi.php?nim=<?php echo $brs['NIM'];?>&aksi=edit"><button class="btn btn-info btn-sm" type="submit" title="Edit"><i class="fa fa-edit"></i></button></a>
                                <a href="aksi.php?nim=<?php echo $brs['NIM'];?>&aksi=delete"><button class="btn btn-danger btn-sm" type="submit" title="Delete"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script> <!-- data table -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
  </body>
</html>