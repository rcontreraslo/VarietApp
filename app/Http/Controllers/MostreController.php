<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Varietat;
use App\Models\Mostre;
use App\Models\Persone;
use App\Models\Multiplicador;

class MostreController extends Controller
{
    //
    public function index()
    {
        //
        //$mostres = Mostre::orderBy('id','Desc')->get();
        if(request()->ajax()) {
           
            $mostres = Mostre::with('varietat')->with('persone')->with('multiplicador');

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
        $varietats = Varietat::where('VarAnyBaixa',0)->orderby('name')->get(['name','id']);
        $persones = Persone::orderby('name')->get(['name','id']);
        $multiplicadors = Multiplicador::orderby('name')->get(['name','id']);
        return view('mostres.create',compact('varietats','persones','multiplicadors'));
    }

/************************************************************************************************/

 public function store(Request $request)
    {
        //
        /*$request->validate([
            'NumMostre' => 'required',
            'varietat_id' => 'required',
        ]);*/
        //dd($request);
        $nomFinca = Persone::where('id',$request->persone_id)->first();
        $nomVarietat = Varietat::where('id',$request->varietat_id)->first();
        $nomMostra = $request->AnyRecoleccio." | ".$nomVarietat->name." | ".$nomFinca->NomPersona;
        $request->request->add(['name' => $nomMostra]);
        $idMostraNew=Mostre::create($request->all());
       
        return redirect()->route('mostres.show',['mostre' => $idMostraNew->id])
                        ->with('success','Mostre creat amb èxit!');
    }

}
