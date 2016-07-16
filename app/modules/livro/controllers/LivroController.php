<?php
namespace App\Livro\Controllers;

use App\Controllers\RESTController;
use App\Livro\Models\Livros;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Livro\Controllers
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class LivroController extends RESTController
{
    /**
     * Retorna uma lista de Usuários.
     *
     * @access public
     * @return Array Lista de Usuários.
     */
    public function getLivros()
    {
        try {
            $livro = (new Livros())->find(
                [
                    'conditions' => 'true ' . $this->getConditions(),
                    'columns' => $this->partialFields,
                    'limit' => $this->limit
                ]
            );

            return $livro;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Retorna um Livro.
     *
     * @access public
     * @return Array Livro.
     */
    public function getLivro($iLivroId)
    {
        try {

            $user = new App\Users\Models\Users();

            $phones = (new Livros())->findFirst(
                [
                    'conditions' => "iLivroId = '$iLivroId'",
                    'columns' => $this->partialFields,
                ]
            );

            return $livros;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
    

    /**
     * Adiciona um Usuário.
     *
     * @access public
     * @return Array Usuário.
     */
    public function addLivro()
    {
        try {
            $livro = new Livros();
            //$livro->iLivroId = $this->di->get('request')->getPost('iLivroId');
            $livro->sNomeLivro = $this->di->get('request')->getPost('sNomeLivro');
            $livro->sEditora = $this->di->get('request')->getPost('sEditora');

            $livro->saveDB();

            return $livro;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Editar o campo de um Usuário.
     *
     * @access public
     * @return Array.
     */
    public function editLivro($iLivroId)
    {
        try {
            $put = $this->di->get('request')->getPut();

            $livro = (new Livros())->findFirst($iLivroId);

            if (false === $livro) {
                throw new \Exception("This record doesn't exist", 200);
            }

            $livro->iLivroId = isset($put['iLivroId']) ? $put['iLivroId'] : $livro->iLivroId;
            $livro->sNomeLivro = isset($put['sNomeLivro']) ? $put['sNomeLivro'] : $livro->sNomeLivro;
            $livro->sEditora = isset($put['sEditora']) ? $put['sEditora'] : $livro->sEditora;

            $livro->saveDB();

            return $livro;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Remove um Usuário.
     *
     * @access public
     * @return boolean.
     */
    public function deleteLivro($iLivroId)
    {
        try {
            $phone = (new Livros())->findFirst($iLivrosId);

            if (false === $livros) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $livro->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
