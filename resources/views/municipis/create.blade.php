<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Afegir nou Municipi
        </h2>
        <a class="btn btn-info" href="{{ route('municipis.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
       
              

               <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <!-- ///////////////////////////////////////////////// Barra lateral dreta /// -->
                        <h2>Informació:</h2>
                        <label class="obligat mb-4" style="break-after: right;">Els camps marcats són obligatoris</label>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum egestas arcu faucibus venenatis. Vivamus vitae vulputate eros.</p>


                        <!-- ///////////////////////////////////////////////// FI - Barra lateral dreta /// -->
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <!-- ///////////////////////////////////////////////// Espai central // -->

                        <form action="{{ route('municipis.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                              <div class="row gx-3">

                                <div class="col-3 ">
                                  <label for="name" class="form-label obligat">Nom</label>
                                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="" value="{{ old('name') }}" >
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                </div>

                               <div class="col-3">
                                            <label for="munIlla" class="form-label">Illa</label>
                                            <select class="form-select" id="munIlla" name="munIlla">
                                                <option disabled selected>Selecciona illa</option>
                                                <option @if(old('munIlla')=='Mallorca') selected @endif value="Mallorca">Mallorca</option>
                                                <option @if(old('munIlla')=='Menorca') selected @endif value="Menorca">Menorca</option>
                                                <option @if(old('munIlla')=='Formentera') selected @endif value="Formentera">Formentera</option>
                                                <option @if(old('munIlla')=='Eivissa') selected @endif value="Eivissa">Eivissa</option>
                                            </select>
                                            @error('munIlla')
                                              <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                </div>
                                

                                <div class="col-3 ">
                                  <label for="provincie_id" class="form-label obligat">Provincia</label>
                                  <select class="form-select @error('provincie_id') is-invalid @enderror" id="provincie_id" name="provincie_id">
                                    <option disabled selected>Selecciona provincia</option>
                                     @foreach ($provincies as $provincie)
                                       <option value="{{ $provincie->id }}" @if(old('provincie_id')==$provincie->id) selected @endif >{{ $provincie->name }}
                                     @endforeach
                                  </select>
                                  @error('provincie_id')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="col-3 ">
                                  <label for="munPais" class="form-label obligat">Pais</label>
                                  <input type="text" class="form-control @error('munPais') is-invalid @enderror" id="munPais" name="munPais" placeholder="" value="{{ old('munPais') }}" >
                                  @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                </div>

                              </div>
                              <div class="row gx-3">
                                <div class="col-4"></div>
                              
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
