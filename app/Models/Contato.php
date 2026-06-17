<?php
// Model Contato - representa um contato que pode ser adicionado à agenda de um usuário
class Contato {
    public $id;
    public $nome;
    public $telefone;
    public $email;
    public $usuario_id; 

    // Construtor para facilitar a criação do objeto
    public function __construct($id = null, $nome = null, $telefone = null, $email = null, $usuario_id = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->usuario_id = $usuario_id;
    }
}