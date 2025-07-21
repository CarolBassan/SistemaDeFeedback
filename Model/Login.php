<?php
class Login {
    private $email;
    private $senha;

    public function __construct($atributos = null) {
        if ($atributos != null && is_array($atributos)) {
            if (isset($atributos['email'])) {
                $this->email = $atributos['email'];
            }
            if (isset($atributos['senha'])) {
                $this->senha = $atributos['senha'];
            }
        }
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }
}
