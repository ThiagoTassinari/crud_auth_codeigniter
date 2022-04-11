<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
		
	/**
	 * A função index carrega o arquivo games_model e carrega as informações do 
	 * template do Dashboard.
	 *
	 * @return void
	 */
	public function index()
	{
		$this->load->model("games_model");
		$data["games"] = $this->games_model->index();
        $data["title"] = 'Dashboard - CodeIgniter';

	/* Seta todas informações quando o usuário está logado na sessão. 		
		print "<pre>";
		print_r($_SESSION);
		print "</pre>";
		exit(); 
	*/

		$this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer', $data);
		$this->load->view('templates/js', $data);
	}
}
