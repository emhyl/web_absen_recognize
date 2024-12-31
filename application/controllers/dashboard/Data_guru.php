<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_guru extends CI_Controller
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
		$data = [
			"data_guru" => $this->DB->getAll('t_guru'),
		];
		$this->load->view('template/dashboard/header');
		$this->load->view('template/dashboard/sidebar');
		$this->load->view('dashboard/data_guru', $data);
		$this->load->view('template/dashboard/footer');
	}

	public function tambah()
	{
		$face = "";
		if ($_FILES['image']['name'] != '') {
			$cfg = [
				'name' 	=> 'image',
				'path' 	=> 'face_img',
				'url'	=> base_url('dashboard/data_guru'),
			];

			$face = $this->DB->upl($cfg);
		}

		$id_guru = "GR" . random_string('numeric', 6);

		$data = [
			"id_guru" 			=> $id_guru,
			"nama" 				=> $this->input->post("nama"),
			"nip"				=> $this->input->post("nip"),
			"face_recognize"	=> $face,
		];

		$data_login = [
			"username" 	=> $this->input->post("nip"),
			"password" 	=> $this->input->post("password"),
			"id_guru"	=> $id_guru,
			"lvl"		=> "pegawai",
		];

		$this->DB->add('t_guru', $data);
		$this->DB->add('t_login', $data_login);
		$this->session->set_flashdata('msg', '
			<div class="alert alert-success" >
				 Data berhasil di tambahkan.!
			</div>
		');
		redirect(base_url('dashboard/data_guru'));
	}

	public function hapus($id_guru)
	{
		$old_mig = $this->DB->getWhere('t_guru', ['id_guru' => $id_guru])->face_recognize;

		$this->DB->delete('t_absen', ['id_guru' => $id_guru]);
		$this->DB->delete('t_login', ['id_guru' => $id_guru]);
		$this->DB->delete('t_guru', ['id_guru' => $id_guru]);
		unlink("./assets/face_img/" . $old_mig);
		$this->session->set_flashdata('msg', '
			<div class="alert alert-success" >
				 Data berhasil di hapus.!
			</div>
		');
		redirect(base_url('dashboard/data_guru'));
	}

	function edit()
	{
		$id = $this->input->post('id_guru');
		$old_mig = $this->input->post('old_img');

		$face = $old_mig;

		if ($_FILES['image']['name'] != '') {
			$cfg = [
				'name' 	=> 'image',
				'path' 	=> 'face_img',
				'url'	=> base_url('dashboard/data_guru'),
			];

			$face = $this->DB->upl($cfg);
			unlink("./assets/face_img/" . $old_mig);
		}


		$data = [
			"nama" 				=> $this->input->post("nama"),
			"nip"				=> $this->input->post("nip"),
			"face_recognize"	=> $face,
		];
		$this->DB->edit('t_guru', $data, ['id_guru' => $id]);
		$this->session->set_flashdata('msg', '
			<div class="alert alert-success" >
				 Data berhasil diubah.!
			</div>
		');
		redirect(base_url('dashboard/data_guru'));
	}
}
