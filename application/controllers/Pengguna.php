<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function index()
	{
		$this->load->view('components/header');
		$this->load->view('pages/pengguna/index');
		$this->load->view('components/footer');
	}
}
