<?php
include '../config.php';

if (!$conection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ambil status terbaru dari tabel data_ph
$query_ph = "SELECT status_ph FROM data_ph ORDER BY date DESC LIMIT 1";
$result_ph = mysqli_query($conection, $query_ph);
$status_ph = mysqli_fetch_assoc($result_ph)['status_ph'];

// Ambil status terbaru dari tabel data_tds
$query_tds = "SELECT status_tds FROM data_tds ORDER BY date DESC LIMIT 1";
$result_tds = mysqli_query($conection, $query_tds);
$status_tds = mysqli_fetch_assoc($result_tds)['status_tds'];

// Ambil status terbaru dari tabel data_suhu
$query_suhu = "SELECT status_suhu FROM data_suhu ORDER BY date DESC LIMIT 1";
$result_suhu = mysqli_query($conection, $query_suhu);
$status_suhu = mysqli_fetch_assoc($result_suhu)['status_suhu'];

// Output status dalam format JSON
echo json_encode([
    'ph' => $status_ph,
    'tds' => $status_tds,
    'suhu' => $status_suhu
]);

// Tutup koneksi
mysqli_close($conection);
