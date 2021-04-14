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
			$id = $data["id"];
		}else{
			$id = $this->allergen->setData($data);
		}
		$config['upload_path']          = './uploads/allergen';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['file_name']			= $recipe_id;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('profile_avatar'))
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else
		{
			$file =$this->upload->data();
			$this->alergen->updateData(array("img"=>$file["file_name"], "id"=>$id));
		}
		$this->json(array("success" => true, "msg"=>"Success!"));

	}
	public function delete(){
		$id = $this->input->post("id");
		$this->allergen->unsetDataById($id);
		$this->json(array("success" => true, "msg"=>"Success"));
	}

}
