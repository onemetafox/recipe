<?php
	defined('BASEPATH') or die('No direct access script allowed!');

	class BaseController extends CI_Controller
	{
        var $layout = "";
		var $page_title = "";
		var $data = [];
		public function __construct() {
			parent::__construct();
			$this->load->helper(array('url', 'form'));
			$this->load->library(array('form_validation', 'session'));
		}

		public function render($content, $data = null){
			$this->template['header']  = $this->load->view('layout/'.$this->layout.'/header', $data, TRUE);
            $this->template['content'] = $this->load->view($content, $data, TRUE);
            $this->template['footer']  = $this->load->view('layout/'.$this->layout.'/footer', $data, TRUE);

            return $this->load->view('layout/template', $this->template);
			
        }
        
        public function json($data){
			echo json_encode($data);
        }
	}