<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Espècie: ') }} {{$especy->name }}
        </h2>
        <a class="btn btn-info" href="{{ route('especies.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Tornar a llistat
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="row g-5 mb-4">
                    <div class="col-12">
                        <h2>{{$especy->name }} <span class="badge rounded-pill bg-secondary">{{$especy->espCodi }}</span></h2>
                        <h6>{{$especy->espNomCientific }}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="label">Dades:</div>
                        <dl class="row">
                          <dt class="col-3">Familia</dt>
                          <dd class="col-9">{{$especy->familie->name }}</dd>
                          <dt class="col-3">Sector</dt>
                          <dd class="col-9">{{$especy->espSector }}</dd>
                          <dt class="col-3">Pass. Fitosanitari</dt>
                          <dd class="col-9">@if($especy->passaportFito==1) <i class="fas fa-check-circle text-success"></i> @else <i class="fas fa-times-circle text-danger"></i> @endif</dd>
                          <dt class="col-3">Regulació</dt>
                          <dd class="col-9">{{$especy->espRegulacio }} €/Kg</dd>
                          <dt class="col-3">Declarar Cuiltius</dt>
                          <dd class="col-9">@if($especy->espDeclarCultius==1) <i class="fas fa-check-circle text-success"></i> @else <i class="fas fa-times-circle text-danger"></i> @endif</dd>
                          <dt class="col-3">Num. Llavors/gr.</dt>
                          <dd class="col-9">{{$especy->espNumLlavorsGr }} ll/gr.</dd>
                        </dl>
                    </div>
                    
                    <div class="col-6">
                        <div class="label">Info Germinació:</div>
                        <dl class="row">
                          <dt class="col-5">Interval òptim Germinació (ºC)</dt>
                          <dd class="col-7">{{$especy->espTempGermInterval }}</dd>
                          <dt class="col-5">Temp. òptima Germinació (ºC)</dt>
                          <dd class="col-7">{{$especy->espTempGermOptima }}</dd>
                          <dt class="col-5">Dies Germinació</dt>
                          <dd class="col-7">{{$especy->espDiesGerm}}</dd>
                          <dt class="col-3">Anys Duració</dt>
                          <dd class="col-9">{{$especy->espAnysDuracio }}</dd>
                          <dt class="col-3">% Germinació</dt>
                          <dd class="col-9">{{$especy->espPercGerm }} %</dd>
                          <dt class="col-3">Gr. Reserva</dt>
                          <dd class="col-9">{{$especy->espGrReserva }} gr.</dd>
                          <dt class="col-3">KNO3 Germinació</dt>
                          <dd class="col-9">{{$especy->espKNO3Germ }} gr.</dd>
                        </dl>
                    </div>
                </div>
                <hr class="my-4" />

                <div class="row">
                    
                    <div class="col-12">  
                        <div class="d-flex">
                            <div class="label">Varietats registrades</div>
                            <?php /*<div class="align-self-center ms-auto"><a class="btn btn-outline-success btn-sm rounded-pill" href="{{ route('pots.createmost',$especy->id) }}"><i class="fa-solid fa-plus"></i> Afegir</a></div>*/ ?>
                        </div>
                        
                        
                      
                      
                        <table class="table table-striped table-hover table-bordered table-sm table-responsive dataTable" id="dtmostresvarietat">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Varietat</th>
                                    <th>Codi Varietat</th>
                                    <th width="60px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($especy->varietats as $varietat)

                                <tr>
                                    <td>{{ $varietat->id }}</td>
                                    <td>{{ $varietat->name }}</td>
                                    <td>{{ $varietat->varCodi }}</td>
                                    <td>
                                        <form action="{{ route('varietats.destroy',$varietat->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                                            <div class="btn-group">
                                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('varietats.show',$varietat->id) }}"><i class="fa-solid fa-eye"></i></a>
                                        <!--a class="btn btn-outline-primary btn-sm" href="{{ route('varietats.edit',$varietat->id) }}"><i class="fa-solid fa-pen-to-square"></i></a-->
                                            </div>@csrf
                                            @method('DELETE')
                                            <!--button type="submit" class="btn btn-sm btn-outline-danger rounded-pill" style="margin-left:1em;"><i class="fa-solid fa-trash-can"></i></button-->
                                        
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>  
                    
                </div>

                <hr class="my-4" />

                <div class="d-flex justify-content-end mb-3">
                    <form action="{{ route('especies.destroy',$especy->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                        
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-3" style="margin-right:2em;"><i class="fa-solid fa-trash-can"></i> Eliminar</button>
                            <a class="btn btn-success ms-3" href="{{ route('especies.edit',$especy->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                            <a class="btn btn-info" href="{{ route('especies.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>