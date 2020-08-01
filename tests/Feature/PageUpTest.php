<?php

namespace Tests\Feature;

use App\Ministry;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageUpTest extends TestCase
{
    use DatabaseTransactions;

    public function testContractorsPage()
    {
        $response = $this->get('/contractors');

        $response->dumpHeaders();

        $response->dumpSession();

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testMinistryPage()
    {
        $response = $this->get('/ministries');

        $response->assertStatus(200);
    }

    public function testSingleMinistryPage()
    {
        $ministries = Ministry::first();

        $response = $this->get("/ministries/$ministries->shortname");

        $response->assertStatus(200);
    }
}
