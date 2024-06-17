<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Multiplicador: ') }} {{$multiplicador->name }}
        </h2>
        <a class="btn btn-info" href="{{ route('multiplicadors.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Tornar a llistat
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="row g-5 mb-4">
                    <div class="col-12">
                        <h2>{{$multiplicador->name }} </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="label">Dades:</div>
                        <dl class="row">
                          <dt class="col-3">NIF</dt>
                          <dd class="col-9">{{$multiplicador->mulNIF }}</dd>
                          <dt class="col-3">CBPAE</dt>
                          <dd class="col-9">{{$multiplicador->mulCBPAE }}</dd>
                          <dt class="col-3">Cadastral</dt>
                          <dd class="col-9">{{$multiplicador->mulCadastral}}</dd>
                          <dt class="col-3">Poligon</dt>
                          <dd class="col-9">{{$multiplicador->mulPoligon }}</dd>
                          <dt class="col-3">Parcela</dt>
                          <dd class="col-9">{{$multiplicador->mulParcela}}</dd>
                          <dt class="col-3">Recinte</dt>
                          <dd class="col-9">{{$multiplicador->mulRecinte }}</dd>
                        </dl>
                    </div>
                    
                    <div class="col-6">
                        <div class="label">Contacte:</div>
                        <dl class="row">
                          <dt class="col-5">Persona de contacte</dt>
                          <dd class="col-7">{{$multiplicador->mulPersonaContacte }}</dd>
                          <dt class="col-5">Adreça</dt>
                          <dd class="col-7">{{$multiplicador->mulAdreca }}</dd>
                          <dt class="col-5">Municipi</dt>
                          <dd class="col-7">{{$multiplicador->municipi->name}} {{$multiplicador->mulCP}} {{$multiplicador->municipi->provincie->name}}</dd>
                          <dt class="col-3">Telèfon</dt>
                          <dd class="col-9">{{$multiplicador->mulTelefon }}</dd>
                          <dt class="col-3">Email</dt>
                          <dd class="col-9"><a href="mailto:{{$multiplicador->mulEmail }}">{{$multiplicador->mulEmail }}<a></dd>
                          <dt class="col-3">Observacions</dt>
                          <dd class="col-9">{{$multiplicador->mulObservacions }}</dd>
                          
                        </dl>
                    </div>
                </div>
                <hr class="my-4" />

                <div class="row">
                    
                    <div class="col-12">  
                        <div class="d-flex">
                            <div class="label">Mostres registrades</div>
                            <?php /*<div class="align-self-center ms-auto"><a class="btn btn-outline-success btn-sm rounded-pill" href="{{ route('mostres.create',$multiplicador->id) }}"><i class="fa-solid fa-plus"></i> Afegir</a></div>*/ ?>
                        </div>
                        
                        
                      
                      
                        <table class="table table-striped table-hover table-bordered table-sm table-responsive dataTable" id="dtmostresvarietat">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Mostra</th>
                                    <th>Varietat</th>
                                    <th>Any</th>
                                    <th width="60px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($multiplicador->mostres as $mostre)

                                <tr>
                                    <td>{{ $mostre->id }}</td>
                                    <td>{{ $mostre->name }}</td>
                                    <td>{{ $mostre->varietat->name }}</td>
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
                    <form action="{{ route('multiplicadors.destroy',$multiplicador->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                        
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-3" style="margin-right:2em;"><i class="fa-solid fa-trash-can"></i> Eliminar</button>
                            <a class="btn btn-success ms-3" href="{{ route('multiplicadors.edit',$multiplicador->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                            <a class="btn btn-info" href="{{ route('multiplicadors.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>