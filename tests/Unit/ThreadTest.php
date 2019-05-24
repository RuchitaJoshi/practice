<?php

namespace Tests\Unit;

use phpDocumentor\Reflection\Types\Parent_;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    public function setup(){
        Parent::setup();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test*/
    public function test_thread_has_replies(){
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    public function test_thread_has_creator(){
        $this->assertInstanceOf('App\User', $this->thread->creator);
    }

    public function test_a_thread_can_add_reply(){
        $this->thread->addreply([
            'body'=>'foobar',
            'user_id'=>1
        ]);

        $this->assertCount(1, $this->thread->replies);
    }
}
