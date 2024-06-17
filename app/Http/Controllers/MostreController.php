<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MostreRequest;
use App\Models\Mostre;
use App\Models\Varietat;
use App\Models\Multiplicador;


class MostreController extends Controller
{
    //
    public function index()
    {
        //
        //$mostres = Mostre::orderBy('id','Desc')->get();
        if(request()->ajax()) {
           
            $mostres = Mostre::with('varietat')->with('multiplicador');

            return datatables()->eloquent($mostres)
            ->addColumn('actions', function ($mostre) {
                return '<div class="btn-group">
                <a class="btn btn-outline-secondary btn-sm" href="'. route('mostres.show',$mostre->id).'"><i class="fa-solid fa-eye"></i></a> 
                <a class="btn btn-outline-success btn-sm" href="'.route('mostres.edit',$mostre->id) .'"><i class="fa-regular fa-pen-to-square"></i></a>
                        </div>';})
            ->rawColumns(['actions'])
            ->addIndexColumn()
            ->make(true);
        }
      
        return view('mostres.index');
    }
/****************************************CREATE*********************************************************/ 
    
    public function create()
    {
        //
        $varietats = Varietat::orderby('name')->get(['name','id']);
        $multiplicadors = Multiplicador::orderby('name')->get(['name','id']);
        return view('mostres.create',compact('varietats','multiplicadors'));
    }

/***************************************STORE*********************************************************/

 public function store(MostreRequest $request)
    {
        //
       // dd($request);
        $nomVarietat = Varietat::where('id',$request->varietat_id)->first();
        $nomMultiplicador = Multiplicador::where('id',$request->multiplicador_id)->first();
        $nomMostra = $request->mosAny." | ".$nomVarietat->name." | ".$nomMultiplicador->name;
        $request->request->add(['name' => $nomMostra]);
               
        $idMostraNew=Mostre::create($request->all()); 
      
        return redirect()->route('mostres.index')
                        ->with('success','Mostre creat amb èxit!');
    }

/************************************SHOW*****************************************/
    
    public function show(Mostre $mostre)
    {
        //
        return view('mostres.show',compact('mostre'));
    }
/*******************************EDIT*************************************/
    public function edit(Mostre $mostre)
    {
        //
      $varietats = Varietat::where('VarAnyBaixa',0)->orderby('name')->get(['name','id']);
        
        $multiplicadors = Multiplicador::orderby('name')->get(['name','id']);
        return view('mostres.edit',compact('mostre','varietats','multiplicadors'));
    }
/**********************************UPDATE*******************************************/
 public function update(MostreRequest $request, Mostre $mostre)
    {
        //
        
        $nomVarietat = Varietat::where('id',$request->varietat_id)->first();
        $nomMultiplicador = Multiplicador::where('id',$request->multiplicador_id)->first();
        $nomMostra = $request->mosAny." | ".$nomVarietat->name." | ".$nomMultiplicador->name;
        $request->request->add(['name' => $nomMostra]);

        $mostre->update($request->all());
      
        return redirect()->route('mostres.index')
                        ->with('success','Mostra modificada amb èxit!');
    }

}
