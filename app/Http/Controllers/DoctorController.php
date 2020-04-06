<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
class DoctorController extends Controller
{
    public function index()
    {

        $doctors = Doctor::paginate(4);
        // $posts = Post::all();

        return view('doctors.index', [
            'doctors' => $doctors,
        ]);
    }
   
}
