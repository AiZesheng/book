<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function get_by_username_password($username, $password){
		$sql = "select * from t_user where username='$username' and password='$password'";
		$rs = $this->db->query($sql);
		return $rs->row();
	}
	public function save_user($arr){
		$rs = $this->db->insert("t_user", $arr);
		return $rs;
	}
	public function get_all(){
		$sql = "select * from t_book";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	public function get_by_bookid($book_id){
		$sql = "select * from t_book where book_id='$book_id'";
		$rs = $this->db->query($sql);
		return $rs->row();
	}
	public function add_to_shoppingcar($arr){
		$rs = $this->db->insert("t_shoppingcar", $arr);
		return $rs;
	}
	public function get_shoppingcar($user_id){
		$sql = "select * from t_shoppingcar,t_book where user_id='$user_id' and t_shoppingcar.book_id=t_book.book_id";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	public function get_shoppingcar_by_bookid_userid($user_id, $book_id){
		$sql = "select * from t_shoppingcar where user_id='$user_id' and book_id='$book_id'";
		$rs = $this->db->query($sql);
		return $rs->row();
	}
	public function get_by_bookid_userid($user_id, $book_id){
		$sql = "select * from t_shoppingcar,t_book where t_book.book_id=t_shoppingcar.book_id and user_id='$user_id' and t_shoppingcar.book_id='$book_id'";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	public function get_by_booktype($book_type){
		$sql = "select * from t_book where book_type='$book_type'";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	public function get_order_by_userid($user_id){
		$sql = "select * from t_order,t_book where t_order.user_id='$user_id' and t_book.book_id=t_order.book_id";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	public function add_to_order($arr){
		$rs = $this->db->insert("t_order",$arr);
		return $rs;
	}
	public function delete_in_shoppingcar($user_id, $book_id){
		$sql = "delete from t_shoppingcar where user_id='$user_id' and book_id='$book_id'";
		$rs = $this->db->query($sql);
		return $rs;
	}
	public function search($keywords){
		$sql = "select * from t_book where book_name like '%$keywords%' or book_type like '%$keywords%'";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	public function login_admin($username, $password){
		$sql = "select * from t_manager where manager_username='$username' and manager_password='$password'";
		$rs = $this->db->query($sql);
		return $rs->row();
	}
	public function get_all_users(){
		$sql = "select * from t_user";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	public function get_all_order(){
		$sql = "select * from t_order,t_user,t_book where t_order.user_id=t_user.user_id and t_order.book_id=t_book.book_id";
		$rs = $this->db->query($sql);
		return $rs->result();
	}
	public function add_book($arr){
		$rs = $this->db->insert('t_book', $arr);
		return $rs;
	}
	public function delete_book($book_id){
		$sql = "delete from t_book where book_id='$book_id'";
		$rs = $this->db->query($sql);
		return $rs;
	}
}
