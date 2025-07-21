<?php
require_once SRC . '/Config/Conexao.php';
require_once SRC . '/Model/Login.php';

class LoginDAO
{
	private $conexao;

	public function __construct()
	{
		$this->conexao = Conexao::getConexao();
	}

	public function login()
	{
		$login = new Login($_POST);
		$stmt = $this->conexao->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
		$stmt->bindValue(":email", $login->getEmail());
		$stmt->bindValue(":senha", $login->getSenha());
		$stmt->execute();
		$linha = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($linha != null) {
			session_start();
			$_SESSION['usuario_id'] = $linha['id_user'];
			$_SESSION['usuario_tipo'] = $linha['tipo'];
			header('Location:' . HOME . '/dashboard');
			exit();
		} else {
			header('Location: ' . HOME . '/login?erro=1');
			exit();
		}
	}

	public function logout()
	{
		session_start();
		$_SESSION = [];
		session_destroy();
		header('Location: ' . HOME . '/login');
		exit();
	}
}
