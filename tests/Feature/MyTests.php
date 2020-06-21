<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MyTests extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */


    /** @test */

    public function test_if_user_is_not_logining(){
        $response=$this->get('/home');
        $response->assertRedirect('login');
    }

    public function test_if_when_registers_he_is_sent_to_he_complete_profile(){

        $this->actingAs(factory(\App\User::class)->create());

        $response=$this->get('/home');

        $response->assertRedirect('/home');


    }

}
