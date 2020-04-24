<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */

    public function test_if_when_registers_he_is_sent_to_he_complete_profile(){

        $this->actingAs(factory(\App\User::class)->create());
        
    }
}
