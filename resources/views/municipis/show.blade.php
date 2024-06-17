<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Municipi: ') }} {{$municipi->name }}
        </h2>
        <a class="btn btn-info" href="{{ route('municipis.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Tornar a llistat
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <div class="row g-5 mb-4">
                    <div class="col-12">
                        <h2>{{$municipi->name }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="label">Dades:</div>
                        <dl class="row">
                          <dt class="col-3">Provincia</dt>
                          <dd class="col-9">{{$municipi->provincie->name }}</dd>
                          <dt class="col-3">Illa</dt>
                          <dd class="col-9">{{$municipi->munIlla }}</dd>
                          <dt class="col-3">País</dt>
                          <dd class="col-9">{{$municipi->munPais }} ll/gr.</dd>
                        </dl>
                    </div>
                    
                    
                </div>
                <hr class="my-4" />


                <div class="d-flex justify-content-end mb-3">
                    <form action="{{ route('municipis.destroy',$municipi->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                        
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-3" style="margin-right:2em;"><i class="fa-solid fa-trash-can"></i> Eliminar</button>
                            <a class="btn btn-success ms-3" href="{{ route('municipis.edit',$municipi->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                            <a class="btn btn-info" href="{{ route('municipis.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>