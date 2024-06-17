<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Afegir nova Mostra
        </h2>
        <a class="btn btn-info" href="{{ route('mostres.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
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
                        <!--Espai central // -->

                        <form action="{{ route('mostres.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                              <div class="row gx-3 mb-4">
                                <h5>General</h5>
                                <div class="col-2">
                                  <label for="mosCodi" class="form-label">Codi</label>
                                  <input type="string" class="form-control" id="mosCodi" name="mosCodi" placeholder="" value="{{ old('mosCodi') }}" >
                                </div>
                                <div class="col-4">
                                  <label for="varietat_id" class="form-label obligat">Varietat</label>
                                  <select class="form-select @error('varietat_id') is-invalid @enderror" id="varietat_id" name="varietat_id">
                                      <option disabled selected>Selecciona varietat</option>
                                      @foreach ($varietats as $varietat)
                                          <option value="{{ $varietat->id }}" @if(old('varietat_id')==$varietat->id) selected @endif >{{ $varietat->name }}</option>
                                      @endforeach
                                  </select>
                                  @error('varietat_id')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                              </div>
                             
                              <div class="row gx-3 mb-4">
                                <div class="col-6">
                                  <label for="multiplicador_id" class="form-label obligat">Multiplicador</label>
                                  <select class="form-select @error('multiplicador_id') is-invalid @enderror" id="multiplicador_id" name="multiplicador_id">
                                      <option disabled selected>Selecciona multiplicador</option>
                                      @foreach ($multiplicadors as $multiplicador)
                                          <option value="{{ $multiplicador->id }}" @if(old('multiplicador_id')==$multiplicador->id) selected @endif >{{ $multiplicador->name }}</option>
                                      @endforeach
                                  </select>
                                  @error('multiplicador_id')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>

                                <div class="col-2">
                                  <label for="mosAny" class="form-label obligat">Any Mostra</label>
                                  <input type="number" class="form-control" id="mosAny" name="mosAny" placeholder="" value="{{ old('mosAny') }}" >
                                  @error('mosAny')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                                
                                <div class="col-4">
                                    <label for="mosEstatMostra" class="form-label">Estat</label>
                                    <select class="form-select" id="mosEstatMostra" name="mosEstatMostra">
                                        <option disabled selected>Selecciona</option>
                                        <option @if(old('mosEstatMostra')=='Actiu') selected @endif value="Actiu">Actiu</option>
                                        <option @if(old('mosEstatMostra')=='Esgotat') selected @endif value="Esgotat">Esgotat</option>
                                        <option @if(old('mosEstatMostra')=='En procés') selected @endif value="En procés">En procés</option>
                                    </select>
                                </div>
                                 
                              </div>
                              <div class="row gx-3 mb-4">
                                <h5 class="mt-4">Previsió</h5>
                                <div class="col-6">
                                  <label for="mosPrOrigen" class="form-label">Origen Llavor</label>
                                  <input type="text" class="form-control" id="mosPrOrigen" name="mosPrOrigen" placeholder="" value="{{ old('mosPrOrigen') }}" >
                                </div>

                                <div class="col-3">
                                    <label for="mosPrSeleccio" class="form-label">Qui fa la selecció</label>
                                    <select class="form-select" id="mosPrSeleccio" name="mosPrSeleccio">
                                        <option disabled selected>Selecciona</option>
                                        <option @if(old('mosPrSeleccio')=='Productor') selected @endif value="Productor">Productor</option>
                                        <option @if(old('mosPrSeleccio')=='Nosaltres') selected @endif value="Nosaltres">Nosaltres</option>
                                        <option @if(old('mosPrSeleccio')=='No cal') selected @endif value="No cal">No cal</option>
                                    </select>
                                </div>

                                <div class="col-3">
                                    <label for="mosPrCollita" class="form-label">Qui fa la collita</label>
                                    <select class="form-select" id="mosPrCollita" name="mosPrCollita">
                                        <option disabled selected>Selecciona</option>
                                        <option @if(old('mosPrCollita')=='Productor') selected @endif value="Productor">Productor</option>
                                        <option @if(old('mosPrCollita')=='Nosaltres') selected @endif value="Nosaltres">Nosaltres</option>
                                    </select>
                                </div>
                              </div>

                              <div class="row gx-3 mb-4">
                                <div class="col-3">
                                  <label for="mosPrDataEntrega" class="form-label">Data Entrega</label>
                                  <input type="date" class="form-control" id="mosPrDataEntrega" name="mosPrDataEntrega" placeholder="" value="{{ old('mosPrDataEntrega') }}" >
                                </div>
                                <div class="col-2">
                                  <label for="mosPrMinGrams" class="form-label">MinGrams</label>
                                  <input type="float" class="form-control" id="mosPrMinGrams" name="mosPrMinGrams" placeholder="" value="{{ old('mosPrMinGrams') }}" >
                                </div>
                                <div class="col-2">
                                  <label for="mosPrMaxGrams" class="form-label">MaxGrams</label>
                                  <input type="float" class="form-control" id="mosPrMaxGrams" name="mosPrMaxGrams" placeholder="" value="{{ old('mosPrMaxGrams') }}" >
                                </div>
                                <div class="col-2">
                                  <label for="mosPrFormatEntrega" class="form-label">Format Entrega Previsió</label>
                                  <select class="form-select" id="mosPrFormatEntrega" name="mosPrFormatEntrega">
                                    <option disabled selected>Selecciona</option>
                                    <option @if(old('mosPrFormatEntrega')=='Llavor') selected @endif value="Llavor">Llavor</option>
                                    <option @if(old('mosPrFormatEntrega')=='Fruit') selected @endif value="Fruit">Fruit</option>
                                  </select>
                                </div>
                                <div class="col-3">
                                  <label for="mosPrTipusEntrega" class="form-label">Tipus Entrega Previsió</label>
                                  <select class="form-select" id="mosPrTipusEntrega" name="mosPrTipusEntrega">
                                    <option disabled selected>Selecciona</option>
                                    <option @if(old('mosPrTipusEntrega')=='Enviat') selected @endif value="Enviat">Enviat</option>
                                    <option @if(old('mosPrTipusEntrega')=='Entregat') selected @endif value="Entregat">Entregat</option>
                                    <option @if(old('mosPrTipusEntrega')=='Recollir') selected @endif value="Recollir">Recollir</option>
                                  </select>
                                </div>
                              </div>

                              <div class="row gx-3 mb-4">
                                <div class="col-3 ">
                                  <label for="mosPrDataSembra" class="form-label">Data Sembra</label>
                                  <input type="date" class="form-control" id="mosPrDataSembra" name="mosPrDataSembra" placeholder="" value="{{ old('mosPrDataSembra') }}" >
                                </div>
                                <div class="col-2 ">
                                  <label for="mosPrKgSembrats" class="form-label">Kg. Sembrats</label>
                                  <input type="float" class="form-control" id="mosPrKgSembrats" name="mosPrKgSembrats" placeholder="" value="{{ old('mosPrKgSembrats') }}" >
                                </div>
                                <div class="col-3 ">
                                  <label for="mosPrPreuAcordat" class="form-label">Preu acordat (€/Kg)</label>
                                  <input type="float" class="form-control" id="mosPrPreuAcordat" name="mosPrPreuAcordat" placeholder="" value="{{ old('mosPrPreuAcordat') }}" >
                                </div>
                              </div>

                              <div class="row gx-3 mb-4">
                                <div class="col-sm-12">
                                  <label for="mosPrObservacions" class="form-label">Observacions Previsió:</label>
                                  <textarea class="form-control" id="mosPrObservacions" name="mosPrObservacions" placeholder=""  cols="50" rows="10">{{ old('mosPrObservacions') }}</textarea>
                                </div>
                              </div>

                              <div class="row gx-3 mb-4">
                                <h5 class="mt-4">Entrega</h5>
                                <div class="col-3">
                                  <label for="mosArrTipusEntrega" class="form-label">Tipus Entrega</label>
                                  <select class="form-select" id="mosArrTipusEntrega" name="mosArrTipusEntrega">
                                    <option disabled selected>Selecciona</option>
                                    <option @if(old('mosArrTipusEntrega')=='Enviat') selected @endif value="Enviat">Enviat</option>
                                    <option @if(old('mosArrTipusEntrega')=='Entregat') selected @endif value="Entregat">Entregat</option>
                                    <option @if(old('mosArrTipusEntrega')=='Recollir') selected @endif value="Recollir">Recollir</option>
                                  </select>
                                </div>

                                <div class="col-3">
                                  <label for="mosArrFormatEntrega" class="form-label">Format Entrega Previsió</label>
                                  <select class="form-select" id="mosArrFormatEntrega" name="mosArrFormatEntrega">
                                    <option disabled selected>Selecciona</option>
                                    <option @if(old('mosArrFormatEntrega')=='Llavor') selected @endif value="Llavor">Llavor</option>
                                    <option @if(old('mosArrFormatEntrega')=='Fruit') selected @endif value="Fruit">Fruit</option>
                                  </select>
                                </div>

                                <div class="col-3 ">
                                  <label for="mosArrDataEntrega" class="form-label">Data Entrega</label>
                                  <input type="date" class="form-control" id="mosArrDataEntrega" name="mosArrDataEntrega" placeholder="" value="{{ old('mosArrDataEntrega') }}" >
                                </div>
                                                            
                                <div class="col-3 ">
                                  <label for="mosArrEstatEntrega" class="form-label">Estat Entrega</label>
                                  <select class="form-select" id="mosArrEstatEntrega" name="mosArrEstatEntrega">
                                    <option disabled selected>Selecciona</option>
                                    <option @if(old('mosArrEstatEntrega')=='Bo') selected @endif value="Bo">Bo</option>
                                    <option @if(old('mosArrEstatEntrega')=='Mal precintat') selected @endif value="Mal precintat">Mal precintat</option>
                                    <option @if(old('mosArrEstatEntrega')=='Verd') selected @endif value="Verd">Verd</option>
                                    <option @if(old('mosArrEstatEntrega')=='Podrit') selected @endif value="Podrit">Podrit</option>
                                  </select>
                                </div>
                              </div>
                              <div class="row gx-3 mb-4">
                                 <div class="col-3 ">
                                  <label for="mosArrEstatGenetic" class="form-label">Estat genetic</label>
                                  <input type="text" class="form-control" id="mosArrEstatGenetic" name="mosArrEstatGenetic" placeholder="" value="{{ old('mosArrEstatGenetic') }}" >
                                </div>
                                 <div class="col-3 ">
                                  <label for="mosArrGrams" class="form-label">Grams entregats</label>
                                  <input type="float" class="form-control" id="mosArrGrams" name="mosArrGrams" placeholder="" value="{{ old('mosArrGrams') }}" >
                                </div>
                                <div class="col-6 ">
                                  <label for="mosArrObservacions" class="form-label">Observacions Entrega</label>
                                  <input type="text" class="form-control" id="mosArrObservacions" name="mosArrObservacions" placeholder="" value="{{ old('mosArrObservacions') }}" >
                                </div>

                              </div>
                              <div class="row gx-3 mb-4">
                                <h5 class="mt-4">Comptabilitat</h5>
                                <div class="col-3 ">
                                  <label for="mosDataEntrega" class="form-label">Data Entrega</label>
                                  <input type="date" class="form-control" id="mosDataEntrega" name="mosDataEntrega" placeholder="" value="{{ old('mosDataEntrega') }}" >
                                </div>
                                 <div class="col-3 ">
                                  <label for="mosDataPagament" class="form-label">Data Pagament</label>
                                  <input type="date" class="form-control" id="mosDataPagament" name="mosDataPagament" placeholder="" value="{{ old('mosDataPagament') }}" >
                                </div>
                                <div class="col-2 ">
                                  <label for="mosPreuPagat" class="form-label">Preu pagat</label>
                                  <input type="float" class="form-control" id="mosPreuPagat" name="mosPreuPagat" placeholder="" value="{{ old('mosPreuPagat') }}" >
                                </div>
                                <div class="col-2 ">
                                  <label for="mosGramsNets" class="form-label">Grams nets</label>
                                  <input type="float" class="form-control" id="mosGramsNets" name="mosGramsNets" placeholder="" value="{{ old('mosGramsNets') }}" >
                                </div>
                                <div class="col-2 ">
                                  <label for="mosLlavorsGram" class="form-label">Llavors Gram</label>
                                  <input type="float" class="form-control" id="mosLlavorsGram" name="mosLlavorsGram" placeholder="" value="{{ old('mosLlavorsGram') }}" >
                                </div>
                              </div>
                              <div class="row gx-3 mb-4">
                                <div class="col-12 ">
                                  <label for="mosEstatComptable" class="form-label">Estat Comptable</label>
                                  <select class="form-select" id="mosEstatComptable" name="mosEstatComptable">
                                    <option disabled selected>Selecciona</option>
                                    <option @if(old('mosEstatComptable')=='Pagat') selected @endif value="Pagat">Pagat</option>
                                    <option @if(old('mosEstatComptable')=='Pendent pagar') selected @endif value="Pendent pagar">Pendent pagar</option>
                                    <option @if(old('mosEstatComptable')=='Falta Factura') selected @endif value="Falta Factura">Falta Factura</option>
                                  </select>
                                </div>
                              </div>
                              
                            </div>
                        </div>

                        <hr class="my-4" />

                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('mostres.index') }}" class="btn btn-light" >Cancelar</a>
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
