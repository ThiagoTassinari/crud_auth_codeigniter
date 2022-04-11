<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Games extends CI_Controller
{


	/**
	 *  A função __construct() vai sobrescrever todos os métodos como uma super-classe injetado 
	 * 	o método permissions() para autentificação do usuário logado ou não. 
	 * 	
	 * 	Caso o usuário não estiver logado e tentar acessar a página Games, então será redirecionado
	 *  para página de Login. Agora se o usuário estiver logado, logo ele têm permissão de executar 
	 *  as ações do controller.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		permissions();
		$this->load->model("games_model");
	}

	public function index()
	{
		$data["games"]  = $this->games_model->index();
		$data["title"] = "Games - CodeIgniter";

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}


	/**
	 * A função new chama um novo formulário com seus templates
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
		// $game['id'] = '1';
		$this->load->model("games_model");
		$this->games_model->store($game);
		redirect("dashboard");
	}

	public function edit($id)
	{
		$this->load->model("games_model");
		$data["game"] = $this->games_model->show($id);
		$data["title"] = 'Edit Game - CodeIgniter';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/form-games', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}

	/**
	 * O método UPDATE carregará a função dentro do arquivo games_modal.php e atualiza os dados no banco de dados pelo id e o game.
	 * No final, a página será redirecionada para a page games.
	 *
	 * @param  mixed $id
	 * @return void
	 */
	public function update($id)
	{
		$this->load->model("games_model");
		$game = $_POST;
		$this->games_model->update($id, $game);
		redirect("games");
	}

	/**
	 * O argumento $id que estou passando na função DELETE será retornado quando for chamado a função remove no 
	 * arquivo games_model.
	 *
	 * @param  mixed $id
	 * @return void
	 */
	public function delete($id)
	{
		$this->load->model("games_model");
		$this->games_model->remove($id);
		redirect("games");
	}
}
