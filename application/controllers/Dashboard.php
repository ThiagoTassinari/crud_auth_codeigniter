<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	/**
	 *  A função __construct() vai sobrescrever todos os métodos como uma super-classe injetado 
	 * 	o método permissions() para autentificação do usuário logado ou não. 
	 * 	
	 * 	Caso o usuário não estiver logado e tentar acessar a página Dashboard, então será redirecionado
	 *  para página de Login. Agora se o usuário estiver logado, logo ele têm permissão de executar 
	 *  as ações do controller Dashboard.php.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		permissions();
		$this->load->model("games_model");
		$data["games"] = $this->games_model->index();
	}

	/**
	 * A função index carrega o arquivo games_model e carrega as informações do 
	 * template do Dashboard.
	 *
	 * @return void
	 */
	public function index()
	{
		permissions();
		$this->load->model("games_model");
		$data["games"] = $this->games_model->index();
		$data["title"] = 'Dashboard - CodeIgniter';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav-top', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}
}
