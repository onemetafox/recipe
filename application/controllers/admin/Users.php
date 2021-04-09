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
}
