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
			$logros_toString = implode("-", $logros);
			foreach ($id_logros as $logro) {
				if ($this->Teacher_m->insertLogros($logro, $logros_toString)) {
					echo json_encode(array('error' => 'Error al insertar indicadores de desempeño, intentolo más tarde'));
				}else{
					echo json_encode(array('success' => 'Indicadores de desempeño insertados correctamente'));
				}
			}
		} else {
			echo json_encode(array('error' => 'Error, debe de seleccionar un grupo para insertar los indicadores de desempeño'));
		}
	}

	public function getAsignaturas()
	{
		$id_user = $this->session->userdata('id');
		if (!$res = $this->Teacher_m->getAsignaturasId($id_user)) {
			echo json_encode(array('error' => 'Aún no se le han asignado grupos para insertar indicadores de desempeño'));
		} else {
			echo json_encode($res);
		}
	}

	public function getTextLogros(){
		$id_user = $this->session->userdata('id');
		print_r($id_user) ;
	}
}
