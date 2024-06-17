<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PackRequest;
use App\Models\Especie;
use App\Models\Varietat;
use App\Models\Lot;
use App\Models\Pack;

class PackController extends Controller
{
    //

     public function index()
    {
        //
        //$packs = pack::all();
        if(request()->ajax()) {
            $packs = Pack::with('lot')->with('lot.varietat');
            return datatables()->eloquent($packs)
            ->addColumn('actions', function ($pack) {
                return '<div class="btn-group">
                <a class="btn btn-outline-secondary btn-sm" href="'. route('packs.show',$pack->id).'"><i class="fa-solid fa-eye"></i></a> 
                <a class="btn btn-outline-success btn-sm" href="'.route('packs.edit',$pack->id) .'"><i class="fa-regular fa-pen-to-square"></i></a>
                        </div>';})
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
      
        return view('packs.index');
    }
/****************************************CREATE*************************************/
    
    public function create()
    {
       // $varietats = Varietat::orderby('name')->get(['name','id']);
        $lots = Lot::get(['name','id']);
        //$especies = Especie::orderby('name')->get(['name', 'id']);

                return view('packs.create',compact('lots'));
    }

/***************************************STORE*********************************************************/

 public function store(PackRequest $request)
    {
        //
       // dd($request);
        $lot = Lot::where('id',$request->lot_id)->first();
        $request->request->add(['varietat_id' => $lot->varietat_id]);
        $gramsTotals=$request->packNumSobres * $request->packGramsSobre;
        $request->request->add(['packTotalGrams' => $gramsTotals]);   
        $idPackNew=Pack::create($request->all()); 
      
        return redirect()->route('packs.index')
                        ->with('success','Pack creat amb èxit!');
    }
/************************************SHOW*****************************************/
    
    public function show(Pack $pack)
    {
        //
        return view('packs.show',compact('pack'));
    }
/*******************************EDIT*************************************/
    public function edit(Pack $pack)
    {
        //
      $lots = Lot::orderby('id')->get(['name','id']);
      //$varietats = Varietat::orderby('name')->get(['name','id']);
     // $especies = Especie::orderby('name')->get(['name', 'id']);

        return view('packs.edit',compact('pack','lots'));
    }

/**********************************UPDATE*******************************************/
public function update(PackRequest $request, Pack $pack)
    {
        //
        
      //   $nomVarietat = Varietat::where('id',$request->varietat_id)->first();
      // $nomEspecy = Especie::where('id',$request->especie_id)->first();
        $lot = Lot::where('id',$request->lot_id)->first();
        $request->request->add(['varietat_id' => $lot->varietat_id]);
        $gramsTotals=$request->packNumSobres * $request->packGramsSobre;
        $request->request->add(['packTotalGrams' => $gramsTotals]);

        $pack->update($request->all());
      
        return redirect()->route('packs.index')
                        ->with('success','Pack modificat amb èxit!');
    }

public function destroy(Pack $pack)
    {
        //
        $pack->delete();
       
        return redirect()->route('packs.index')
                        ->with('success','Pack eliminat!');
    }

public function restore(Pack $pack)
    {
        $pack->restore();

        return Redirect::back()->with('success', 'Pack restaurat!');
    }
}
