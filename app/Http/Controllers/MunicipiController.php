<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipi;
use App\Models\Provincie;
use App\Http\Requests\MunicipiRequest;

class MunicipiController extends Controller
{
    //
public function index()
    {
        //
        //$municipis = Municipi::all();
        if(request()->ajax()) {
            $municipis = Municipi::with('provincie');
            return datatables()->eloquent($municipis)
            ->addColumn('actions', function ($municipi) {
                return '<div class="btn-group">
                <a class="btn btn-outline-secondary btn-sm" href="'. route('municipis.show',$municipi->id).'"><i class="fa-solid fa-eye"></i></a> 
                <a class="btn btn-outline-success btn-sm" href="'.route('municipis.edit',$municipi->id) .'"><i class="fa-regular fa-pen-to-square"></i></a>
                        </div>';})
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
      
        return view('municipis.index');
    }

/*****************************CREATE****************************************/
public function create()
    {
        //
    
    $provincies = Provincie::orderby('name')->get(['name','id']);

        return view('municipis.create',compact('provincies'));
    }
    
/*****************************STORE********************************************/
 public function store(MunicipiRequest $request)
    {
        //
        Municipi::create($request->all());
       
        return redirect()->route('municipis.index')
                        ->with('success','Municipi creat amb èxit!');
    }

/****************************SHOW***********************************************/
public function show(Municipi $municipi)
    {
        //
        return view('municipis.show',compact('municipi'));
    }

/******************************EDIT**************************************************/
public function edit(Municipi $municipi)
    {
        //
        $provincies = Provincie::orderby('name')->get(['name','id']);
        
        return view('municipis.edit',compact('municipi','provincies'));
    }

/********************************UPDATE**********************************************/
    public function update(MunicipiRequest $request, Municipi $municipi)
    {
        //
        $municipi->update($request->all());
      
        return redirect()->route('municipis.index')
                        ->with('success','Municipi modificat amb èxit!');
    }
/***************************************DESTROY*************************************/
    public function destroy(Municipi $municipi)
    {
        //
        $municipi->delete();
       
        return redirect()->route('municipis.index')
                        ->with('success','Municipi eliminat!');
    }

    
     


}
