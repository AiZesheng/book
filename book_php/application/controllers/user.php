<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	// 以下function为前端接口部分
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
	public function get_by_bookid_userid(){
		$callback = $this->input->get("callback");
		$book_id = $this->input->get("book_id");
		$user_id = $this->input->get("user_id");
		$this->load->model("user_model");
		$rs = $this->user_model->get_by_bookid_userid($user_id, $book_id);
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
	public function get_order(){
		$callback = $this->input->get("callback");
		$user_id = $this->input->get("user_id");
		$this->load->model("user_model");
		$rs = $this->user_model->get_order_by_userid($user_id);
		if($rs){
			$json = json_encode($rs);
			echo $callback . '(' . $json . ')';
		}else{
			echo $callback . '(0)';
		}
	}
	public function add_to_order(){
		$callback = $this->input->get("callback");
		$user_id = $this->input->get("user_id");
		$book_id = $this->input->get("book_id");
		$order_total_price = $this->input->get("order_total_price");
		$book_num = $this->input->get("book_num");
		$this->load->model("user_model");
		$arr = array(
			"user_id" => $user_id,
			"book_id" => $book_id,
			"order_total_price" => $order_total_price,
			"book_num" => $book_num
		);
		$rs = $this->user_model->add_to_order($arr);
		echo $callback . '(' . $rs . ')';
	}
	public function delete_in_shoppingcar(){
		$callback = $this->input->get("callback");
		$user_id = $this->input->get("user_id");
		$book_id = $this->input->get("book_id");
		$this->load->model("user_model");
		$rs = $this->user_model->delete_in_shoppingcar($user_id, $book_id);
		echo $callback . '(' . $rs . ')';
	}
	public function search(){
		$callback = $this->input->get("callback");
		$keywords = $this->input->get("keywords");
		$this->load->model("user_model");
		$rs = $this->user_model->search($keywords);
		if($rs){
			$json = json_encode($rs);
			echo $callback . '(' . $json . ')';
		}else{
			echo $callback . '(0)';
		}
	}
	public function go_login(){
		$this->load->view("login");
	}
	// 以下function为后台管理系统部分
	public function do_login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$this->load->model("user_model");
		$rs = $this->user_model->login_admin($username, $password);
		if($rs){
			redirect("user/books");
		}else{
			redirect("user/go_login");
		}
	}
	public function books(){
		$this->load->model("user_model");
		$rs = $this->user_model->get_all();
		$arr = array(
			"books" => $rs
		);
		$this->load->view("books", $arr);
	}
	public function users(){
		$this->load->model("user_model");
		$rs = $this->user_model->get_all_users();
		$arr = array(
			"users" => $rs
		);
		$this->load->view("users", $arr);
	}
	public function order(){
		$this->load->model("user_model");
		$rs = $this->user_model->get_all_order();
		$arr = array(
			"order" => $rs
		);
		$this->load->view("order", $arr);
	}
	public function add_book(){
		$config['upload_path'] = './img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $result = $this->upload->do_upload('book_img');
        //打印成功或错误的信息
        if($result)
        {
			$book_name = $this->input->post("book_name");           
			$book_price = $this->input->post("book_price");           
			$book_type = $this->input->post("book_type");   
			$data = $this->upload->data();        
			$name = $data['file_name'];
			$str = "http://localhost/book_php/img/$name";
			$arr = array(
				"book_name" => $book_name,
				"book_price" => $book_price,
				"book_type" => $book_type,
				"book_img" => $str
			);
			$this->load->model("user_model");
			$rs = $this->user_model->add_book($arr);
			if($rs){
				redirect("user/books");
			}
        }
        else
        {
            $error = array("error" => $this->upload->display_errors());
            var_dump($error);
        }

	}
	public function delete_book(){
		$book_id = $this->input->get("book_id");
		$this->load->model("user_model");
		$rs = $this->user_model->delete_book($book_id);
		if($rs){
			redirect("/user/books");
		}
	}
}
