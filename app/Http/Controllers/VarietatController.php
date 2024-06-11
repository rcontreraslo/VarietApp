<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VarietatRequest;
use App\Models\Varietat;
use App\Models\Persone;
use App\Models\Especie;
use Barryvdh\DomPDF\Facade\Pdf;

class VarietatController extends Controller
{
    public function index()
    {
        //
        //$varietats = Varietat::all();
        if(request()->ajax()) {
            $varietats = Varietat::with('especie')->with('especie.familie')->with('persone');

            return datatables()->eloquent($varietats)

            ->addColumn('img', function ($varietat) {
                if(!empty($varietat->varCodiBarresImg)) { $imgsrc="/img/varietats/".$varietat->varCodiBarresImg; }else{ $imgsrc="//via.placeholder.com/600x300"; }
                return '<img src="'.$imgsrc.'" class="img-fluid" style="max-width:96px"/>';})
            ->editColumn('varAnyBaixa', function ($varietat) {
                if($varietat->varAnyBaixa>0) { $stildot="text-danger"; $act="no"; }else{ $stildot="text-success";  $act="si";}
                $estatt = '<span class="fa-solid fa-circle '.$stildot.'"><span class="invisible">'.$act.'</span></span>';
                return [
                          'display' => $estatt,
                          'ordena' => $varietat->varAnyBaixa
                       ];
                })
            
            ->addColumn('actions', function ($varietat) {
                return '<div class="btn-group">
                <a class="btn btn-outline-secondary btn-sm" href="'. route('varietats.show',$varietat->id).'"><i class="fa-solid fa-eye"></i></a> 
                <a class="btn btn-outline-success btn-sm" href="'.route('varietats.edit',$varietat->id) .'"><i class="fa-regular fa-pen-to-square"></i></a>
                        </div>';})
            
            ->escapeColumns([])
            ->addIndexColumn()
            ->make(true);
        }
      
        return view('varietats.index');
    }

    public function create()
    {

        //
        $especies = Especie::orderby('name')->get(['name','id']);
        $informants = Persone::where('perVinculacio','Informant')->orderby('name')->get(['name','perCognoms','id']);
        return view('varietats.create',compact('especies','informants'));
    }

    public function store(VarietatRequest $request)
    {
        //
        
       
        
        
       // $varCodiBarresImg = Varietat::orderby('varCodi','Desc')->first();
      //  $varCodiBarresImg=$varCodiBarresImg->varCodiBarresImg+1;
        //$imageName = time().'.'.$request->image->extension();  
        if(!empty($request->image)){
            $imageName = $request->name.'-'.$request->image->getClientOriginalName();  
            $request->image->move(public_path('img/varietats'), $imageName);
            $request->request->add(['varCodiBarresImg' => $imageName]);
        }

        $request->request->add(['varAnyBaixa' => 0]);
        $varietatNew=Varietat::create($request->all());
       
        return redirect()->route('varietats.index')
                        ->with('success','Varietat creada amb èxit!');
    }

    public function show(Varietat $varietat)
    {
        //
        return view('varietats.show',compact('varietat'));
    }

    public function edit(Varietat $varietat)
    {
        //
        $especies = Especie::orderby('name')->get(['name','id']);
        $informants = Persone::where('perVinculacio','Informant')->orderby('name')->get(['name','perCognoms','id']);
        return view('varietats.edit',compact('varietat','especies'));
    }

    public function update(VarietatRequest $request, Varietat $varietat)
    {
        //
        
            /*$request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
          
            $imageName = $request->image->getClientOriginalName(); 
           
            $request->image->move(public_path('img/varietats'), $imageName);

            $request->request->add(['Imatge' => $imageName]);*/
         if($request->image != ''){        
              $path = public_path('img/varietats/');

              //code for remove old file
              if($varietat->varCodiBarresImg != ''  && $varietat->varCodiBarresImg != null){
                   $file_old = $path.$varietat->varCodiBarresImg;
                   unlink($file_old);
              }

              //upload new file
              
              $filename = $varietat->varCodi.'-'.$request->image->getClientOriginalName(); 
              $request->image->move($path, $filename);

              //for update in table
              $varietat->update(['varCodiBarresImg' => $filename]);
         }
            

        $varietat->update($request->all());
      
        return redirect()->route('varietats.show',['varietat' => $varietat->id])
                        ->with('success','Varietat modificada amb èxit!');

    }

    public function destroy(Varietat $varietat)
    {
        //
        $varietat->delete();
       
        return redirect()->route('varietats.index')
                        ->with('success','Varietat eliminada!');
    }

    public function restore(Varietat $varietat)
    {
        $varietat->restore();

        return Redirect::back()->with('success', 'Varietat restaurada!');
    }


    public function imatgeVarietat($imatge,  Request $request) 
    {
        // any checks...
        $resource = ObjectImage::find($imatge);

        return response()->file(Storage::path($resource->path));
        //image path saved in table column "path"
    }

}
