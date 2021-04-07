<?php
	defined('BASEPATH') or die('No direct access script allowed!');

	class BaseController extends CI_Controller
	{
        var $layout = "";
		var $page_title = "";
		var $data = [];
		public function __construct() {
			parent::__construct();
			$user = $this->session->userdata("user");
			if($user->role != 1){
				redirect("/");
			}
			$this->load->helper(array('url', 'form'));
			$this->load->library(array('form_validation', 'session'));
		}
	}