<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="bs/bs-icon/font/bootstrap-icons.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-info-subtle border-bottom border-danger-subtle border-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="">
                <img class="mr-75" src="image/user/logo2.png" style="width: 50px;" alt="">
            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#lisMenu" aria-controls="lisMenu" 
            aria-expanded="false" aria-label="Buka Menu">
                <span class="bi bi-menu-button-wide-fill"></span>
            </button>
            <div class="collapse navbar-collapse" id="lisMenu">
      
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="album.php">Album</a></li>
            <li class="nav-item"><a class="nav-link" href="foto.php">Foto</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php"><i class="btn btn-outline-secondary d-flex flex-column align-items-center">Logout</i></a></li>
        </ul>
   
            </div>
        </div>
    </nav>

    <h1 class="text-center lead mb-4 mt-2"><b>Halaman Foto</b></h1>

    <div class="modal-body">
    <div class="container bg-secondary p-3 border border-primary-subtle border-3 shadow p-3 mb-5 w-50 bg-body-tertiary rounded">
    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <h4 class="lead mb-4 mt-2">Tambah Foto</h4>
        <div class="mb-3">
            <label for="judulfoto"class="form-label ">Nama Judul</label>
            <input type="text"  class="form-control" name="judulfoto" placeholder="Nama Judul" />
        </div>

        <div class="mb-3">
            <label for="deskripsifoto"class="form-label ">Deskripsi</label>
            <input type="text"  class="form-control" name="deskripsifoto" placeholder="Deskripsi Foto" />
        </div>
        
        <div class="mb-3">
            <label for="lokasifile"class="form-label ">Lokasi File</label>
            <input type="file"  class="form-control" name="lokasifile"/>
        </div>
        
        <div class="mb-3">
            <label for="albumid"class="form-label ">Album</label>
       
            <select name="albumid">
                    <?php
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                    <?php
                        }
                    ?>
            </select>
        
        </div>
        
        <div class="mb-3">
            <input type="submit"  class="btn btn-success w-25" value="Tambah"/>
        </div>
        
    </form>
    </div>
    </div>

    <div class="container mt-3">
    <table class="table table-striped table-bordered border-secondary">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Image</th>
            <th>Album</th>
            <th>Disukai</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['fotoid']?></td>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
                        <img src="image/<?=$data['lokasifile']?>" width="50px">
                    </td>
                    <td><?=$data['namaalbum']?></td>
                    <td>
                        <?php
                            $fotoid=$data['fotoid'];
                            $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                            echo mysqli_num_rows($sql2);
                        ?>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">Hapus</a>
                        <a class="btn btn-success" href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
    </div>
</body>
</html>