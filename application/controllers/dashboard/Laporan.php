<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('admin')) {
		// 	redirect(base_url('login'));
		// }

		// $this->id_pegawai = $this->session->userdata('pegawai')->id_pegawai;
	}

	public function index()
	{
		$tgl = date('Y-m-d');


		if ($this->input->post('tgl')) {
			$tgl = $this->input->post('tgl');
		}

		$data = [
			"data" 	=> $this->DB->getAbsen2($tgl),
			"tgl" 	=> $tgl,
		];
		$this->load->view('template/dashboard/header');
		$this->load->view('template/dashboard/sidebar');
		$this->load->view('dashboard/laporan-v2', $data);
		$this->load->view('template/dashboard/footer');
	}

	public function cetak($tgl)
	{

		// Get the current date
		$data = [
			"data" => $this->DB->getAbsen2($tgl),
			"tgl" => $tgl
		];

		$this->load->view('dashboard/cetak', $data);
	}
}
