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
   
}
