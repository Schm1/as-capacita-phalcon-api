<?php
namespace App\Livro\Controllers;

use App\Controllers\RESTController;
use App\Livro\Models\Livro;
use App\Livro\Models\Emprestimos;

/**
 * Gerencia as requisições para o módulo admin.
 *
 * @package App\Livro\Controllers
 * @author Otávio Augusto Borges Pinto <otavio@agenciasys.com.br>
 * @copyright Softers Sistemas de Gestão © 2016
 */
class EmprestimoController extends RESTController
{
    /**
     * Retorna uma lista de Usuários.
     *
     * @access public
     * @return Array Lista de Usuários.
     */

    public function getEmprestimos()
    {
        try {
            $emprestimo = (new Emprestimos())->find(
                [
                    'conditions' => 'true ' . $this->getConditions(),
                    'columns' => $this->partialFields,
                    'limit' => $this->limit
                ]
            );

            return $emprestimo;
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
    public function getEmprestimo($iEmprestimoId)
    {
        try {

            $emprestimos = (new Emprestimos())->findFirst(
                [
                    'conditions' => "iEmprestimoId = '$iEmprestimoId'",
                    'columns' => $this->partialFields,
                ]
            );

            return $emprestimos;
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
    public function addEmprestimo()
    {
        try {
            $emprestimos = new Emprestimos();
            //$emprestimos->iEmprestimoId = $this->di->get('request')->getPost('iEmprestimoId');
            $emprestimos->iLivroId = $this->di->get('request')->getPost('iLivroId');
            $emprestimos->iUserId = $this->di->get('request')->getPost('iUserId');
            $emprestimos->sDataEmprestimo = (!empty($this->di->get('request')->getPost('sDataEmprestimo'))) ? $this->di->get('request')->getPost('sDataEmprestimo') : '';
            $emprestimos->sDataDevolucao = (!empty($this->di->get('request')->getPost('sDataDevolucao'))) ? $this->di->get('request')->getPost('sDataDevolucao') : '';

            $emprestimos->saveDB();

            return $emprestimos;
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
    public function editEmprestimo($iEmprestimoId)
    {
        try {
            $put = $this->di->get('request')->getPut();

            $emprestimo = (new Emprestimos())->findFirst($iEmprestimoId);

            if (false === $emprestimo) {
                throw new \Exception("This record doesn't exist", 200);
            }
            $emprestimo->iUserId = isset($put['iUserId']) ? $put['iUserId'] : $emprestimo->iUserId;
            $emprestimo->iEmprestimoId = isset($put['iEmprestimoId']) ? $put['iEmprestimoId'] : $emprestimo->iEmprestimoId;
            $emprestimo->iLivroId = isset($put['iLivroId']) ? $put['iLivroId'] : $emprestimo->iLivroId;
            $emprestimo->sDataEmprestimo = isset($put['sDataEmprestimo']) ? $put['sDataEmprestimo'] : $emprestimo->sDataEmprestimo;
            $emprestimo->sDataDevolucao = isset($put['sDataDevolucao']) ? $put['sDataDevolucao'] : $emprestimo->sDataDevolucao;

            $emprestimo->saveDB();

            return $emprestimo;
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
    public function deleteEmprestimo($iLivroId)
    {
        try {
            $emprestimo = (new Emprestimo())->findFirst($iLivrosId);

            if (false === $emprestimo) {
                throw new \Exception("This record doesn't exist", 200);
            }

            return ['success' => $emprestimo->delete()];
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
