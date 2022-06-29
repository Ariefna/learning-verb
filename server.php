<?php
if (isset($_POST['newData'])) {
    // $updatedData = $_POST['newData'];
    $db = file_get_contents('js/db.json');
    // Mendecode db.json
    $data = json_decode($db, true);
    $data[] = array(
        'id'     => $_POST['id'],
        'en'   => $_POST['en'],
        'lengid' => $_POST['lengid'],
        'sukses' => $_POST['sukses']
    );
    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('js/db.json', $jsonfile);
}
if (isset($_POST['delete'])) {
    // File json yang akan dibaca
    $file = "js/db.json";
    // Mendapatkan file json
    $db = file_get_contents($file);
    // Mendecode db.json
    $data = json_decode($db, true);
    // Membaca data array menggunakan foreach
    foreach ($data as $key => $d) {
        // Hapus data kedua
        if ($d['no'] === 2) {
            // Menghapus data array sesuai dengan index
            // Menggantinya dengan elemen baru
            array_splice($data, $key, 1);
        }
    }
    // Mengencode data menjadi json
    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    // Menyimpan data ke dalam db.json
    $db = file_put_contents($file, $jsonfile);
}
if (isset($_POST['ubah'])) {
    $file = "js/db.json";
    // Mendapatkan file json
    $db = file_get_contents($file);
    // Mendecode db.json
    $data = json_decode($db, true);
    // Membaca data array menggunakan foreach
    foreach ($data as $key => $d) {
        // Perbarui data
        if ($d['no'] === 2) {
            $data[$key]['alamat'] = 'Surabaya';
        }
    }
    // Mengencode data menjadi json
    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    // Menyimpan data ke dalam db.json
    $db = file_put_contents($file, $jsonfile);
}
