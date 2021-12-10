<?php

namespace App\Usecases\Home;

use App\Usecases\Payload;

class IndexUsecase
{
    /**
     * @param array $parameters
     * @return Payload
     */
    public function run(array $parameters): Payload
    {
        $payload = new Payload();

        return $payload->setResult([
            '' => '',
        ]);
    }
}
