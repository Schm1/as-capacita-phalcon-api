<?php
return call_user_func(
    function () {
        $userCollection = new \Phalcon\Mvc\Micro\Collection();

        $userCollection
            ->setPrefix('/v1/emprestimo')
            ->setHandler('\App\Livro\Controllers\EmprestimoController')
            ->setLazy(true);

        $userCollection->get('/', 'getEmprestimos');
        $userCollection->get('/{id:\d+}', 'getEmprestimo');

        $userCollection->post('/', 'addEmprestimo');

        $userCollection->put('/{id:\d+}', 'editEmprestimo');

        $userCollection->delete('/{id:\d+}', 'deleteEmprestimo');

        return $userCollection;
    }
);
