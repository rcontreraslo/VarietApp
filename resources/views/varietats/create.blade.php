<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Afegir nova varietat
        </h2>
        <a class="btn btn-info" href="{{ route('varietats.index') }}">
            <i class="fa-solid fa-arrow-left"></i> Tornar a llistat
        </a>
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
                        <!-- Barra lateral dreta -->
                        <h2>Mòdul lateral info</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum egestas arcu faucibus venenatis. Vivamus vitae vulputate eros.</p>
                        <!-- FI - Barra lateral dreta -->
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <!-- Espai central -->
                        <form action="{{ route('varietats.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="row gx-3">
                                        <div class="col-3">
                                            <label for="name" class="form-label">Nom</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">

                                                  @error('name')
                                                      <span class="text-danger">{{ $message }}</span>
                                                  @enderror
                                        </div>
                                        <div class="col-3">
                                            <label for="varCodi" class="form-label">Codi</label>
                                            <input type="number" class="form-control" id="varCodi" name="varCodi" value="{{ old('varCodi') }}">
                                        </div>
                                        <div class="col-3">
                                            <label for="varOriAny" class="form-label">Varietat Origen Any</label>
                                            <input type="number" class="form-control" id="varOriAny" name="varOriAny" >
                                        </div>
                                        <div class="col-3">
                                            <label for="especie_id" class="form-label">Espècies</label>
                                            <select class="form-select" id="especie_id" name="especie_id">
                                                <option disabled selected>Selecciona espècie</option>
                                                @foreach ($especies as $especy)
                                                    <option value="{{ $especy->id }}" @if(old('especie_id')==$especy->id) selected @endif >{{ $especy->name }}</option>
                                                @endforeach
                                                
                                            </select>
                                             @error('especie_id')
                                                      <span class="text-danger">{{ $message }}</span>
                                                  @enderror
                                        </div>
                                    </div>

                                    <div class="row gx-3">
                                          <div class="col-3">
                                            <label for="varTipRegistre" class="form-label">Tipus registre</label>
                                            <select class="form-select" id="varTipRegistre" name="varTipRegistre">
                                                <option disabled selected>Selecciona</option>
                                                <option value="Varietat comercial acceptada">Varietat comercial acceptada</option>
                                                <option value="Varietat comercial en procés">Varietat comercial en procés</option>
                                                <option value="Varietat de conservació acceptada">Varietat de conservació acceptada</option>
                                                <option value="Varietat de conservació en procés">Varietat de conservació en procés</option>
                                                <option value="Material heterogeni AE acceptada">Material heterogeni AE acceptada</option>
                                                <option value="Material heterogeni AE en procés">Material heterogeni AE en procés</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varTipCataleg" class="form-label">Tipus registre</label>
                                            <select class="form-select" id="varTipCataleg" name="varTipCataleg">
                                                <option disabled selected>Selecciona</option>
                                                <option value="Acceptada">Acceptada</option>
                                                <option value="En procés">En procés</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varCategoria" class="form-label">Categoria</label>
                                            <select class="form-select" id="varCategoria" name="varCategoria">
                                                <option disabled selected>Selecciona</option>
                                                <option value="Estàndard">Estàndard</option>
                                                <option value="Sense Categoria">Sense Categoria</option>
                                                <option value="En procés">En procés</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varTipDeclaracio" class="form-label">Tipus Declaració</label>
                                            <select class="form-select" id="varTipDeclaracio" name="varTipDeclaracio">
                                                <option disabled selected>Selecciona</option>
                                                <option value="Declarada">Declarada</option>
                                                <option value="No declarada">No declarada</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row gx-3">
                                         <div class="col-3">
                                            <label for="varAgrCicle" class="form-label">Agr Cicle</label>
                                            <select class="form-select" id="varAgrCicle" name="varAgrCicle">
                                                <option disabled selected>Selecciona</option>
                                                <option value="Anual">Anual</option>
                                                <option value="Bianual">Bianual</option>
                                                <option value="Altre">Altre</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varAgrPrecocitat" class="form-label">Agr Precocitat</label>
                                            <select class="form-select" id="varAgrPrecocitat" name="varAgrPrecocitat">
                                                <option disabled selected>Selecciona</option>
                                                <option value="Primerenca">Primerenca</option>
                                                <option value="Mitjana">Mitjana</option>
                                                <option value="Tardana">Tardana</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varAgrAltRendiment" class="form-label">Agr Alt Rendiment</label>
                                            <select class="form-select" id="varAgrAltRendiment" name="varAgrAltRendiment">
                                                <option disabled selected>Selecciona</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varAgrToleranciaSequera" class="form-label">Agr Tolerancia Sequera</label>
                                            <select class="form-select" id="varAgrToleranciaSequera" name="varAgrToleranciaSequera">
                                                <option disabled selected>Selecciona</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        
                                      </div>
                                      <div class=" row gx-3">
                                        <div class="col-3">
                                            <label for="varAgrPostcollita" class="form-label">Agr Postcollita</label>
                                            <select class="form-select" id="varAgrPostcollita" name="varAgrPostcollita">
                                                <option disabled selected>Selecciona</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varAgrConsellProfessionals" class="form-label">Agr Consell Professionals</label>
                                            <select class="form-select" id="varAgrConsellProfessionals" name="varAgrConsellProfessionals">
                                                <option disabled selected>Selecciona</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varAgrConsellSembra" class="form-label">Agr Consell Sembra</label>
                                            <select class="form-select" id="varAgrConsellSembra" name="varAgrConsellSembra">
                                                <option disabled selected>Selecciona</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                            <label for="image" class="form-label">Imatge</label>
                                              <input 
                                                type="file" 
                                                name="image"  
                                                id="inputImage"
                                                class="form-control @error('image') is-invalid @enderror">
      
                                                  @error('image')
                                                      <span class="text-danger">{{ $message }}</span>
                                                  @enderror
                                            
                                          </div>
                                </div>
                            </div>

                            <hr class="my-4" />

                            <div class="d-flex justify-content-end mb-3">
                                <a href="{{ route('varietats.index') }}" class="btn btn-light">Cancelar</a>
                                <button class="btn btn-success ms-3" type="submit">Desar</button>
                            </div>
                        </form>
                        <!-- FI - Espai central -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
