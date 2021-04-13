<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'core/CustomerController.php');

class Menu extends CustomerController {
	
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
		$data["page_title"] = "Menu";
		$user = $this->user_data();
		$data["categories"] = $this->category->getDataByParam(array("user_id"=>$user["id"], "type"=>2));
		$this->render("customer/menu", $data);
	}

	public function view($id = null){
		$data["page_title"] = "Edit Menu";
		$user = $this->user_data();
		$data["categories"] = $this->category->getDataByParam(array("type"=>"2","user_id"=>$user["id"]));
		if($id){
			$data["menu"] = $this->menu->getDataById($id);
			$data["recipes"] = $this->recipe->getDataByParam(array("menu_id" => $id));
		}
		$this->render("customer/menu-edit", $data);
	}
	public function save(){
		$user = $this->user_data();
		$data = $this->input->post();
		$recipes = json_decode($data["recipes"]);
		$categories = explode (",", $this->input->post("categories"));
		foreach($categories as $category){
			$temp = $this->category->getDataByParam(array("name"=>$category, "type"=>2));
			if(!$temp){
				$this->category->setData(array("type"=>1, "name"=>$category, "user_id"=>$user["id"]));
			}
		}
		$param["user_id"] = $user["id"];
		$param["name"] = $data["name"];
		$param["category"] = $data["categories"];
		$param["content"] = $data["content"];
		if(isset($data["id"])){
			$this->menu->updateData($param);
			$menu_id = $data["id"];
		}else{
			$param["created_at"] = date("Y-m-d h:s:i");
			$menu_id = $this->menu->setData($param);
		}
		$this->recipe->updateDataByParam(array("menu_id" => ""), array("menu_id"=>$menu_id));
		foreach($recipes as $key => $item){
			$item = (array)$item;
			$recipe["id"] = $item[0];
			$recipe_id["menu_id"] = $menu_id;
			$this->recipe->updateData($recipe);
		}		
	}
	public function delete($id){
		$this->menu->unsetDataById($id);
		$this->recipe->updateDataByParam(array("menu_id" => ""), array("menu_id"=>$id));
		$this->json(array("success"=>true, "msg"=>"Deleted!"));
	}
	public function api(){
		$filter = $this->input->post();
		if(isset($filter["pagination"])){
			$pagination = $filter["pagination"];
			if(!$pagination["perpage"]){
				$pagination["perpage"] = 10;
			}
			if(!$pagination["page"]){
				$pagination["page"] = 1;
			}
			$pagination["total"] = $this->menu->count($filter["query"]);
			$pagination["pages"] = ceil($pagination["total"]/$pagination["perpage"]);

			$limit["start"] = ($pagination["page"]-1) * $pagination["perpage"];
			$limit["end"] = $pagination["perpage"];
			$data["pagination"] = $pagination;
			$data["data"] = $this->menu->all($filter["query"],$limit);
		}else{
			$data["data"] = $this->menu->all($filter["query"]);
		}
		$this->json($data);
	}
}
