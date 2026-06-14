<?php

class Usuario {
    public $id;
    public $email;
    public $senha;

    public function __construct($id = null, $email = null, $senha = null) {
        $this->id = $id;
        $this->email = $email;
        $this->senha = $senha;
    }
}