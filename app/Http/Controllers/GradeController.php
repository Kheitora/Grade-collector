<?php

namespace App\Http\Controllers;
use App\models\grades;

class GradeController extends Controller
{
    public function index() {
        $grades = grades::all();

        return view('grades.index', compact('grades'));
    }
}
