<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/general.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/StyleT.css') ?>">
    <title>Informacion de usuario</title>
</head>

<body>
    <div class="details">
        <div class="img-user">
            <img class="image" src="<?php echo base_url('assets/assets/img/user.png'); ?>">
            <div class="overlay">
                <div class="text-rol"><?php echo $this->session->userdata('rol'); ?></div>
            </div>
        </div>
        <div class="input">
            <input type="text" value="<?php echo $this->session->userdata('n_identificacion'); ?>" placeholder="Numero de documento" disabled>
        </div>
        <div class="input">
            <input type="text" value="<?php echo $this->session->userdata('nombre_1'); ?>" placeholder="Primer nombre" disabled>
        </div>
        <div class="input">
            <input type="text" value="<?php echo $this->session->userdata('nombre_2'); ?>" placeholder="Segundo nombre" disabled>
        </div>
        <div class="input">
            <input type="text" value="<?php echo $this->session->userdata('apellido_1'); ?>" placeholder="Primer apellido" disabled>
        </div>
        <div class="input">
            <input type="text" value="<?php echo $this->session->userdata('apellido_2'); ?>" placeholder="Segundo apellido" disabled>
        </div>
        <div class="input">
            <input type="text" value="<?php echo $this->session->userdata('celular_1'); ?>" placeholder="Numero de celular" disabled>
        </div>
        <div class="input">
            <input type="text" value="<?php echo $this->session->userdata('celular_2'); ?>" placeholder="Numero de celular" disabled>
        </div>
        <div class="input">
            <input type="email" value="<?php echo $this->session->userdata('correo'); ?>" placeholder="Correo" disabled>
        </div>
    </div>
</body>

</html>