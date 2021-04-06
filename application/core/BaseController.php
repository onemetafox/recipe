<?php
	defined('BASEPATH') or die('No direct access script allowed!');

	class BaseController extends CI_Controller
	{
        var $layout = "";
        var $model = "";

		public function __construct() {
			parent::__construct();
			$this->load->helper(array('url', 'form'));
			$this->load->library(array('form_validation', 'session'));
		}

		public function render(){

        }
        
        public function json(){

        }
	}