<?php
	defined('BASEPATH') or die('No direct access script allowed!');

	class CustomerController extends BaseController
	{
        var $layout = "admin";
		
		public function __construct() {
			$user = $this->session->userdata("user");
			if($user || $user->role != 2){
				redirect(base_url() . "welcome/index");
			}
			parent::__construct();
		}
	}