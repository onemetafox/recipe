<?php
	defined('BASEPATH') or die('No direct access script allowed!');

    require_once(APPPATH.'core/BaseModel.php');

	class Restaurant_model extends BaseModel
	{
		var $table = 'restaurant';

		public function all($filter = null){
			$this->db->join("user","user.id = restaurant.user_id", "LEFT");
			$this->db->select("restaurant.*, user.name user_name");
			if(isset($filter["rest_id"])){
				$this->db->where("restaurant.id", $filter["rest_id"]);
				unset($filter["rest_id"]);
			}
			return parent::getDataByParam($filter);
		}
	}