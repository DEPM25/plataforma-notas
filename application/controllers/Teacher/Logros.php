<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logros extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Teacher_m');
	}

	public function index()
	{
		if ($this->session->userdata('rol') == "Docente" && $this->session->userdata('status') == "Active") {
			$this->load->view('Teacher/Logros');
		} else {
			redirect('Login');
		}
	}

	public function insertLogros()
	{
		$logros = $this->input->post('nombre');
		$id_logros = $this->input->post('logros');

		if (!empty($logros) && !empty($id_logros)) {
			$logros_toString = implode("||", $logros);
			$num = 1;
			foreach ($id_logros as $logro){$num++; $res = $this->Teacher_m->insertLogros($logro, $logros_toString, $num);}
			if ($res) {
				echo json_encode(array('success' => 'Logros insertados correctamente'));
			}else{
				echo json_encode(array('error' => 'Los logros no se insertaron correctamente'));
			}
		} else {
			echo json_encode(array('error' => 'Error, debe de seleccionar un grupo para insertar los indicadores de desempeño'));
		}
	}

	public function getAsignaturas()
	{
		$id_user = $this->session->userdata('codigo_user');
		if (!$res = $this->Teacher_m->getAsignaturasId($id_user)) {
			echo json_encode(array('error' => 'Aún no se le han asignado grupos para insertar indicadores de desempeño'));
		} else {
			
			echo json_encode($res);
		}
	}

	/* POR TERMINAR */
	/* public function getTextLogros(){
		$id_user = $this->session->userdata('id');
		$res = $this->Teacher_m->getTextLogros($id_user);
		print_r($res);
		if($res){
			foreach ($res as $row) {
				$data = explode("-", $row['nom_logro']);
				echo "<div id='contenido'>
						<div class='group-logro-input'>
							<label>Logro #1</label>
							<textarea name='nombre[]' maxlength='150' rows='2' cols='120' style='resize:none'>$data</textarea>
						</div>
						<br>
					</div>";
			}
			
		}
	} */
}
