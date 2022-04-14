<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('rol')=="Coordinador" && $this->session->userdata('status')=="Active") {
			$this->load->view('Coordinador/index');
		}else{
			redirect('Login', 'refresh');
		}
	}
}