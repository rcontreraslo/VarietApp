<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepersoneRequest;
use App\Models\Persone;
use App\Models\Municipi;
use Illuminate\Http\Request;

class PersoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$persones = Persone::all();
        if(request()->ajax()) {
            $persones = Persone::with('municipi');
            return datatables()->eloquent($persones)
            ->addColumn('actions', function ($persone) {
                return '<div class="btn-group">
                <a class="btn btn-outline-secondary btn-sm" href="'. route('persones.show',$persone->id).'"><i class="fa-solid fa-eye"></i></a> 
                <a class="btn btn-outline-success btn-sm" href="'.route('persones.edit',$persone->id) .'"><i class="fa-regular fa-pen-to-square"></i></a>
                        </div>';})
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
      
        return view('persones.index');
    }

/****************************************CREATE*************************************/
    
    public function create()
    {
        $municipis = Municipi::orderby('name')->get(['name','id']);
                return view('persones.create',compact('municipis'));
    }

/*************************************STORE****************************************/
    
    public function store(StorepersoneRequest $request)
    {
        Persone::create($request->all());
       
        return redirect()->route('persones.index')
                        ->with('success','Persona creada amb èxit!');
    }

/***************************************SHOW***************************************/
    
    public function show(Persone $persone)
    {
         return view('persones.show',compact('persone'));
    }

/****************************************EDIT**************************************/
    
    public function edit(Persone $persone)
    {
        $municipis = Municipi::orderby('name')->get(['name','id']);
                return view('persones.edit',compact('municipis','persone'));
    }

/****************************************UPDATE***********************************/
    
    public function update(Request $request, Persone $persone)
    {
        $persone->update($request->all());
      
        return redirect()->route('persones.index')
                        ->with('success','Persona modificada amb èxit!');
    }

/**************************************DESTROY***********************************/
    
    public function destroy(Persone $persone)
    {
        $persone->delete();
       
        return redirect()->route('persones.index')
                        ->with('success','Persona eliminada!');
    }

/****************************************RESTORE**********************************/
   
    public function restore(Persone $persone)
    {
        $persone->restore();

        return Redirect::back()->with('success', 'Persona restaurada!');
    }
}

