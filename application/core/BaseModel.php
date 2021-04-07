<?php
	defined('BASEPATH') or die('No direct access script allowed!');

	class BaseModel extends CI_Model
	{
		public $table = "";

		public function __construct() {
			$this->load->database();
		}
		public function where($filter){
			foreach($filter as $key => $value){
				$this->db->where($key, $value);
			}
		}
		public function setData($data) {
			$query = $this->db->insert($this->table, $data);
		}

		public function getAll() {
			$query = $this->db->get($this->table)
							  ->result();
			return $query;
		}

		public function getDataById($id) {
			$query = $this->db->where('id', $id)
							  ->get($this->table)
							  ->row();
			return $query;
		}

		public function getDataByParam($param = null){
			if($param){
				$this->where($param);
			}
			$result = $this->db->get($this->table)->result();
			return $result;
		}

		public function getOneByParam($param){
			if($param){
				$this->where($param);
			}
			$result = $this->db->get($this->table)->result_array();
			if($result)
				return $result[0];
		}

		public function unsetDataById($id) {
			$query = $this->db->where('id', $id)
							  ->delete($this->table);

			return $query;
		}

		public function updateData($data) {
			$set = array(
				'name' 	 => $data['name'],
				'status' => $data['status']
			);
			$query = $this->db->set($set)
							  ->where('id', $data['id'])
							  ->update($this->table);
		}
	}