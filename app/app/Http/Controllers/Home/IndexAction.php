<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Usecases\Home\IndexUsecase;
use App\Http\Responders\Home\IndexResponder;

class IndexAction extends Controller
{
    /**
     * @var IndexUsecase
     */
    private $usecase;

    /**
     * @var IndexResponder
     */
    private $responder;

    /**
     * IndexAction constructor.
     *
     * @param IndexUsecase $usecase
     * @param IndexResponder $responder
     *
     */
    public function __construct(IndexUsecase $usecase, IndexResponder $responder)
    {
        $this->usecase = $usecase;
        $this->responder = $responder;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function __invoke(Request $request): Response
    {
        return $this->responder->handle($this->usecase->run($request->all()));
    }
}
