<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// INCLUDE THE MODEL YOU NEED HERE.
use App\Models\Applicant;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //MET JE MODEL KUN JE JE DATA OPHALEN. ER ZIJN MEER FUNCTIES ZOALS DE ALL FUNCTION.
        $applicants = Applicant::all();

        // GEEF JE OPGEHAALDE DATA DOOR AAN JE VIEW FILE. TIP: view('map.map.file', [data])
        return view('applicants.index', ['applicants' => $applicants]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applicants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // CREATE A NEW APPLICANT
        $applicant = Applicant::create($request->except('_token'));

        // USE THE MODEL TO STORE THE DATA INSIDE THE TABLE
        $applicant->save();

        // REDIRECT USER TO THE OVERVIEW
        return redirect()->route('applicants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicant::findOrFail($id);

        return view('applicants.show', ['applicant' => $applicant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $applicant = Applicant::findOrFail($id);

        return view('applicants.edit', ['applicant' => $applicant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $applicant = Applicant::findOrFail($id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $applicant = Applicant::findOrFail($id);

        $applicant->delete();

        return redirect()->route('applicants.index');
    }
}
