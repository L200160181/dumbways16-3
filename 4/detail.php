<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <?php
        include('koneksi.php');
    ?>
</head>

<body>
   <div class="container-fluid">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kategori.php">Genre </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="makanan.php">Music</a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>

    </div>
    <h1 align="center">DUMB MUSIC INFO</h1>
    <div class="container">
        <?php  
        $id= $_GET['id'];
        $query = "SELECT * FROM music where id=".$id;
        $data = $conn->query($query);

        if ($data->num_rows > 0) {
                    
            while($music = $data->fetch_assoc()) { 
                $singers = $conn->query("SELECT name FROM singers where id=".$music['id_singer'] );
                            while($singer = $singers->fetch_assoc()){
                              
        ?>
          
            <div class="row text-center">
                <div class="col-md-3 border">
                    <img src="image/<?= $makanan['image'] ?>" class="bd-placeholder-img mt-10" style="margin-top:10px" width="200" height="200" alt="">
                    <img src="<?= $music['photo'] ?>">
                    <h3>Judul : <?= $music['title'] ?></h3>
                    <h6>Lagu ini dinyanyikan oleh <?= $singer['name']?></h6>
                    <h6> Lagu ini berdurasi selama <?= $music['durasi']?></h6>
                    <h6><?= $music['deskripsi']?></h6>
                </div>
            </div>
        <?php
            }
        }
    }


        ?>
    </div>

</body>
</html>
