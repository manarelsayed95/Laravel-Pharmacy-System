<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Medicine;

class MedicineController extends Controller
{
    public function index()
    {

        $medicines = Medicine::paginate(4);
        return view('medicines.index', [
            'medicines' => $medicines,
        ]);
        
    }

    public function show()
    {
        $request = request();
        $medicineId = $request->medicine;

       
        $medicine = Medicine::find($medicineId);
        
        return view('medicines.show',[
            'medicine' => $medicine,
            
        ]);
    }

    public function create()
    {   
        return view('medicines.create');
    }
  
    public function store()
    {
        $request=request();
        $request->validate([
            'name' => 'required|unique:medicines|max:255',
            'price' => 'required',
            'type' => 'required',
            'quantity' => 'required',
        ]);
        Medicine::create([
            'name'=> $request->name,
            'quantity'=> $request->quantity,
            'type'=> $request->type,
            'price'=> $request->price,
        ]);
        return redirect('/medicines');
    }

    public function destroy()
    {
        $request=request();
        $medicineId= $request->medicine;
        Medicine::find($medicineId)->delete();
        return redirect('/medicines');
    }
   
}
