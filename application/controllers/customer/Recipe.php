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

		$filter = $this->input->post();
		if(!isset($filter["pagination"])){
			$pagination["perpage"] = 12;
			$pagination["page"] = 1;
		}else{
			$pagination = $filter["pagination"];
		}

		$limit["start"] = ($pagination["page"]-1) * $pagination["perpage"];
		$limit["end"] = $pagination["perpage"];
		
		$user = $this->user_data();
		$filter["query"]["user_id"] = $user["id"];

		$recipes = $this->recipe->all($filter["query"],$limit);
		$list = array();
		foreach($recipes as $recipe){
			$recipe["ingredients"] = $this->ingredient->getDataByParam(array("recipe_id" => $recipe["id"]));
			array_merge($list, $recipe);
		}
		$data["data"] = $list;

		if(!isset($filter["query"])){
			$pagination["total"] = $this->recipe->count();
		}else{
			$pagination["total"] = $this->recipe->count($filter["query"]);
		}
		// $pagination["total"] = "100";
		$pagination["pages"] = ceil($pagination["total"]/$pagination["perpage"]);

		
		$data["pagination"] = $pagination;
		// print_r($data);
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
