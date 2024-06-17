<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Afegir nova persona
        </h2>
        <a class="btn btn-info" href="{{ route('persones.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
       
                <!-- <div class="mt-2 pb-2">
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
               </div> -->

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

                        <form action="{{ route('persones.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                              <div class="row gx-3 mb-4">

                                <div class="col-4 ">
                                  <label for="name" class="form-label obligat">Nom:</label>
                                  <input type="text" class="form-control obligat @error('name') is-invalid @enderror" id="name" name="name" placeholder="" value="{{ old('name') }}" >
                                        @error('name')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                <div class="col-4 ">
                                  <label for="perCognoms" class="form-label">Cognoms:</label>
                                  <input type="text" class="form-control" id="perCognoms" name="perCognoms" placeholder="" value="{{ old('perCognoms') }}" >
                                </div>
                                <div class="col-4 ">
                                  <label for="perVinculacio" class="form-label">Vinculació:</label>
                                  <input type="text" class="form-control" id="perVinculacio" name="perVinculacio" placeholder="" value="{{ old('perVinculacio') }}" >
                                </div>
                                </div>
                              <div class="row gx-3 mb-4">
                                <div class="col-5 ">
                                  <label for="perOrganitzacio" class="form-label">Organització:</label>
                                  <input type="text" class="form-control" id="perOrganitzacio" name="perOrganitzacio" placeholder="" value="{{ old('perOrganitzacio') }}" >
                                </div>
                                <div class="col-3 ">
                                  <label for="perTelefon" class="form-label ">Telèfon:</label>
                                  <input type="number" class="form-control" id="perTelefon" name="perTelefon" placeholder="" value="{{ old('perTelefon') }}" >
                                </div>

                            <div class="col-4 ">
                                  <label for="perEmail" class="form-label">Correu electrònic:</label>
                                  <input type="text" class="form-control " id="perEmail" name="perEmail" placeholder="" value="{{ old('perEmail') }}" >
                                  @error('perEmail')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                
                            </div>

                            <div class="row gx-3 mb-4">
                            <div class="col-6">
                                  <label for="municipi_id" class="form-label obligat">Municipi:</label>
                                  <select class="form-select @error('municipi_id') is-invalid @enderror" id="municipi_id" name="municipi_id">
                                    <option disabled selected>Selecciona municipi</option>
                                     @foreach ($municipis as $municipi)
                                     <option value="{{ $municipi->id }}" @if(old('municipi_id')==$municipi->id) selected @endif >{{ $municipi->name }}
                                     @endforeach
                                  </select>
                                   @error('municipi_id')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                            </div> 
                            <div class="col-2 ">
                                  <label for="perCP" class="form-label">CP:</label>
                                  <input type="number" step="any" class="form-control" id="perCP" name="perCP"  placeholder="" value="{{ old('perCP') }}" >
                                </div>
                              

                            
                            </div>


                            <div class="row gx-3 mb-4">

                                <div class="col-sm-12">
                                  <label for="perObservacions">Descripció</label>
                                  <textarea class="form-control summernote" id="perObservacions" name="perObservacions" placeholder="" cols="50" rows="10">{{ old('perObservacions') }}</textarea>
                                
                                </div>

                              </div>
                              
                            </div>
                        </div>

                        <hr class="my-4" />

                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('persones.index') }}" class="btn btn-light" >Cancelar</a>
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
