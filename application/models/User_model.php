<?php
	defined('BASEPATH') or die('No direct access script allowed!');

    require_once(APPPATH.'core/BaseModel.php');

	class User_model extends BaseModel
	{
		var $table = 'user';

		public function all($filter = null){
			// if($filter)
			// 	$this->where($filter);
			$this->db->join("restaurant","restaurant_id = user.restaurant_id", "left");
			$this->db->select("user.*, restaurant.id rest_id, restaurant.name rest_name");
			return parent::getDataByParam($filter);
		}
	}