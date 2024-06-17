<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LotRequest;
use App\Models\Especie;
use App\Models\Varietat;
use App\Models\Mostre;
use App\Models\Lot;
class LotController extends Controller
{
    //

    public function index()
    {
        //
        //$Lots = Lot::all();
        if(request()->ajax()) {
            $lots = Lot::with('mostre')->with('mostre.varietat');
            return datatables()->eloquent($lots)
            ->addColumn('actions', function ($lot) {
                return '<div class="btn-group">
                <a class="btn btn-outline-secondary btn-sm" href="'. route('lots.show',$lot->id).'"><i class="fa-solid fa-eye"></i></a> 
                <a class="btn btn-outline-success btn-sm" href="'.route('lots.edit',$lot->id) .'"><i class="fa-regular fa-pen-to-square"></i></a>
                        </div>';})
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
      
        return view('lots.index');
    }

/****************************************CREATE*************************************/
    
    public function create()
    {
        $mostres = Mostre::orderby('name')->get(['name','id']);
       /* $varietats = Varietat::orderby('name')->get(['name','id']);
        $especies = Especie::orderby('name')->get(['name', 'id']);*/

                return view('lots.create',compact('mostres'));
    }

/***************************************STORE*********************************************************/

 public function store(LotRequest $request)
    {
        //
       // dd($request);
        $mostra = Mostre::where('id',$request->mostre_id)->first();
        $request->request->add(['varietat_id' => $mostra->varietat_id]);
        $nameLot=$request->lotTipus." - ".$mostra->mosAny." | ".$mostra->varietat->name;
        $request->request->add(['name' => $nameLot]);
        $request->request->add(['lotAny' => $mostra->mosAny]);  
        $idLotNew=Lot::create($request->all()); 
      
        return redirect()->route('lots.index')
                        ->with('success','Lot creat amb èxit!');
    }
/************************************SHOW*****************************************/
    
    public function show(Lot $lot)
    {
        //
        return view('lots.show',compact('lot'));
    }
/*******************************EDIT*************************************/
    public function edit(Lot $lot)
    {
        //
      $mostres = Mostre::orderby('name')->get(['name','id']);
      //$varietats = Varietat::orderby('name')->get(['name','id']);
     // $especies = Especie::orderby('name')->get(['name', 'id']);

        return view('lots.edit',compact('lot','mostres'));
    }

/**********************************UPDATE*******************************************/
public function update(LotRequest $request, Lot $lot)
    {
        //
        
      //   $nomVarietat = Varietat::where('id',$request->varietat_id)->first();
      // $nomEspecy = Especie::where('id',$request->especie_id)->first();
        $mostra = Mostre::where('id',$request->mostre_id)->first();
        $request->request->add(['varietat_id' => $mostra->varietat_id]);
        $nameLot=$request->lotTipus." - ".$mostra->mosAny." | ".$mostra->varietat->name;
        $request->request->add(['name' => $nameLot]);
        $request->request->add(['lotAny' => $mostra->mosAny]);

        $lot->update($request->all());
      
        return redirect()->route('lots.index')
                        ->with('success','Lot modificada amb èxit!');
    }

public function destroy(Lot $lot)
    {
        //
        $lot->delete();
       
        return redirect()->route('lots.index')
                        ->with('success','Lot eliminat!');
    }

public function restore(Lot $lot)
    {
        $lot->restore();

        return Redirect::back()->with('success', 'Lot restaurat!');
    }
}

