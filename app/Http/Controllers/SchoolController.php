<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use Illuminate\Http\Response;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::paginate(15);

        return response()->json($schools, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSchoolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSchoolRequest $request)
    {
        //Validate the request
        $request->validated();

        $schools = School::create([
            'school_name' => $request->school_name,
            'email' => $request->email,
            'primary_phone_number' => $request->primary_phone_number,
            'secondary_phone_number' => $request->secondary_phone_number,
            'physical_address' => $request->physical_address,
            'postal_address' => $request->postal_address
        ]);

        return response()->json($schools, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show($school_id)
    {
        $school = School::findOrFail($school_id);

        return response()->json($school, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSchoolRequest  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSchoolRequest $request, $school_id)
    {
        $request->validated();

        $school = School::where('id', $school_id)->update($request->all());

        return response()->json($school, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy($school_id)
    {
        $school = School::where('id', $school_id)->delete();

        return response()->json($school, Response::HTTP_OK);
    }
}
