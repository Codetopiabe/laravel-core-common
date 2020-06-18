<?php

namespace TheComet\Common\Domain;

use Dyrynda\Database\Support\GeneratesUuid;

class UuidModel extends Model
{
    use GeneratesUuid;

    // Not doing this for now because of route
    // binding issues.Let's verify the performance hit first.
    // protected $casts = [
    //     'uuid' => EfficientUuid::class
    // ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
