<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/general.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/StyleC.css') ?>">
    <title>Document</title>
</head>

<body>
<!-- cambio de comentarios -->
    <div class="main">
        <div class="asignacion-content">
            <button id="openModal" class="btn btn-success">Asignacion</button>

            <div id="modal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Ingresar archivo en formato CSV</h2>
                    </div>
                    <div class="modal-body">
                        <input type="file" name="" id="">
                    </div>
                </div>

            </div>
        </div>
        <div class="table">
            <table class="teacher-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th>Nombre 1</th>
                        <th>Nombre 2</th>
                        <th>Apellido 1</th>
                        <th>Apellido 2</th>
                        <th>Jornada</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $contador = 0 ?>
                    <?php foreach ($data as $item) : ?>
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td><?= $contador += 1 ?></td>
                            <td><?= $item->nombre_1 ?></td>
                            <td><?= $item->nombre_2 ?></td>
                            <td><?= $item->apellido_1 ?></td>
                            <td><?= $item->apellido_2 ?></td>
                            <td></td>
                            <td><button class="btn btn-warning">Ver Asignaturas</button></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/jquery-v3.6.0.js'); ?>"></script>
    <script>
        var modal = document.getElementById("modal");

        var btn = document.getElementById("openModal");

        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>