<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            $lots = Lot::with('mostre')->with('varietat')->with('especie');
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


}

