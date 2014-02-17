<?php
	class delete_model extends CI_Model
	{
		public function load()
		{
			$data = $this->db->get('material');
			return $data;
		}

		public function delete_material($id)
		{
			$this->db->delete('material_author', array('accession_number' => $id));
			$this->db->delete('material', array('accession_number' => $id));
		}
	}
?>