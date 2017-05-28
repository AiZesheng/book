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
}
