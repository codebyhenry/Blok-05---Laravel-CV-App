<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// INCLUDE THE MODEL YOU NEED HERE.
use App\Models\Skill;

class SkillController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skills.create');
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

        // STORE THE PHOTO OUT OF THE INPUT FIELD IN THE STORAGE/APP/PUBLIC/PHOTOS FOLDER.
        $path = $request->file('photo')->store('photos', 'public');

        // STORE THE PATH TO THE PHOTO IN YOUR MODEL SO YOU USE IT IN YOUR BLADE FILES TO FILL THE IMG SRC FIELD.
        $applicant->photo = $path;

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
        // RETRIEVE APPLICANT WITH ID PASSED THROUGH ROUTE OR FAIL.
        $applicant = Applicant::findOrFail($id);

        // RETURN SHOW VIEW BLADE AND PASS THE APPLICANT DATA
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
        // RETRIEVE THE APPLICANT WITH ID PASSED THROUGH ROUTE OR FAIL.
        $applicant = Applicant::findOrFail($id);

        // RETURN THE EDIT VIEW BLADE FILE AND PASS APPLICANT DATA SO IT CAN PREPOPULATE THE EDIT FIELDS.
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
        // RETRIEVE THE APPLICANT MODEL THAT NEEDS TO BE UPDATED.
        $applicant = Applicant::findOrFail($id);

        // UPDATE THE APPLICANT MODEL WITH ALL THE PASSED FIELDS EXCEPT THE _TOKEN.
        $applicant->update($request->except(['photo', '_token']));

        // CHECK IF FILE A FILE HAS BEEN UPLOADED
        if($request->hasFile('photo')){

            // STORE THE NEW FILE AND RETURN THE PATH
            //NOTE THAT WE DIDNT REMOVE THE OLD IMAGE FOR SIMPLICITY SAKE.
            $path = $request->file('photo')->store('photos', 'public');

            // UPDATE THE PHOTO PROPERTY WITH PATH GIVEN.
            $applicant->photo = $path;

            // SAVE MODEL
            $applicant->save();
        }

        // RETURN THE USER TO THE APPLICANTS OVERVIEW.
        return redirect()->route('applicants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // RETRIEVE THE APPLICANT BY USING THE ID PASSED THROUGH THE ROUTE OR FAIL.
        $applicant = Applicant::findOrFail($id);

        // CALL THE DELETE METHOD ON THE MODEL WHICH DELETES THE RECORD.
        $applicant->delete();

        // REDIRECT THE USER TO THE INDEX ROUTE.
        return redirect()->route('applicants.index');
    }
}
