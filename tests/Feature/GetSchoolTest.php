<?php

namespace Tests\Feature;

use App\Models\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetSchoolTest extends TestCase
{
    //Get all schools from the database
    public function test_that_all_schools_can_be_retrieved_from_the_database()
    {
        School::truncate();

        //Create 15 schools (pagination)
        School::factory(15)->create();

        //Assert that the schools were created
        $this->assertCount(15, School::all());
        
        //Retrieve the schools from the database
        $schools = $this->getJson('/api/schools/index');
        
        //Assert that exactly 15 records were retrieved from the database
        $schools->assertJsonCount(15, 'data');
    }

    //Get a specific school from the database
    public function test_that_a_school_can_be_retrieved_by_id()
    {
        School::truncate();

        //Create 10 schools
        School::factory(10)->create();

        //Create the 11th school with custom data
        School::factory()->create([
            'school_name' => 'Golfview Combined School',
            'email' => 'golfview@gmail.com',
            'primary_phone_number' => '0186547591',
            'secondary_phone_number' => '0836622578',
            'physical_address' => 'Quigley St, Golf View, Mahikeng, 2745',
            'postal_address' => 'Quigley St, Golf View, Mahikeng, 2745'
        ]);

        //Retrieve the 11th school from the database
        $school = $this->getJson('/api/schools/show/11');
        
        $school->assertJson([
            'school_name' => 'Golfview Combined School',
            'email' => 'golfview@gmail.com',
            'primary_phone_number' => '0186547591',
            'secondary_phone_number' => '0836622578',
            'physical_address' => 'Quigley St, Golf View, Mahikeng, 2745',
            'postal_address' => 'Quigley St, Golf View, Mahikeng, 2745'
        ]);
    }

    //Test that no school is returned when an invalid id is provided
    public function test_that_no_school_is_returned_if_an_invalid_id_is_provided()
    {
        School::truncate();

        //Create 10 schools
        School::factory(10)->create();

        //Ensure that there are only 10 schools in the database
        $this->assertCount(10, School::all());

        //Try retrieving the 11th school from the database
        $school = $this->getJson('/api/schools/show/11');

        //Assert that the response is not found
        $school->assertStatus(404);
    }
}
