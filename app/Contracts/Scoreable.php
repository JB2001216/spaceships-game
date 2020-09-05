<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface Scoreable
{
    /**
     * @return MorphOne
     */
    public function score(): MorphOne;
}
