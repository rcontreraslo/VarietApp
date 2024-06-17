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
       
               <!--  <div class="mt-2 pb-2">
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

                        <form action="{{ route('especies.update',$especy->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                              <div class="row gx-3 mb-4">

                                <div class="col-3 ">
                                  <label for="name" class="form-label obligat">Nom:</label>
                                  <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="" value="{{$especy->name}}" >
                                       @error('name')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                <div class="col-2 ">
                                  <label for="espCodi" class="form-label obligat">Codi:</label>
                                  <input type="text" class="form-control @error('espCodi') is-invalid @enderror" id="espCodi" name="espCodi" placeholder="AA" value="{{$especy->espCodi}}" >
                                  @error('espCodi')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>


                                <div class="col-4 ">
                                  <label for="espNomCientific" class="form-label">Nom cientific:</label>
                                  <input type="text" class="form-control" id="espCodi" name="espNomCientific" placeholder="" value="{{$especy->espNomCientific}}" >
                                </div>

                                <div class="col-3 ">
                                  <label for="familie_id" class="form-label obligat">Familia:</label>
                                  <select class="form-select" id="familie_id" name="familie_id">
                                    <option disabled selected>Selecciona Familia</option>
                                     @foreach ($families as $family)
                                       <option value="{{ $family->id }}" @if($family->id == $especy->familie_id) selected @endif>{{$family->name}}</option>
                                     @endforeach
                                  </select>
                                </div>

                            </div>
                            <div class="row gx-3 mb-4">
                                <div class="col-6 ">
                                     <label for="passaportFito" class="form-label">Passaport FitoSanitari:</label>
                                      <select class="form-select" id="passaportFito" name="passaportFito" placeholder="Selecciona" value="" >
                                      <option disabled selected>Selecciona</option>
                                      <option value="0" @if($especy->passaportFito == '0') selected @endif>No</option>
                                      <option value="1" @if($especy->passaportFito == '1') selected @endif>Si</option>
                                    </select>
                                </div>

                                <div class="col-6 ">
                                  <label for="espRegulacio" class="form-label">Regulació:</label>
                                  <select class="form-select" id="espRegulacio" name="espRegulacio" placeholder="Selecciona" value="" >
                                      <option disabled selected>Selecciona</option>
                                      <option value="R hortícoles" @if($especy->espRegulacio == 'R hortícoles') selected @endif>R hortícoles</option>
                                      <option value="R farrageres" @if($especy->espRegulacio == 'R farrageres') selected @endif>R farrageres</option>
                                      <option value="R panís" @if($especy->espRegulacio == 'R panís') selected @endif>R panís</option>
                                      <option value="R sorgo" @if($especy->espRegulacio == 'R sorgo') selected @endif>R sorgo</option>
                                      <option value="R tèxtils" @if($especy->espRegulacio == 'R tèxtils') selected @endif>R tèxtils</option>
                                      <option value="R oleaginoses" @if($especy->espRegulacio == 'R oleaginoses') selected @endif>R oleaginoses</option>
                                      <option value="NR aromàtiques" @if($especy->espRegulacio == 'NR aromàtiques') selected @endif>NR aromàtiques</option>
                                      <option value="NR extensius" @if($especy->espRegulacio == 'NR extensius') selected @endif>NR extensius</option>
                                      <option value="NR hortícoles" @if($especy->espRegulacio == 'NR hortícoles') selected @endif>NR hortícoles</option>
                                      <option value="NR ornamentals" @if($especy->espRegulacio == 'NR ornamentals') selected @endif>NR ornamentals</option>
                               
                                    </select>
                                </div>
                            </div>
                            <div class="row gx-3 mb-4">
                                <div class="col-6 ">
                                  <label for="espTempGermOptima" class="form-label">Temp Germinació Optima:</label>
                                  <input type="text" class="form-control" id="espTempGermOptima" name="espTempGermOptima" placeholder="" value="{{$especy->espTempGermOptima}}" >
                                </div>

                                 <div class="col-6 ">
                                  <label for="espTempGermInterval" class="form-label">Temp Germinació Interval:</label>
                                  <input type="text" class="form-control" id="espTempGermInterval" name="espTempGermInterval" placeholder="" value="{{$especy->espTempGermInterval}}" >
                                </div>

                                
                            </div>
                            <div class="row gx-3 mb-4">
                                <div class="col-3 ">
                                  <label for="espDiesGerm" class="form-label">DiesGerminació:</label>
                                  <input type="text" class="form-control" id="espDiesGerm" name="espDiesGerm" placeholder="" value="{{$especy->espDiesGerm}}" >
                                </div>

                                <div class="col-3 ">
                                  <label for="espAnysDuracio" class="form-label">Anys Duració:</label>
                                  <input type="text" class="form-control" id="espAnysDuracio" name="espAnysDuracio" placeholder="" value="{{$especy->espAnysDuracio}}" >
                                </div>

                                <div class="col-3 ">
                                  <label for="espPercGerm" class="form-label">Germinació:</label>
                                  <input type="text" class="form-control" id="espPercGerm" name="espPercGerm" placeholder="" value="{{$especy->espPercGerm}}" >
                                </div>
                                <div class="col-3 ">
                                  <label for="espNumLlavorsGr" class="form-label">Nº Llavors Germinació:</label>
                                  <input type="text" class="form-control" id="espNumLlavorsGr" name="espNumLlavorsGr" placeholder="" value="{{$especy->espNumLlavorsGr}}" >
                                </div>
                            </div>
                            <div class="row gx-3 mb-4">
                                  <div class="col-3 ">
                                  <label for="espGrReserva" class="form-label">Reserva:</label>
                                  <input type="text" class="form-control" id="espGrReserva" name="espGrReserva" placeholder="" value="{{$especy->espGrReserva}}" >
                                </div>

                                <div class="col-3 ">
                                  <label for="espKNO3Germ" class="form-label">KNO3Ger:</label>
                                  <input type="text" class="form-control" id="espKNO3Germ" name="espKNO3Germ" placeholder="" value="{{$especy->espKNO3Germ}}" >
                                </div>

                                

                                <div class="col-3 ">
                                  <label for="espDeclarCultius" class="form-label">Declarar Cultius:</label>
                                  <input type="text" class="form-control" id="espDeclarCultius" name="espDeclarCultius" placeholder="" value="{{$especy->espDeclarCultius}}" >
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
