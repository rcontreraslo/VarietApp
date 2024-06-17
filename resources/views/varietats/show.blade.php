<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Varietat: ') }} {{$varietat->name }}
        </h2>
        <a class="btn btn-info" href="{{ route('varietats.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Tornar a llistat
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="row g-5 mb-4">
                    <div class="col-10">
                        <h2>{{$varietat->name }} <span class="badge rounded-pill bg-secondary">{{$varietat->varCodi }}</span></h2>
                        <h5>{{$varietat->varNomOficial }}</h5>
                        <h6>{{$varietat->varNomCientific }}</h6>
                    </div>
                    <div class="col-2">
                        <?php if(!empty($varietat->varCodiBarresImg)) { $imgsrc="/img/varietats/".$varietat->varCodiBarresImg; }else{ $imgsrc="//via.placeholder.com/600x300"; } ?>
                <img src="{{$imgsrc}}" class="img-fluid"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="label">Dades:</div>
                        <dl class="row">
                          <dt class="col-3">Espècie</dt>
                          <dd class="col-9">{{$varietat->especie->name }}</dd>
                          <dt class="col-3">Categoria</dt>
                          <dd class="col-9">{{$varietat->varCategoria }}</dd>
                          <dt class="col-3">Preu/Llavor</dt>
                          <dd class="col-9">{{$varietat->varPreuLlavor }} €/Kg</dd>
                          <dt class="col-3">Preu/Fruit</dt>
                          <dd class="col-9">{{$varietat->varPreuFruit }} €/Kg</dd>
                        </dl>
                        <div class="label">Descripció:</div>
                        <p>{{$varietat->varDescripcio }}</p>
                        <div class="label">Observacions:</div>
                        <p>{{$varietat->varObservacions }}</p>
                    </div>
                    
                    <div class="col-6">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button class="nav-link label active" id="origen-tab" data-bs-toggle="tab" data-bs-target="#origen" type="button" role="tab" aria-controls="origen" aria-selected="true">Origen</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link label" id="tipologia-tab" data-bs-toggle="tab" data-bs-target="#tipologia" type="button" role="tab" aria-controls="tipologia" aria-selected="false">Tipologia</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link label" id="agronomica-tab" data-bs-toggle="tab" data-bs-target="#agronomica" type="button" role="tab" aria-controls="agronomica" aria-selected="false">Info. Agronòmica</button>
                          </li>
                        </ul>

                        <div class="tab-content" style="border-left:1px solid #d5d5d5">
                          <div class="tab-pane p-3 active" id="origen" role="tabpanel" aria-labelledby="origen-tab" tabindex="0">
                            <dl class="row">
                              <dt class="col-3">Any Entrada</dt>
                              <dd class="col-9">{{$varietat->varOriAny }}</dd>
                              <dt class="col-3">Informant</dt>
                              <dd class="col-9">{{$varietat->persone->name }} {{$varietat->persone->perCognoms }}</dd>
                            </dl>
                          </div>
                          <div class="tab-pane p-3" id="tipologia" role="tabpanel" aria-labelledby="tipologia-tab" tabindex="0">
                            <dl class="row">
                              <dt class="col-3">Registre</dt>
                              <dd class="col-9">{{$varietat->varTipRegistre}}</dd>
                              <dt class="col-3">Cat. Balear</dt>
                              <dd class="col-9">{{$varietat->varTipCataleg}}</dd>
                              <dt class="col-3">Decl. de cultiu</dt>
                              <dd class="col-9">{{$varietat->varTipDeclaracio}}</dd>
                            </dl>
                          </div>
                          <div class="tab-pane p-3" id="agronomica" role="tabpanel" aria-labelledby="agroniomica-tab" tabindex="0">
                            <dl class="row">
                              <dt class="col-4">Cicle</dt>
                              <dd class="col-8">{{$varietat->varAgrCicle}}</dd>
                              <dt class="col-4">Precocitat</dt>
                              <dd class="col-8">{{$varietat->varAgrPrecocitat}}</dd>
                              <dt class="col-4">Alt Rendiment</dt>
                              <dd class="col-8">{{$varietat->varAgrAltRendiment}}</dd>
                              <dt class="col-4">Tol. Sequera</dt>
                              <dd class="col-8">{{$varietat->varAgrToleranciaSequera}}</dd>
                              <dt class="col-4">Bona postcollita</dt>
                              <dd class="col-8">{{$varietat->varAgrPostcollita}}</dd>
                              <dt class="col-4">Consell Professionals</dt>
                              <dd class="col-8">{{$varietat->varAgrConsellProfessionals}}</dd>
                              <dt class="col-4">Cons. Hort/Balco</dt>
                              <dd class="col-8">{{$varietat->varAgrRecomanaHortBalco}}</dd>
                              <dt class="col-4">Cons. Sembra Directa</dt>
                              <dd class="col-8">{{$varietat->varAgrConsellSembra}}</dd>
                              <dt class="col-4">Profunditat Sembra</dt>
                              <dd class="col-8">{{$varietat->varAgrCmSembra}}</dd>
                              <dt class="col-4">Marc Plantació</dt>
                              <dd class="col-8">{{$varietat->varAgrMarcPlantacio}}</dd>
                              <dt class="col-4">Sembra</dt>
                              <dd class="col-8">{{$varietat->varAgrSembraIni}} a {{$varietat->varAgrSembraFin}}</dd>
                              <dt class="col-4">Collita</dt>
                              <dd class="col-8">{{$varietat->varAgrCollitaIni}} a {{$varietat->varAgrCollitaFin}}</dd>
                              <dt class="col-4">Seguiment (info Tec)</dt>
                              <dd class="col-8">{{$varietat->varAgrSeguiment}}</dd>
                            </dl>
                          </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />

                <div class="row">
                    
                    <div class="col-12">  
                        <div class="d-flex">
                            <div class="label">Mostres registrades</div>
                            <?php /*<div class="align-self-center ms-auto"><a class="btn btn-outline-success btn-sm rounded-pill" href="{{ route('pots.createmost',$especy->id) }}"><i class="fa-solid fa-plus"></i> Afegir</a></div>*/ ?>
                        </div>
                        
                        
                      
                      
                        <table class="table table-striped table-hover table-bordered table-sm table-responsive dataTable" id="dtmostresvarietat">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Mostra</th>
                                    <th>Multiplicador</th>
                                    <th>Any</th>
                                    <th width="60px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($varietat->mostres as $mostre)

                                <tr>
                                    <td>{{ $mostre->id }}</td>
                                    <td>{{ $mostre->name }}</td>
                                    <td>{{ $mostre->multiplicador->name }}</td>
                                    <td>{{ $mostre->mosAny }}</td>
                                    <td>
                                        <form action="{{ route('mostres.destroy',$mostre->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                                            <div class="btn-group">
                                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('mostres.show',$mostre->id) }}"><i class="fa-solid fa-eye"></i></a>
                                        <!--a class="btn btn-outline-primary btn-sm" href="{{ route('mostres.edit',$mostre->id) }}"><i class="fa-solid fa-pen-to-square"></i></a-->
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
                    <form action="{{ route('varietats.destroy',$varietat->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                        
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-3" style="margin-right:2em;"><i class="fa-solid fa-trash-can"></i> Eliminar</button>
                            <a class="btn btn-success ms-3" href="{{ route('varietats.edit',$varietat->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                            <a class="btn btn-info" href="{{ route('varietats.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>