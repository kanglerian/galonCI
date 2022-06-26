<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('pengguna_model');
	}

	public function index()
	{	
		$data['jumlah'] = $this->pengguna_model->count();
		$data['results'] = $this->pengguna_model->findAll();
		$this->load->view('components/header');
		$this->load->view('pages/pengguna/index', $data);
		$this->load->view('components/footer');
	}

	public function edit($id)
	{	
		$where = [
			'id_users' => $id
		];
		$data['pengguna'] = $this->pengguna_model->getOne($where, 'users');
		$this->load->view('components/header');
		$this->load->view('pages/pengguna/edit', $data);
		$this->load->view('components/footer');
	}

	public function tambah()
	{	
		$data = [
			'id_users' => $this->input->post('id_users'),
			'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level' => $this->input->post('level'),
		];

		$this->pengguna_model->post($data, 'users');
		redirect('pengguna');
	}

	public function update()
	{	
		$where = [
			'id_users' => $this->input->post('id_users'),
		];
		$data = [
			'nama_user' => $this->input->post('nama_user'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level' => $this->input->post('level'),
		];
		$this->pengguna_model->patch($where, $data, 'users');
		redirect('pengguna');
	}

	public function delete($id)
	{
		$where = [
			'id_users' => $id
		];
		$this->pengguna_model->delete($where, 'users');
		redirect('pengguna');
	}
}
