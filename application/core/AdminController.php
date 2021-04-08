<?php
	defined('BASEPATH') or die('No direct access script allowed!');

	class AdminController extends BaseController
	{
        var $layout = "admin";
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