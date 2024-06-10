<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Fitxa Persona:  {{$persone->name}}

        </h2>
        <a class="btn btn-info" href="{{ route('persones.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
    </x-slot>
 <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- ////////////////////   CONTINMGUT PAGINA  /////////////////////-->
                <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="card" >
              <div class="card-header" style="font-size:1.15em;">
                <strong>{{$persone->name}}</strong>
              </div>
              <ul class="list-group list-group-flush">
                @if(!empty($persone->perCognoms))<li class="list-group-item"><strong>Cognoms:</strong>  {{$persone->perCognoms }}</li>@endif
                @if(!empty($persone->perOrganitzacio))<li class="list-group-item"><strong>Organitzacio:</strong>  {{$persone->perOrganitzacio }}</li>@endif
                @if(!empty($persone->perAnyNaixement))<li class="list-group-item"><strong>Any:</strong>  {{$persone->perAnyNaixement }}</li>@endif
                @if(!empty($persone->perVinculacio))<li class="list-group-item"><strong>Vinculacio:</strong>  {{$persone->perVinculacio }}</li>@endif
                @if(!empty($persone->perCP))<li class="list-group-item"><strong>CP:</strong>  {{$persone->perCP }}</li>@endif
                @if(!empty($persone->municipi))<li class="list-group-item"><strong>Municipi:</strong>    {{$persone->municipi->name}}</li>@endif
                @if(!empty($persone->perTelefon))<li class="list-group-item"><strong>CP:</strong>  {{$persone->perTelefon }}</li>@endif
                @if(!empty($persone->perObservacions))<li class="list-group-item"><strong>Observacions:</strong>  {{$persone->perObservacions }}</li>@endif
                
                @if(!empty($persone->perEmail))<li class="list-group-item"><strong>Email:</strong>    {{$persone->perEmail}}</li>@endif
                
                
              </ul>
              <div class="card-footer text-end">
                <form action="{{ route('persones.destroy',$persone->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                    <div class="btn-group">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" style="margin-right:2em;"><i class="fa-solid fa-trash-can"></i> Eliminar</button>

                        <a class="btn btn-sm btn-outline-primary" href="{{ route('persones.edit',$persone->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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