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
    <h1 align="center">TAMBAH MUSIC BARU</h1>
    <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Judul Lagu </label>
                                            <input class="form-control" name="title">
                                            <p class="help-block">Masukkan judul lagu</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Durasi</label>
                                            <input class="form-control" name="durasi">
                                            <p class="help-block">Masukkan durasi lagu</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="file" name="foto">
                                        </div> 
                                        <div class="form-group">
                                            <label>Genre</label>
                                            <select class="form-control" name = "genre">
                                                <?php
                                                $s = "select * from genre";
                                                $q = mysqli_query($conn, $s);
                                                while ($a = mysqli_fetch_array($q)) {
                                                    ?>
                                                        <option value ="<?php echo $a['id']; ?>"><?php echo $a['name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Penyanyi</label>
                                            <select class="form-control" name = "singers">
                                                <?php
                                                $a = "select * from singers";
                                                $b = mysqli_query($conn, $a);
                                                while ($c = mysqli_fetch_array($b)) {
                                                    ?>
                                                        <option value ="<?php echo $a['id']; ?>"><?php echo $c['name']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi Lagu</label>
                                            <textarea class="form-control" name="deskripsi" ></textarea>
                                        </div>
                                        <input type="submit" class="btn btn-default" value="submit" name="submit">

                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
<?php

// error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);

//membuat variabel dari inputan form

$title = $_POST['title'];
$durasi= $_POST['durasi'];
$genre = $_POST['genre'];
$nama_foto = $_FILES['foto']['name'];
$namatmp = $_FILES['foto']['tmp_name'];
$singers = $_POST['singers'];
$deskripsi = $_POST['deskripsi'];
$submit = $_POST['submit'];

if($submit){
    $berhasil = move_uploaded_file($namatmp, $nama_foto);
    $sql =  "INSERT INTO music(title, durasi, photo, id_genre, id_singer, deskripsi) VALUES ('$title','$durasi','$nama_foto','$genre','$singers','$deskripsi')";
    $query = mysqli_query($conn, $sql);
    if ($query && $berhasil) {
        echo "yey";
            $data = "SELECT `id`,`photo` FROM `music` WHERE `id` = (SELECT MAX(`id`) FROM music)";
            $bacadata = mysqli_query($conn,$data);
            $select_result = mysqli_fetch_array($bacadata);
            $id = $select_result['id'];
            $img = $select_result['photo'];
            $id2 = $id."-".$img;
            rename($direktori.$nama_foto, $direktori.$id2);
            $sql_update = "UPDATE music SET photo='$id2' WHERE id='$id'";
            $update = mysqli_query($conn,$sql_update);
            if ($update) {
                echo "<script>alert('berhasil');window.location='index.php'</script>";
            }else{
                echo "<script>alert('gagal');</script>";
            }

}
}
    
    ?>
                                <!-- /.col-lg-6 (nested) -->

                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
          
           

</body>

</html>
