<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Especie:  {{$especy-> name}}
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

                        <form action="{{ route('especies.update',$especy->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                              <div class="row gx-3 mb-4">

                                <div class="col-3 ">
                                  <label for="name" class="form-label">Nom:</label>
                                  <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{$especy->name}}" required>
                                </div>

                                <div class="col-2 ">
                                  <label for="espCodi" class="form-label">Codi:</label>
                                  <input type="text" class="form-control" id="espCodi" name="espCodi" placeholder="" value="{{$especy->espCodi}}" required>
                                </div>


                                <div class="col-4 ">
                                  <label for="espNomCientific" class="form-label">Nom cientific:</label>
                                  <input type="text" class="form-control" id="espCodi" name="espNomCientific" placeholder="" value="{{$especy->espNomCientific}}" required>
                                </div>

                                <div class="col-3 ">
                                  <label for="familie_id" class="form-label">Familia:</label>
                                  <select class="form-select" id="familie_id" name="familie_id">
                                    <option disabled selected>Selecciona Familia</option>
                                     @foreach ($families as $family)
                                       <option value="{{ $family->id }}" @if($family->id == $especy->familie_id) selected @endif>{{$family->name}}</option>
                                     @endforeach
                                  </select>
                                </div>

                            </div>
                            <div class="row gx-3 mb-4">
                                <div class="col-3 ">
                                     <label for="passaportFito" class="form-label">Passaport FitoSanitari:</label>
                                      <select class="form-select" id="passaportFito" name="passaportFito" placeholder="Selecciona" value="" required>
                                      <option disabled selected>Selecciona</option>
                                      <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                                <div class="col-3 ">
                                  <label for="espRegulacio" class="form-label">Regulació:</label>
                                  <input type="text" class="form-control" id="espRegulacio" name="espRegulacio" placeholder="" value="{{$especy->espRegulacio}}" required>
                                </div>


                                
                            </div>
                            <div class="row gx-3 mb-4">
                                <div class="col-6 ">
                                  <label for="espTempGermOptima" class="form-label">Temp Germinació Optima:</label>
                                  <input type="text" class="form-control" id="espTempGermOptima" name="espTempGermOptima" placeholder="" value="{{$especy->espTempGermOptima}}" required>
                                </div>

                                 <div class="col-6 ">
                                  <label for="espTempGermInterval" class="form-label">Temp Germinació Interval:</label>
                                  <input type="text" class="form-control" id="espTempGermInterval" name="espTempGermInterval" placeholder="" value="{{$especy->espTempGermInterval}}" required>
                                </div>

                                
                            </div>
                            <div class="row gx-3 mb-4">
                                <div class="col-3 ">
                                  <label for="espDiesGerm" class="form-label">DiesGerminació:</label>
                                  <input type="text" class="form-control" id="espDiesGerm" name="espDiesGerm" placeholder="" value="{{$especy->espDiesGerm}}" required>
                                </div>

                                <div class="col-3 ">
                                  <label for="espAnysDuracio" class="form-label">Anys Duració:</label>
                                  <input type="text" class="form-control" id="espAnysDuracio" name="espAnysDuracio" placeholder="" value="{{$especy->espAnysDuracio}}" required>
                                </div>

                                <div class="col-3 ">
                                  <label for="espPercGerm" class="form-label">Germinació:</label>
                                  <input type="text" class="form-control" id="espPercGerm" name="espPercGerm" placeholder="" value="{{$especy->espPercGerm}}" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="espNumLlavorsGr" class="form-label">Nº Llavors Germinació:</label>
                                  <input type="text" class="form-control" id="espNumLlavorsGr" name="espNumLlavorsGr" placeholder="" value="{{$especy->espNumLlavorsGr}}" required>
                                </div>
                            </div>
                            <div class="row gx-3 mb-4">
                                  <div class="col-3 ">
                                  <label for="espGrReserva" class="form-label">Reserva:</label>
                                  <input type="text" class="form-control" id="espGrReserva" name="espGrReserva" placeholder="" value="{{$especy->espGrReserva}}" required>
                                </div>

                                <div class="col-3 ">
                                  <label for="espKNO3Germ" class="form-label">KNO3Ger:</label>
                                  <input type="text" class="form-control" id="espKNO3Germ" name="espKNO3Germ" placeholder="" value="{{$especy->espKNO3Germ}}" required>
                                </div>

                                

                                <div class="col-3 ">
                                  <label for="espDeclarCultius" class="form-label">Declarar Cultius:</label>
                                  <input type="text" class="form-control" id="espDeclarCultius" name="espDeclarCultius" placeholder="" value="{{$especy->espDeclarCultius}}" required>
                                </div>
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
