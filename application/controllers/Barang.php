<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function index()
	{
		$this->load->view('components/header');
		$this->load->view('pages/barang/index');
		$this->load->view('components/footer');
	}
}
