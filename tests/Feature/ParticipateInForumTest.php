<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function test_unauthenticated_user_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = create('App\Thread');

        $this->post('/threads/some-channel/1/replies', []);
    }

    /** @test */
    public function test_auth_user_in_forum()
    {
        // Given we have an authenticated user (be() is built-in method to check authentication of a user
        $this->be($user = create('App\User'));

        // And an existing thread
        $thread = create('App\Thread');

        // When a user adds a reply to the thread
        $reply = make('App\Reply');
      //  dd($thread->path(). '/replies');
        $this->post($thread->path() . '/replies', $reply->toArray());

        // Then their reply should be visible on page
        $this->get($thread->path())
            ->assertSee($reply->body);
    }

    public function test_a_reply_requires_a_body(){

        $this->expectException('Illuminate\Validation\ValidationException');
        $this->signIn();
        $thread = create('App\Thread');
        $reply = make('App\Reply', ['body'=>null]);
//        dd($thread->path());
        $this->post($thread->path() . '/replies', $reply->toArray())
            ->assertSessionHasErrors('body');
    }
}
