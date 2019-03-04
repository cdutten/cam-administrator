<?php

namespace Tests\Feature;

use App\Client;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    /**
     * Client list all cameras entity endpoint test
     *
     * @return void
     */
    public function testListAllClients()
    {
        $response = $this->get('api/clients');
        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['*' => ['id', 'name']]])
            ->assertJsonStructure([
                'current_page',
                'first_page_url',
                'from',
                'last_page',
                'last_page_url',
                'next_page_url',
                'path',
                'per_page',
                'prev_page_url',
                'to',
                'total'
            ]);
    }

    /**
     * Client show entity endpoint test
     *
     * @throws \Exception
     */
    public function testShowOneClient()
    {
        $client = factory(Client::class)->create();
        $response = $this->get("api/clients/{$client->id}");
        $response->assertStatus(200)
            ->assertJsonStructure(['data' => ['id', 'name']]);
    }

    /**
     * Client create entity endpoint test
     *
     * @return void
     *
     * @throws \Exception
     */
    public function testCreateAClient()
    {
        $client = factory(Client::class)->make();
        $response = $this->post('api/clients', ['name' => $client->name]);
        $response->assertStatus(200);
        $this->assertDatabaseHas(with(new Client)->getTable(), ['name' => $client->name]);
    }

    /**
     * Client update entity endpoint test
     *
     * @throws \Exception
     */
    public function testUpdateAClient()
    {
        $client = factory(Client::class)->create();
        $newAttributes = (factory(Client::class)->make())->getAttributes();

        $response = $this->patch("api/clients/{$client->id}", $newAttributes);
        $response->assertStatus(200);
        $this->assertDatabaseMissing(with(new Client)->getTable(), $client->getAttributes());
        $this->assertDatabaseHas(with(new Client)->getTable(), $newAttributes);
    }

    /**
     * Client show entity endpoint test
     *
     * @throws \Exception
     */
    public function testDestroyOneClient()
    {
        /** @var Client $client */
        $client = factory(Client::class)->create();
        $response = $this->delete("api/clients/{$client->id}");
        $response->assertStatus(200);
        $this->assertSoftDeleted(with(new Client)->getTable(), $client->getAttributes());
    }
}
