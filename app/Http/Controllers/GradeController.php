<?php

namespace App\Http\Controllers;
use App\models\grade;
use Illuminate\Http\Request;
use App\models\user;
use App\models\login_attempts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


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

    public function status($id){
        $status = grade::where('id', '=', $id)->first();

        if ($status->status == '1'){
            $status = '0';
        }else{
            $status = '1';
        }

        $values = array('status' => $status);
        DB::table('grades')->where('id', '=', $id)->update($values);
        return back();

    }


    public function profile(user $user){
        $user = Auth::user();
        return view('grades.profile', ['user' => $user]);
    }

    public function edit(grade $grade){
        return view('grades.update',['grade' => $grade]);
    }

    public function show(grade $grade){
        return view('grades.grade', ['grade' => $grade]);
    }

    public function userdata(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
        ]);

        $input = $request->only('name','email');
        $user = Auth::user();
        $user->update($input);

        return back();
    }

    public function filter(Request $request, grade $grade){

        $fail = grade::where('grade', '<', '5')->get();
        $pass = grade::where('grade', '>=', '5')->get();

        $grades = grade::all();

        if (request('filter') == 'passing-grade'){

            return view('grades.searchedpass', compact('pass', 'grades'));

        }

        if (request('filter') == 'failing-grade'){

            return view('grades.searchedfail', compact('fail', 'grades'));

        }


    }

    public function secret(){
        $userid = auth()->id();
        $attempt = login_attempts::where('user_id', '=', $userid)->get();

        $count = $attempt->count();

        if ($count >= 3) {
            return view ('grades.secret');
        }else{
            return redirect ('/index');
        }

    }

    public function delete(grade $grade){
        return view('grades.delete', ['grade' => $grade]);
    }

    public function create(Request $request){

        $validated = $request->validate([
            'grade' => 'required|integer|min:1|max:10',
            'subject' => 'required|alpha|min:1|max:25',

        ]);

        grade::create(request([
            'grade', 'subject'
        ]));

        return redirect('/index');
    }


    public function search(grade $grade){
        $search = \Illuminate\Support\Facades\Request::input ( 'search' );
        $grade = grade::where ( 'grade', 'LIKE', '%' . $search . '%' )->get();

        return view ( 'grades.searched', compact('grade'));
    }



    public function update(Request $request, grade $grade){

        $validated = $request->validate([
            'grade' => 'required|integer|min:1|max:10',
            'subject' => 'required|alpha|min:1|max:25',
        ]);

        if (!$validated) { return redirect('/index');}
        $grade->update($request->all());

        return redirect('/index');

    }

    public function destroy(grade $grade){
            $grade->delete();

            return redirect('/index');
    }

    public function userlogin(){
        $users = auth()->id();


            login_attempts::create([
                'user_id'=>$users,
            ]);

            return redirect('/index');

    }



}
