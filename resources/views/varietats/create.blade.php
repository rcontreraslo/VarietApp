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
                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <!-- Barra lateral dreta -->
                        <h2>Informació:</h2>
                        <label class="obligat mb-4" style="break-after: right;">Els camps marcats són obligatoris</label>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum egestas arcu faucibus venenatis. Vivamus vitae vulputate eros.</p>
                        <!-- FI - Barra lateral dreta -->
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <!-- Espai central -->
                        <form action="{{ route('varietats.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="row gx-3 mb-4">
                                        <h5>General</h5>
                                        <div class="col-6">
                                            <label for="name" class="form-label obligat">Nom</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-2">
                                            <label for="varCodi" class="form-label obligat">Codi</label>
                                            <input type="string" class="form-control @error('varCodi') is-invalid @enderror" id="varCodi" placeholder="AA" name="varCodi" value="{{ old('varCodi') }}">
                                            @error('varCodi')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <label for="especie_id" class="form-label obligat">Espècie</label>
                                            <select class="form-select @error('especie_id') is-invalid @enderror" id="especie_id" name="especie_id">
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

                                    <div class="row gx-3 mb-4">
                                        <div class="col-5">
                                            <label for="varNomCientific" class="form-label">Nom Científic</label>
                                            <input type="text" class="form-control" id="varNomCientific" name="varNomCientific" value="{{ old('varNomCientific') }}">
                                        </div>
                                        <div class="col-4">
                                            <label for="varNomOficial" class="form-label">Nom Oficial</label>
                                            <input type="text" class="form-control" id="varNomOficial" name="varNomOficial" value="{{ old('varNomOficial') }}">
                                        </div>
                                        <div class="col-3">
                                            <label for="varCategoria" class="form-label">Categoria</label>
                                            <select class="form-select" id="varCategoria" name="varCategoria">
                                                <option disabled selected>Selecciona</option>
                                                <option @if(old('varCategoria')=='Estàndard') selected @endif value="Estàndard">Estàndard</option>
                                                <option @if(old('varCategoria')=='Sense Categoria') selected @endif value="Sense Categoria">Sense Categoria</option>
                                                <option @if(old('varCategoria')=='En procés') selected @endif value="En procés">En procés</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-4">
                                        <div class="col-3">
                                            <label for="varPreuLlavor" class="form-label">Preu x Llavor</label>
                                            <input type="float" class="form-control" id="varPreuLlavor" name="varPreuLlavor" placeholder="0.00€" value="{{ old('varPreuLlavor') }}">
                                        </div>
                                        <div class="col-3">
                                            <label for="varPreuFruit" class="form-label">Preu x Fruit/Planta</label>
                                            <input type="float" class="form-control" id="varPreuFruit" name="varPreuFruit" placeholder="0.00€" value="{{ old('varPreuFruit') }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="image" class="form-label">Imatge</label>
                                              <input type="file" name="image"  id="inputImage" class="form-control @error('image') is-invalid @enderror">
                                              @error('image')
                                                  <span class="text-danger">{{ $message }}</span>
                                              @enderror
                                            
                                         </div>
                                    </div>

                                    <div class="row gx-3 mb-4">
                                        <div class="col-6">
                                          <label for="varObservacions" class="form-label">Observacions</label>
                                          <textarea id="varObservacions" class="form-control summernote" name="varObservacions" rows="3" cols="25">{{ old('varObservacions') }}</textarea>
                                        </div>
                                        <div class="col-6">
                                          <label for="varDescripcio" class="form-label">Descripció</label>
                                          <textarea id="varDescripcio" class="form-control summernote" name="varDescripcio" rows="3" cols="25">{{ old('varDescripcio') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-4">
                                        <h5 class="mt-4">Origen</h5>
                                        <div class="col-2">
                                            <label for="varOriAny" class="form-label obligat">Any Entrada</label>
                                            <input type="number" class="form-control @error('varOriAny') is-invalid @enderror" id="varOriAny" name="varOriAny" value="{{ old('varOriAny') }}">
                                            @error('varOriAny')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <label for="persone_id" class="form-label obligat">Informant</label>
                                            <select class="form-select @error('persone_id') is-invalid @enderror" id="persone_id" name="persone_id">
                                                <option disabled selected>Selecciona Informant</option>
                                                @foreach ($informants as $informant)
                                                    <option value="{{ $informant->id }}" @if(old('persone_id')==$informant->id) selected @endif >{{ $informant->name." ".$informant->perCognoms }}</option>
                                                @endforeach
                                                
                                            </select>
                                            @error('persone_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                          <label for="varOriObservacions" class="form-label">Observacions Origen</label>
                                          <textarea id="varOriObservacions" class="form-control summernote" name="varOriObservacions" rows="3" cols="25">{{ old('varOriObservacions') }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-4">
                                        <h5 class="mt-4">Tipología</h5>
                                        <div class="col-4">
                                            <label for="varTipRegistre" class="form-label">Registre</label>
                                            <select class="form-select" id="varTipRegistre" name="varTipRegistre">
                                                <option disabled selected>Selecciona</option>
                                                <option @if(old('varTipRegistre')=='Varietat comercial acceptada') selected @endif value="Varietat comercial acceptada">Varietat comercial acceptada</option>
                                                <option @if(old('varTipRegistre')=='Varietat comercial en procés') selected @endif value="Varietat comercial en procés">Varietat comercial en procés</option>
                                                <option @if(old('varTipRegistre')=='Varietat de conservació acceptada') selected @endif value="Varietat de conservació acceptada">Varietat de conservació acceptada</option>
                                                <option @if(old('varTipRegistre')=='Varietat de conservació en procés') selected @endif value="Varietat de conservació en procés">Varietat de conservació en procés</option>
                                                <option @if(old('varTipRegistre')=='Material heterogeni AE acceptada') selected @endif value="Material heterogeni AE acceptada">Material heterogeni AE acceptada</option>
                                                <option @if(old('varTipRegistre')=='Material heterogeni AE en procés') selected @endif value="Material heterogeni AE en procés">Material heterogeni AE en procés</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <label for="varTipCataleg" class="form-label">Catàleg Balear</label>
                                            <select class="form-select" id="varTipCataleg" name="varTipCataleg">
                                                <option disabled selected>Selecciona</option>
                                                <option @if(old('varTipCataleg')=='Acceptada') selected @endif value="Acceptada">Acceptada</option>
                                                <option @if(old('varTipCataleg')=='En procés') selected @endif value="En procés">En procés</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-4">
                                            <label for="varTipDeclaracio" class="form-label">Declaració de cultiu</label>
                                            <select class="form-select" id="varTipDeclaracio" name="varTipDeclaracio">
                                                <option disabled selected>Selecciona</option>
                                                <option @if(old('varTipDeclaracio')=='Declarada') selected @endif value="Declarada">Declarada</option>
                                                <option @if(old('varTipDeclaracio')=='No declarada') selected @endif value="No declarada">No declarada</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-4">
                                        <h5 class="mt-4">Info Agronòmica</h5>
                                         <div class="col-3">
                                            <label for="varAgrCicle" class="form-label">Cicle</label>
                                            <select class="form-select" id="varAgrCicle" name="varAgrCicle">
                                                <option disabled selected>Selecciona</option>
                                                <option @if(old('varAgrCicle')=='Anual') selected @endif value="Anual">Anual</option>
                                                <option @if(old('varAgrCicle')=='Bianual') selected @endif value="Bianual">Bianual</option>
                                                <option @if(old('varAgrCicle')=='Altre') selected @endif value="Altre">Altre</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varAgrPrecocitat" class="form-label">Precocitat</label>
                                            <select class="form-select" id="varAgrPrecocitat" name="varAgrPrecocitat">
                                                <option disabled selected>Selecciona</option>
                                                <option @if(old('varAgrPrecocitat')=='Primerenca') selected @endif value="Primerenca">Primerenca</option>
                                                <option @if(old('varAgrPrecocitat')=='Mitjana') selected @endif value="Mitjana">Mitjana</option>
                                                <option @if(old('varAgrPrecocitat')=='Tardana') selected @endif value="Tardana">Tardana</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varAgrAltRendiment" class="form-label">Alt Rendiment</label>
                                            <select class="form-select" id="varAgrAltRendiment" name="varAgrAltRendiment">
                                                <option disabled selected>Selecciona</option>
                                                <option @if(old('varAgrAltRendiment')=='Si') selected @endif value="Si">Si</option>
                                                <option @if(old('varAgrAltRendiment')=='No') selected @endif value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varAgrToleranciaSequera" class="form-label">Tolerancia Sequera</label>
                                            <select class="form-select" id="varAgrToleranciaSequera" name="varAgrToleranciaSequera">
                                                <option disabled selected>Selecciona</option>
                                                <option @if(old('varAgrToleranciaSequera')=='Si') selected @endif value="Si">Si</option>
                                                <option @if(old('varAgrToleranciaSequera')=='No') selected @endif value="No">No</option>
                                            </select>
                                        </div>
                                        
                                      </div>
                                      <div class=" row gx-3 mb-4">
                                        <div class="col-3">
                                            <label for="varAgrPostcollita" class="form-label">Bona Postcollita</label>
                                            <select class="form-select" id="varAgrPostcollita" name="varAgrPostcollita">
                                                <option disabled selected>Selecciona</option>
                                                <option @if(old('varAgrPostcollita')=='Si') selected @endif value="Si">Si</option>
                                                <option @if(old('varAgrPostcollita')=='No') selected @endif value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varAgrConsellProfessionals" class="form-label">Consell Professionals</label>
                                            <select class="form-select" id="varAgrConsellProfessionals" name="varAgrConsellProfessionals">
                                                <option disabled selected>Selecciona</option>
                                                <option @if(old('varAgrConsellProfessionals')=='Si') selected @endif value="Si">Si</option>
                                                <option @if(old('varAgrConsellProfessionals')=='No') selected @endif value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varAgrRecomanaHortBalco" class="form-label">Consell hort balcó</label>
                                            <select class="form-select" id="varAgrRecomanaHortBalco" name="varAgrRecomanaHortBalco">
                                                <option disabled selected>Selecciona</option>
                                                <option @if(old('varAgrRecomanaHortBalco')=='Si') selected @endif value="Si">Si</option>
                                                <option @if(old('varAgrRecomanaHortBalco')=='No') selected @endif value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <label for="varAgrConsellSembra" class="form-label">Consell Sembra Directa</label>
                                            <select class="form-select" id="varAgrConsellSembra" name="varAgrConsellSembra">
                                                <option disabled selected>Selecciona</option>
                                                <option @if(old('varAgrConsellSembra')=='Si') selected @endif value="Si">Si</option>
                                                <option @if(old('varAgrConsellSembra')=='No') selected @endif value="No">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row gx-3 mb-4">
                                        <div class="col-3">
                                            <label for="varAgrCmSembra" class="form-label">Profunditat de sembra</label>
                                            <input type="text" class="form-control" id="varAgrCmSembra" name="varAgrCmSembra" value="{{ old('varAgrCmSembra') }}">
                                        </div>
                                        <div class="col-3">
                                            <label for="varAgrMarcPlantacio" class="form-label">Marc de plantació</label>
                                            <input type="text" class="form-control" id="varAgrMarcPlantacio" name="varAgrMarcPlantacio" value="{{ old('varAgrMarcPlantacio') }}">
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Sembra</label>
                                            <div class="row gx-1">
                                                <div class="col-5">
                                                   <select class="form-select" id="varAgrSembraIni" name="varAgrSembraIni">
                                                        <option disabled selected>Selecciona</option>
                                                        <option @if(old('varAgrSembraIni')=='Gen') selected @endif value="Gen">Gen</option>
                                                        <option @if(old('varAgrSembraIni')=='Feb') selected @endif value="Feb">Feb</option>
                                                        <option @if(old('varAgrSembraIni')=='Mar') selected @endif value="Mar">Mar</option>
                                                        <option @if(old('varAgrSembraIni')=='Abr') selected @endif value="Abr">Abr</option>
                                                        <option @if(old('varAgrSembraIni')=='Mai') selected @endif value="Mai">Mai</option>
                                                        <option @if(old('varAgrSembraIni')=='Jun') selected @endif value="Jun">Jun</option>
                                                        <option @if(old('varAgrSembraIni')=='Jul') selected @endif value="Jul">Jul</option>
                                                        <option @if(old('varAgrSembraIni')=='Ago') selected @endif value="Ago">Ago</option>
                                                        <option @if(old('varAgrSembraIni')=='Set') selected @endif value="Set">Set</option>
                                                        <option @if(old('varAgrSembraIni')=='Oct') selected @endif value="Oct">Oct</option>
                                                        <option @if(old('varAgrSembraIni')=='Nov') selected @endif value="Nov">Nov</option>
                                                        <option @if(old('varAgrSembraIni')=='Des') selected @endif value="Des">Des</option>
                                                    </select>
                                                </div>
                                                <div class="col-1">
                                                    a
                                                </div>
                                                <div class="col-5">
                                                    <select class="form-select" id="varAgrSembraFin" name="varAgrSembraFin">
                                                        <option disabled selected>Selecciona</option>
                                                        <option @if(old('varAgrSembraFin')=='Gen') selected @endif value="Gen">Gen</option>
                                                        <option @if(old('varAgrSembraFin')=='Feb') selected @endif value="Feb">Feb</option>
                                                        <option @if(old('varAgrSembraFin')=='Mar') selected @endif value="Mar">Mar</option>
                                                        <option @if(old('varAgrSembraFin')=='Abr') selected @endif value="Abr">Abr</option>
                                                        <option @if(old('varAgrSembraFin')=='Mai') selected @endif value="Mai">Mai</option>
                                                        <option @if(old('varAgrSembraFin')=='Jun') selected @endif value="Jun">Jun</option>
                                                        <option @if(old('varAgrSembraFin')=='Jul') selected @endif value="Jul">Jul</option>
                                                        <option @if(old('varAgrSembraFin')=='Ago') selected @endif value="Ago">Ago</option>
                                                        <option @if(old('varAgrSembraFin')=='Set') selected @endif value="Set">Set</option>
                                                        <option @if(old('varAgrSembraFin')=='Oct') selected @endif value="Oct">Oct</option>
                                                        <option @if(old('varAgrSembraFin')=='Nov') selected @endif value="Nov">Nov</option>
                                                        <option @if(old('varAgrSembraFin')=='Des') selected @endif value="Des">Des</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label">Collita</label>
                                            <div class="row gx-1">
                                                <div class="col-5">
                                                   <select class="form-select" id="varAgrCollitaIni" name="varAgrCollitaIni">
                                                        <option disabled selected>Selecciona</option>
                                                        <option @if(old('varAgrCollitaIni')=='Gen') selected @endif value="Gen">Gen</option>
                                                        <option @if(old('varAgrCollitaIni')=='Feb') selected @endif value="Feb">Feb</option>
                                                        <option @if(old('varAgrCollitaIni')=='Mar') selected @endif value="Mar">Mar</option>
                                                        <option @if(old('varAgrCollitaIni')=='Abr') selected @endif value="Abr">Abr</option>
                                                        <option @if(old('varAgrCollitaIni')=='Mai') selected @endif value="Mai">Mai</option>
                                                        <option @if(old('varAgrCollitaIni')=='Jun') selected @endif value="Jun">Jun</option>
                                                        <option @if(old('varAgrCollitaIni')=='Jul') selected @endif value="Jul">Jul</option>
                                                        <option @if(old('varAgrCollitaIni')=='Ago') selected @endif value="Ago">Ago</option>
                                                        <option @if(old('varAgrCollitaIni')=='Set') selected @endif value="Set">Set</option>
                                                        <option @if(old('varAgrCollitaIni')=='Oct') selected @endif value="Oct">Oct</option>
                                                        <option @if(old('varAgrCollitaIni')=='Nov') selected @endif value="Nov">Nov</option>
                                                        <option @if(old('varAgrCollitaIni')=='Des') selected @endif value="Des">Des</option>
                                                    </select>
                                                </div>
                                                <div class="col-1">
                                                    a
                                                </div>
                                                <div class="col-5">
                                                    <select class="form-select" id="varAgrCollitaFin" name="varAgrCollitaFin">
                                                        <option disabled selected>Selecciona</option>
                                                        <option @if(old('varAgrCollitaFin')=='Gen') selected @endif value="Gen">Gen</option>
                                                        <option @if(old('varAgrCollitaFin')=='Feb') selected @endif value="Feb">Feb</option>
                                                        <option @if(old('varAgrCollitaFin')=='Mar') selected @endif value="Mar">Mar</option>
                                                        <option @if(old('varAgrCollitaFin')=='Abr') selected @endif value="Abr">Abr</option>
                                                        <option @if(old('varAgrCollitaFin')=='Mai') selected @endif value="Mai">Mai</option>
                                                        <option @if(old('varAgrCollitaFin')=='Jun') selected @endif value="Jun">Jun</option>
                                                        <option @if(old('varAgrCollitaFin')=='Jul') selected @endif value="Jul">Jul</option>
                                                        <option @if(old('varAgrCollitaFin')=='Ago') selected @endif value="Ago">Ago</option>
                                                        <option @if(old('varAgrCollitaFin')=='Set') selected @endif value="Set">Set</option>
                                                        <option @if(old('varAgrCollitaFin')=='Oct') selected @endif value="Oct">Oct</option>
                                                        <option @if(old('varAgrCollitaFin')=='Nov') selected @endif value="Nov">Nov</option>
                                                        <option @if(old('varAgrCollitaFin')=='Des') selected @endif value="Des">Des</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3 mb-4">
                                        <div class="col-12">
                                          <label for="varAgrSeguiment" class="form-label">Seguiment (info tècnica del cultiu)</label>
                                          <textarea id="varAgrSeguiment" class="form-control summernote" name="varAgrSeguiment" rows="3" cols="25">{{ old('varAgrSeguiment') }}</textarea>
                                        </div>
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
