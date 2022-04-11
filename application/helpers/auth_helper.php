<?php

/**
 * O método permissions ta pegando o usuário logado na sessão e faz a verificação. Caso, não esteja
 * logado mostra uma mensagem de alerta e redireciona o usuário para a página de Login.
 *
 * @return void
 */
function permissions()
{
	$ci = get_instance();
	$loggedUser = $ci->session->userdata('logged_user');	// Fará a verificação

	if (!$loggedUser) {
		$ci->session->set_flashdata('danger', 'Você precisa estar logado para acessar está página');
		redirect("login");
	}

	return $loggedUser;
}
