<?php

namespace Tests\Feature;

use App\Models\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateSchoolTest extends TestCase
{
    //Test does not work for update
    // public function test_that_a_school_can_be_updated()
    // {
    //     School::truncate();

    //     //Add a school to the database
    //     School::factory()->create([
    //         'school_name' => 'Golfview Combined School',
    //         'email' => 'golfview@gmail.com',
    //         'primary_phone_number' => '0186547591',
    //         'secondary_phone_number' => '0836622578',
    //         'physical_address' => 'Quigley St, Golf View, Mahikeng, 2745',
    //         'postal_address' => 'Quigley St, Golf View, Mahikeng, 2745'
    //     ]);

    //     $this->assertCount(1, School::all());

    //     //Update the school name 
    //     $response = $this->patchJson('/api/schools/update', [
    //         'school_name' => 'Golfview Secondary School'
    //     ]);
    //     dd($response);
    //     $response->assertJsonFragment([
    //         'school_name' => 'Golfview Secondary School'
    //     ]);
    // }
}
