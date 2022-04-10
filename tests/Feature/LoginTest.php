<?php
declare(strict_types=1);

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_status_success() : void
    {
        $response = $this->get(route('login.'));

        $response->assertStatus(200);
    }

    public function test_store_validate_success() : void
    {
        $data = [
            'login' => 'Admin',
        ];
        $response = $this->post(route('login.in'), $data);

        $response->assertSessionHasErrors('password');
    }
}
