<?php
error_reporting(0);
ob_start();
session_start();
$koneksi = new mysqli("localhost", "root", "", "siakad2");

if ($_SESSION['admin'] || $_SESSION['mahasiswa'] || $_SESSION['dosen']) {
    header("location:index.php");
} else {
?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Halaman Bukti Pembayaran</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    </head>

    <body>
        <div class="container">
            <div class="row text-center ">
                <div class="col-md-12">
                    <br /><br />
                    <h2>Form Bukti Pembayaran</h2>


                </div>
            </div>
            <div class="row ">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong> Masukan Username dan Bukti Pembayaran </strong>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" enctype="multipart/form-data">
                                <br />
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                    <input class="form-control" placeholder="Username" name="username" autofocus>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-photo"></i></span>
                                    <input class="form-control" type="file" name="foto">
                                </div>

                                <input type="submit" name="send" class="btn btn-lg btn-success btn-block" value="Send" />
                                <a href="login.php" class="btn btn-lg btn-danger btn-block">Back</a>
                            </form>

                            <?php
                            if (isset($_POST['send'])) {
                                $nim  = $_POST['username'];
                                $datenow = date('Y-m-d');
                                $foto = $_FILES['foto']['name'];
                                $lokasi = $_FILES['foto']['tmp_name'];
                                $newname = date('Ymd') . "_" . date('Hi') . "_" . $nim . ".png";

                                $upload = move_uploaded_file($lokasi, "img/bukti_pembayaran/" . $newname);
                                if ($upload) {

                                    $koneksi->query("insert into tb_pembayaran (tanggal, nim, bukti_pembayaran) values('$datenow', '$nim', '$newname')");

                            ?>

                                    <script>
                                        setTimeout(function() {
                                            swal({
                                                title: "Selamat!",
                                                text: "Data Berhasil Dikirim!",
                                                type: "success"
                                            }, function() {
                                                window.location = "index.php";
                                            });
                                        }, 300);
                                    </script>


                            <?php
                                }
                            }
                            ?>

                        </div>

                    </div>
                </div>


            </div>
        </div>


        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>

    </body>

    </html>


<?php
}
?>