<?php
$conection = mysqli_connect("localhost", "root", "", "iotmonitoring");


if (!$conection) {
    die("Connection failed: " . mysqli_connect_error());
}

$PH = $_GET['ph'];
$TDS = $_GET['tds'];
$Suhu = $_GET['suhu'];


$save_monitoring = mysqli_query($conection, "INSERT INTO data_monitoring (pH, TDS, Suhu) VALUES ('$PH', '$TDS', '$Suhu')");

if ($save_monitoring) {
    echo "Received Suhu: " . $Suhu . "<br>" .
        "Received pH: " . $PH . "<br>" .
        "Received TDS: " . $TDS . "<br>";
} else {
    echo "Failed to insert into data_monitoring: " . mysqli_error($conection) . "<br>";
}


if ($PH > 6.5 && $PH < 14) {
    $status = 'tinggi';
} elseif ($PH >= 5.5 && $PH <= 6.5) {
    $status = 'optimal';
} elseif ($PH >= 0 && $PH <= 5.5) {
    $status = 'rendah';
}

$save_ph = mysqli_query($conection, "INSERT INTO data_ph (pH, status_ph) VALUES ('$PH', '$status')");

if ($save_ph) {
    echo "Data pH tersimpan dalam data_ph<br>";
} else {
    echo "Failed to insert into data_ph: " . mysqli_error($conection) . "<br>";
}


if ($TDS > 1100) {
    $statustds = 'tinggi';
} elseif ($TDS >= 1000 && $TDS < 1100) {
    $statustds = 'optimal';
} elseif ($TDS < 1000) {
    $statustds = 'rendah';
}

$save_tds = mysqli_query($conection, "INSERT INTO data_tds (tds, status_tds) VALUES ('$TDS', '$statustds')");

if ($save_tds) {
    echo "Data tds tersimpan dalam data_tds<br>";
} else {
    echo "Failed to insert into data_tds: " . mysqli_error($conection) . "<br>";
}

if ($Suhu > 28) {
    $statussuhu = 'tinggi';
} elseif ($Suhu >= 25 && $Suhu <= 28) {
    $statussuhu = 'optimal';
} elseif ($Suhu < 25) {
    $statussuhu = 'rendah';
}

$save_suhu = mysqli_query($conection, "INSERT INTO data_suhu (suhu, status_suhu) VALUES ('$Suhu', '$statussuhu')");

if ($save_suhu) {
    echo "Data suhu tersimpan dalam data_suhu<br>";
} else {
    echo "Failed to insert into data_suhu: " . mysqli_error($conection) . "<br>";
}

mysqli_close($conection);
