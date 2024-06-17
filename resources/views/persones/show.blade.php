<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Persona: ') }} {{$persone->name }}
        </h2>
        <a class="btn btn-info" href="{{ route('persones.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Tornar a llistat
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="row g-5 mb-4">
                    <div class="col-12">
                        <h2>{{$persone->name }} {{$persone->perCognoms }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="label">Dades:</div>
                        <dl class="row">
                          <dt class="col-3">Organització</dt>
                          <dd class="col-9">{{$persone->perOrganitzacio }}</dd>
                          <dt class="col-3">Vinculació</dt>
                          <dd class="col-9">{{$persone->perVinculacio }}</dd>
                          <dt class="col-3">Any Naixement</dt>
                          <dd class="col-9">{{$persone->perAnyNaixement}}</dd>
                        </dl>
                    </div>
                    
                    <div class="col-6">
                        <div class="label">Contacte:</div>
                        <dl class="row">
                          <dt class="col-3">Municipi</dt>
                          <dd class="col-9">{{$persone->municipi->name}} {{$persone->mulCP}} {{$persone->municipi->provincie->name}}</dd>
                          <dt class="col-3">Telèfon</dt>
                          <dd class="col-9">{{$persone->perTelefon }}</dd>
                          <dt class="col-3">Email</dt>
                          <dd class="col-9"><a href="mailto:{{$persone->perEmail }}">{{$persone->perEmail }}<a></dd>
                          <dt class="col-3">Observacions</dt>
                          <dd class="col-9">{{$persone->perObservacions }}</dd>
                          
                        </dl>
                    </div>
                </div>
                <hr class="my-4" />

                <div class="row">
                    
                    <div class="col-12">  
                        <div class="d-flex">
                            <div class="label">Varietats informades</div>
                            <?php /*<div class="align-self-center ms-auto"><a class="btn btn-outline-success btn-sm rounded-pill" href="{{ route('varietats.create',$persone->id) }}"><i class="fa-solid fa-plus"></i> Afegir</a></div>*/ ?>
                        </div>
                        
                        
                      
                      
                        <table class="table table-striped table-hover table-bordered table-sm table-responsive dataTable" id="dtmostresvarietat">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Varietat</th>
                                    <th>Any</th>
                                    <th width="60px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($persone->varietats as $varietat)

                                <tr>
                                    <td>{{ $varietat->id }}</td>
                                    <td>{{ $varietat->name }}</td>
                                    <td>{{ $varietat->varOriAny }}</td>
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
                    <form action="{{ route('persones.destroy',$persone->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                        
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-3" style="margin-right:2em;"><i class="fa-solid fa-trash-can"></i> Eliminar</button>
                            <a class="btn btn-success ms-3" href="{{ route('persones.edit',$persone->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                            <a class="btn btn-info" href="{{ route('persones.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>