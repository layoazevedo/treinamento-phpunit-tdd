<?php

namespace App\Test;

use PHPUnit_Framework_TestCase;
use App\Model\UsuarioPessoaFisica;

class UsuarioPessoaFisicaTest extends PHPUnit_Framework_TestCase
{
    private $pessoaFisica;

    public function setUp()
    {
        $this->pessoaFisica = new UsuarioPessoaFisica();
    }

    /**
     * @test
     */
    public function verificaUsuarioAssinante()
    {
        $this->assertTrue(
            $this->pessoaFisica->isAssinante()
        );
    }

    /**
     * @test
     */
    public function verificarStatusUsuarioAtivo()
    {
        $this->assertEquals(
            'Ativo', 
            $this->pessoaFisica->statusUsuario('A')
        );
    }

    /**
     * @test
     */
    public function verificarStatusUsuarioSuspenso()
    {
        $this->assertEquals(
            'Suspenso', 
            $this->pessoaFisica->statusUsuario('S')
        );
    }

    /**
     * @test
     * @expectedException Exception
     * @expectedExceptionMessage Status incorreto
     */
    public function verificarStatusInvalido()
    {
        $this->pessoaFisica->statusUsuario('C');
    }

    /**
     * @test
     */
    public function verificaCurriculo()
    {
        $curriculo = $this->getMock(
            'App\Model\Curriculo',
            array('get', 'metodo2')
        );

        $curriculo->expects($this->once())
            ->method('get')
            ->will(
                $this->returnValue(
                    array(
                        'Nome' => 'Layo',
                        'Escolaridade' => 'Superior'
                    )
                )
            );

        $curriculo->expects($this->any())
            ->method('metodo2')
            ->will(
                $this->returnValue(
                    array(
                        'Nome' => 'Layo',
                        'Escolaridade' => 'Superior'
                    )
                )
            );

        $this->pessoaFisica->setCurriculo($curriculo);

        $this->assertEquals(
            array(
                'Nome' => 'Layo',
                'Escolaridade' => 'Superior'
            ),
            $this->pessoaFisica->exibirCurriculo()
        );
    }
}
