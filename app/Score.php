<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['won', 'lost'];

    public function scoreable()
    {
        return $this->morphTo();
    }
}
