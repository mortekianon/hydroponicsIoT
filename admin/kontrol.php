<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="icon" href="../assets/gallery/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval(function() {
                $("#cekpH").load("../includes/read/cekph.php");
                $("#cekSuhu").load("../includes/read/ceksuhu.php");
                $("#cekTDS").load("../includes/read/cektds.php");
            }, 1000);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            function updateStatus() {
                $.ajax({
                    url: "../includes/get_status.php",
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        $("#statusPH").text("PH : " + data.ph);
                        $("#statusTDS").text("TDS : " + data.tds);
                        $("#statusSuhu").text("SUHU : " + data.suhu);
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: " + status + error);
                    }
                });
            }

            // Update status setiap 5 detik
            setInterval(updateStatus, 5000);
        });
    </script>
    <title>Hydroponics IoT </title>
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
                    <span class="material-symbols-outlined"> close </span>
                </div>

            </div>
            <div class="sidebar">
                <a href="monitoring.php">
                    <span class="material-symbols-outlined"> dataset </span>
                    <h3>MONITORING</h3>
                </a>
                <a href="kontrol.php" class="active">
                    <span class="material-symbols-outlined"> tune </span>
                    <h3>KONTROL</h3>
                </a>
                <a href="logout.php">
                    <span class="material-symbols-outlined"> logout </span>
                    <h3>LOGOUT</h3>
                </a>

            </div>
        </aside>
        <main>
            <h1>Sistem Kontrol</h1>

            <div class="control-ph">
                <div class="ph-up" style="background:rgb(3, 128, 3);">
                    <div class="title-control" style="color:whitesmoke">PH - UP</div>
                    <div class="slider-container">
                        <input type="checkbox" id="sliderTogglePhUp" class="slider-toggle" />
                        <label for="sliderTogglePhUp" class="slider-label"></label>
                    </div>
                    <div id="statusPhUp" class="status">OFF</div>
                </div>

                <div class="ph-down" style="background:rgb(3, 128, 3);">
                    <div class="title-control" style="color:whitesmoke">PH - DOWN</div>
                    <div class="slider-container">
                        <input type="checkbox" id="sliderTogglePhDown" class="slider-toggle" />
                        <label for="sliderTogglePhDown" class="slider-label"></label>
                    </div>
                    <div id="statusPhDown" class="status">OFF</div>
                </div>
            </div>

            <div class="control-tds">
                <div class="tds-up" style="background:rgb(223, 14, 14);">
                    <div class="title-control" style="color:whitesmoke">TDS - UP</div>
                    <div class="slider-container">
                        <input type="checkbox" id="sliderToggleTdsUp" class="slider-toggle" />
                        <label for="sliderToggleTdsUp" class="slider-label"></label>
                    </div>
                    <div id="statusTdsUp" class="status">OFF</div>
                </div>
                <div class="tds-down" style="background:rgb(223, 14, 14);">
                    <div class="title-control" style="color:whitesmoke">TDS - DOWN</div>
                    <div class="slider-container">
                        <input type="checkbox" id="sliderToggleTdsDown" class="slider-toggle" />
                        <label for="sliderToggleTdsDown" class="slider-label"></label>
                    </div>
                    <div id="statusTdsDown" class="status">OFF</div>
                </div>
            </div>

            <div class="control-suhu">
                <div class="suhu-up" style="background:rgb(11, 48, 181);">
                    <div class="title-control" style="color:whitesmoke">BLOWER</div>
                    <div class="slider-container">
                        <input type="checkbox" id="sliderToggleSuhuUp" class="slider-toggle" />
                        <label for="sliderToggleSuhuUp" class="slider-label"></label>
                    </div>
                    <div id="statusSuhuUp" class="status">OFF</div>
                </div>
                <!-- <div class="suhu-down" style="background:rgb(11, 48, 181);">
                    <div class="title-control" style="color:whitesmoke">SUHU - DOWN</div>
                    <div class="slider-container">
                        <input type="checkbox" id="sliderToggleSuhuDown" class="slider-toggle" />
                        <label for="sliderToggleSuhuDown" class="slider-label"></label>
                    </div>
                    <div id="statusSuhuDown" class="status">OFF</div>
                </div> -->
            </div>

        </main>
        <!-- right bar -->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-outlined"> menu </span>
                </button>
                <!-- <div class="theme-toogle">
                    <span class="material-symbols-outlined active">light_mode</span>
                    <span class="material-symbols-outlined">dark_mode</span>
                </div> -->
                <div class="profile">
                    <span><img src="../assets/gallery/logo.jpeg"></span>
                </div>
            </div>
            <div class="information">
                <h2 style="color:whitesmoke">STATUS MONITORING</h2>
                <div class="status-data">
                    <h3 id="statusPH">PH : Loading...</h3>
                    <h3 id="statusTDS">TDS : Loading...</h3>
                    <h3 id="statusSuhu">SUHU : Loading...</h3>
                </div>
            </div>

        </div>

    </div>
    <script src="../assets/js/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mendapatkan semua checkbox dan status
            const sliders = document.querySelectorAll('.slider-toggle');
            const statuses = document.querySelectorAll('.status');

            // Fungsi untuk mengupdate status berdasarkan checkbox yang dicentang
            function updateStatus() {
                sliders.forEach((checkbox, index) => {
                    if (checkbox.checked) {
                        statuses[index].textContent = 'ON';
                        statuses[index].style.color = 'whitesmoke'; // Ubah warna teks menjadi hijau saat ON
                    } else {
                        statuses[index].textContent = 'OFF';
                        statuses[index].style.color = 'whitesmoke'; // Ubah warna teks menjadi hitam saat OFF
                    }
                });
            }

            // Set initial status
            updateStatus();

            // Tambahkan event listener untuk setiap checkbox
            sliders.forEach(checkbox => {
                checkbox.addEventListener('change', updateStatus);
            });
        });
    </script>

</body>

</html>