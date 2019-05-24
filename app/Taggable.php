<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    protected $fillable = [
      'tag_id',
    ];

    public function taggable(){
        return $this->morphTo();
    }
}
