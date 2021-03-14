<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetRankingtest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $rankings = DB::table('rankings')->get();
        $response = $this->get('api/point');
        $response->assertStatus(200);
        $response->assertJson([
            'rankings' => $rankings
        ]);

        // $response = $this->get('/');

        // $response->assertStatus(200);
    }
}
