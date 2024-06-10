<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincie;

class ProvincieController extends Controller
{
     public function index()
    {
        //
        //$provincies = Provincie::all();
        if(request()->ajax()) {
            $provincies = Provincie::all();
            return datatables()->of($provincies)
            ->addColumn('actions', function ($provincie) {
                return '<div class="btn-group">
                <a class="btn btn-outline-secondary btn-sm" href="'. route('provincies.show',$provincie->id).'"><i class="fa-solid fa-eye"></i></a> 
                <a class="btn btn-outline-success btn-sm" href="'.route('provincies.edit',$provincie->id) .'"><i class="fa-regular fa-pen-to-square"></i></a>
                        </div>';})
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
      
        return view('provincies.index');
    }
/*************************************CREATE*********************************************/
    
    public function create()
    {
        /*$provincie = Provincie::orderby('name')->get(['name','id']);*/
        //
        return view('provincies.create');
    }

/**************************************STORE*********************************************/
    
    public function store(Request $request)
    {
        //
        Provincie::create($request->all());
       
        return redirect()->route('provincies.index')
                        ->with('success','Provincie creada amb èxit!');
    }

/**********************************SHOW******************************************************/
    
    public function show(Provincie $provincy)
    {
        //
        return view('provincies.show',compact('provincy'));
    }

/**********************************EDIT******************************************************/    
    
    public function edit(Provincie $provincy)
    {
        //
        return view('provincies.edit',compact('provincy'));
    }

/***********************************UPDATE********************************************************/    
    
    public function update(Request $request, Provincie $provincy)
    {
        //
        $provincy->update($request->all());
      
        return redirect()->route('provincies.index')
                        ->with('success','Provincie modificada amb èxit!');
    }
/***********************************DESTROY***********************************************************/
    
    public function destroy(Provincie $provincy)
    {
        //
        $provincy->delete();
       
        return redirect()->route('provincies.index')
                        ->with('success','Provincie eliminada!');
    }
/**********************************RESTORE***************************************************************/

    public function restore(Contact $family)
    {
        $family->restore();

        return Redirect::back()->with('success', 'Família restaurada!');
    }
}
