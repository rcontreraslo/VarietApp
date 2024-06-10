<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Afegir nova especie
        </h2>
        <a class="btn btn-info" href="{{ route('especies.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
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

                        <form action="{{ route('especies.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                              <div class="row gx-3">


                                 <!-- ////////////////////////// AFEGIR CAMPS PER CREAR EL NOU CONTINGUT /////////////////////////////// -->


                                <div class="col-3 ">
                                  <label for="name" class="form-label">Nom</label>
                                  <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                                </div>
                                

                                <div class="col-3 ">
                                  <label for="espCodi" class="form-label">Especie Codi</label>
                                  <input type="text" class="form-control" id="espCodi" name="espCodi" placeholder="" value="" required>
                                </div>

                                  <div class="col-3 ">
                                  <label for="familie_id" class="form-label">Familia</label>
                                  <select class="form-select" id="familie_id" name="familie_id">
                                    <option disabled selected>Selecciona Familia</option>
                                     @foreach ($families as $family)
                                       <option value="{{ $family->id }}">{{$family->name}}</option>
                                     @endforeach
                                  </select>
                                </div>

                                 <div class="col-3 ">
                                  <label for="passaportFito" class="form-label">Passaport</label>
                                  <input type="text" class="form-control" id="passaportFito" name="passaportFito" placeholder="" value="" required>
                                </div>
                            </div>
                            <div class="row gx-3">

                                <div class="col-3 ">
                                     <label for="espRegulacio" class="form-label">Tipus registre</label>
                                      <select class="form-select" id="espRegulacio" name="espRegulacio" placeholder="Selecciona" value="" required>
                                      <option disabled selected>Selecciona</option>
                                      <option value="R hortícoles">R hortícoles</option>
                                        <option value="R farrageres">R farrageres</option>
                                        <option value="R panís">R panís</option>
                                        <option value="R sorgo">R sorgo</option>
                                        <option value="R panís">R tèxtils</option>
                                        <option value="R sorgo">R oleaginoses</option>
                                        <option value="R panís">NR aromàtiques</option>
                                        <option value="R sorgo">NR extensius</option>
                                        <option value="R panís">NR hortícoles</option>
                                        <option value="R sorgo">NR ornamentals</option>
                                                     
                                    </select>
                                </div>


                                <div class="col-3 ">
                                  <label for="espTempGermOptima" class="form-label">Temp Germinacio Optim</label>
                                  <input type="text" class="form-control" id="espTempGermOptima" name="espTempGermOptima" placeholder="" value="" required>
                                </div>

                                <div class="col-3 ">
                                  <label for="espTempGermInterval" class="form-label">TempGerminacio Interval</label>
                                  <input type="text" class="form-control" id="espTempGermInterval" name="espTempGermInterval" placeholder="" value="" required>
                                </div>

                                <div class="col-3 ">
                                  <label for="espDiesGerm" class="form-label">Dies Germinacio</label>
                                  <input type="text" class="form-control" id="espDiesGerm" name="espDiesGerm" placeholder="" value="" required>
                                </div>
                            </div>

                            <div class="row gx-3">

                                <div class="col-3 ">
                                  <label for="espAnysDuracio" class="form-label">Anys Duració:</label>
                                  <input type="text" class="form-control" id="espAnysDuracio" name="espAnysDuracio" placeholder="" value="" required>
                                </div>

                                <div class="col-3 ">
                                     <label for="passaportFito" class="form-label">Tipus registre</label>
                                      <select class="form-select" id="passaportFito" name="passaportFito" placeholder="Selecciona" value="" required>
                                      <option disabled selected>Selecciona</option>
                                      <option value="Si">Si</option>
                                        <option value="No">No</option>
                                                     
                                    </select>
                                </div>

                                <div class="col-3 ">
                                  <label for="espPercGerm" class="form-label">Germinació:</label>
                                  <input type="text" class="form-control" id="espPercGerm" name="espPercGerm" placeholder="" value="" required>
                                </div>

                                <div class="col-3 ">
                                  <label for="espGrReserva" class="form-label">Germinació Reserva:</label>
                                  <input type="text" class="form-control" id="espGrReserva" name="espGrReserva" placeholder="" value="" required>
                                </div>  
                            </div>
                            <div class="row gx-3">
                                <div class="col-3">
                                    <label for="espKNO3Germ" class="form-label">Germinació KN03:</label>
                                  <input type="text" class="form-control" id="espKNO3Germ" name="espKNO3Germ" placeholder="" value="" required>
                                </div>

                                <div class="col-3">
                                    <label for="espNumLlavorsGr" class="form-label">Numero Llavors</label>
                                  <input type="text" class="form-control" id="espNumLlavorsGr" name="espNumLlavorsGr" placeholder="" value="" required>
                                </div>

                                <div class="col-3">
                                    <label for="espDeclarCultius" class="form-label">Declarar Cultius</label>
                                  <input type="text" class="form-control" id="espDeclarCultius" name="espDeclarCultius" placeholder="" value="" required>
                                </div>

                                    

                                
                                

                                <!-- /////////////////////////////////////////////// FI /////////////////////////////// -->



                              </div>
                              
                            </div>
                        </div>

                        <hr class="my-4" />

                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('especies.index') }}" class="btn btn-light" >Cancelar</a>
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
