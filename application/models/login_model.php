<?php

class login_model extends CI_Model {
	
	/**
	 * O método store recebe os argumentos (email, password) na ação de login do usuário, onde
	 * pega esses valores na tabela de usuários no banco de dados numa única linha.
	 *
	 * @param  mixed $email
	 * @param  mixed $password
	 * @return void
	 */
	public function store($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$user = $this->db->get("tb_users")->row_array();
		
		return $user;
	}
}
