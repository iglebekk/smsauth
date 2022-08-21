<?php

namespace Tests\Feature\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase {


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example() {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_user() {
        //
    }

    public function test_login_user() {
        //
    }

    public function test_create_access_token() {
        //
    }
}
