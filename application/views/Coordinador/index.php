<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/general.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/StyleC.css') ?>">
    <script src="https://kit.fontawesome.com/cefde82d95.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="navigation_2">
            <div class="logo_content">
                <div class="logo">
                    <i class="fas fa-atom"></i>
                    <div class="logo_name">Deogracias Cardona</div>
                </div>
                <i class="fas fa-bars" id="btn_menu"></i>
            </div>
            <ul class="nav_list">
                <li>
                    <a type="button" href="<?php echo base_url('Coordinador/Asignacion/index'); ?>" id="alumnos">
                        <i class="fas fa-file-signature"></i>
                        <span class="links_name">Asignación</span>
                    </a>
                    <span class="tooltip">Asignación</span>
                </li>
                <li>
                    <a href="">
                    <i class="fas fa-calendar-alt"></i>
                        <span class="links_name">Periodos</span>
                    </a>
                    <span class="tooltip">Periodos</span>
                </li>
                <li>
                    <a href="">
                    <i class="fas fa-list-ol"></i>
                        <span class="links_name">Logros</span>
                    </a>
                    <span class="tooltip">Logros</span>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-file-download"></i>
                        <span class="links_name">Notas</span>
                    </a>
                    <span class="tooltip">Notas</span>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-file-signature"></i>
                        <span class="links_name">Observaciones</span>
                    </a>
                    <span class="tooltip">Observaciones</span>
                </li>
            </ul>
            <div class="profile_content">
                <div class="profile">
                    <div class="profile_details">
                        <img src="<?php echo base_url('assets/assets/img/user.png') ?>" alt="">
                        <div class="name_job">
                            <div class="name"><?php echo $this->session->userdata('nombre_1') . ' ' . $this->session->userdata('apellido_1') ?></div>
                            <div class="job"><?php echo $this->session->userdata('rol'); ?></div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('salir'); ?>"> <i class="fas fa-sign-out-alt" id="log_out"></i></a>
                </div>
            </div>
        </div>

        <header class="header">
            <h2>Bienvenid@ <?php echo $this->session->userdata('nombre_1') . ' ' . $this->session->userdata('nombre_2') . ' ' . $this->session->userdata('apellido_1') . ' ' . $this->session->userdata('apellido_2'); ?></h2>
        </header>

        <main class="main">

        </main>

        <script>
        let btn = document.querySelector("#btn_menu");
        let sidebar = document.querySelector(".navigation_2");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        }
    </script>
    </div>
</body>

</html>