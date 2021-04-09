<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'core/AdminController.php');

class Users extends AdminController {
	
	var $layout = "admin";

	public function __contruct(){
		parent::__construct();
	}
	public function index($type)
	{
		$data['restaurants'] = $this->restaurant->getAll();
		if($type == "admin"){
			$data["page_title"] = "Admin";
			$this->render("admin/admin", $data);
		}else{
			$data["page_title"] = "Users";
			$this->render("admin/user",$data);
		}
			
	}

	public function api(){
		$filter = $this->input->post();
		$data["data"] = $this->user->all($filter["query"]);
		$data["meta"] = $filter;
		$this->json($data);
	}

	public function save(){
		$data = $this->input->post();
		// $data["user_id"] = $user["id"];
		$data["register_date"] = date("Y-m-d h:s:i");
		$data["email"] = strtolower($data["email"]);
		if($data["id"]){
			$this->user->updateData($data);
			$this->json(array("success" => true, "msg"=>"Success!"));
		}else{
			$temp = $this->user->getOneByParam(array("email" => strtolower($data["email"])));
			if($temp){
				$this->json(array("success" => false, "msg"=>"Account exist!"));
			}else{
				$this->user->setData($data);
				$this->json(array("success" => true, "msg"=>"Success!"));
			}
		}
	}

	public function delete(){
		$id = $this->input->post("id");
		$this->user->unsetDataById($id);
		$this->json(array("success" => true, "msg"=>"Success"));
	}

	public function updatePwd(){
		$data = $this->input->post();
		$data["password"] = md5("123456789");
		$this->user->updateData($data);
		$this->json(array("success"=>true, "msg"=>"Password set 123456789"));
	}
}
