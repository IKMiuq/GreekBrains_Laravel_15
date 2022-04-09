<?php
declare(strict_types=1);

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_status_success() : void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }

    public function test_create_status_success() : void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

    public function test_store_news_success() : void
    {
        $data = [
            'name' => 'Test',
            'author' => 'Admin',
            'description' => Factory::create()->text(100)
        ];
        $response = $this->post(route('admin.news.store'), $data);

        $response->assertJson($data)->assertCreated();
    }

    public function test_store_validate_success() : void
    {
        $data = [
            'author' => 'Admin',
            'description' => Factory::create()->text(100)
        ];
        $response = $this->post(route('admin.news.store'), $data);

        $response->assertSessionHasErrors('name');
    }

    public function test_store_download_success() : void
    {
        $data = [
            'count' => '3',
        ];
        $response = $this->post(route('admin.news.download'), $data);

        $response->assertDownload('newsAll.txt');

    }
}
