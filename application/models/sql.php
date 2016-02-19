<?php
class sql extends CI_Model {
	public function get_user_by_id($id)
  {
    $query = "SELECT * FROM users WHERE id = ?";
    $values = array($id);
    return $this->db->query($query,$values)->row_array();
  }	
  public function get_not_id()
  {
    $query = "SELECT users.id FROM users LEFT JOIN friends on friends.friend_id = users.id WHERE users.id != ?";
    $values = array(
      $this->session->userdata('user_id')
      );
   return $this->db->query($query,$values)->result_array();
  }
  public function get_nonfriends($id)
  {
   $query = "SELECT alias, users.id FROM users WHERE users.id != $id";
    // $values = array($this->session->userdata('user_id'),
    //   $this->session->userdata('user_id')
    //   );
   return $this->db->query($query)->result_array();
   // $query = "SELECT name FROM users LEFT JOIN friends on friends.friend_id = users.id WHERE friends.user_id != ?";
   //  $values = $this->session->userdata('user_id');
   // return $this->db->query($query,$values)->result_array();
  }
  public function get_alias()
  {
    $query = "SELECT alias FROM users LEFT JOIN friends on friends.friend_id = users.id WHERE friends.user_id = ?";
    $values = $this->session->userdata('user_id');
   return $this->db->query($query,$values)->result_array();
  }  
  public function get_info_from_one($id)
  {
    $query = "SELECT * FROM users WHERE id = ?";
    $values = $id;
   return $this->db->query($query,$values)->row_array();
  }
  public function get_id()
  {
    $query = "SELECT friends.friend_id FROM users LEFT JOIN friends on friends.friend_id = users.id WHERE friends.user_id = ?";
    $values = $this->session->userdata('user_id');
   return $this->db->query($query,$values)->result_array();
  }
  public function delete($id){
    $query = "DELETE FROM friends WHERE friend_id = ? AND friends.user_id = ?";
    $values = array($id,
      $this->session->userdata('user_id')
      );
    return $this->db->query($query,$values);
  }
  public function add_friend($id){
    $query = "INSERT INTO friends (friend_id, user_id)
    Values (?,?)";
    $values = array($id, $this->session->userdata('user_id'));
    return $this->db->query($query,$values);
  }
  public function add_friend2($id){
    $query = "INSERT INTO friends (user_id, friend_id)
    Values (?,?)";
    $values = array($id, $this->session->userdata('user_id'));
    return $this->db->query($query,$values);
  }
}

?>