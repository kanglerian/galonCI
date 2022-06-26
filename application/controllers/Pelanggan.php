<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('pelanggan_model');
	}

	public function index()
	{	
		$data['jumlah'] = $this->pelanggan_model->count();
		$data['results'] = $this->pelanggan_model->findAll();
		$this->load->view('components/header');
		$this->load->view('pages/pelanggan/index', $data);
		$this->load->view('components/footer');
	}

	public function edit($id)
	{	
		$where = [
			'id_customer' => $id
		];
		$data['pelanggan'] = $this->pelanggan_model->getOne($where, 'custumer');
		$this->load->view('components/header');
		$this->load->view('pages/pelanggan/edit', $data);
		$this->load->view('components/footer');
	}

	public function tambah()
	{	
		$data = [
			'id_customer' => $this->input->post('id_customer'),
			'nama_customer' => $this->input->post('nama_customer'),
			'alamat' => $this->input->post('alamat'),
			'no_tlp' => $this->input->post('no_tlp')
		];

		$this->pelanggan_model->post($data, 'custumer');
		redirect('pelanggan');
	}

	public function update()
	{	
		$where = [
			'id_customer' => $this->input->post('id_customer'),
		];
		$data = [
			'nama_customer' => $this->input->post('nama_customer'),
			'alamat' => $this->input->post('alamat'),
			'no_tlp' => $this->input->post('no_tlp')
		];
		$this->pelanggan_model->patch($where, $data, 'custumer');
		redirect('pelanggan');
	}

	public function delete($id)
	{
		$where = [
			'id_customer' => $id
		];
		$this->pelanggan_model->delete($where, 'custumer');
		redirect('pelanggan');
	}
}
