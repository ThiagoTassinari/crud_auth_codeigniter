<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games extends CI_Controller {
	
	public function index()
	{
		$this->load->model("games_model");
		$data["games"] = $this->games_model->index();
        $data["title"] = 'Games - CodeIgniter';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
		$this->load->view('pages/games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

		
	/**
	 * A função new chama um novo formulário com seus template s
	 *
	 * @return void
	 */
	public function new()
	{
		$data["title"] = 'Games - CodeIgniter';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

		
	/**
	 * A função store retorna os valores preenchidos do novo formulário de jogos e atualiza
	 * os registro da tb_games do banco de dados com os novos dados. Por fim, será redirecionado
	 * para página de dashboard. 
	 *
	 * @return void
	 */

	public function store()
	{
		$game = $_POST;
		$game['user_id'] = '1';
		$this->load->model("games_model");
		$this->games_model->store($game);
		redirect("dashboard");
	}
}
