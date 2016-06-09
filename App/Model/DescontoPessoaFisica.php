<?php

namespace App\Model;

class DescontoPessoaFisica
{
    public function get($valor)
    {
        return $valor - 50;
    }
}
