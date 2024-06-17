<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familie;
use App\Http\Requests\FamilieRequest;

class FamilieController extends Controller
{
    //
    public function index()
    {
        //
        //$families = Familie::all();
        if(request()->ajax()) {
            $families = Familie::all();

            return datatables()->of($families)
            //return datatables()->eloquent(Localitat)
            ->addColumn('actions', function ($familie) {
                return '<div class="btn-group">
                <a class="btn btn-outline-secondary btn-sm" href="'. route('families.show',$familie->id).'"><i class="fa-solid fa-eye"></i></a> 
                <a class="btn btn-outline-success btn-sm" href="'.route('families.edit',$familie->id) .'"><i class="fa-regular fa-pen-to-square"></i></a>
                        </div>';})
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
      
        return view('families.index');
    }

    public function create()
    {
        //
        return view('families.create');
    }

    public function store(FamilieRequest $request)
    {
        //
        Familie::create($request->all());
       
        return redirect()->route('families.index')
                        ->with('success','Familia creada amb èxit!');
    }

    public function show(Familie $family)
    {
        //
        return view('families.show',compact('family'));
    }

    public function edit(Familie $family)
    {
        //
        return view('families.edit',compact('family'));
    }

    public function update(FamilieRequest $request, Familie $family)
    {
        //
        $family->update($request->all());
      
        return redirect()->route('families.index')
                        ->with('success','Família modificada amb èxit!');
    }

    public function destroy(Familie $family)
    {
        //
        $family->delete();
       
        return redirect()->route('families.index')
                        ->with('success','Família eliminada!');
    }

    public function restore(Familie $family)
    {
        $family->restore();

        return Redirect::back()->with('success', 'Família restaurada!');
    }
}
