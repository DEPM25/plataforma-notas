<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Teacher_m');
	}

	public function index()
	{
		if ($this->session->userdata('rol') == "Docente" && $this->session->userdata('status') == "Active") {
			$this->load->view('Teacher/Notas');
		} else {
			redirect('Login');
		}
	}

	//FUNCION PARA OBTENER LOS GRUPOS DE LA DB
	public function getGrupos()
	{
		$id_user = $this->session->userdata('id');
		if (!$res = $this->Teacher_m->getGruposDocente($id_user)) {
			echo json_encode(array('error' => 'Aún no se le han asignado grupos'));
		} else {
			echo json_encode($res);
		}
	}

	//FUNCION PARA MOSTRAR LOS ALUMNOS CON LOS CAMPOS DE NOTAS PARA INSERTARLOS
	public function getAlumnosByGrupoToTeacher()
	{
		$contador = 0;
		$id_grupo = $_POST['id_grupo'];
		$periodo = $_POST['periodo'];

		if (!$res = $this->Teacher_m->getAlumnosByGrupo($id_grupo)) {
		echo"<div class='alert'>
				<span class='closebtn' onclick='this.parentElement.style.display=`none`;'>&times;</span>
				<p id='mensaje'>Aún no se le asignan estudiantes</p>
			</div>" ;
		} else {
				if(!$sql = $this->Teacher_m->mostrarNotas($periodo)){
					foreach ($res as $row) {
						echo "<tr>";
						echo "<td> <input type='checkbox' /> </td>";
						echo "<td>";
						echo $contador += 1;
						echo "</td>";
						echo "<td>" . $row->nombre_1 . "</td>";
						echo "<td>" . $row->nombre_2 . "</td>";
						echo "<td>" . $row->apellido_1 . "</td>";
						echo "<td>" . $row->apellido_2 . "</td>";
						echo "<td> <input id='N1$contador' name='N1$contador' maxlength='3' size='2' type='text' onblur='getElementById(`P$contador`).value=parseFloat((sumar1(N1$contador.value)).toFixed(1));' /> </td>";
						echo "<td> <input id='N2$contador' name='N2$contador' maxlength='3' size='2' type='text' onblur='getElementById(`P$contador`).value=parseFloat((sumar2(N1$contador.value, N2$contador.value)/2).toFixed(1));' /> </td>";
						echo "<td> <input id='N3$contador' name='N3$contador' maxlength='3' size='2' type='text' onblur='getElementById(`P$contador`).value=parseFloat((sumar3(N1$contador.value, N2$contador.value, N3$contador.value)/3).toFixed(1));' /> </td>";
						echo "<td> <input id='N4$contador' name='N4$contador' maxlength='3' size='2' type='text' onblur='getElementById(`P$contador`).value=parseFloat((sumar4(N1$contador.value, N2$contador.value, N3$contador.value, N4$contador.value)/4).toFixed(1));' /> </td>";
						echo "<td> <input id='P$contador' name='P$contador' maxlength='3' size='2' type='text' readonly /> </td>";
						echo "</tr>";
					}
				}else{
					$p1 = 'td_Nota_P'.$periodo.'_1' ;
					$p2 = 'td_Nota_P'.$periodo.'_2' ;
					$p3 = 'td_Nota_P'.$periodo.'_3' ;
					$p4 = 'td_Nota_P'.$periodo.'_4' ;
					$p5 = 'td_Nota_P'.$periodo.'_P' ;
					
					foreach ($sql as $data) {
						echo "<tr>";
						echo "<td> <input type='checkbox' /> </td>";
						echo "<td>";
						echo $contador += 1;
						echo "</td>";
						/* echo "<td>" . $data->nombre_1 . "</td>";
						echo "<td>" . $data->nombre_2 . "</td>";
						echo "<td>" . $data->apellido_1 . "</td>";
						echo "<td>" . $data->apellido_2 . "</td>"; */
						echo "<td> <input id='N1$contador' name='N1$contador' maxlength='3' size='2' type='text' value='$data[$p1]' /> </td>";
						echo "<td> <input id='N2$contador' name='N2$contador' maxlength='3' size='2' type='text' value='$data[$p2]' /> </td>";
						echo "<td> <input id='N3$contador' name='N3$contador' maxlength='3' size='2' type='text' value='$data[$p3]' /> </td>";
						echo "<td> <input id='N4$contador' name='N4$contador' maxlength='3' size='2' type='text' value='$data[$p4]' /> </td>";
						echo "<td> <input id='P$contador' name='P$contador' maxlength='3' size='2' type='text' value='$data[$p5]' readonly /> </td>";
						echo "</tr>";
					}
				}
			$total = count($res);
			echo "<input type='hidden' name='total' value='$total' />";
		}
	}

	//FUNCION PARA INSERTAR NOTAS POR PERIODO SEGUN EL ESTUDIANTE EN EL MODULO DE PROFESOR
	public function insertNotas()
	{
		$total = $this->input->post('total');
		$periodo = $this->input->post('periodo');


		for ($i = 1; $i <= $total; $i++) {
			$nota1 = $this->input->post('N1' . $i);
			$nota2 = $this->input->post('N2' . $i);
			$nota3 = $this->input->post('N3' . $i);
			$nota4 = $this->input->post('N4' . $i);
			$promedio = $this->input->post('P' . $i);

			/* if (strlen((substr((($nota1 + $nota2 + $nota3 + $nota4) / 4), 0, 3))) <= 1) {
				$promedio = (substr((($nota1 + $nota2 + $nota3 + $nota4) / 4), 0, 3)) . ".0";
			} else {
				$promedio = substr((($nota1 + $nota2 + $nota3 + $nota4) / 4), 0, 3);
			} */

			/* echo "<div>";
			echo "La nota 1 es: ".$nota1;
			echo ", La nota 2 es: ".$nota2;
			echo ", La nota 3 es: ".$nota3;
			echo ", La nota 4 es: ".$nota4;
			echo ", El promedio es: ".$promedio;
			echo "</div> <br>"; */

			$this->Teacher_m->insertarNotas($nota1, $nota2, $nota3, $nota4, $promedio, $i, $periodo);
		}
	}
}
