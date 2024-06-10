<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Afegir nova Familia
        </h2>
        <a class="btn btn-info" href="{{ route('families.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
       
                <div class="mt-2 pb-2">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Eps!</strong> Hi ha hagut els següents errors:<br/><br/>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               </div>

               <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <!-- ///////////////////////////////////////////////// Barra lateral dreta /// -->
                        <h2>Mòdul lateral info</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum egestas arcu faucibus venenatis. Vivamus vitae vulputate eros.</p>



                        <!-- ///////////////////////////////////////////////// FI - Barra lateral dreta /// -->
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <!-- ///////////////////////////////////////////////// Espai central // -->

                        <form action="{{ route('families.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                              <div class="row gx-3">

                                <div class="col-3 ">
                                  <label for="name" class="form-label">Nom</label>
                                  <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                                </div>

                                                          
                              </div>
                            </div>
                        </div>

                        <hr class="my-4" />

                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('families.index') }}" class="btn btn-light" >Cancelar</a>
                            <button class="btn btn-success ms-3" type="submit">Desar</button>
                        </div>

                        </form>

                        <!-- /////////////////////////////////////////////////// FI - Espai central // -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</x-app-layout>

