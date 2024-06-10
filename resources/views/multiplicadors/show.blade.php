<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Multiplicadors') }}
        </h2>
        <a class="btn btn-info" href="{{ route('multiplicadors.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
    </x-slot>
 <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- ////////////////////   CONTINMGUT PAGINA  /////////////////////-->
                <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="card" >
              <div class="card-header" style="font-size:1.15em;">
                <strong>{{$multiplicador->name}}</strong>
              </div>
              <ul class="list-group list-group-flush">
                @if(!empty($multiplicador->mulNIF))<li class="list-group-item"><strong>NIF:</strong>  {{$multiplicador->perCognoms }}</li>@endif
                @if(!empty($multiplicador->mulTelefon))<li class="list-group-item"><strong>Telefon:</strong>  {{$multiplicador->mulTelefon }}</li>@endif
                @if(!empty($multiplicador->mulEmail))<li class="list-group-item"><strong>Email:</strong>  {{$multiplicador->mulEmail }}</li>@endif
                @if(!empty($multiplicador->mulAdreca))<li class="list-group-item"><strong>Adreça:</strong>  {{$multiplicador->mulAdreca }}</li>@endif
                @if(!empty($multiplicador->mulCadastral))<li class="list-group-item"><strong>Cadastral:</strong>  {{$multiplicador->mulCadastral }}</li>@endif
                @if(!empty($multiplicador->municipi))<li class="list-group-item"><strong>Municipi:</strong>    {{$multiplicador->municipi->name}}</li>@endif
                @if(!empty($multiplicador->perTelefon))<li class="list-group-item"><strong>Telefon:</strong>  {{$multiplicador->perTelefon }}</li>@endif
                @if(!empty($multiplicador->mulObservacions))<li class="list-group-item"><strong>Observacions:</strong>  {{$multiplicador->mulObservacions }}</li>@endif
                
                @if(!empty($multiplicador->mulPoligon))<li class="list-group-item"><strong>Poligon:</strong>    {{$multiplicador->mulPoligon}}</li>@endif
                @if(!empty($multiplicador->mulParcela))<li class="list-group-item"><strong>Parcela:</strong>    {{$multiplicador->mulParcela}}</li>@endif
                @if(!empty($multiplicador->mulRecinte))<li class="list-group-item"><strong>Recinte:</strong>    {{$multiplicador->mulRecinte}}</li>@endif
                @if(!empty($multiplicador->mulPersonaContacte))<li class="list-group-item"><strong>Persona Contacte:</strong>    {{$multiplicador->mulPersonaContacte}}</li>@endif
                
              </ul>
              <div class="card-footer text-end">
                <form action="{{ route('multiplicadors.destroy',$multiplicador->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                    <div class="btn-group">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" style="margin-right:2em;"><i class="fa-solid fa-trash-can"></i> Eliminar</button>

                        <a class="btn btn-sm btn-outline-primary" href="{{ route('multiplicadors.edit',$multiplicador->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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