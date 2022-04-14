<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secretary extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('rol')=="Secretaria" && $this->session->userdata('status')=="Active") {
			$this->load->view('Secretary/index');
		}else{
			redirect('Login', 'refresh');
		}
	}
}