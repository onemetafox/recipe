<?php
	defined('BASEPATH') or die('No direct access script allowed!');

    require_once(APPPATH.'core/BaseModel.php');

	class User_model extends BaseModel
	{
		var $table = 'user';

		public function where($filter) {
			if(isset($filter["id"])) {
				$this->db->where("user.id", $filter["id"]);
				unset($filter["id"]);
			}
			if(isset($filter["search"])){
				$this->db->where("user.name LIKE '%".$filter['search']."%'");
				unset($filter["search"]);
			}
			return parent::where($filter);
		}
		public function all($filter = null, $limit = null){
			// if($filter)
			// 	$this->where($filter);
			$this->db->join("restaurant","restaurant.id = user.restaurant_id", "left");
			$this->db->select("user.*, restaurant.id rest_id, restaurant.name rest_name");
			if(isset($limit)){
				$this->db->limit($limit["end"], $limit["start"]);
			}
			
			return parent::getDataByParam($filter);
		}

		public function count($filter = null){
			$this->where($filter);
			return parent::counts($filter);
		}
	}