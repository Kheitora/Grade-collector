<?php

namespace App\Http\Controllers;
use App\models\grades;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create(){

            return view('grades.admin');

    }
}
