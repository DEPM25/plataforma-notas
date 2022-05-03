$(document).ready(function ($) {
	$(".content-table").hide();
	$(".logros").hide();
});

$(document).ready(function ($) {
	$.ajax({
		url: "getGrupos",
		type: "POST",
		dataType: "json",
		success: function (data) {
			if (!data.error) {
				$(data).each(function (index, value) {
					var codigo = '';
					codigo = value.codigo_asignacion;
					let option = `<option value="${value.codigo_grupos}" onclick="getAlumnosByGroup(this.value, `+codigo+`);">${value.nom_asignatura} - ${value.nom_grupo}</option>`;
					$("#grupos").append(option);
				});
			} else {
				$(".logros").hide();
				$(".alert").show();
				$("#mensaje").html(data.error);
			}
		},
	});
});

function getAlumnosByGroup(val, codigo_asignacion) {
	codigo_asignacion = '000000'+codigo_asignacion;
	var cod = codigo_asignacion.substr(-6,6);
	var id = val;
	var periodo = document.getElementById('periodos').value;
	let tbody = document.querySelector("#alumnosByGrupo");
	tbody.innerHTML = "";
	$.ajax({
		url: "getAlumnosByGrupoToTeacher",
		type: "POST",
		data: {
			id_grupo: id,
			periodo: periodo,
			cod_asignacion: cod,
		},
		success: function (data) {
			if (!data.error) {
				$(".alert").hide();
				$(".content-table").show();
				$(".logros").show();
				$('#alumnosByGrupo').html(data);
			} else {
				$(".content-table").hide();
				$(".logros").hide();
				$(".alert").show();
				$("#mensaje").html(data.error);
			}
		},
	});
}

function showRol(){
	var ajax = new XMLHttpRequest();
	var method = "POST";
	var url = "getTipoRol";
	var asynchronous = true;

	ajax.open(method, url, asynchronous);
	ajax.send();

	ajax.onreadystatechange = function()
	{
		if (this.readyState == 4 && this.status == 200) {
			var data = JSON.parse(this.responseText);
			var html = "";
			html += "<option value=''>Seleccione...</option>";
			if(data.cod_rol = 4){
				for (var i = 2; i<data.length; i++) {
					var idRol = data[i].cod_rol;
					var nom_rol = data[i].nom_rol;
					html += "<option value="+idRol+">"+nom_rol+"</option>";
				}
			}else{
				for (var i = 0; i<data.length; i++) {
					var idRol = data[i].cod_rol;
					var nom_rol = data[i].nom_rol;
					html += "<option value="+idRol+">"+nom_rol+"</option>";
				}
			}if (data.cod_rol = 3) {
				
			} else {
				
			}
			document.getElementById("tipo_user").innerHTML = html;
		}
	}
}

function sumar1(n1) {
	return parseFloat(n1);
}

function sumar2(n2, x2) {
	return parseFloat(Number(n2) + Number(x2));
}

function sumar3(n3, x3, y3) {
	return  parseFloat(Number(n3) + Number(x3) + Number(y3));
}

function sumar4(n4, x4, y4, z4) {return  parseFloat(Number(n4) + Number(x4) + Number(y4) + Number(z4));}
