<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('barang_model');
	}

	public function index()
	{	
		$data['jumlah'] = $this->barang_model->count();
		$data['results'] = $this->barang_model->findAll();
		$this->load->view('components/header');
		$this->load->view('pages/barang/index', $data);
		$this->load->view('components/footer');
	}

	public function edit($id)
	{	
		$where = [
			'id_barang' => $id
		];
		$data['barang'] = $this->barang_model->getOne($where, 'barang');
		$this->load->view('components/header');
		$this->load->view('pages/barang/edit', $data);
		$this->load->view('components/footer');
	}

	public function tambah()
	{	
		$data = [
			'id_barang' => $this->input->post('id_barang'),
			'nama_barang' => $this->input->post('nama_barang'),
			'harga_pokok' => $this->input->post('harga_pokok'),
			'harga_jual' => $this->input->post('harga_jual'),
		];

		$this->barang_model->post($data, 'barang');
		redirect('barang');
	}

	public function update()
	{	
		$where = [
			'id_barang' => $this->input->post('id_barang'),
		];
		$data = [
			'nama_barang' => $this->input->post('nama_barang'),
			'harga_pokok' => $this->input->post('harga_pokok'),
			'harga_jual' => $this->input->post('harga_jual'),
		];
		$this->barang_model->patch($where, $data, 'barang');
		redirect('barang');
	}

	public function delete($id)
	{
		$where = [
			'id_barang' => $id
		];
		$this->barang_model->delete($where, 'barang');
		redirect('barang');
	}
}
