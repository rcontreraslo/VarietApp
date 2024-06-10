<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Afegir nova mostre
        </h2>
        <a class="btn btn-info" href="{{ route('mostres.index') }}"><i class="fa-solid fa-arrow-left"></i> Tornar a llistat</a>
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

                        <form action="{{ route('mostres.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                              <div class="row gx-3">

                                <div class="col-3 ">
                                  <label for="name" class="form-label">Nom</label>
                                  <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosCodi" class="form-label">Codi</label>
                                  <input type="number" class="form-control" id="mosCodi" name="mosCodi" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="varietat_id" class="form-label">Varietat</label>
                                  <select class="form-select" id="varietat_id" name="varietat_id">
                                    <option disabled selected>Selecciona varietat</option>
                                     @foreach ($varietats as $varietat)
                                       <option value="{{ $varietat->id }}">{{$varietat->name}}</option>
                                     @endforeach
                                  </select>
                                </div>
                              
                                <div class="col-3 ">
                                  <label for="multiplicador_id" class="form-label">Multiplicador</label>
                                  <select class="form-select" id="multiplicador_id" name="multiplicador_id">
                                    <option disabled selected>Selecciona espècie</option>
                                     @foreach ($multiplicadors as $multiplicador)
                                       <option value="{{ $multiplicador->id }}">{{$multiplicador->name}}</option>
                                     @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="row gx-3">
                                <div class="col-3 ">
                                  <label for="mosAny" class="form-label">Any</label>
                                  <input type="number" class="form-control" id="mosAny" name="mosAny" placeholder="" value="" required>
                                </div>
                                 <div class="col-3 ">
                                  <label for="mosEstatMostra" class="form-label">Estat Mostra</label>
                                  <input type="number" class="form-control" id="mosEstatMostra" name="mosEstatMostra" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosAny" class="form-label">Mostra Any</label>
                                  <input type="year" class="form-control" id="mosAny" name="mosAny" placeholder="" value="" required>
                                </div>


                                <div class="col-3 ">
                                  <label for="mosEstatMostra" class="form-label">Estat Mostra</label>
                                  <input type="text" class="form-control" id="mosEstatMostra" name="mosEstatMostra" placeholder="" value="" required>
                                </div>
                              </div>
                              <div class="row gx-3">

                                <div class="col-3 ">
                                  <label for="mosPrOrigen" class="form-label">mosPrOrigen</label>
                                  <input type="text" class="form-control" id="mosPrOrigen" name="mosPrOrigen" placeholder="" value="" required>
                                </div>
                                 <div class="col-3 ">
                                  <label for="mosPrSeleccio" class="form-label">mosPrOrigen</label>
                                  <input type="text" class="form-control" id="mosPrSeleccio" name="mosPrSeleccio" placeholder="" value="" required>
                                </div>

                                <div class="col-3 ">
                                  <label for="mosPrCollita" class="form-label">Collita</label>
                                  <input type="text" class="form-control" id="mosPrCollita" name="mosPrCollita" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosPrDataEntrega" class="form-label">Data Entrega</label>
                                  <input type="text" class="form-control" id="mosPrDataEntrega" name="mosPrDataEntrega" placeholder="" value="" required>
                                </div>
                              </div>
                              <div class="row gx-3">

                                <div class="col-3 ">
                                  <label for="mosPrMinGrams" class="form-label">MinGrams</label>
                                  <input type="text" class="form-control" id="mosPrMinGrams" name="mosPrMinGrams" placeholder="" value="" required>
                                </div>

                                <div class="col-3 ">
                                  <label for="mosPrMaxGrams" class="form-label">MaxGrams</label>
                                  <input type="text" class="form-control" id="mosPrMaxGrams" name="mosPrMaxGrams" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosPrFormatEntrega" class="form-label">Format Entrega</label>
                                  <input type="text" class="form-control" id="mosPrFormatEntrega" name="mosPrFormatEntrega" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosPrTipusEntrega" class="form-label">Tipus Entrega</label>
                                  <input type="text" class="form-control" id="mosPrTipusEntrega" name="mosPrTipusEntrega" placeholder="" value="" required>
                                </div>
                              </div>
                              <div class="row gx-3">

                                <div class="col-3 ">
                                  <label for="mosPrDataSembra" class="form-label">Data Sembra</label>
                                  <input type="text" class="form-control" id="mosPrDataSembra" name="mosPrDataSembra" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosPrKgSembrats" class="form-label">KGS Sembrats</label>
                                  <input type="text" class="form-control" id="mosPrKgSembrats" name="mosPrKgSembrats" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosPrPreuAcordat" class="form-label">Preu acordat</label>
                                  <input type="text" class="form-control" id="mosPrPreuAcordat" name="mosPrPreuAcordat" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosPrObservacions" class="form-label">Observacions</label>
                                  <input type="text" class="form-control" id="mosPrObservacions" name="mosPrObservacions" placeholder="" value="" required>
                                </div>
                              </div>
                              <div class="row gx-3">
                                <div class="col-3 ">
                                  <label for="mosArrDataEntrega" class="form-label">Data Entrega</label>
                                  <input type="text" class="form-control" id="mosArrDataEntrega" name="mosArrDataEntrega" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosArrFormatEntrega" class="form-label">Format Entrega</label>
                                  <input type="text" class="form-control" id="mosArrFormatEntrega" name="mosArrFormatEntrega" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosArrTipusEntrega" class="form-label">Tipus Entrega</label>
                                  <input type="text" class="form-control" id="mosArrTipusEntrega" name="mosArrTipusEntrega" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosArrEstatEntrega" class="form-label">Estat Entrega</label>
                                  <input type="text" class="form-control" id="mosArrEstatEntrega" name="mosArrEstatEntrega" placeholder="" value="" required>
                                </div>
                              </div>
                              <div class="row gx-3">
                                 <div class="col-3 ">
                                  <label for="mosArrEstatGenetic" class="form-label">Estat genetic</label>
                                  <input type="text" class="form-control" id="mosArrEstatGenetic" name="mosArrEstatGenetic" placeholder="" value="" required>
                                </div>
                                 <div class="col-3 ">
                                  <label for="mosArrGrams" class="form-label">Grams</label>
                                  <input type="text" class="form-control" id="mosArrGrams" name="mosArrGrams" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosArrObservacions" class="form-label">Grams</label>
                                  <input type="text" class="form-control" id="mosArrObservacions" name="mosArrObservacions" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosEstatComptable" class="form-label">Estat Comptable</label>
                                  <input type="text" class="form-control" id="mosEstatComptable" name="mosEstatComptable" placeholder="" value="" required>
                                </div>
                              </div>
                              <div class="row gx-3">
                                 <div class="col-3 ">
                                  <label for="mosDataEntrega" class="form-label">Estat Comptable</label>
                                  <input type="text" class="form-control" id="mosDataEntrega" name="mosDataEntrega" placeholder="" value="" required>
                                </div>
                                 <div class="col-3 ">
                                  <label for="mosDataPagament" class="form-label">Data Pagament</label>
                                  <input type="text" class="form-control" id="mosDataPagament" name="mosDataPagament" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosPreuPagat" class="form-label">Preu pagat</label>
                                  <input type="text" class="form-control" id="mosPreuPagat" name="mosPreuPagat" placeholder="" value="" required>
                                </div>
                                <div class="col-3 ">
                                  <label for="mosGramsNets" class="form-label">Grams nets</label>
                                  <input type="text" class="form-control" id="mosGramsNets" name="mosGramsNets" placeholder="" value="" required>
                                </div>
                              </div>
                              <div class="row gx-3">
                                <div class="col-3 ">
                                  <label for="mosLlavorsGram" class="form-label">Llavors Gram</label>
                                  <input type="text" class="form-control" id="mosLlavorsGram" name="mosLlavorsGram" placeholder="" value="" required>
                                </div>
                            </div>

                            </div>    

                              </div>
                              
                            </div>
                        </div>

                        <hr class="my-4" />

                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('varietats.index') }}" class="btn btn-light" >Cancelar</a>
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
