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

    <h1 class="text-center lead mb-4 mt-2"><b>Komentar</b></h1>

    <div class="modal-body">
    <div class="container bg-secondary p-3 border border-primary-subtle border-3 shadow p-3 mb-5 w-50 bg-body-tertiary rounded">
    <form action="tambah_komentar.php" method="post">
        <h4 class="lead mb-4 mt-2">Tambah Album</h4>

        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        <div class="mb-3">
            <label for="judulfoto"class="form-label ">Judul Foto</label>
            <input type="text"  class="form-control" name="judulfoto" value="<?=$data['judulfoto']?>"/>
        </div>

        <div class="mb-3">
            <label for="deskripsifoto" class="form-label ">Deskripsi</label>
            <input type="text"  class="form-control" name="deskripsifoto" value="<?=$data['deskripsifoto']?>" />
        </div>
        
        <div class="mb-3">
            <label class="form-label ">Foto</label>
            <img src="image/<?=$data['lokasifile']?>" width="100px">
        </div>

        <div class="mb-3">
            <label for="isikomentar" class="form-label ">Komentar</label>
            <input type="text"  class="form-control" name="isikomentar" placeholder="Silahkan Komentar" />
        </div>
        
        <div class="mb-3">
            <input type="submit"  class="btn btn-success w-25" value="Tambah"/>
        </div>

        <?php
            }
        ?>
        
    </form>
    </div>
    </div>

    <div class="container mt-3">
    <table class="table table-striped table-bordered border-secondary">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Komentar</th>
            <th>Tanggal</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from komentarfoto,user where komentarfoto.userid=user.userid");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['komentarid']?></td>
                <td><?=$data['namalengkap']?></td>
                <td><?=$data['isikomentar']?></td>
                <td><?=$data['tanggalkomentar']?></td>
            </tr>
        <?php
            }
        ?>
    </table>
    </div>
</body>
</html>