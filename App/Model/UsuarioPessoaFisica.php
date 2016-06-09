<?php

namespace App\Model;

use App\Type\AssinaturaInteface;
use App\Model\Curriculo;

class UsuarioPessoaFisica implements AssinaturaInteface
{
    private $curriculo;

    public function setCurriculo(Curriculo $curriculo)
    {
        $this->curriculo = $curriculo;
        return $this;
    }

    public function isAssinante()
    {
        return true;
    }

    public function statusUsuario($status)
    {
        $this->validadeStatus($status);

        if ($status == 'A') {
            return 'Ativo';
        }

        return 'Suspenso';
    }

    public function exibirCurriculo()
    {
        return $this->curriculo->get();
    }

    private function validadeStatus($status)
    {
        if ($status != 'A' && $status != 'S') {
            throw new \Exception('Status incorreto');
        }
    }
}
