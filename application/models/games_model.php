<?php

class Games_model extends CI_Model {
    
    /**
     * A função index retorna o resultado da consulta ou naoa matriz tabela tb_games.
     *
     * @return void
     */
    public function index() 
    {
        return $this->db->get("tb_games")->result_array();
    }
 
    /**
     * A função store vai gravar os dados da tabela de jogos no banco de dados
     *
     * @param  mixed $game
     * @return void
     */
    public function store($game) {
        $this->db->insert("tb_games", $game);
    }

    //     
    /**
     * O método SHOW vai retornas a variável id da tabela games no formato de array.
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        return $this->db->get_where("tb_games", array(
            "id" => $id
        )) -> row_array();
    }
    
    /**
     * O método UPDATE vai atualizar as informações depois que o usuário registro dos dados cadastrados. Então dentro da tabela tb_games vai atualizar
     * todos os campos digitados. 
     *
     * @param  mixed $id
     * @param  mixed $game
     * @return void
     */
    public function update($id, $game)
    {
        $this->db->where("id", $id);
        return $this->db->update("tb_games", $game);
    }
}
