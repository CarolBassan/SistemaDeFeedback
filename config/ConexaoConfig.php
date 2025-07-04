<?php
class ConexaoConfig {

	private $sgbd;
	private $host;
	private $bd;
	private $usuario;
	private $senha;
	private $sistema;
	private $upload;
	
	public function __construct(){
		$iniFile = parse_ini_file(__DIR__ . "/config.ini", true);
		$this->sgbd = $iniFile["Banco de Dados"]["sgbd"];
		$this->host = $iniFile["Banco de Dados"]["host"];
		$this->bd = $iniFile["Banco de Dados"]["bd"];
		$this->usuario = $iniFile["Banco de Dados"]["usuario"];
		$this->senha = $iniFile["Banco de Dados"]["senha"];
		$this->sistema = $iniFile["Sistema"];
		$this->upload = $iniFile["Upload"];
	}
	
	public function getSgbd() {
		return $this->sgbd;
	}

	public function getHost() {
		return $this->host;
	}

	public function getBd() {
		return $this->bd;
	}

	public function getUsuario() {
		return $this->usuario;
	}

	public function getSenha() {
		return $this->senha;
	}
	
	public function getNomeSistema() {
		return $this->sistema['nome_sistema'];
	}
	
	public function getVersao() {
		return $this->sistema['versao'];
	}
	
	public function isDebug() {
		return $this->sistema['debug'] == 'true';
	}
	
	public function getEmailAdmin() {
		return $this->sistema['email_admin'];
	}
	
	public function getMaxFileSize() {
		return $this->upload['max_file_size'];
	}
	
	public function getAllowedTypes() {
		return explode(',', $this->upload['allowed_types']);
	}
	
	public function getUploadPath() {
		return $this->upload['upload_path'];
	}

	public function setSgbd($sgbd) {
		$this->sgbd = $sgbd;
	}

	public function setHost($host) {
		$this->host = $host;
	}

	public function setBd($bd) {
		$this->bd = $bd;
	}

	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
	}	
}