<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	/**
	 * O método index redireciona o usuário para a página de login
	 *
	 * @return void
	 */
	public function index()
	{
		$data["title"] = 'Login - CodeIgniter';
		$this->load->view('pages/login', $data);
	}

	/**
	 * O método store vai no banco pegar as informações cadastradas do usuário e monta o usuário com os
	 * argumentos (email, password ) encontrados. No final ele seta uma sessão, onde redireciona para a
	 * página de Dashboard caso seja um sucesso o login, senão ele continua na página de login.
	 *
	 * @return void
	 */
	public function store()
	{
		$this->load->model("login_model");
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$user = $this->login_model->store($email, $password);

		if ($user) {
			$this->session->set_userdata("logged_user", $user);
			redirect("dashboard");
		} else {
			redirect("login");
		}
	}

	public function logout() {
		$this->session->unset_userdata("logged_user");
		redirect("login");
	}
}
