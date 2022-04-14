<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/general.css'); ?>">

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/cefde82d95.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <img class="wave" src="<?php echo base_url('assets/assets/img/wave.svg'); ?>">
    <div class="container">
        <div class="img">
            <img class="img" src="<?php echo base_url('assets/assets/img/img_login.svg'); ?>" alt="">
        </div>
        <div class="login-container">
            <form class="sign-in" action="#" method="POST" id="sign_in">
                <img src="<?php echo base_url('assets/assets/img/Escudo.png'); ?>" alt="">
                <h2>Bienvenido</h2>
                <div id="user_error"></div>
                <div class="input-div one">
                    <i class="fas fa-user"></i>
                    <div>
                        <h5 class="label">Usuario</h5>
                        <input class="input" name="user" id="user" type="text">
                    </div>
                </div>
                <div id="pass_error"></div>
                <div class="input-div two">
                    <i class="fas fa-lock"></i>
                    <div>
                        <h5 class="label">Contraseña</h5>
                        <input class="input" name="pass" id="pass" type="password">
                    </div>
                    <section>
                        <i class="fas fa-eye" id="btn_show" onclick="show_pass()"></i>
                    </section>
                </div>
                <input type="submit" class="btn" value="Login">
                <div class="alert" style="display: none;">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <p id="mensaje"></p>
                </div>
            </form>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/mystyle.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-v2.2.4.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/login.js'); ?>"></script>
</body>

</html>