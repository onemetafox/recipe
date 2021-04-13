<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'core/CustomerController.php');

class Restaurant extends CustomerController {
	
	var $layout = "admin";

	public function index()
	{
		$data["page_title"] = "Restaurant";
		$this->render("customer/restaurant",$data);
	}

	public function api(){
		$filter = $this->input->post();
		$this->json($this->restaurant->all($filter["query"]));
	}

	public function save(){
		$data = $this->input->post();
		$user = $this->user_data();
		$data["user_id"] = $user["id"];
		$data["created_date"] = date("Y-m-d h:s:i");
		if($data["id"]){
			$this->restaurant->updateData($data);
			$this->json(array("success" => true, "msg"=>"Success!"));
		}else{
			$this->restaurant->setData($data);
			$this->json(array("success" => true, "msg"=>"Success!"));
		}
		
	}

	public function delete(){
		$id = $this->input->post("id");
		$this->restaurant->unsetDataById($id);
		$this->json(array("success" => true, "msg"=>"Success"));
	}
}
