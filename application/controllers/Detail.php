<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('detail_model');
	}

	public function index()
	{	
		$data['jumlah'] = $this->detail_model->count();
		$data['results'] = $this->detail_model->findAll();
		$this->load->view('components/header');
		$this->load->view('pages/detail/index', $data);
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
		$detail = [];
		foreach ($_POST['id_barang'] as $key => $val) {
			$detail[] = [
				'id_sales' =>  $_POST['id_sales'],
				'id_barang' =>  $_POST['id_barang'][$key],
				'qty' =>  $_POST['qty'][$key],
			];
		}

		$this->detail_model->post($detail, 'detail_sales');
		redirect($_SERVER['HTTP_REFERER']);
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
			'id_detail_sales' => $id
		];
		$this->detail_model->delete($where, 'detail_sales');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
