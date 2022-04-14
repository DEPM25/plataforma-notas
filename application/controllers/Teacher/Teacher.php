<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Teacher_m');
	}

	public function index()
	{
		if ($this->session->userdata('rol')=="Docente" && $this->session->userdata('status')=="Active") {
			$this->load->view('Teacher/index');
		}else{
			redirect('Login');
		}
	}

	public function perfil()
	{
		if ($this->session->userdata('rol')=="Docente" && $this->session->userdata('status')=="Active") {
			$this->load->view('include/profile');
		}else{
			redirect('Login');
		}
	}
}