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
			array_push($list, $recipe);
		}
		$data["data"] = $list;
		// print_r($list);
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
			$data["ingredients"] = $this->ingredient->getDataByParam(array("recipe_id" => $id));
		}
		$this->render("customer/recipe-edit", $data);
	}
	public function save(){
		$user = $this->user_data();
		$recipe = $this->recipe->getDataByParam(array("user_id" => $user["id"]));
		if($user["pay_type"] == 0 && count($recipe) == 10){
			$this->json(array("success"=>false, "msg"=> "You can't add more recipe"));
			return;
		}
		$data = $this->input->post();
		$ingredients = json_decode($data["ingredients"]);
		if($data["categories"]){
			$param["category"] = $data["categories"];
			$categories = explode (",", $this->input->post("categories"));
			foreach($categories as $category){
				$temp = $this->category->getDataByParam(array("name"=>$category, "type"=>1));
				if(!$temp){
					$this->category->setData(array("type"=>1, "name"=>$category, "user_id"=>$user["id"]));
				}
			}
		}
		$param["restaurant_id"] = $user["restaurant_id"];
		$param["user_id"] = $user["id"];
		$param["name"] = $data["recipeName"];
		$param["content"] = $data["content"];
		if($data["id"]){
			$this->recipe->updateData($param);
			$recipe_id = $data["id"];
		}else{
			$param["created_at"] = date("Y-m-d h:s:i");
			$recipe_id = $this->recipe->setData($param);
		}
		$this->ingredient->deleteByParam(array("recipe_id" => $recipe_id));
		foreach($ingredients as $key => $item){
			$item = (array)$item;
			$ingredient["name"] = $item[0];
			$ingredient["allergen"] = $item[1];
			$ingredient["type"] = "raw";
			$ingredient["recipe_id"] = $recipe_id;
			$this->ingredient->setData($ingredient);
		}
		$config['upload_path']          = './uploads/recipe';
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
				$this->recipe->updateData(array("img"=>$file["file_name"], "id"=>$recipe_id));
				$this->json(array("success"=>true, "msg"=>"Success"));
		}
		
	}
	public function delete($id){
		$this->recipe->unsetDataById($id);
		$this->json(array("success"=>true, "msg"=>"Deleted!"));
	}

	public function api(){
		$filter = $this->input->post();
		$user = $this->user_data();
		$data["meta"] = $filter;
		$data["data"] = $this->recipe->getDataByParam(array("user_id"=>$user["id"]));
		$this->json($data);
	}
}
