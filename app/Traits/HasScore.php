<?php

namespace App\Traits;

use App\Score;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasScore
{
    /**
     * @return MorphOne
     */
    public function score(): MorphOne
    {
        return $this->morphOne(Score::class, 'scoreable');
    }
}
