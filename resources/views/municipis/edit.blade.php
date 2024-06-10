<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Municipi:  {{$municipi-> name}}
        </h2>
        <a class="btn btn-info" href="{{ route('municipis.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
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

                        <form action="{{ route('municipis.update',$municipi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                              <div class="row gx-3">

                                <div class="col-3 ">
                                  <label for="name" class="form-label">Nom</label>
                                  <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$municipi->name}}" required>
                                </div>

                                <div class="col-3 ">
                                     <label for="munIlla" class="form-label">Illa</label>
                                      <select class="form-select" id="munIlla" name="munIlla" placeholder="" value="{{$municipi->munIlla}}" required>
                                      <option value="{{$municipi->munIlla}}">{{$municipi->munIlla}}</option>  
                                      <option value="Mallorca">Mallorca</option>
                                        <option value="Menorca">Menorca</option>
                                        <option value="Formentera">Formentera</option>
                                        <option value="Eivissa">Eivissa</option>             
                                    </select>
                                </div>

                                <div class="col-3 ">
                                  <label for="provincie_id" class="form-label">Provincia</label>
                                  <select class="form-select" id="provincie_id" name="provincie_id">
                                    <option value="0">...</option>
                                     @foreach ($provincies as $provincie)
                                       <option value="{{ $provincie->id }}" @if($provincie->id == $municipi->provincie_id) selected @endif>{{$provincie->name}}</option>
                                     @endforeach
                                  </select>
                                </div>

                                <div class="col-3 ">
                                  <label for="munPais" class="form-label">Pais</label>
                                  <input type="text" class="form-control" id="munPais" name="munPais" placeholder="" value="{{$municipi->munPais}}" required>
                                </div>

                              </div>
                            </div>
                        </div>

                        <hr class="my-4" />

                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('municipis.index') }}" class="btn btn-light" >Cancelar</a>
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
