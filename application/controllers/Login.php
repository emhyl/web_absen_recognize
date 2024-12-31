	<?php
   defined('BASEPATH') or exit('No direct script access allowed');

   class Login extends CI_Controller
   {
      public function __construct()
      {
         parent::__construct();
         // var_dump($this->session->userdata());die();
      }

      public function index()
      {

         $this->load->view('login');
      }

      public function validation()
      {


         $username   =   $this->input->post('username');
         $password   =   $this->input->post('password');

         $auth = $this->DB->getWhere('t_login', ['username' => $username, 'password' => $password, 'lvl' => 'admin']);

         if ($auth) {
            $this->session->set_userdata("admin", true);
            redirect(base_url('dashboard'));
         } else {
            $this->session->set_flashdata('msg', '
						<div class="alert alert-danger">
							Username atau password salah!
						</div>
					');
            redirect(base_url('login'));
         }
      }
   }
