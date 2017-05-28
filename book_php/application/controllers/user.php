<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function regist()
	{
		$callback = $this->input->get("callback");
		$username = $this->input->get("username");
		$password = $this->input->get("password");
		$nickname = $this->input->get("nickname");
		$this->load->model("user_model");
		$arr = array(
			'username' => $username,
			'password' => $password,
			'nickname' => $nickname
		);
		$rs = $this->user_model->save_user($arr);
		if($rs){
			echo $callback . '(1)';
		}else{
			echo $callback . '(0)';
		}
	}
	public function login(){
		$callback = $this->input->get("callback");
		$username = $this->input->get("username");
		$password = $this->input->get("password");
		$this->load->model("user_model");
		$rs = $this->user_model->get_by_username_password($username, $password);
		if($rs){
			$json = json_encode($rs);
			echo $callback . '(' . $json . ')';
		}else{
			echo $callback . '(0)';
		}
	}
	public function get_all(){
		$callback = $this->input->get("callback");
		$this->load->model("user_model");
		$rs = $this->user_model->get_all();
		$json = json_encode($rs);
		echo $callback . '(' . $json . ')';
	}
	public function get_by_bookid(){
		$callback = $this->input->get("callback");
		$book_id = $this->input->get("book_id");
		$this->load->model("user_model");
		$rs = $this->user_model->get_by_bookid($book_id);
		if($rs){
			$json = json_encode($rs);
			echo $callback . '(' . $json . ')';
		}else{
			echo $callback . '(0)';
		}
	}
	public function add_to_shoppingcar(){
		$callback = $this->input->get("callback");
		$book_id = $this->input->get("book_id");
		$user_id = $this->input->get("user_id");
		$this->load->model("user_model");
		$arr = array(
			"user_id" => $user_id,
			"book_id" => $book_id
		);
		$rs = $this->user_model->add_to_shoppingcar($arr);
		echo $callback . '(' . $rs . ')';
	}
	public function get_shoppingcar(){
		$callback = $this->input->get("callback");
		$user_id = $this->input->get("user_id");
		$this->load->model("user_model");
		$rs = $this->user_model->get_shoppingcar($user_id);
		if($rs){
			$json = json_encode($rs);
			echo $callback . '(' . $json . ')';
		}else{
			echo $callback . '(0)';
		}
	}
	public function get_shoppingcar_by_bookid_userid(){
		$callback = $this->input->get("callback");
		$book_id = $this->input->get("book_id");
		$user_id = $this->input->get("user_id");
		$this->load->model("user_model");
		$rs = $this->user_model->get_shoppingcar_by_bookid_userid($user_id, $book_id);
		if($rs){
			$json = json_encode($rs);
			echo $callback . '(' . $json . ')';
		}else{
			echo $callback . '(0)';
		}
	}
	public function get_by_booktype(){
		$callback = $this->input->get("callback");
		$book_type = $this->input->get("book_type");
		$this->load->model("user_model");
		$rs = $this->user_model->get_by_booktype($book_type);
		if($rs){
			$json = json_encode($rs);
			echo $callback . '(' . $json . ')';
		}else{
			echo $callback . '(0)';
		}
	}
}
