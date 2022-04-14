<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/general.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/StyleT.css') ?>">

    <script src="https://kit.fontawesome.com/cefde82d95.js" crossorigin="anonymous"></script>
    <title>Docente</title>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <div class="logo_content">
                <div class="logo">
                    <i class="fas fa-atom"></i>
                    <div class="logo_name">Deogracias Cardona</div>
                </div>
                <i class="fas fa-bars" id="btn_menu"></i>
            </div>
            <ul class="nav_list">
                <li>
                    <a type="button" href="#" id="alumnos">
                        <i class="fas fa-users"></i>
                        <span class="links_name">Alumnos</span>
                    </a>
                    <span class="tooltip">Alumnos</span>
                </li>
                <li>
                    <a type="button" href="<?php echo base_url('Teacher/Logros/index'); ?>">
                        <i class="fas fa-shapes"></i>
                        <span class="links_name">I. Desempeño</span>
                    </a>
                    <span class="tooltip">I. Desempeño</span>
                </li>
                <li>
                    <a href="">
                        <i class="fas fa-percent"></i>
                        <span class="links_name">Porcentajes</span>
                    </a>
                    <span class="tooltip">Porcentajes</span>
                </li>
                <li>
                    <a class="notas" type="button" href="<?php echo base_url('Teacher/Notas/index'); ?>">
                        <i class="fas fa-calculator"></i>
                        <span class="links_name">Notas</span>
                    </a>
                    <span class="tooltip">Notas</span>
                </li>
                <li>
                    <a type="button" href="<?php echo base_url('Teacher/Teacher/perfil'); ?>">
                        <i class="fas fa-user-tie"></i>
                        <span class="links_name">Usuario</span>
                    </a>
                    <span class="tooltip">Usuario</span>
                </li>
            </ul>
            <div class="profile_content">
                <div class="profile">
                    <div class="profile_details">
                        <img src="<?php echo base_url('assets/assets/img/user.png') ?>" alt="">
                        <div class="name_job">
                            <div class="name"><?php echo $this->session->userdata('nombre_1'). ' '.$this->session->userdata('apellido_1')?></div>
                            <div class="job"><?php echo $this->session->userdata('rol'); ?></div>
                        </div>
                    </div>
                    <a href="<?php echo base_url('salir'); ?>"><i class="fas fa-sign-out-alt" id="log_out"></i></a>
                </div>
            </div>
        </div>

        <header class="header">
            <h2>Bienvenid@ a la plataforma de notas <?php echo $this->session->userdata('nombre_1'). ' '. $this->session->userdata('nombre_2'). ' '. $this->session->userdata('apellido_1'). ' '. $this->session->userdata('apellido_2'); ?></h2>
        </header>

        <main class="col-12 content">
            
        </main>
    </div>
    <script src="<?php echo base_url('assets/js/jquery-v3.6.0.js'); ?>"></script>
    <script>
        let btn = document.querySelector("#btn_menu");
        let sidebar = document.querySelector(".navigation");

        btn.onclick = function() {
            sidebar.classList.toggle("active");
        }
    </script>
</body>

</html>