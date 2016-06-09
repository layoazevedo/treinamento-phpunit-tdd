<?php

namespace App\Test;

use PHPUnit_Framework_TestCase;
use App\Model\DescontoPessoaFisica;

class DescontoPessoaFisicaTest extends PHPUnit_Framework_TestCase
{
    private $pessoaFisica;

    public function setUp()
    {
        $this->pessoaFisica = new DescontoPessoaFisica();
    }
    /**
     * @test
     * @dataProvider provedor
     */
    public function verificaDescontoCinquentaReais($esperado, $atual)
    {
        $this->assertEquals(
            $esperado, 
            $this->pessoaFisica->get($atual)
        );
    }

    public function provedor()
    {
        return array(
            [250, 300],
            [450, 500],
            [950, 1000]
        );
    }
}
