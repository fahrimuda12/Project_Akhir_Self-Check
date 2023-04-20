<?php

namespace App\Traits;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

trait FilterTrait
{
    public function dataFilterWithField(Builder $builder)
    {
        return $builder->get();
    }
}
