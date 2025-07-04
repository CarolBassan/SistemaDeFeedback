<?php
class Veiculo {
    private $conn;
    private $table = "veiculos";

    public $id;
    public $marca;
    public $modelo;
    public $ano;
    public $descricao;
    public $imagem;
    public $categoria;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function cadastrar() {
        $query = "INSERT INTO " . $this->table . " SET marca=:marca, modelo=:modelo, ano=:ano, descricao=:descricao, imagem=:imagem, categoria=:categoria";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":ano", $this->ano);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":imagem", $this->imagem);
        $stmt->bindParam(":categoria", $this->categoria);
        return $stmt->execute();
    }

    public function listar() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}