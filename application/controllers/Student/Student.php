<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('rol')=="Estudiante" && $this->session->userdata('status')=="Active") {
			$this->load->view('Student/index');
		}else{
			redirect('Login', 'refresh');
		}
	}
}
