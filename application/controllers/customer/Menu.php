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
		$filter["user_id"] = $user["id"];
		// $data["total_count"] = $this
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

	public function api(){
		$filter = $this->input->post();
		$data["meta"] = $filter;
		$data["data"] = $this->ingredient->getAll();
		$this->json($data);
	}
}
