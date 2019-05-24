<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guest_may_not_create_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

//        $thread = make('App\Thread');
//
//        $this->post('/threads', $thread->toArray());

        $this->post('/threads')
            ->assertRedirect('/login');

        $this->get('/threads/create')
            ->assertRedirect('/login');
    }

//    /** @test */
//    public function guest_cannot_see_create_threads_page(){
//        $this->expectException('Illuminate\Auth\AuthenticationException');
//        $this->get('/threads/create')
//            ->assertRedirect('/login');
//    }

    /** @test */
    public function test_auth_user_can_create_new_forum_threads()
    {
//        Given we have a signed in user
//        $this->actingAs(create('App\User'));
        $this->signIn();

//        When we endpoint to create a new thread.
        $thread = create('App\Thread');

        $this->post('/threads/', $thread->toArray());

//        dd($thread->path());
 //       dd($response->headers->get('Location'); // to get the id in the url

//        Then, when we visit a thread page and We should see the new thread
         $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

    public function test_a_thread_requires_a_title(){

        $this->publishThread(['title' => null])
            ->assertSessionHasErrors('title');

    }

    public function test_a_thread_requires_a_body(){

        $this->publishThread(['body'=>null])
            ->assertSessionHasErrors('body');
    }

    public function test_a_thread_requires_valid_channel(){

        factory('App\Channel', 2)->create();

        $this->publishThread(['channel_id'=>null])
            ->assertSessionHasErrors('channel_id');

        //below one is not working. It should get failed if I enter channel_id 1 or 2 instead of 999.
        $this->publishThread(['channel_id'=> 999])
            ->assertSessionHasErrors('channel_id');
    }

    public function publishThread($overrides = []){
        $this->expectException('Illuminate\Validation\ValidationException');

        $this->signIn();

        $thread = make('App\Thread', $overrides);

        $this->post('/threads', $thread->toArray());
    }
}
