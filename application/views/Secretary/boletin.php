<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/general.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/StyleS.css')?>">
    <title>Document</title>
</head>

<body>
    <div class="select-grupo">

    </div>

    <div class="allnotas">

    </div>

    <script src="<?php echo base_url('assets/js/jquery-v3.6.0.js'); ?>"></script>
    <script>
        $(document).ready(function($) {
            $.ajax({
                url: "allGrupos",
                type: "POST",
                success: function(data) {
                    $(".select-grupo").html(data);
                },
            });
        });

        function showNotasByGrupo(grupo){
            $.ajax({
                url: "GetAllNotasByGrupo",
                type: "POST",
                data: {
                    grupo: grupo,
                },
                success: function(data){
                    $(".allnotas").html(data);
                }
            });
        }
    </script>
</body>

</html>