<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'core/CustomerController.php');

class Recipe extends CustomerController {
	
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
	public function index()
	{
		$data["page_title"] = "Recipes";
		$user = $this->user_data();
		$filter["user_id"] = $user["id"];
		// $data["total_count"] = $this
		$this->render("customer/recipe", $data);
	}

	public function view($id = null){
		$data["page_title"] = "Edit Recipe";
		$user = $this->user_data();
		$data["categories"] = $this->category->getDataByParam(array("type"=>"1","user_id"=>$user["id"]));
		if($id){
			$data["recipe"] = $this->recipe->getDataById($id);
			$data["ingredients"] = $this->ingredients->getDataByParam(array("recipe_id" => $id));
		}
		$this->render("customer/recipe-edit", $data);
	}
	public function save(){
		$data = $this->input->post();
		$user = $this->user_data();
		$recipe = $this->recipe->getDataByParam(array("user_id" => $user["id"]));
		if($user["type"] == 0 && count($recipe) == 10){
			$this->json(array("success"=>false, "msg"=> "You can't add more recipe"));
			return;
		}
	}
}
