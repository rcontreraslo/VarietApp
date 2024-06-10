<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Families fitxa') }}
        </h2>
        <a class="btn btn-info" href="{{ route('families.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
    </x-slot>
     
   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- ////////////////////   CONTINMGUT PAGINA  /////////////////////-->
                <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="card" >
              <div class="card-header" style="font-size:1.15em;">
                <strong>{{$family->name}}</strong>
              </div>
              
              <div class="card-footer text-end">
                <form action="{{ route('families.destroy',$family->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                    <div class="btn-group">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" style="margin-right:2em;"><i class="fa-solid fa-trash-can"></i> Eliminar</button>

                        <a class="btn btn-sm btn-outline-primary" href="{{ route('families.edit',$family->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                    </div>
                </form>
              </div>
            </div>
        </div>
        
    </div>
            </div>
        </div>
    </div>

    
</x-app-layout>