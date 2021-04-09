<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'core/CustomerController.php');

class Ingredient extends CustomerController {
	
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
	public function api(){
		$filter = $this->input->post();
		$data["meta"] = $filter;
		$data["data"] = $this->ingredient->getAll();
		$this->json($data);
	}
}