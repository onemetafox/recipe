<?php
	defined('BASEPATH') or die('No direct access script allowed!');

    require_once(APPPATH.'core/BaseModel.php');

	class Recipe_model extends BaseModel
	{
		var $table = 'Recipe';

		public function where($filter){
			parent::where($filter);
		}
		public function all($filter){
			
		}

		public function count($filter){

		}
	}