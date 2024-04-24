<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            background-color: #edf5fc;
            font-family: Arial, sans-serif;
        }
        .wrapper{
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    $nim = $_GET['nim'];
    $kode_mk = $_GET['kode_mk'];
    $curl= curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
    curl_setopt($curl, CURLOPT_URL, 'http://localhost/uts_sait_api_alif/mahasiswa_api.php?nim=' . $nim . '&kode_mk=' . $kode_mk);
    $res = curl_exec($curl);
    $json = json_decode($res, true);
    ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Data</h2>
                    </div>
                    <p>Silakan isi formulir di bawah ini dan submit untuk memperbarui catatan mahasiswa di database.</p>
                    <form action="updateMahasiswaDo.php" method="post">
                        <input type="hidden" name="nim" value="<?php echo $nim; ?>">
                        <input type="hidden" name="kode_mk" value="<?php echo $kode_mk; ?>">

                        <div class="form-group">
                            <label>Nilai</label>
                            <input type="number" name="nilai" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>