<?php

class Games_model extends CI_Model {

    public function index() 
    {
        return $this->db->get("tb_games")->result_array();
    }

    // Essa função vai gravar os dados no banco de dados
    public function store($game) {
        $this->db->insert("tb_games", $game);
    }
}