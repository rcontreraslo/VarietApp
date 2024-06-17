<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Families fitxa') }}
        </h2>
        <a class="btn btn-info" href="{{ route('families.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
    </x-slot>
     
   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                <!-- ////////////////////   CONTINMGUT PAGINA  /////////////////////-->
                <div class="row g-5 mb-4">
                    <div class="col-12">
                        <h2>{{$family->name }} </h2>
                    </div>
                </div>
                <hr class="my-4" />
                <div class="row mt-4">
                    <div class="col-12">  
                        <div class="d-flex">
                            <div class="label">Espècies relacionades</div>
                            <?php /*<div class="align-self-center ms-auto"><a class="btn btn-outline-success btn-sm rounded-pill" href="{{ route('especie.create',$family->id) }}"><i class="fa-solid fa-plus"></i> Afegir</a></div>*/ ?>
                        </div>
                        <table class="table table-striped table-hover table-bordered table-sm table-responsive dataTable" id="dtespeciesfamilia">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Espècie</th>
                                    <th width="60px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($family->especies as $especie)
                                <tr>
                                    <td>{{ $especie->id }}</td>
                                    <td>{{ $especie->name }}</td>
                                    <td>
                                        <form action="{{ route('especies.destroy',$especie->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                                            <div class="btn-group">
                                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('especies.show',$especie->id) }}"><i class="fa-solid fa-eye"></i></a>
                                        <!--a class="btn btn-outline-primary btn-sm" href="{{ route('especies.edit',$especie->id) }}"><i class="fa-solid fa-pen-to-square"></i></a-->
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
                    <form action="{{ route('families.destroy',$family->id) }}" onsubmit="return confirm('Confirmes que vols eliminar el registre?');" method="POST">
                        
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-3" style="margin-right:2em;"><i class="fa-solid fa-trash-can"></i> Eliminar</button>
                            <a class="btn btn-success ms-3" href="{{ route('families.edit',$family->id) }}"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                            <a class="btn btn-info" href="{{ route('families.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
                        
                    </form>
                </div>


            </div>
        </div>
    </div>

    
</x-app-layout>