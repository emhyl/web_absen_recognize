<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin')) {
			redirect(base_url('login'));
		}
	}

	public function index()
	{
		$this->load->view('template/dashboard/header');
		$this->load->view('template/dashboard/sidebar');
		$this->load->view('dashboard/home');
		$this->load->view('template/dashboard/footer');
	}

	public function test()
	{
		$this->load->view('guru/index');
	}
	public function logOut()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
