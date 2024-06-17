<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Afegir nou Multiplicador
        </h2>
        <a class="btn btn-info" href="{{ route('multiplicadors.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
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

                        <form action="{{ route('multiplicadors.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                             


                                 <!-- ////////////////////////// AFEGIR CAMPS PER CREAR EL NOU CONTINGUT /////////////////////////////// -->
                            <div class="row gx-3 mb-4">

                                <div class="col-6 ">
                                  <label for="name" class="form-label obligat">Nom:</label>
                                   <input type="text" class="form-control obligat @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                        @error('name')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                                

                                <div class="col-6 ">
                                  <label for="mulNIF" class="form-label">NIF:</label>

                                  <!-- OPCIÓ VALUE OLD('') recuperar les entrades antigues -->

                                  <input type="number" class="form-control " id="mulNIF" name="mulNIF" placeholder="" value="{{ old('mulNIF') }}">
                                </div>
                            </div>
                            <div class="row gx-3 mb-4">
                                <div class="col-3 ">
                                  <label for="mulPersonaContacte" class="form-label">Persona Contacte:</label>
                                  <input type="text" class="form-control" id="mulPersonaContacte" name="mulPersonaContacte" placeholder="" value="{{ old('mulPersonaContacte') }}">
                                </div>

                                <div class="col-4 ">
                                  <label for="mulTelefon" class="form-label">Telèfon:</label>
                                  <input type="text" class="form-control" id="mulTelefon" name="mulTelefon" placeholder="" value="{{ old('mulTelefon') }}">
                                </div>

                                <div class="col-5 ">
                                  <label for="mulEmail" class="form-label ">Correu electrònic:</label>
                                  <input type="text" class="form-control @error('mulEmail') is-invalid @enderror " id="mulEmail" name="mulEmail" placeholder="" value="{{ old('mulEmail') }}">
                                  @error('mulEmail')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                 
                                </div>

                            </div>
                            <div class="row gx-3 mb-4">

                                 <div class="col-6">
                                  <label for="mulAdreca" class="form-label">Adreça:</label>
                                  <input type="text" class="form-control" id="mulAdreca" name="mulAdreca" placeholder="" value="{{ old('mulAdreca') }}">
                                </div>
                                <div class="col-2 ">
                                  <label for="mulCP" class="form-label">CP:</label>
                                  <input type="text" class="form-control" id="mulCP" name="mulCP" placeholder="" value="{{ old('mulCP') }}">
                                </div>
                                
                                <div class="col-4">
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
                            </div>
                            <div class="row gx-3 mb-4">
                                <div class="col-3">
                                  <label for="mulCadastral" class="form-label">Cadastral:</label>
                                  <input type="text" class="form-control" id="mulCadastral" name="mulCadastral" placeholder="" value="{{ old('mulCadastral') }}">
                                </div>
                                <div class="col-3 ">
                                  <label for="mulPoligon" class="form-label">Poligon:</label>
                                  <input type="text" class="form-control" id="mulPoligon" name="mulPoligon" placeholder="" value="{{ old('mulPoligon') }}">
                                </div>
                                <div class="col-3 ">
                                  <label for="mulParcela" class="form-label">Parcela:</label>
                                  <input type="text" class="form-control" id="mulParcela" name="mulParcela" placeholder="" value="{{ old('mulParcela') }}">
                                </div>
                                <div class="col-3 ">
                                  <label for="mulRecinte" class="form-label">Recinte:</label>
                                  <input type="text" class="form-control" id="mulRecinte" name="mulRecinte" placeholder="" value="{{ old('mulRecinte') }}">
                                </div>
                            </div>

                                

                            
                            <div class="row gx-3 mb-4">

                                <div class="col-sm-12">
                                  <label for="mulObservacions" class="form-label">Observacions:</label>
                                  <textarea class="form-control" id="mulObservacions" name="mulObservacions" placeholder="" value="{{ old('mulObservacions') }}"cols="50" rows="10"></textarea>
                                </div>

                                <!-- /////////////////////////////////////////////// FI /////////////////////////////// -->



                              </div>
                              
                            </div>
                        </div>

                        <hr class="my-4" />

                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('multiplicadors.index') }}" class="btn btn-light" >Cancelar</a>
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
