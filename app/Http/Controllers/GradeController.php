<?php

namespace App\Http\Controllers;
use App\models\grade;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GradeController extends Controller
{

    public function getRouteKeyName(){
        return 'id';
    }

    public function index() {
        $grades = grade::all();


            return view('grades.index', compact('grades'));
    }

    public function admin(){
        return view('grades.admin');

    }

    public function edit(grade $grade){
        return view('grades.update',['grade' => $grade]);
    }

    public function show(grade $grade){
        return view('grades.grade', ['grade' => $grade]);
    }

    public function delete(grade $grade){
        return view('grades.delete', ['grade' => $grade]);
    }

    public function create(Request $request)
    {
        // Validate posted form data
        $validated = $request->validate([
            'grade' => 'required|max:255',
            'subject' => 'required|max:255',

        ]);

        // Create and save post with validated data
        grade::create(request(['grade', 'subject']));

        // Redirect the user to the created post with a success notification
        return redirect('/index');
    }

    public function update(Request $request, grade $grade)
    {

        // Validate posted form data
        $validated = $request->validate([
            'grade' => 'required',
            'subject' => 'required',

        ]);

        if (!$validated) { return redirect('/index');}
        $grade->update($request->all());

        //dd($grade, $request->all());

        // Redirect the user to the created post with an updated notification
        return redirect('/index');

    }

    public function destroy(grade $grade){
            // Delete the specified Post
            $grade->delete();

            // Redirect user with a deleted notification
            return redirect('/index');
    }



}
