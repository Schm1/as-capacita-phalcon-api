<?php
return call_user_func(
    function () {
        $userCollection = new \Phalcon\Mvc\Micro\Collection();

        $userCollection
            ->setPrefix('/v1/livro')
            ->setHandler('\App\Livro\Controllers\LivroController')
            ->setLazy(true);

        $userCollection->get('/', 'getLivros');
        $userCollection->get('/{id:\d+}', 'getLivro');

        $userCollection->post('/', 'addLivro');

        $userCollection->put('/{id:\d+}', 'editLivro');

        $userCollection->delete('/{id:\d+}', 'deleteLivro');

        return $userCollection;
    }
);
