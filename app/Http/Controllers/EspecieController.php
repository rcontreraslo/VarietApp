<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familie;
use App\Models\Especie;

class EspecieController extends Controller
{
    //
    public function index()
    {
        //
        //$especies = Especie::all();
        if(request()->ajax()) {
            $especies = Especie::with('familie');
            return datatables()->eloquent($especies)
            ->addColumn('actions', function ($especie) {
                return '<div class="btn-group">
                <a class="btn btn-outline-secondary btn-sm" href="'. route('especies.show',$especie->id).'"><i class="fa-solid fa-eye"></i></a> 
                <a class="btn btn-outline-success btn-sm" href="'.route('especies.edit',$especie->id) .'"><i class="fa-regular fa-pen-to-square"></i></a>
                        </div>';})
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
      
        return view('especies.index');
    }

/*************************************CREATE*********************************************/
    
    public function create()
    {
        //
        $families = Familie::orderby('name')->get(['name','id']);
        return view('especies.create',compact('families'));
    } 

 /*************************************STORE*********************************************/ 
    
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
        ]);
      
        Especie::create($request->all());
       
        return redirect()->route('especies.index')
                        ->with('success','Espècie creada amb èxit!');
    }

/**************************************SHOW***************************************************/

    public function show(Especie $especy)
    {
        //
        return view('especies.show',compact('especy'));
    }

/*******************************************EDIT*********************************************/
     public function edit(Especie $especy)
    {
        //
        $families = Familie::orderby('name')->get(['name','id']);
        return view('especies.edit',compact('especy','families'));
    }

/*************************************UPDATE********************************/

    public function update(Request $request, Especie $especy)
    {
        //
        /*$request->validate([
            'name' => 'required',
        ]);*/
      
        $especy->update($request->all());
      
        return redirect()->route('especies.index')
                        ->with('success','Espècie modificada amb èxit!');
    }

 /************************************RESTORE************************************************/
    
    public function restore(Especie $especy)
    {
        $especy->restore();

        return Redirect::back()->with('success', 'Espècie restaurada!');
    }   

}
