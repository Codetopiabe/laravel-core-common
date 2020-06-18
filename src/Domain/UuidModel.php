<?php

namespace TheComet\Common\Domain;

use Dyrynda\Database\Support\GeneratesUuid;

class UuidModel extends Model
{
    use GeneratesUuid;

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
