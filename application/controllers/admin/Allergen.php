<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'core/AdminController.php');

class Allergen extends AdminController {
	
	var $layout = "admin";

	public function __contruct(){
		parent::__construct();
	}
	public function index()
	{
		$data["page_title"] = "Allergen";
		$this->render("admin/allergen",$data);
	}

	public function api(){
		$this->json($this->allergen->getAll());
	}

	public function save(){
		$data = $this->input->post();
		$user = $this->user_data();
		$data["user_id"] = $user["id"];
		$data["created_at"] = date("Y-m-d h:s:i");
		if($data["id"]){
			$this->allergen->updateData($data);
			$this->json(array("success" => true, "msg"=>"Success!"));
		}else{
			$this->allergen->setData($data);
			$this->json(array("success" => true, "msg"=>"Success!"));
		}
	}
	public function delete(){
		$id = $this->input->post("id");
		$this->allergen->unsetDataById($id);
		$this->json(array("success" => true, "msg"=>"Success"));
	}

}
