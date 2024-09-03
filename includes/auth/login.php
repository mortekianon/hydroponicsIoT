<?php
$err        = "";
$username   = "";
$ingataku   = "";

if (isset($_COOKIE['cookie_username'])) {
    $cookie_username = $_COOKIE['cookie_username'];
    $cookie_password = $_COOKIE['cookie_password'];

    $sql1 = "select * from login where username = '$cookie_username'";
    $q1   = mysqli_query($koneksi, $sql1);
    $r1   = mysqli_fetch_array($q1);
    if ($r1['password'] == $cookie_password) {
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;
    }
}

if (isset($_SESSION['session_username'])) {
    header("location:admin/monitoring.php");
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Memeriksa jika kunci 'ingataku' ada di dalam $_POST
    $ingataku = isset($_POST['ingataku']) ? $_POST['ingataku'] : '';

    if ($username == '' || $password == '') {
        $err .= "<li>Silakan masukkan username dan juga password.</li>";
    } else {
        $sql1 = "SELECT * FROM login WHERE username = '$username'";
        $q1   = mysqli_query($conection, $sql1);
        $r1   = mysqli_fetch_array($q1);

        if ($r1['username'] == '') {
            $err .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        } elseif ($r1['password'] != md5($password)) {
            $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }

        if (empty($err)) {
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);

            if ($ingataku == '1') {
                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                $cookie_name = "cookie_password";
                $cookie_value = md5($password);
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");
            }
            header("admin/monitoring.php");
        }
    }
}
