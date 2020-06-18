<?php

namespace TheComet\Common\Support;

use Illuminate\Routing\UrlGenerator;

class UrlHelper
{
    protected UrlGenerator $urlGenerator;

    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }
}
