<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('admin')) {
		// 	redirect(base_url('login'));
		// }

	}

	public function index()
	{


		$data = [
			'data_area' => $this->DB->getAll('t_area'),
			'data_jam' => $this->DB->getWhere('t_jam', ['id' => 1]),
		];


		$this->load->view('template/dashboard/header');
		$this->load->view('template/dashboard/sidebar');
		$this->load->view('dashboard/config', $data);
		$this->load->view('template/dashboard/footer');
	}

	// update_jam

	public function update_jam()
	{

		$data = [
			'min' => $this->input->post('jam_mulai'),
			'max' => $this->input->post('jam_selesai'),
		];

		$this->DB->edit('t_jam', $data, ['id' => 1]);
		redirect(base_url('dashboard/config'));
	}


	public function tambah()
	{

		$data = [
			'nm_area' => $this->input->post('nm_area'),
			'lat_min' => $this->input->post('lat_min'),
			'lat_max' => $this->input->post('lat_max'),
			'long_min' => $this->input->post('long_min'),
			'long_max' => $this->input->post('long_max'),
			'status_area' => false,
		];

		$this->DB->add('t_area', $data);
		redirect(base_url('dashboard/config'));
	}

	public function nonAktif($id)
	{

		$this->DB->edit('t_area', ['status_area' => 0], ['id' => $id]);
		redirect(base_url('dashboard/config'));
	}

	public function aktif($id)
	{
		$id_aktif = $this->DB->getWhere('t_area', ['status_area' => 1])->id;
		$this->DB->edit('t_area', ['status_area' => 0], ['id' => $id_aktif]);

		$this->DB->edit('t_area', ['status_area' => 1], ['id' => $id]);
		redirect(base_url('dashboard/config'));
	}

	function hapus($id)
	{
		$this->DB->delete('t_area', ['id' => $id]);
		redirect(base_url('dashboard/config'));
	}

	public function logOut()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
