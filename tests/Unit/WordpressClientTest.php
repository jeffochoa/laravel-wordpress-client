<?php

namespace Tests\Unit;

use Zttp\Zttp;
use Tests\TestCase;
use WordpressClient\WordpressClient;
use WordpressClient\Facades\Wordpress;

/**
* Wordpress Client Test file
*/
class WordpressClientTest extends TestCase
{
    private $wordpress;

    public function setUp()
    {
        parent::setUp();
        $this->wordpress = new WordpressClient(config('wordpress.api_url'));
    }

    /** @test */
    public function posts()
    {
        $response = $this->wordpress->posts(['page' => 1, 'per_page' => 1]);
        $this->assertArrayHasKey('title', $response->collection()->first());
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function categories()
    {
        $response = $this->wordpress->categories(['page' => 1, 'per_page' => 2]);
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function tags()
    {
        $response = $this->wordpress->tags(['page' => 1, 'per_page' => 1]);
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function pages()
    {
        $response = $this->wordpress->pages(['page' => 1, 'per_page' => 1]);
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function taxonomies()
    {
        $response = $this->wordpress->taxonomies(['page' => 1, 'per_page' => 1]);
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function media()
    {
        $response = $this->wordpress->media(['page' => 1, 'per_page' => 1, 'mime_type' => 'image/jpeg']);
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function types()
    {
        $response = $this->wordpress->types(['page' => 1, 'per_page' => 1, 'mime_type' => 'image/jpeg']);
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function statuses()
    {
        $response = $this->wordpress->statuses(['page' => 1, 'per_page' => 1]);
        $this->assertArrayHasKey('publish', $response->collection()->toArray());
        $this->assertEquals(200, $response->status());

        $response = $this->wordpress->statuses([], 'publish');
        $this->assertEquals('publish', $response->collection()->get('slug'));
        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function facade()
    {
        $response =  Wordpress::posts();
        $this->assertEquals(200, $response->status());
    }
}
