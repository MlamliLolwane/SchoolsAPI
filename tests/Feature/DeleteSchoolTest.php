<?php

namespace Tests\Feature;

use App\Models\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteSchoolTest extends TestCase
{
    use RefreshDatabase;

    public function test_school_can_be_deleted()
    {
        School::truncate();

        //Create 10 schools
        School::factory()->count(10)->create();

        //Verify that exactly 10 schools were created
        $this->assertCount(10, School::all());

        //Delete the 10th school
        $this->deleteJson('/api/schools/delete/10');
        dd(School::all());
        //Verify that exactly 9 schools are left
        $this->assertCount(9, School::all());
    }
}
