<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'core/AdminController.php');

class Restaurant extends AdminController {
	
	var $layout = "admin";

	public function index()
	{
		$data["page_title"] = "Restaurant";
		$this->render("admin/restaurant",$data);
	}

	public function api(){
		$this->json($this->restaurant->all());
	}

	public function save(){
		$data = $this->input->post();
		$user = $this->user_data();
		$data["user_id"] = $user["id"];
		$data["created_date"] = date("Y-m-d h:s:i");
		if(isset($data["id"])){
			$this->restaurant->updateData($data);
			$this->json(array("success" => true, "msg"=>"Success!"));
		}else{
			$this->restaurant->setData($data);
			$this->json(array("success" => true, "msg"=>"Success!"));
		}
		
	}
}
