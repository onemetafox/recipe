<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'core/BaseController.php');

class Users extends BaseController {
	
	var $layout = "admin";

	public function __contruct(){
		
		parent::__construct();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {
	// 	$data["page_title"] = "Users";
	// 	$this->render("users");
	// }

	public function profile(){
		$data["page_title"] = "Profile Page";
		$session = $this->user_data();
		$user = $this->user->getOneByParam(array("id"=>$session["id"]));
		$menus = $this->config->item("menus");
		if($user["role"] == 1){
			$data["menus"] = $menus["admin"];
		}else{
			$data["menus"] = $menus["customer"];
		}
		$data["user"] = $user;
		$data["restaurants"] = $this->restaurant->getOneByParam(array("user_id" => $user["id"]));
		$this->render("admin/profile",$data);
	}

	public function update(){
		$data = $this->input->post();
		$user = $this->user_data();
		if($data["old_pwd"] || $data["new_pwd"] || $data["cfm_pwd"]){
			if($user["passwrd"] == md5($data["old_pwd"])){
				if($data["new_pwd"] != $data["cfm_pwd"]){
					$this->json(array("success"=>false, "msg"=>"New password is not matched"));
				}else{
					$data["password"] = md5($data["new_pwd"]);
					unset($data["new_pwd"]);
					unset($data["cfm_pwd"]);
					unset($data["old_pwd"]);
				}
			}else{
				$this->json(array("success" => false, "msg" => "Old password is not correct"));
			}
		}else{
			unset($data["new_pwd"]);
			unset($data["cfm_pwd"]);
			unset($data["old_pwd"]);
			// $temp = $this->user->getDataByParam(array("email" => strtolower($data["email"])));
			// if($temp){
			// 	$this->json(array("success" => false, "msg"=> "That account already exist"));
			// }else{
				$this->user->updateData($data);
				$this->json(array("success"=>true, "msg"=> "Success"));
			// }
		}
	}
}
