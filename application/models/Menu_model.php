<?php
	defined('BASEPATH') or die('No direct access script allowed!');

    require_once(APPPATH.'core/BaseModel.php');

	class Menu_model extends BaseModel
	{
		var $table = 'menu';

		public function all($filter = null, $limit = null){
			if($filter)
				$this->where($filter);
			if(isset($limit)){
				$this->db->limit($limit["end"], $limit["start"]);
			}
			
			return parent::getDataByParam($filter);
		}
		public function count($filter = null){
			if($filter)
				$this->where($filter);
			return parent::counts($filter);
		}
	}