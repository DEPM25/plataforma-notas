<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Coordinador_m');
	}

	public function index()
	{
		if ($this->session->userdata('rol')=="Coordinador" && $this->session->userdata('status')=="Active") {
            $data = $this->Coordinador_m->getAllProfesores();

			$this->load->view('Coordinador/asignacion', compact('data'));
		}else{
			redirect('Login', 'refresh');
		}
	}
}