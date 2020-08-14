<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('google');
	}


	public function oauth2callback()
	{
		$this->load->library('google');
		$google_data = $this->google->validate();

		$session_data['first_name'] = $google_data['name'];
		$session_data['email'] = $google_data['email'];
		$session_data['role_id'] = '2';
		$session_data['status'] = "1";

		$userID = $this->user_model->cek_user_google($session_data);


		$this->session->set_userdata('user_id', $userID);
		$this->session->set_userdata('role_id', $userID->role_id);
		$this->session->set_userdata('role', get_user_role('user_role', $userID->id));
		$this->session->set_userdata('name', $userID->first_name . ' ' . $userID->last_name);
		$this->session->set_userdata('is_instructor', $userID->is_instructor);
		$this->session->set_flashdata('flash_message', get_phrase('welcome') . ' ' . $userID->first_name . ' ' . $userID->last_name);

		if ($row->role_id == 1) {
			$this->session->set_userdata('admin_login', '1');
			redirect(site_url('admin/dashboard'), 'refresh');
		} else if ($row->role_id == 2) {
			$this->session->set_userdata('user_login', '1');
			redirect(site_url('home'), 'refresh');
		}
	}
	public function logout()
	{
		session_destroy();
		unset($_SESSION['access_token']);
		$session_data = array(
			'sess_logged_in' => 0
		);
		$this->session->set_userdata($session_data);
		redirect(base_url());
	}
}
