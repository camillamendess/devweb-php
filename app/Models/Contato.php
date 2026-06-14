<?php
// Ele vira uma classe limpa, usada apenas para carregar e transportar os dados pelo sistema.

class Contato {
    public $id;
    public $nome;
    public $telefone;
    public $email;

    // Construtor opcional para facilitar a criação do objeto
    public function __construct($id = null, $nome = null, $telefone = null, $email = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
    }
}