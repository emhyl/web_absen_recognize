<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_absen extends CI_Controller
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
		$tgl_absen = $this->DB->tgl;
		if ($this->input->post('tgl')) {
			$tgl_absen = $this->input->post('tgl');
		}

		$data_dosen = [];
		$jml = (object) [];
		$jml->hadir = 0;
		$jml->izin = 0;
		$jml->sakit = 0;
		$jml->alpa = 0;

		foreach ($this->DB->getAll('t_guru') as $i => $value) {
			$data_absen = $this->DB->getWhere('t_absen', ['id_guru' => $value->id_guru, 'tgl_absen' => $tgl_absen]);

			if ($data_absen) {

				switch ($data_absen->sts_absen) {
					case 'h':
						$jml->hadir++;
						break;
					case 'i':
						$jml->izin++;
						break;
					case 's':
						$jml->sakit++;
						break;
					case 'a':
						$jml->alpa++;
						break;
				}
			}

			$data_dosen[$i] = $value;
			$data_dosen[$i]->data_absen = $data_absen;
		}

		$data = [
			// "data_absen" => $this->DB->join('t_absen AB', ['t_guru G' => 'AB.id_guru = G.id_guru'], ['tgl_absen' => $this->DB->tgl]),
			'data_absen' => $data_dosen,
			'tgl_absen' => $tgl_absen,
			'jml_absen' => $jml,
		];

		$this->load->view('template/dashboard/header');
		$this->load->view('template/dashboard/sidebar');
		$this->load->view('dashboard/data_absen', $data);
		$this->load->view('template/dashboard/footer');
	}

	public function logOut()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
