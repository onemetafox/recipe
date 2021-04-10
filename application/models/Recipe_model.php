<?php
	defined('BASEPATH') or die('No direct access script allowed!');

    require_once(APPPATH.'core/BaseModel.php');

	class Recipe_model extends BaseModel
	{
		var $table = 'Recipe';

		public function where($filter) {
			if(isset($filter["id"])) {
				$this->db->where("recipe.id", $filter["id"]);
				unset($filter["id"]);
			}
			if(isset($filter["search"])){
				$this->db->group_start();
				$this->db->like("recipe.name", "'%".$filter['search']."%'");
				$this->db->or_like("ingredient.name", "'%".$filter['search']."%'");
				$this->db->or_like("recipe.category", "'%".$filter['search']."%'");
				$this->db->or_like("recipe.content", "'%".$filter['search']."%'");
				$this->db->group_end();
				unset($filter["search"]);
			}
			return parent::where($filter);
		}
		public function all($filter = null, $limit = null){
			// if($filter)
			// 	$this->where($filter);
			$this->db->join("ingredient","ingredient.recipe_id = recipe.id", "left");
			$this->db->select("recipe.*, ingredient.id ingredient_id, ingredient.name ingret_name");
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