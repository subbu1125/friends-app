<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mains extends CI_Controller {

	public function __construct(){
			parent::__construct();
			$this->output->enable_profiler(TRUE);
			$this->load->model('main');
			$this->load->model('sql');
	}

	public function index()
	{
		$this->load->view('main');
	}
	public function register_user()
	{	
		$user = $this->main->register_user($this->input->post());
		$users = $this->sql->get_user_by_id($user);
		$data = array("users" => $users);
		if(is_numeric($user))
		{
		$this->session->set_userdata('user_id', $user);
		$this->session->set_userdata('user_info', $users);
		redirect("/mains/dashboard/" . $users['id']);
		}else{
			$this->session->set_flashdata('register_errors', $user);
			redirect("/");
		}
	}
	public function login_user()
	{
		$result = $this->main->login_user($this->input->post());
		$this->session->set_userdata('user_id', $result);
		if(is_numeric($result)){
			redirect('/mains/dashboard');
		} else{
			$this->session->set_flashdata('login_errors');
			redirect('/');
		}
	}
	public function dashboard()
	{
		$users = $this->sql->get_user_by_id($this->session->userdata('user_id'));
		$nonfriends_id= $this->sql->get_not_id();
		$nonfriends= $this->sql->get_nonfriends($this->session->userdata('user_id'));
		$friends = $this->sql->get_alias();
		$friends_id = $this->sql->get_id();
		$data = array(
			"users" => $users,
			'friends' => $friends,
			'id' => $friends_id,
			'nonfriends_id' => $nonfriends_id,
			'nonfriends' => $nonfriends
			);
		$this->load->view('dashboard', $data);
	}
		public function logout()
	{
		$this->session->sess_destroy();
		redirect("/");
	}
		public function profile($id)
		{
			$info = $this->sql->get_info_from_one($id);

			$data = array(
				'info' => $info
				);
			$this->load->view('profile', $data);
		}
		public function delete($id)
		{
			$this->sql->delete($id);
			redirect("mains/dashboard");
		}
	public function add_friend($id)
		{
			$this->sql->add_friend($id);
			$this->sql->add_friend2($id);
			redirect("mains/dashboard");
		}

}
