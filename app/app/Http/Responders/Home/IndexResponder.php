<?php

namespace App\Http\Responders\Home;

use App\Http\Responders\AbstractResponder;
use App\Usecases\Payload;
use Symfony\Component\HttpFoundation\Response;

class IndexResponder extends AbstractResponder
{
    /**
     * @param mixed ...$args
     *
     * @return Response
     */
    public function handle(...$args): Response
    {
        [$payload] = $args;

        assert($payload instanceof Payload);

        return $this->response->view('home.index');
    }
}
