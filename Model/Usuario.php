<?php
class Usuario
{
    private $conn;
    private $table = "usuario";

    public $id_user;
    public $nome;
    public $CPF;
    public $email;
    public $senha;
    public $tipo;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function cadastrar()
    {
        $query = "INSERT INTO " . $this->table . " SET nome=:nome, CPF=:CPF, email=:email, senha=:senha, tipo=:tipo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":CPF", $this->CPF);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->bindParam(":tipo", $this->tipo);
        return $stmt->execute();
    }

    public function login()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE email=:email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && $this->senha === $usuario['senha']) {
            $_SESSION['usuario_id'] = $usuario['id_user'];
            $_SESSION['usuario_tipo'] = $usuario['tipo'];
            return true;
        }
        return false;
    }
}
