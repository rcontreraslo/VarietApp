<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            $packs = Pack::with('varietat')->with('lot')->with('especie');
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

}
