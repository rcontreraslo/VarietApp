<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' especies') }}
        </h2>
        <a class="btn btn-info" href="{{ route('especies.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
    </x-slot>
 <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- ////////////////////   CONTINMGUT PAGINA  /////////////////////-->
                <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3">
            <div class="card" >
              <div class="card-header" style="font-size:1.15em;">
                <strong>{{$especy->name}}</strong>
              </div>
              <ul class="list-group list-group-flush">
                @if(!empty($especy->name))<li class="list-group-item"><strong>Especie Codi:</strong>  {{$especy->name }}</li>@endif
                @if(!empty($especy->espNomCientific))<li class="list-group-item"><strong>Nom Cientific:</strong>  {{$especy->espNomCientific }}</li>@endif
                @if(!empty($especy->passaportFito))<li class="list-group-item"><strong>Familia:</strong>  {{$especy->passaportFito }}</li>@endif
                @if(!empty($especy->mulAdreca))<li class="list-group-item"><strong>Passaport:</strong>  {{$especy->mulAdreca }}</li>@endif
                @if(!empty($especy->espRegulacio))<li class="list-group-item"><strong>Regulacio:</strong>  {{$especy->espRegulacio }}</li>@endif
                @if(!empty($especy->espTempGermOptima))<li class="list-group-item"><strong>Temperatura Germinacio Optim:</strong>    {{$especy->espTempGermOptima }}</li>@endif
                @if(!empty($especy->espTempGermInterval))<li class="list-group-item"><strong>Temperatura Germinacio Interval:</strong>  {{$especy->espTempGermInterval }}</li>@endif
                @if(!empty($especy->espDiesGerm))<li class="list-group-item"><strong>Dies Germinacio:</strong>  {{$especy->espDiesGerm }}</li>@endif
                
                @if(!empty($especy->espAnysDuracio))<li class="list-group-item"><strong>Anys Duracio:</strong>    {{$especy->espAnysDuracio}}</li>@endif
                @if(!empty($especy->espPercGerm))<li class="list-group-item"><strong>Germinacio:</strong>    {{$especy->espPercGerm}}</li>@endif
                @if(!empty($especy->espGrReserva))<li class="list-group-item"><strong>Germinació Reserva:</strong>    {{$especy->espGrReserva}}</li>@endif
                @if(!empty($especy->espKNO3Germ))<li class="list-group-item"><strong>Germinació KN03:</strong>    {{$especy->espKNO3Germ}}</li>@endif
                @if(!empty($especy->espNumLlavorsGr))<li class="list-group-item"><strong>Numero Llavors:</strong>    {{$especy->espNumLlavorsGr}}</li>@endif
                @if(!empty($especy->espDeclarCultius))<li class="list-group-item"><strong>Declarar Cultius:</strong>    {{$especy->espDeclarCultius}}</li>@endif

              </ul>
              <div class="card-footer text-end">
                <form action="{{ route('especies.destroy',$especy->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                    <div class="btn-group">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" style="margin-right:2em;"><i class="fa-solid fa-trash-can"></i> Eliminar</button>

                        <a class="btn btn-sm btn-outline-primary" href="{{ route('especies.edit',$especy->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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