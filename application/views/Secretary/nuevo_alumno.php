<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/StyleS.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/general.css') ?>">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/cefde82d95.js" crossorigin="anonymous"></script>
    <title>Nuevo Alumno</title>
</head>

<body class="body-alumno">
    <div class="container-alumno">
        <div class="title">Ingresar nuevo usuario</div>
        <form action="<?php echo base_url('Secretary/Alumnos/importCSV') ?>" method="POST" enctype="multipart/form-data">
            <div>
                <div>
                    <label>Ingresar documento CSV</label>
                    <input type="file" id="file_students" name="file_students">
                </div>
                <button type="submit" class="btn btn-success" name="submit" value="submit">Enviar</button>
            </div>
        </form>

        <form action="<?php echo base_url('insertar') ?>" method="POST" enctype="multipart/form-data">
            <div class="general">

                <div class="input select">
                    <label for="tipo_user">Seleccionar tipo de usuario</label>
                    <select name="tipo_user" id="tipo_user" onchange="showInfo()" >
                        <option value="">Seleccione...</option>
                    </select>
                </div>

                <div class="input">
                    <label for="code_user">Codigo Usuario</label>
                    <input type="text" id="code_user" name="code_user" placeholder="Codigo" readonly>
                </div>

                <div class="input select">
                    <label for="nacionalidad">Nacionalidad</label>
                    <select name="nacionalidad" id="nacionalidad" >
                        <option value="">Seleccione...</option>
                        <option value="COL">Colombia</option>
                        <option value="VEL">Venezuela</option>
                    </select>
                </div>

                <div class="input select">
                    <label for="genero">Genero </label>
                    <select name="genero" id="genero" >
                        <option value="">Seleccione...</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
                </div>

                <div class="input select">
                    <label for="tipo_identificacion">Tipo de identificacion </label>
                    <select name="tipo_identificacion" id="tipo_identificacion" >
                        <option value="0">Seleccione...</option>
                    </select>
                </div>

                <div class="input">
                    <label for="num_identificacion">Documento de identidad</label>
                    <input type="text" id="num_identificacion" name="num_identificacion" placeholder="Escribir numero de documento" >
                </div>
                
                <div class="input">
                    <label for="nombre_1">Primer Nombre</label>
                    <input type="text" id="nombre_1" name="nombre_1" placeholder="Escribir primer nombre" >
                </div>
                
                <div class="input">
                    <label for="nombre_2">Segundo Nombre</label>
                    <input type="text" id="nombre_2" name="nombre_2" placeholder="Escribir segundo nombre" >
                </div>

                <div class="input">
                    <label for="apellido_1">Primer Apellido</label>
                    <input type="text" id="apellido_1" name="apellido_1" placeholder="Escribir primer apellido" >
                </div>

                <div class="input">
                    <label for="apellido_2">Segundo Apellido</label>
                    <input type="text" id="apellido_2" name="apellido_2" placeholder="Escribir segundo apellido" >
                </div>

                <div class="input">
                    <label for="celular_1">N° de celular 1</label>
                    <input type="text" id="celular_1" name="celular_1" placeholder="Escribir numero de celular" >
                </div>

                <div class="input">
                    <label for="celular_2">N° de celular 2 (opcional)</label>
                    <input type="text" id="celular_2" name="celular_2" placeholder="Escribir numero de celular">
                </div>

                <div class="input">
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="correo" placeholder="Escribir correo" >
                </div>

                <div class="input select">
                    <label for="zona">Zona</label>
                    <select name="zona" id="zona" >
                        <option value="">Seleccione...</option>
                        <option value="1">Urbana</option>
                        <option value="2">Rural</option>
                    </select>
                </div>

                <div class="input select">
                    <label for="departamento">Departamento</label>
                    <select name="departamento" id="departamento">
                        <option value="none">Seleccione...</option>
                        <?php
                            foreach($departamentos as $row){
                                echo '<option value="'.$row->id_departamento.'">'.$row->departamento.'</option>';
                            }
                        ?>
                    </select>
                </div>

                <div class="input select">
                    <label for="municipio">Municipio</label>
                    <select name="municipio" id="municipio" >
                        <option value="none">Seleccione...</option>
                    </select>
                </div>

                <div class="input">
                    <label for="dir">Direccion de residencia</label>
                    <input type="text" id="dir" name="dir" placeholder="Ingrese direccion" >
                </div>
                <input class="btn" type="submit" value="Siguiente">
            </div>
        </form>
    </div>
    <!-- <script src="<?php echo base_url('assets/js/request.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/js/jquery-v3.6.0.js'); ?>"></script>

    <script>
        $(document).ready(function(){
            $('#departamento').change(function(){
                var mun_id = $('#departamento').val();
                if (mun_id != '') {
                    $.ajax({
                        url:"<?php echo base_url('Secretary/Alumnos/getMunicipios'); ?>",
                        method: "POST",
                        data:{id_departamento:mun_id},
                        success: function(data){
                            $('#municipio').html(data);
                        }
                    })
                }
            });
        });

        showRol();
        showId();
        function showRol(){
            var ajax = new XMLHttpRequest();
            var method = "POST";
            var url = "<?php echo base_url("Secretary/Alumnos/getTipoRol"); ?>";
            var asynchronous = true;

            ajax.open(method, url, asynchronous);
            ajax.send();

            ajax.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    var html = "";
                    html += "<option value=''>Seleccione...</option>";
                    for (var i = 0; i<data.length; i++) {
                        var idRol = data[i].id_rol;
                        var nom_rol = data[i].nom_rol;
                        html += "<option value="+idRol+">"+nom_rol+"</option>";
                    }
                    document.getElementById("tipo_user").innerHTML = html;
                }
            }
        }
        /* comentario */
        function showId(){
            var ajax = new XMLHttpRequest();
            var method = "POST";
            var url = "<?php echo base_url("Secretary/Alumnos/getTipoIdentificacion"); ?>";
            var asynchronous = true;

            ajax.open(method, url, asynchronous);
            ajax.send();

            ajax.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    var html = "";
                    html += "<option value=''>Seleccione...</option>";
                    for (var i = 0; i<data.length; i++) {
                        var idTipo = data[i].tipo_id;
                        var nom_id = data[i].nombre;
                        html += "<option value="+idTipo+">"+nom_id+"</option>";
                    }
                    document.getElementById("tipo_identificacion").innerHTML = html;
                }
            }
        }
        
        function showInfo(){
            var cod_user = document.getElementById('tipo_user').value;
            $.ajax({
                url:"<?php echo base_url('Secretary/Alumnos/codigoUsuer'); ?>",
                method: "POST",
                data:{tipo_user:cod_user},
                success: function(data){
                    $('#code_user').val(data);
                }
            });
        }
    </script>

</body>

</html>