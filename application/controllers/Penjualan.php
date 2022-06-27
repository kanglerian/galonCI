<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('penjualan_model');
		$this->load->model('pelanggan_model');
		$this->load->model('pengguna_model');
		$this->load->model('detail_model');
	}

	public function index()
	{
		$data['jumlah'] = $this->penjualan_model->count();
		$data['results'] = $this->penjualan_model->findAll();
		$data['pelanggan'] = $this->pelanggan_model->findAll();
		$data['pengguna'] = $this->pengguna_model->findAll();
		$this->load->view('components/header');
		$this->load->view('pages/penjualan/index', $data);
		$this->load->view('components/footer');
	}

	public function edit($id)
	{
		$where = [
			'id_sales' => $id
		];
		$data['penjualan'] = $this->penjualan_model->getOne($where, 'sales');
		$this->load->view('components/header');
		$this->load->view('pages/penjualan/edit', $data);
		$this->load->view('components/footer');
	}

	public function tambah()
	{
		$data = [
			'id_sales' => $this->input->post('id_sales'),
			'tgl_sales' => $this->input->post('tgl_sales'),
			'id_customer' => $this->input->post('id_customer'),
			'id_users' => $this->input->post('id_users'),
			'potongan' => $this->input->post('potongan'),
		];
		$detail = [
			[
				'id_sales' => $this->input->post('id_sales'),
				'id_barang' => 1,
				'qty' => 200,
			],[
				'id_sales' => $this->input->post('id_sales'),
				'id_barang' => 2,
				'qty' => 300,
			],
		];

		$this->penjualan_model->post($data, 'sales');
		$this->detail_model->post($detail, 'detail_sales');
		redirect('penjualan');
	}

	public function update()
	{
		$where = [
			'id_sales' => $this->input->post('id_sales'),
		];
		$data = [
			'tgl_sales' => $this->input->post('tgl_sales'),
			'id_customer' => $this->input->post('id_customer'),
			'id_users' => $this->input->post('id_users'),
			'potongan' => $this->input->post('potongan'),
		];
		$this->penjualan_model->patch($where, $data, 'sales');
		redirect('penjualan');
	}

	public function delete($id)
	{
		$where = [
			'id_sales' => $id
		];
		$this->detail_model->delete($where, 'detail_sales');
		$this->penjualan_model->delete($where, 'sales');
		redirect('penjualan');
	}
}
