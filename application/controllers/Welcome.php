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
		// $data["page_title"] = "Sign In";
		$user = $this->user_data();
		if($user){
			if($user->role == "1")
				redirect(base_url() . "admin");
			else
				redirect(base_url() . "dashboard");
		}else{
			$this->load->view("signin");
		}
		
		// $this->render("signin", $data);
		
	}
	public function condition (){
		$data["page_title"] = "Term and Condition";
		$this->render("landing/condition", $data);
		// $this->load->view("landing/condition");
	}
	public function policy(){
		$data["page_title"] = "Policy";
		$this->render("landing/policy", $data);
	}
	public function signup(){
		$user = $this->user_data();
		if($user){
			if($user->role == "1")
				redirect(base_url() . "admin");
			else
				redirect(base_url() . "dashboard");
		}else{
			$this->load->view("signup");
		}
	}
	public function register(){
		$data = $this->input->post();
		if($data["password"] == $data["cfm_password"]){
			$this->load->model("User_model", "user");
			$user = $this->user->getDataByParam(array("email"=>$data["email"]));
			if($user){
				$this->json(array("success"=>false, "msg"=>"Your account already exist!"));
			}else{
				unset($data["cfm_password"]);
				$data["password"] = md5($data["password"]);
				$this->user->setData($data);
				$this->json(array("success"=>true, "msg"=>"Your account is created."));
			}
		}else{
			$this->json(array("success"=>false, "msg"=>"Password does not match!"));
		}
	}

	public function logout(){
		$this->session->unset_userdata('user');
		redirect("/");
	}
	public function login(){
		$data = $this->input->post();
		$this->load->model("User_model", "user");
		$user = $this->user->getOneByParam(array("email" => $data["email"]));
		if($user){
			if($user["password"] == md5($data["password"])){
				$this->session->set_userdata("user",$user);
				$this->json(array("success" => true, "msg" => "Success Login", "user" => $user));
			}else{
				$this->json(array("success" => false, "msg"=>"Password incorrect"));
			}
		}else{
			$this->json(array("success" => false, "msg" => "Your account is not exist"));
		}
	}
	public function forget_password(){
		$this->load->view("landing/forget_password");
	}
}
