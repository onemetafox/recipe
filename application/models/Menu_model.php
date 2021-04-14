<?php
	defined('BASEPATH') or die('No direct access script allowed!');

    require_once(APPPATH.'core/BaseModel.php');

	class Menu_model extends BaseModel
	{
		var $table = 'menu';

		public function where($filter){
			if(isset($filter["category"])){
				$this->db->where("category LIKE '%".$filter["category"]."%'");
				unset($filter["category"]);
			}
			if(isset($filter["search"])){
				$this->db->group_start();
				$this->db->like("name", "'%".$filter['search']."%'");
				$this->db->or_like("category", "'%".$filter['search']."%'");
				$this->db->or_like("content", "'%".$filter['search']."%'");
				$this->db->group_end();
				unset($filter["search"]);
			}
			return parent::where($filter);
		}
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