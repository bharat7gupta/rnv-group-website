<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index() {
		$this->load->view('admin/index');
	}

	public function register() {
		$this->load->view('admin/register');
	}

	public function messages() {
		$this->load->view('admin/messages');
	}

	public function quotes() {
		$this->load->view('admin/quotes');
	}

	public function jobs() {
		$this->load->view('admin/jobs');
	}

	public function logout() {
		$this->session->sess_destroy();

		header('location:'.base_url());
	}
}

?>