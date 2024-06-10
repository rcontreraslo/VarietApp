<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mostres') }}
        </h2>
        <a class="btn btn-success" href="{{ route('mostres.create') }}">Afegir</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <table class="table table-striped table-hover table-bordered table-sm table-responsive dataTable" id="dtmostres">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Codi Mostra</th>
                            <th>Varietat</th>
                           <th>Any</th>
                        
                            <th width="50px"></th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
