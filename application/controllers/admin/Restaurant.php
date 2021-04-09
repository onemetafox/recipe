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
}
