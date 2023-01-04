<?php

namespace Tests\Feature;

use App\Models\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreSchoolTest extends TestCase
{
    use RefreshDatabase;
    //Test whether a school can be created
    public function test_that_a_school_can_be_created()
    {
        School::truncate();

        //Send a valid request
        $response = $this->postJson('/api/schools/store', [
            'school_name' => 'Golfview Combined School',
            'email' => 'golfview@gmail.com',
            'primary_phone_number' => '0186547591',
            'secondary_phone_number' => '0836622578',
            'physical_address' => 'Quigley St, Golf View, Mahikeng, 2745',
            'postal_address' => 'Quigley St, Golf View, Mahikeng, 2745'
        ]);

        //Verify that the school has been stored
        $this->assertCount(1, School::all());
    }

    //Test the validation rules for the school
    public function test_the_validation_rules_for_the_school()
    {
        School::truncate();

        //Send a request with no data
        $response = $this->postJson('/api/schools/store');

        $response->assertInvalid([
            'school_name',
            'email',
            'primary_phone_number',
            'secondary_phone_number',
            'physical_address',
            'postal_address'
        ]);
    }

    //Test the validation for the contact numbers
    public function test_that_the_primary_and_secondary_phone_numbers_cannot_be_greater_or_less_than_10()
    {
        School::truncate();

        $response = $this->postJson('/api/schools/store', [
            'school_name' => 'Golfview Combined School',
            'email' => 'golfview@gmail.com',
            //Eleven primary phone numbers
            'primary_phone_number' => '01865475915',
            //Nine primary phone numbers
            'secondary_phone_number' => '083662257',
            'physical_address' => 'Quigley St, Golf View, Mahikeng, 2745',
            'postal_address' => 'Quigley St, Golf View, Mahikeng, 2745'
        ]);

        $response->assertInvalid([
            'primary_phone_number',
            'secondary_phone_number'
        ]);
    }

    //Test that schools can't have numbers in them
    public function test_that_schools_only_contain_alphabets()
    {
        School::truncate();

        $response = $this->postJson('/api/schools/store', [
            //School name with underscores and numerical values
            'school_name' => 'Golfview_Combined_School 101',
            'email' => 'golfview@gmail.com',
            'primary_phone_number' => '0186547591',
            'secondary_phone_number' => '0836622578',
            'physical_address' => 'Quigley St, Golf View, Mahikeng, 2745',
            'postal_address' => 'Quigley St, Golf View, Mahikeng, 2745'
        ]);

        $response->assertInvalid([
            'school_name',
        ]);
    }
}
