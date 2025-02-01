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
		$join = [
			't_login LG'	=> 'LG.id_guru = t_guru.id_guru',
		];

		$data = [
			"data_guru" => $this->DB->join('t_guru', $join),
		];

		$this->load->view('template/dashboard/header');
		$this->load->view('template/dashboard/sidebar');
		$this->load->view('dashboard/data_guru', $data);
		$this->load->view('template/dashboard/footer');
	}


	public function edit_face($id_guru)
	{

		$data = [
			"id_guru" => $id_guru,
		];
		$this->load->view('template/dashboard/header');
		$this->load->view('template/dashboard/sidebar');
		$this->load->view('dashboard/data_guru_edit-face', $data);
		$this->load->view('template/dashboard/footer');
	}

	function update_face()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		$id_guru = $data['id'];
		$face = $this->DB->getWhere('t_guru', ['id_guru' => $id_guru])->face_recognize;

		if (file_exists("./assets/face_img/" . $face)) {
			unlink("./assets/face_img/" . $face);
		}

		$img_name = random_string('numeric', 8) . '.png';

		$this->DB->edit('t_guru', ['face_recognize' => $img_name], ['id_guru' => $id_guru]);

		$data_img = base64_decode(str_replace('data:image/png;base64,', '', $data['raw']));
		file_put_contents("./assets/face_img/" . $img_name, $data_img);
		echo json_encode(['sts_kode' => true]);
	}

	public function tambah()
	{
		$face = null;
		// if ($_FILES['image']['name'] != '') {
		// 	$cfg = [
		// 		'name' 	=> 'image',
		// 		'path' 	=> 'face_img',
		// 		'url'	=> base_url('dashboard/data_guru'),
		// 	];

		// 	$face = $this->DB->upl($cfg);
		// }

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
		// $old_mig = $this->input->post('old_img');

		// $face = $old_mig;

		// if ($_FILES['image']['name'] != '') {
		// 	$cfg = [
		// 		'name' 	=> 'image',
		// 		'path' 	=> 'face_img',
		// 		'url'	=> base_url('dashboard/data_guru'),
		// 	];

		// 	$face = $this->DB->upl($cfg);
		// 	unlink("./assets/face_img/" . $old_mig);
		// }


		$data = [
			"nama" 				=> $this->input->post("nama"),
			"nip"				=> $this->input->post("nip"),
		];

		$data_login = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		];

		$this->DB->edit('t_login', $data_login, ['id_guru' => $id]);
		$this->DB->edit('t_guru', $data, ['id_guru' => $id]);
		$this->session->set_flashdata('msg', '
			<div class="alert alert-success" >
				 Data berhasil diubah.!
			</div>
		');
		redirect(base_url('dashboard/data_guru'));
	}
}
