<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index',[
            'users' => $users,
        ]);
    }

    public function create(){
        // $action =route('Posts.store');
        return view('users.create');
    }
    public function store(UserRequest $request){
        User::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'password' =>  $request->password,
            'mobile_number' =>  $request->mobile_number,
            'image' =>  $request->image,
            'date_of_birth' =>  $request->date_of_birth,
            'national_id' =>  $request->national_id,
            'gender' =>  $request->gender,
        ]);
        //redirect to /Users
        // return view('users.index');
        return redirect()->route('users.index');
    }
}
