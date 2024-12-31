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
		$bulan = date('m');
		$tahun = date('Y');

		if ($this->input->post('bulan')) {
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
		}

		$data = [
			"data" => $this->DB->getAbsen($bulan, $tahun),
			"bulan" => $bulan,
			"tahun" => $tahun,
			'jml_hari' => cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun),
		];

		$this->load->view('template/dashboard/header');
		$this->load->view('template/dashboard/sidebar');
		$this->load->view('dashboard/laporan', $data);
		$this->load->view('template/dashboard/footer');
	}

	public function cetak($bulan, $tahun)
	{

		// Get the current date
		$data = [
			"data" => $this->DB->getAbsen($bulan, $tahun),
			'jml_hari' => cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun),
		];

		$this->load->view('dashboard/cetak', $data);
	}
}