<?php
namespace App\Livro\Models;

/**
 * Model da tabela 'Livros'
 *
 * @package App\Users\Models
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class Emprestimos extends \App\Models\BaseModel
{
    /**
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $iEmprestimoId;

    /**
     * @Column(type="string", length=20, nullable=true)
     */
    public $iUserId;

    /**
     * @Column(type="string", length=20, nullable=true)
     */
    public $iLivroId;

    public $sDataEmprestimo;

    public $sDataDevolucao;

    public function beforeValidation()
    {
        // Convert the array into a string
        $this->sDataEmprestimo = date('Y-m-d');
        $this->sDataDevolucao = '0';

    }
}

