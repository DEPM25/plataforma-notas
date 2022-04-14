<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/StyleE.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/general.css')?>">
    <link rel="shortcut icon" href="#">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Estudiante</title>
</head>

<body>
    <div class="container">
        <header class="header">
            <h2>TITULO</h2>
            
        </header>

        <main class="content">
            <h1>Bienvenid@ <?php echo $this->session->userdata('nombre_1'). ' '. $this->session->userdata('nombre_2'). ' '. $this->session->userdata('apellido_1'). ' '. $this->session->userdata('apellido_2'); ?></h1>
            <table id="notas">
                <tr>
                    <th>Actvidad</th>
                    <th>Fecha Digitacion</th>
                    <th>Porcentaje</th>
                    <th>Nota</th>
                    <th>Nota recuperacion</th>
                </tr>
                <tr>
                    <td>Taller 1</td>
                    <td>10/11/2021</td>
                    <td>30%</td>
                    <td>4.0</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>Taller 2</td>
                    <td>10/11/2021</td>
                    <td>40%</td>
                    <td>3.5</td>
                    <td>N/A</td>
                </tr>
                <tr>
                    <td>Taller 3</td>
                    <td>10/11/2021</td>
                    <td>20%</td>
                    <td>4.5</td>
                    <td>N/A</td>
                </tr>
            </table>
        </main>

        <footer class="footer">
            <h3>footer</h3>
        </footer>
    </div>


    <script src="<?php echo base_url('assets/js/mystyle.js'); ?>"></script>
</body>

</html>