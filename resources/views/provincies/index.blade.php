<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Provincies') }}
        </h2>
         <a class="btn btn-success" href="{{ route('provincies.create') }}">Afegir</a>
    </x-slot>

    <div class="py-12">
        <div class="row">
            @if ($message = Session::get('success'))
            <div class="col-md-4 alertfix offset-md-4 alert alert-success alert-dismissible fade show" role="alert">
               <div>{{ $message }}</div>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif
     </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <table class="table table-striped table-hover table-bordered table-sm table-responsive dataTable" id="dtprovincies">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            
                           
                            <th width="50px"></th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
