<!DOCTYPE html>
<html>
<head>
    <title>Form Ubah Data</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="container">
        <?php
        require 'nav.php';
        ?>
        <br>

        <div class="row">

            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5 ">
                <div class="alert alert-warning">
                    sidebar
                </div>
            </div>

            <div class="col-xl-9 col-lg-9 col-md-8 col-sm-7">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Kirim Surat
                    </div>
                    <?php
                    include "../koneksi.php";
                    $sql = $con->query("SELECT * FROM surat WHERE id_surat=".$_GET['id']);
                    $sin = mysqli_fetch_array($sql);
                    ?>
                    <div class="card-body">
                        <form action="proseskirim.php" method="post">
                            <input type="hidden" name="id_surat" value="<?php echo $sin['id_surat'] ?>">
                            <div class="form-group">
                                <label>Tujuan Surat</label>
                                <select class="form-control" name="id_bidang">
                                    <option></option>
                                    <?php
                                        include '../koneksi.php';
                                        $query = "select * from bagian_bidang where id_bagian>1";
                                        $hasil = mysqli_query($con,$query);
                                        while($data=mysqli_fetch_array($hasil)){
                                            echo "<option value=$data[id_bagian]>$data[nama_bidang]</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <input type="text" class="form-control" name="catatan">
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <div class="row">
            <div class="col">Link Terkait</div>
            <div class="col">Contact</div>
            <div class="col">Social Media</div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>