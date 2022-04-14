<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/general.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/StyleT.css') ?>">
    <script src="https://kit.fontawesome.com/cefde82d95.js" crossorigin="anonymous"></script>
    <title>Indicadores de desempeño</title>
</head>

<body>
    <div class="row">
        <h2>Insertar Indicadores de desempeño para los grupos asignados</h2>

        <div class="col-12">
            <div class="alert" style="display: none;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <p id="mensaje_alert"></p>
            </div>
            <div class="success" style="display: none;">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                <p id="mensaje_success"></p>
            </div>
            <div class="form_logros">
                <div class="add_logros">
                    <button class="btn btn-info" type="button" name="add" id="add_logros">Agregar</button>
                </div>
                <form id="form_logros" action="">
                    <div class="form-checkbox">

                    </div>
                    <div id="contenido">
                        <div class="group-logro-input">
                            <label>Logro #1</label>
                            <textarea id="1" name="nombre[]" maxlength="150" rows="2" cols="120" style="resize:none"></textarea>
                        </div>
                        <br>
                        <div class="group-logro-input">
                            <label>Logro #2</label>
                            <textarea id="2" name="nombre[]" maxlength="150" rows="2" cols="120" style="resize:none"></textarea>
                        </div>
                        <br>
                    </div>

                    <input class="btn btn-success btn-submit" type="button" id="submit" name="logros_submit" value="Enviar">
                </form>
            </div>

        </div>
    </div>

    <script src="<?php echo base_url('assets/js/jquery-v3.6.0.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            var i = 2;
            $('#add_logros').click(function() {
                if (i < 4) {
                    i++;
                    $('#contenido').append('<div class="group-logro-input" id="logro-group_' + i + '"><label>Logro #' + i + '</label><textarea maxlength="150" rows="2" cols="120" style="resize:none" id="' + i + '" name="nombre[]"></textarea><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></div>');
                }
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                i--;
                $('#logro-group_' + button_id + '').remove();

            });
        })

        $('#submit').click(function() {
            $.ajax({
                url: 'insertLogros',
                method: 'POST',
                dataType: 'json',
                data: $('#form_logros').serialize(),
                success: function(data) {
                    if (!data.message) {
                        $('#form_logros')[0].reset();
                        $("#mensaje_success").html(data.success);
                        $(".success").show();
                    } else {
                        $("#mensaje_alert").html(data.message);
                        $(".alert").show();
                    }
                }
            });
        })

        $(document).ready(function() {
            $.ajax({
                url: 'getAsignaturas',
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    if (!data.message) {
                        $.each(data, function(index, value) {
                            var checkbox = `<div class="checkbox-info"><label>${value.nom_asignatura} - ${value.nom_grupo}</label><input class="checkbox-logros" name="logros[]" type="checkbox" value="${value.id}" /></div>`;
                            $('.form-checkbox').append(checkbox);
                        });
                    } else {
                        $(".form_logros").hide();
                        $("#mensaje").html(data.message);
                        $(".alert").show();
                    }
                }
            });
        })
    </script>
</body>

</html>