<?php
session_start();
include 'config.php';
include 'includes/auth/login.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Hydroponics IoT</title>
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
                <div class="featured-image mb-3">
                    <img src="assets/gallery/logo.jpeg" class="img-fluid" style="width: 250px;margin-top:1rem">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Hydroponics IoT</p>
                <small class="text-white text-wrap text-center" style="width: 20rem;font-family: 'Courier New', Courier, monospace;">IoT Based Monitorinng & Control System for Hydroponics.</small>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Welcome, </h2>
                        <p>Hydroponics IoT is a platform for monitoring <br>& control your hydroponic system</p>
                    </div>
                    <?php if ($err) { ?>
                        <div id="login-alert" class="alert alert-danger col-sm-12">
                            <ul><?php echo $err ?></ul>
                        </div>
                    <?php } ?>
                    <form id="loginform" class="form-horizontal" action="" method="post" role="form">
                        <div class="input-group mb-3">

                            <input id="login-username" type="text" class="form-control form-control-lg bg-light fs-6" name="username" value="<?php echo $username ?>" placeholder="username">
                        </div>
                        <div class="input-group mb-1">
                            <input id="login-password" type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="password">
                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">
                            <div class="form-check">
                                <label>
                                    <input id="login-remember" type="checkbox" name="ingataku" value="1" <?php if ($ingataku == '1') echo "checked" ?>> Remember me
                                </label>
                            </div>

                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" name="login" class="btn btn-primary w-100" value="Login" />
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</body>

</html>