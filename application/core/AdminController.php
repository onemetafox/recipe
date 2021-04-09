<?php
	defined('BASEPATH') or die('No direct access script allowed!');

	require_once(APPPATH.'core/BaseController.php');

	class AdminController extends BaseController
	{
        var $layout = "admin";
		public function __construct() {
			parent::__construct();
			$user = $this->user_data();
			if(!$user || $user["role"] != 1){
				redirect("welcome/index");
			}
			$menus = $this->config->item("menus");
			$this->data["menus"] = $menus['admin'];
			$this->data["user"] = $user;
		}
	}