<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Fitxa Municipi:  {{$municipi->name}}
        </h2>
        <a class="btn btn-info" href="{{ route('municipis.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
    </x-slot>
<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        
       
   <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="card" >
              <div class="card-header" style="font-size:1.15em;">
                <strong>{{$municipi->name}}</strong>
              </div>
              <ul class="list-group list-group-flush">
                @if(!empty($municipi->munIlla))<li class="list-group-item">{{$municipi->munIlla }}</li>@endif
                @if(!empty($municipi->provincie))<li class="list-group-item">{{$municipi->provincie->name}}</li>@endif
                @if(!empty($municipi->munPais))<li class="list-group-item">{{$municipi->munPais }}</li>@endif
                
              </ul>
              <div class="card-footer text-end">
                <form action="{{ route('municipis.destroy',$municipi->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                    <div class="btn-group">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" style="margin-right:2em;"><i class="fa-solid fa-trash-can"></i> Eliminar</button>

                        <a class="btn btn-success" href="{{ route('municipis.edit',$municipi->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                    </div>
                </form>
              </div>
            </div>
        </div>
        
        
    </div>


          <hr class="my-4">

          
          
              
   
    </div>
</div>
    </div>
   
</x-app-layout>