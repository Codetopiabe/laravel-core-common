<?php

namespace TheComet\Common\Support;

class Controller
{
    protected function getForm(string $url): array
    {
        return [
            'url' => $url,
            'token' => csrf_token()
        ];
    }
}
