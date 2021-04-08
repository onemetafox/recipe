<?php
	defined('BASEPATH') or die('No direct access script allowed!');

	require_once(APPPATH.'core/BaseController.php');

	class AdminController extends BaseController
	{
        var $layout = "admin";
		public function __construct() {
			// $user = $this->session->userdata("user");
			// if($user->role != 1){
			// 	redirect("/");
			// }
			parent::__construct();
		}
	}