<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    public function replies(){
        return $this->hasMany('App\Reply');
    }

    public function creator(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function addReply($reply){
        $this->replies()->create($reply);
    }

    public function channel(){
        return $this->belongsTo('App\Channel');
    }

    public function path(){
        return "/threads/{$this->channel->slug}/{$this->id}";
    }
}
