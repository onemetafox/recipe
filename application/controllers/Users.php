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
		$data["restaurant"] = $this->restaurant->getOneByParam(array("id" => $user["restaurant_id"]));
		$this->render("admin/profile",$data);
	}

	public function update(){
		$data = $this->input->post();
	}
}
