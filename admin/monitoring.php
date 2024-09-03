<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="icon" href="../assets/gallery/logo.png">
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
                <a href="monitoring.php" class="active">
                    <span class="material-symbols-outlined"> dataset </span>
                    <h3>MONITORING</h3>
                </a>
                <a href="kontrol.php">
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
            <h1>Sistem Monitoring</h1>

            <div class="data-monitoring">
                <div class="data-pH">
                    <a href="dataph.php"><span class="material-symbols-outlined" style="color:white"> bar_chart </span></a>
                    <h3 style="color:white">Derajat Keasaman (PH)</h3>
                    <h1> <span id="cekpH" style="color:white"></span> </h1>
                </div>
                <div class="data-TDS">
                    <a href="datatds.php"><span class="material-symbols-outlined" style="color:white"> bar_chart </span></a>
                    <h3 style="color:white">Total Dissolve Solid (TDS)</h3>
                    <h1 style="color:white"> <span id="cekTDS" style="color:white"></span>ppm</h1>
                </div>
                <div class="data-Suhu">
                    <a href="datasuhu.php"><span class="material-symbols-outlined" style="color:white"> bar_chart </span></a>
                    <h3 style="color:white">Derajat Suhu (C)</h3>
                    <h1 style="color:white"> <span id="cekSuhu" style="color:white"></span> c </h1>
                </div>
            </div>
        </main>
        <!-- right bar -->
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-outlined"> menu </span>
                </button>
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
</body>

</html>