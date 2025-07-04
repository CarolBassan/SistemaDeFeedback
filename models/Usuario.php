<?php
class Usuario {
    private $conn;
    private $table = "usuarios";

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $perfil;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function cadastrar() {
        $query = "INSERT INTO " . $this->table . " SET nome=:nome, email=:email, senha=:senha, perfil=:perfil";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", password_hash($this->senha, PASSWORD_DEFAULT));
        $stmt->bindParam(":perfil", $this->perfil);
        return $stmt->execute();
    }

    public function login() {
        $query = "SELECT * FROM " . $this->table . " WHERE email=:email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($this->senha, $usuario['senha'])) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_perfil'] = $usuario['perfil'];
            return true;
        }
        return false;
    }
}