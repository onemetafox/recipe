<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'core/BaseController.php');

class Welcome extends BaseController {
	
	var $layout = "default";

	public function __contruct(){
		$this->load_model("User_model", "model");
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
		$data["page_title"] = "Recipe";
		$this->load->view("index", $data);
	}
	
	public function signin(){
		$data["page_title"] = "Sign In";
		// $this->load->view("signin", $data);
		$this->render("signin", $data);
		
	}

	public function signup(){
		// $data["page_title"] = "Sign Up";
		$this->load->view("signup");
		// $this->render("signin", $data);
	}
}
