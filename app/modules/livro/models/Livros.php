<?php
namespace App\Livro\Models;

/**
 * Model da tabela 'Livros'
 *
 * @package App\Users\Models
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class Livros extends \App\Models\BaseModel
{
    /**
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $iLivroId;

    /**
     * @Column(type="string", length=20, nullable=true)
     */
    public $sNomeLivro;

    /**
     * @Column(type="string", length=20, nullable=true)
     */
    public $sEditora;
}
