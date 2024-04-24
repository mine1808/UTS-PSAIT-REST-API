<?php

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $kode_mk = $_POST['kode_mk'];
    $nilai = $_POST['nilai'];

    //Pastikan sesuai dengan alamat endpoint dari REST API di ubuntu
    $url = 'http://localhost/uts/sait_project_api/mahasiswa_api.php';
    $ch = curl_init($url);

    // data yang akan dikirim ke REST api, dengan format json
    $jsonData = array(
        'nim' =>  $nim,
        'kode_mk' =>  $kode_mk,
        'nilai' =>  $nilai
    );

    //Encode the array into JSON.
    $jsonDataEncoded = json_encode($jsonData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //pastikan mengirim dengan method POST
    curl_setopt($ch, CURLOPT_POST, true);

    //Attach our encoded JSON string to the POST fields.
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

    //Set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

    //Execute the request
    $result = curl_exec($ch);
    // var_dum($result);
    $result = json_decode($result, true);

    curl_close($ch);

    // tampilkan return statusnya, apakah sukses atau tidak
    echo "<center><br>status : {$result["status"]}";
    echo "<br>";
    echo "message : {$result["message"]}";
    echo "<br>Data berhasil terkirim ke server Ubuntu!";
    echo "<br><a href=selectMahasiswaView.php> OK </a>";
}