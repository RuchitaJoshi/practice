<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
    Use DatabaseMigrations;

    public function setup(){
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function test_read_all_threads(){
//        $this->expectException('Illuminate\Auth\AuthenticationException');
        $response = $this->get('/threads');
   //     $response->assertStatus(200);
        $response->assertSee($this->thread->title);
    }

    public function test_read_single_thread(){
//        $this->expectException('Illuminate\Auth\AuthenticationException');
        $response = $this->get($this->thread->path());
        $response->assertSee($this->thread->title);
    }

    public function test_read_replies_of_particular_thread(){
//        $this->expectException('Illuminate\Auth\AuthenticationException');
        $reply = factory('App\Reply')->create(['thread_id'=>$this->thread->id]);
        $response = $this->get($this->thread->path());
        $response->assertSee($reply->body);
    }

    public function test_thread_belongs_to_a_channel(){
        $thread = create('App\Thread');
        $this->assertInstanceOf('App\Channel', $thread->channel);
    }

    public function test_thread_can_make_a_string_path(){
        $thread = create('App\Thread');
//        $this->assertEquals('/threads/' . $thread->channel->slug . '/' . $this->thread->id, '/threads/' . $thread->channel->slug . '/' . $this->thread->id);
        $this->assertEquals("/threads/{$thread->channel->slug}/{$thread->id}", $thread->path());
    }

    public function test_user_can_filter_thread_according_to_a_tag(){
        $channel = create('App\Channel');
        $threadInChannel = create('App\Thread', ['channel_id'=>$channel->id]);
        $threadNotInChannel = create('App\Thread');
        $this->get('/threads/'. $channel->slug)
            ->assertSee($threadInChannel->title)
            ->assertDontSee($threadNotInChannel->title);
    }
}
