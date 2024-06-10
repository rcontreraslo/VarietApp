<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lots') }}
        </h2>
        <a class="btn btn-success" href="{{ route('lots.create') }}">Afegir</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <table class="table table-striped table-hover table-bordered table-sm table-responsive dataTable" id="dtlots">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Mostra</th>
                            <th>Varietat</th>
                            <th>Especie</th>
                           <th>Codi</th>
                           
                            <th width="50px"></th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
