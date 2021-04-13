<?php
	defined('BASEPATH') or die('No direct access script allowed!');

    require_once(APPPATH.'core/BaseModel.php');

	class Allergen_model extends BaseModel
	{
		var $table = 'allergen';

		public function checkAllergen($keyword){
			
			$this->db->group_start();
			$this->db->where("'" . $keyword . "' LIKE CONCAT('%', name, '%')");
			$this->db->or_like("content", "'%".$keyword."%'");
			$this->db->group_end();
			$query = $this->db->get($this->table)->row_array();
			return $query;
		}
	}