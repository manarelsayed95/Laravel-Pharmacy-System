<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
{
    public function index()
    {

        $doctors = Doctor::paginate(2);
        // $doctors = Doctor::all();

        return view('doctors.index', [
            'doctors' => $doctors,
        ]);
        
    }

    public function show()
    {
        $request = request();
        $doctorId = $request->doctor;

       
        $doctor = Doctor::find($doctorId);
        
        return view('doctors.show',[
            'doctor' => $doctor,
            
        ]);
    }



    public function create()
    {
        $pharmacies = Pharmacy::all();

        return view('doctors.create', [
            'pharmacies' => $pharmacies
        ]);
    }

    public function store(StorePostRequest $request)
    {
        //get the request data
        // $request = request(); replaced with storePostRequest


        // $validatedData = $request->validate([
        //     'title'=>'required|min:3|unique:posts',
        //     'description' =>'required|min:10'
        // ],[
        //     // to overide validation message
        //     'title.min' => 'The title has to be more than 3 characters'
        // ]);
        //store the request data in the db
        $request->only('title', 'description', 'user_id');
        Post::create([
            'title' => $request->title,
            'description' =>  $request->description,
            'user_id' =>  $request->user_id,
        ]);

        //redirect to /posts
        return redirect()->route('posts.index');
    }

   
}



