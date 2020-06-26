<?php

namespace TheComet\Common\Support;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function getForm(string $url): array
    {
        return [
            'url' => $url,
            'token' => csrf_token()
        ];
    }
}
