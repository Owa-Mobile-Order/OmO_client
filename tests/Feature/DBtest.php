<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DBtest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     */
    public function test_example(): void
    {
        $result = DB::select('SELECT * FROM `student_codes` WHERE `code` = 12345678');

        $this->assertEmpty($result);
    }
}
