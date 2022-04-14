(function($){
    $("#sign_in").submit(function(ev){
        ev.preventDefault();
        $(".alert").hide();
        $("#mensaje").html("");
        $.ajax({
            url: 'Login/validarDatosLogin',
            type: 'POST',
            data: $(this).serialize(),
            success: function(err){
                var json = JSON.parse(err);
                window.location.replace(json.url);
            },
            statusCode: {
                400: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if (json.user.length != 0) {
                        $("#user_error").html(json.user);
                    }

                    if (json.pass.length != 0) {
                        $("#pass_error").html(json.pass);
                    }
                },

                401: function(xhr){
                    var json = JSON.parse(xhr.responseText);
                    $(".alert").show();
                    $("#mensaje").html(json.message);
                }
            },
        });
    });
})(jQuery)

function show_pass(){
    var btn = document.getElementById("btn_show");
    var temp = document.getElementById("pass");
    if (temp.type === "password") {
        btn.className = "fas fa-eye-slash";
        temp.type = "text";
    }else{
        temp.type = "password";
        btn.className = "fas fa-eye";
    }
}