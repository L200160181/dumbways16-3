<!DOCTYPE html>
<html lang="en">

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
                         <?php
                        $s = "select * from genre";
                        $q = mysqli_query($conn, $s);
                        while ($a = mysqli_fetch_array($q)) {
                        ?>
                            <li class="nav-item" ><a href="genre.php?id=<?php echo $a['id']; ?>" class="nav-link scroll"><?php echo $a['name']; ?></a></li>
                        <?php
                            }
                        ?>
                        
                    </ul>
                </div>
            </nav>

        </div>

    </div>
      <header class="index-banner" id="home">
    <table>
                <tr> 
                        <td width="50%">&nbsp</td>
                        <td width="60%" >&nbsp</td>
                    <?php
                        $s = "select * from singers";
                        $q = mysqli_query($conn, $s);
                        while ($a = mysqli_fetch_array($q)) {
                        ?>
                            <td><a href="singers.php?id=<?php echo $a['id']; ?>" class="nav-link scroll"><?php echo $a['name']; ?></a></td>
                        <?php
                            }
                        ?>
                            
                    </tr>
                </table>
            </header>
    <h1 align="center">DUMB MUSIC INFO</h1>
     <a class="btn btn-primary" role="button" href="formmusic.php"> tambah musik baru </a>
    <a class="btn btn-primary" role="button" href="formsinger.php"> tambah penyanyi baru </a>
    <a class="btn btn-primary" role="button" href="formgenre.php"> tambah genre baru </a>
    <div class="container">
        <?php  

$sql = "SELECT * FROM genre";
$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {

        $query = "SELECT * FROM music where id_genre=".$row['id'];
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
                    <h3><?= $music['title'] ?></h3>
                    <h6><?= $singer['name']?></h6>
                    <a class="btn btn-primary" role="button" href="detail.php?id=<?php echo $music['id']?>"> detail </a>
                </div>
            </div>
        <?php
            }
        }
    }
}
} else {
    echo '<h1 class="display-5 text-center">Data Makanan Kosong</h1>';
}
        ?>
    </div>

</body>

</html>
