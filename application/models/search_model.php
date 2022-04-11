<?php

class Search_model extends CI_Model
{
	public function search($searchInput)
	{
		if (empty($searchInput)) {
			return array();
		}

		$searchInput = $this->input->post('search');
		$this->db->like("name", $searchInput);
		return $this->db->get("tb_games")->result_array();
	}
}
