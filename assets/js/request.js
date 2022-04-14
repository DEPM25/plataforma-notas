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
			if (!data.message) {
				$(data).each(function (index, value) {
					let option = `<option value="${value.id}" onclick="getAlumnosByGroup(this.value);">${value.nom_asignatura} - ${value.nom_grupo}</option>`;
					$("#grupos").append(option);
				});
			} else {
				$(".logros").hide();
				$(".alert").show();
				$("#mensaje").html(data.message);
			}
		},
	});
});

function getAlumnosByGroup(val) {
	var id = val;
	var periodo = document.getElementById('periodos').value;
	var contador = 0;
	let tbody = document.querySelector("#alumnosByGrupo");
	tbody.innerHTML = "";
	$.ajax({
		url: "getAlumnosByGrupoToTeacher",
		type: "POST",
		data: {
			id_grupo: id,
			periodo: periodo,
		},
		success: function (data) {
			if (!data.message) {
				$(".alert").hide();
				$(".content-table").show();
				$(".logros").show();
				$('#alumnosByGrupo').html(data);
			} else {
				$(".content-table").hide();
				$(".logros").hide();
				$(".alert").show();
				$("#mensaje").html(data.message);
			}
		},
	});
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
