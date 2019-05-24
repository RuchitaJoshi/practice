<?php

namespace Tests\Feature\Feature;

use App\article;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

//    public function testRequiresEmailAndLogin()
//    {
//        $this->json('POST', 'api/login')
//            ->assertStatus(404)
//            ->assertJson([
//                'email' => ['The email field is required.'],
//                'password' => ['The password field is required.'],
//            ]);
//    }

//    public function testUserLoginsSuccessfully()
//    {
//        factory(User::class)->create([
//            'email' => 'ruchi@gmail.com',
//            'password' => bcrypt('ruchi123')
//        ]);
//        $this->withoutMiddleware();
//
//        $payload = ['email' => 'ruchi@gmail.com', 'password' => 'ruchi123'];
//
//        $this->json('POST', 'api/login', $payload)
//            ->assertStatus(200)
//            ->assertJsonStructure([
//                'data' => [
//                    'id',
//                    'name',
//                    'email',
//                    'created_at',
//                    'updated_at',
//                    'remember_token',
//                ],
//            ]);
//
//    }

//    public function it_can_show_the_carousel()
//    {
//        $carousel = factory(Carousel::class)->create();
//        $carouselRepo = new CarouselRepository(new Carousel);
//        $found = $carouselRepo->findCarousel($carousel->id);
//
//        $this->assertInstanceOf(Carousel::class, $found);
//        $this->assertEquals($found->title, $carousel->title);
//        $this->assertEquals($found->link, $carousel->link);
//        $this->assertEquals($found->src, $carousel->src);
//    }

//    public function test_follows()
//    {
//        $userA = User::findOrFail(2);
//        $userB = User::findOrFail(3);
//
//       // $userA->follows($userB);
//        $userA->follows($userB);
//
//        $this->assertEquals(2, $userA->following()->count());
//    }


//    public function test_have_6_users()
//    {
//        $this->assertEquals(6, User::count());
//    }
//
//
//    public function testLoggedInUser(){
//        $user = factory(User::class)->create();
//
//        $response = $this->actingAs($user)->get('/');
//
//        $response->assertStatus(200);
//    }
//
//    public function testMyAppRoute(){
//        $response = $this->call('GET','/');
//        $this->assertTrue(true);
//        $this->assertEquals('welcome', $response->getContent());
//    }
//
//    public function testBasicTest(){
//        $response = $this->get('/');
//        $response->assertStatus(200);
//    }

}
