<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #edf5fc;
        }

        .wrapper {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            max-height: 500px;
            overflow-y: auto;
        }

        .btn-add-new {
            background-color: #28a745;
            border: none;
            color: #fff;
        }

        .btn-add-new:hover {
            background-color: #218838;
        }

        .action-icons a {
            color: #007bff;
            margin-right: 10px;
            transition: color 0.3s ease;
        }

        .action-icons a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="clearfix mb-4">
                        <h2 class="float-left">Tabel Mahasiswa</h2>
                        <a href="insertMahasiswaView.php" class="btn btn-add-new float-right"><i class="fa fa-plus"></i> Tambah Baru</a>
                    </div>
                    <div class="table-container">
                        <?php
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl, CURLOPT_URL, 'http://localhost/uts_sait_api_alif/mahasiswa_api.php');
                        $res = curl_exec($curl);
                        $json = json_decode($res, true);

                        echo '<table class="table table-bordered table-striped">';
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>NIM</th>";
                        echo "<th>Nama</th>";
                        echo "<th>Alamat</th>";
                        echo "<th>Tanggal Lahir</th>";
                        echo "<th>Kode MK</th>";
                        echo "<th>SKS</th>";
                        echo "<th>Nilai</th>";
                        echo "<th>Aksi</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        for ($i = 0; $i < count($json["data"]); $i++) {
                            echo "<tr>";
                            echo "<td>{$json["data"][$i]["nim"]}</td>";
                            echo "<td>{$json["data"][$i]["nama"]}</td>";
                            echo "<td>{$json["data"][$i]["alamat"]}</td>";
                            echo "<td>{$json["data"][$i]["tanggal_lahir"]}</td>";
                            echo "<td>{$json["data"][$i]["kode_mk"]}</td>";
                            echo "<td>{$json["data"][$i]["sks"]}</td>";
                            echo "<td>{$json["data"][$i]["nilai"]}</td>";
                            echo "<td class='action-icons'>";
                            echo '<a href="updateMahasiswaView.php?nim=' . $json["data"][$i]["nim"] . '&kode_mk=' . $json["data"][$i]["kode_mk"] . '" title="Update Record" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>';
                            echo '<a href="deleteMahasiswaDo.php?nim=' . $json["data"][$i]["nim"] . '&kode_mk=' . $json["data"][$i]["kode_mk"] . '" title="Delete Record" data-toggle="tooltip"><i class="fa fa-trash"></i></a>';
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";

                        curl_close($curl);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>