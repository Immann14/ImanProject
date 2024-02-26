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
            <?php
        session_start();
        if(!isset($_SESSION['userid'])){
    ?>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            </ul>
    <?php
        }else{
    ?>   
       
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="album.php">Album</a></li>
            <li class="nav-item"><a class="nav-link" href="foto.php">Foto</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php"><i class="btn btn-outline-secondary d-flex flex-column align-items-center">Logout</i></a></li>
        </ul>
    <?php
        }
    ?>
            </div>
        </div>
    </nav>


    <div class="header d-flex flex-column align-items-center justify-content-center">
        <h1 class="lead mb-4 mt-2"><b>GALLERY FOTO</b></h1>
    </div>


    <div class="container mt-3">
    <table class="table table-striped table-bordered border-secondary">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Uploader</th>
            <th>Jumlah Like</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $sql=mysqli_query($conn,"select * from foto,user where foto.userid=user.userid");
            while($data=mysqli_fetch_array($sql)){
        ?>
            <tr>
                <td><?=$data['fotoid']?></td>
                <td><?=$data['judulfoto']?></td>
                <td><?=$data['deskripsifoto']?></td>
                <td>
                    <img src="image/<?=$data['lokasifile']?>" width="50px">
                </td>
                <td><?=$data['namalengkap']?></td>
                <td>
                    <?php
                        $fotoid=$data['fotoid'];
                        $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                        echo mysqli_num_rows($sql2);
                    ?>
                </td>
                <td>
                    <a class="btn btn-warning bi bi-heart-fill text-danger" href="like.php?fotoid=<?=$data['fotoid']?>"> Like</a>
                    <a class="btn btn-info bi bi-chat-square-dots-fill" href="komentar.php?fotoid=<?=$data['fotoid']?>"> Komentar</a>
                </td>
            </tr>
        <?php
            }
        ?>
    </table>
    </div>

    
    
</body>
</html>