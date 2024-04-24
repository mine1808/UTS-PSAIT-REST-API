<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa Baru</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #edf5fc;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            margin-bottom: 20px;
            text-align: center;
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
    <div class="container">
        <h2>Tambahkan Data Mahasiswa Baru</h2>
        <p>Silakan isi formulir berikut untuk menambahkan data mahasiswa baru ke database.</p>
        <form action="insertMahasiswaDo.php" method="post">
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" id="nim" name="nim" class="form-control" placeholder="Enter NIM">
            </div>
            <div class="form-group">
                <label for="kode_mk">Kode MK</label>
                <input type="text" id="kode_mk" name="kode_mk" class="form-control" placeholder="Enter Course Code">
            </div>
            <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="text" id="nilai" name="nilai" class="form-control" placeholder="Enter Grade">
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="Submit">Submit</button>
        </form>
    </div>
</body>
</html>