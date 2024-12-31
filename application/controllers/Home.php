<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public $nim;

	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('mhs')) {
		// 	redirect(base_url('login'));
		// }


		// $this->nim = $this->session->userdata('mhs')->nim;


	}


	public function index()
	{


		$this->load->view('guru/index');
	}

	public function login()
	{
		if ($_REQUEST) {
			$nip 		= $this->input->post('nip');
			$password 	= $this->input->post('password');
			$cek = $this->DB->getWhere('t_login', ['username' => $nip, 'password' => $password]);
			if ($cek) {

				$this->session->set_flashdata('success', '<meta http-equiv="refresh" content="2 url=' . base_url('home/absen') . '">');
				$this->session->set_flashdata('msg', '
					<div class="alert alert-success" >
						 Berhasil Login
					</div>
				');
				$this->session->set_userdata('id_pegawai', $cek->id_guru);
				$this->session->set_flashdata('location', "true");
			} else {
				$this->session->set_flashdata('msg', '
				<div class="alert alert-danger" >
				NiP atau Password salah
				</div>
				');
				$this->session->set_flashdata('location', "true");
				redirect(base_url(uri_string()));
			}
		}

		$this->load->view('guru/login');
	}

	public function izin()
	{
		if ($_REQUEST) {
			$nip 		= $this->input->post('nip');
			$password 	= $this->input->post('password');
			$cek = $this->DB->getWhere('t_login', ['username' => $nip, 'password' => $password]);
			if ($cek) {
				if (!$this->DB->getWhere('t_absen', ['id_guru' => $cek->id_guru, 'tgl_absen' => $this->DB->tgl])) {

					$add = $this->DB->add('t_absen', ['id_guru' => $cek->id_guru, 'tgl_absen' => $this->DB->tgl, 'jam_absen' => date('H:i', $this->DB->jam), 'sts_absen' => 'i']);
					$this->session->set_flashdata('msg', '
					<div class="alert alert-success" >
					Berhasil Login
					</div>
					');
				} else {
					$this->session->set_flashdata('msg', '
					<div class="alert alert-success" >
					Anda sudah absen
					</div>
					');
				}

				$this->session->set_flashdata('success', '<meta http-equiv="refresh" content="2 url=' . base_url('home/absen') . '">');
				$this->session->set_userdata('id_pegawai', $cek->id_guru);
			} else {
				$this->session->set_flashdata('msg', '
				<div class="alert alert-danger" >
				NiP atau Password salah
				</div>
				');
				$this->session->set_flashdata('location', "true");
				redirect(base_url(uri_string()));
			}
		}

		$this->load->view('guru/izin');
	}


	public function sakit()
	{
		if ($_REQUEST) {
			$nip 		= $this->input->post('nip');
			$password 	= $this->input->post('password');
			$cek = $this->DB->getWhere('t_login', ['username' => $nip, 'password' => $password]);
			if ($cek) {
				if (!$this->DB->getWhere('t_absen', ['id_guru' => $cek->id_guru, 'tgl_absen' => $this->DB->tgl])) {

					$add = $this->DB->add('t_absen', ['id_guru' => $cek->id_guru, 'tgl_absen' => $this->DB->tgl, 'jam_absen' => date('H:i', $this->DB->jam), 'sts_absen' => 's']);
					$this->session->set_flashdata('msg', '
					<div class="alert alert-success" >
					Berhasil Login
					</div>
					');
				} else {
					$this->session->set_flashdata('msg', '
					<div class="alert alert-success" >
					Anda sudah absen
					</div>
					');
				}

				$this->session->set_flashdata('success', '<meta http-equiv="refresh" content="2 url=' . base_url('home/absen') . '">');
				$this->session->set_userdata('id_pegawai', $cek->id_guru);
			} else {
				$this->session->set_flashdata('msg', '
				<div class="alert alert-danger" >
				NiP atau Password salah
				</div>
				');
				$this->session->set_flashdata('location', "true");
				redirect(base_url(uri_string()));
			}
		}

		$this->load->view('guru/sakit');
	}


	public function registrasi()
	{
		if ($_REQUEST) {
			$nip 		= $this->input->post('nip');
			$nama 		= $this->input->post('nama');
			$password 	= $this->input->post('password');

			$cek = $this->DB->getWhere('t_guru', ['nip' => $nip]);
			if (!$cek) {

				$cfg = [
					'name' => 'face',
					'path' => 'face_img',
					'url' => uri_string(),
				];
				$face = $this->DB->upl($cfg);
				$id_guru = 'GR' . random_string('numeric', 6);

				$data_guru = [
					"id_guru"			=> $id_guru,
					"nip" 				=> $nip,
					"nama" 				=> $nama,
					"face_recognize"	=> $face
				];

				$data_login = [
					"username" 	=> $nip,
					"password" 	=> $password,
					"id_guru"	=> $id_guru,
					"lvl"		=> "pegawai",
				];

				$this->DB->add('t_login', $data_login);
				$this->DB->add('t_guru', $data_guru);
				$this->session->set_flashdata('msg', '
				<div class="alert alert-success" >
					Berhasil registrasi
				</div>
				');

				$this->session->set_flashdata('success', '<meta http-equiv="refresh" content="2 url=' . base_url('home') . '">');
			} else {
				$this->session->set_flashdata('msg', '
				<div class="alert alert-danger" >
					NiP telah terdaftar
				</div>
				');
				$this->session->set_flashdata('location', "true");
				redirect(base_url(uri_string()));
			}
		}

		$this->load->view('guru/registrasi');
	}

	function verification_location($lat, $long)
	{
		$lat = number_format(floatval($lat), 5);
		$long = number_format(floatval($long), 5);

		$area = $this->DB->getWhere('t_area', ['status_area' => 1]);

		$area_lat_min = $area->lat_min;
		$area_lat_max = $area->lat_max;
		$area_long_min = $area->long_min;
		$area_long_max = $area->long_max;

		if (($lat <= $area_lat_min && $lat >= $area_lat_max) && ($long >= $area_long_min && $long <= $area_long_max)) {
			// if (true) {
			$this->session->set_flashdata("location", "true");
		} else {
			$this->session->set_flashdata("location", "true");
			// $this->session->set_flashdata("location", "false");
		}
		redirect(base_url('home/login'));
	}


	function verification_image($confidence)
	{
		$id_guru =	$this->session->userdata('id_pegawai');
		if (!$id_guru) {
			redirect(base_url('home'));
		}

		if ($confidence >= 90) {
			$data = [
				"id_guru" 	=> $id_guru,
				"tgl_absen" => $this->DB->tgl,
				"jam_absen" => date('H:i', $this->DB->jam),
				"sts_absen"	=> 'h'
			];
			$this->DB->add('t_absen', $data);
			$this->session->set_flashdata('msg', '
				<div class="alert alert-success" >
					 Wajah sesuai
				</div>
			');
			redirect(base_url('home/absen'));
		} else {
			$this->session->set_flashdata('msg', '
				<div class="alert alert-danger" >
					 Wajah tidak sesuai
				</div>
			');
			redirect(base_url('home/absen'));
		}
	}


	public function absen()
	{
		$page = 'guru/absen';
		$id_guru =	$this->session->userdata('id_pegawai');
		if (!$id_guru) {
			redirect(base_url('home'));
		}

		$data_guru = $this->DB->getWhere('t_guru', ['id_guru' => $id_guru]);
		$data_absen = $this->DB->getWhere('t_absen', ['id_guru' => $id_guru, 'tgl_absen' => $this->DB->tgl]);
		if ($data_absen) {

			$data = [
				"data_guru" => $this->DB->getWhere('t_guru', ['id_guru' => $id_guru]),
				"data_absen" => $data_absen,
			];

			$page = 'guru/complete';
		} else {

			$data_face = "./assets/face_img/" . $data_guru->face_recognize;

			$x = file_get_contents(base_url($data_face));
			$y = base64_encode($x);
			$img2 = 'data:image/png;base64,' . $y;

			$data = [
				"data_guru" => $this->DB->getWhere('t_guru', ['id_guru' => $id_guru]),
				"binary_img" => $img2,
			];
		}


		$this->load->view($page, $data);
		// $this->load->view('guru/complete', $data);
	}

	public function verification()
	{
		$data = json_decode(file_get_contents('php://input'), true);
		if (isset($data['image'])) {
			$imageData = $data['image'];
			$img2 = $data['imageCompare'];

			// Remove the data URL scheme (data:image/png;base64,)
			$imageData = str_replace('data:image/png;base64,', '', $imageData);
			$imageData = str_replace(' ', '+', $imageData);

			$ch = curl_init('https://sapdesp.my.id/codestar/compare.php');
			// $ch = curl_init('https://sapdesp.my.id/codestar/iot/compare_img_url.php');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, ['image1' => $imageData, 'image2' => $img2]);
			$response = curl_exec($ch);
			curl_close($ch);

			echo $response;
		} else {
			echo 'No image data received.';
		}
	}

	public function logOut()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
