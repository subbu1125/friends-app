<?php
class main extends CI_Model {
	public function register_user($post)
	{

		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", 
			"trim|required|alpha");
		$this->form_validation->set_rules("alias", "Alias", 
			"trim|required|is_unique[users.alias]");
		$this->form_validation->set_rules("email", "Email", 
			"required|valid_email|is_unique[users.email]");
		$this->form_validation->set_rules("password", "Password", 
			"required|min_length[8]");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", 
			"required|matches[password]");
		if($this->form_validation->run() !== FALSE)
		{
			$name = $post['name'];
			$alias = $post['alias'];
			$email = $post['email'];
			$password =$post['password'];
			$birth_day = $post['birth_day'] . "/". $post['birth_month'] ."/". $post['birth_year'];
			$query = "INSERT INTO users (name, alias, birth_day, email, password)
			VALUES (?,?,?,?,?)";
			$this->db->query($query, array($name, $alias, $birth_day, $email, $password));
			return $this->db->insert_id();
		}else{
			$errors = validation_errors();
			return $errors;
		}
	}
	public function login_user($post)
	{
		$email = $post['email'];
		$query = "SELECT * FROM users WHERE email = ?";
		$user = $this->db->query($query,array($email))->row_array();
		$this->session->set_userdata('user_info', $user);
		if($user){
			if($user['password'] == $post['password'])
			 {
			 	return $user['id'];
			 }
			}
		return "Invalid Email and Password Confirmation";
	}
}
?>