<?php
include '../config.php';

// Cek koneksi
if (!$conection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ambil data dari tabel data_suhu
$query = "SELECT * FROM data_suhu ORDER BY date DESC LIMIT 10";
$result = mysqli_query($conection, $query);

// Cek apakah query berhasil
if (!$result) {
    die("Query failed: " . mysqli_error($conection));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="icon" href="../assets/gallery/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
    <title>Hydro IoT</title>
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <img src="../assets/gallery/logo.png">
                    <h2 style="color:whitesmoke">Hydroponics IoT</h2>
                </div>
                <div class="close-aside" id="close-btn">
                    <span class="material-symbols-outlined">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="" class="active">
                    <span class="material-symbols-outlined">dataset</span>
                    <h3>Monitoring</h3>
                </a>
                <a href="">
                    <span class="material-symbols-outlined">tune</span>
                    <h3>Kontrol</h3>
                </a>
                <a href="logout.php">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <main>
            <h1>Data Monitoring PH</h1>
            <table>
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Data PH</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop untuk menampilkan data dari tabel data_ph
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['suhu']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['status_suhu']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="profile">
                    <span><img src="../assets/gallery/logo.jpeg"></span>
                </div>
            </div>
            <div class="information">
                <h2 style="color:whitesmoke">STATUS MONITORING</h2>
                <div class="status-data">
                    <h3>PH: Rendah</h3>
                    <h3>TDS: Tinggi</h3>
                    <h3>SUHU: Optimal</h3>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/script.js"></script>
</body>

</html>