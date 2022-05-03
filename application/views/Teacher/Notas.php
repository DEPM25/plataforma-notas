<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/general.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/StyleT.css') ?>">
    <title>Notas</title>
</head>

<body>
    <div class="main">
        <div class="table">
            <div class="alert" style="display: none;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <p id="mensaje"></p>
            </div>
            <div class="select-grupo">
                <label class="selector">Seleccione el grupo</label>
                <select name="grupos" id="grupos">
                    <option value="0">Ninguno</option>
                </select>
                <select id="periodos" name="periodo">
                    <?php
                        for ($i=1; $i <= $periodos ; $i++) { 
                            echo '<option value="'.$i.'">Periodo '.$i.'</option>';
                        }
                    ?>
				</select>
            </div>

            <form id="form_notas" method="post">
                <div class="table-info-students">
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>#</th>
                                <th>Nombre 1</th>
                                <th>Nombre 2</th>
                                <th>Apellido 1</th>
                                <th>Apellido 2</th>
                                <th>Nota 1</th>
                                <th>Nota 2</th>
                                <th>Nota 3</th>
                                <th>Nota 4</th>
                                <th>Promedio</th>
                            </tr>
                        </thead>

                        <tbody id="alumnosByGrupo">

                        </tbody>

                    </table>

                </div>
                <input type="button" id="submit_notas" value="enviar">
            </form>
        </div>

        <div class="logros">
            <h1>Indicadores de desempeño</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, quasi quos! Nesciunt, atque eaque. Dolores, cumque. Saepe officiis odio nostrum veritatis odit fuga ipsum. Alias molestias ipsa incidunt laudantium? Delectus!</p>
        </div>

        <div class="mostrar_notas"></div>

    </div>
    <script src="<?php echo base_url('assets/js/jquery-v3.6.0.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/request.js'); ?>"></script>
    <script>
        $("#table").hide();

        function alumnos() {
            $("#table").show();
        }

        $("#submit_notas").click(function() {
            $.ajax({
                url: 'insertNotas',
                method: 'POST',
                data: $("#form_notas").serialize(),
                success: function(data){
                    $(".mostrar_notas").html(data);
                }
            })
        })

    </script>

</body>

</html>