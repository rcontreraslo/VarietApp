<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multiplicador;
use App\Models\Municipi;
use App\Http\Requests\MultiplicadorRequest;

class MultiplicadorController extends Controller
{
    //

     public function index()
    {
        //
        //$persones = Persone::all();
        if(request()->ajax()) {
            $multiplicadors = Multiplicador::with('municipi');
            return datatables()->eloquent($multiplicadors)
            ->addColumn('actions', function ($multiplicador) {
                return '<div class="btn-group">
                <a class="btn btn-outline-secondary btn-sm" href="'. route('multiplicadors.show',$multiplicador->id).'"><i class="fa-solid fa-eye"></i></a> 
                <a class="btn btn-outline-success btn-sm" href="'.route('multiplicadors.edit',$multiplicador->id) .'"><i class="fa-regular fa-pen-to-square"></i></a>
                        </div>';})
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
      
        return view('multiplicadors.index');
    }

 
/****************************************CREATE*****************************************/
    
    public function create()
    {
        $municipis = Municipi::orderby('name')->get(['name','id']);
                return view('multiplicadors.create',compact('municipis'));
    }


/*************************************STORE****************************************/
    
    public function store(MultiplicadorRequest $request)
    {
        Multiplicador::create($request->all());
       
        return redirect()->route('multiplicadors.index')
                        ->with('success','Persona creada amb èxit!');
    }

/***************************************SHOW***************************************/
    
    public function show(Multiplicador $multiplicador)
    {
         return view('multiplicadors.show',compact('multiplicador'));
    }

/****************************************EDIT**************************************/
    
    public function edit(Multiplicador $multiplicador)
    {
        $municipis = Municipi::orderby('name')->get(['name','id']);
                return view('multiplicadors.edit',compact('municipis','multiplicador'));
    }

/****************************************UPDATE***********************************/
    
    public function update(MultiplicadorRequest $request, Multiplicador $multiplicador)
    {
        $multiplicador->update($request->all());
      
        return redirect()->route('multiplicadors.index')
                        ->with('success','Persona modificada amb èxit!');
    }

/**************************************DESTROY***********************************/
    
    public function destroy(Multiplicador $multiplicador)
    {
        $multiplicador->delete();
       
        return redirect()->route('multiplicadors.index')
                        ->with('success','Persona eliminada!');
    }

/****************************************RESTORE**********************************/
   
    public function restore(Multiplicador $multiplicador)
    {
        $multiplicador->restore();

        return Redirect::back()->with('success', 'Persona restaurada!');
    }
}






