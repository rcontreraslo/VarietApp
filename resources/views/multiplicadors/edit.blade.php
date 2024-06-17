<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Multiplicador:  {{$multiplicador-> name}}
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

                        <form action="{{ route('multiplicadors.update',$multiplicador->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                              <div class="row gx-3 mb-4">

                                <div class="col-6 ">
                                  <label for="name" class="form-label obligat">Nom:</label>
                                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="" value="{{$multiplicador->name}}" >
                                  @error('name')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                <div class="col-6 ">
                                  <label for="mulNIF" class="form-label ">NIF:</label>
                                  <input type="text" class="form-control" id="mulNIF" name="mulNIF" placeholder="" value="{{$multiplicador->mulNIF}}" >
                                   @error('mulNIF')
                                          <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                </div>
                            </div>
                            <div class="row gx-3 mb-4">
                                <div class="col-4 ">
                                  <label for="mulPersonaContacte" class="form-label">Personal Contacte:</label>
                                  <input type="text" class="form-control" id="mulPersonaContacte" name="mulPersonaContacte" placeholder="" value="{{$multiplicador->mulPersonaContacte}}" >
                                </div>
                                
                                <div class="col-3 ">
                                  <label for="mulTelefon" class="form-label">Telefon:</label>
                                  <input type="number" class="form-control" id="mulTelefon" name="mulTelefon" placeholder="" value="{{$multiplicador->mulTelefon}}" >
                                </div>

                                <div class="col-5 ">
                                  <label for="mulEmail" class="form-label">Email:</label>
                                  <input type="text" class="form-control" id="mulEmail" name="mulEmail" placeholder="" value="{{$multiplicador->mulEmail}}" >
                                  @error('mulEmail')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                            </div>
                           <div class="row gx-3 mb-4">
                                <div class="col-6 ">
                                  <label for="mulAdreca" class="form-label">Adreça:</label>
                                  <input type="text" class="form-control" id="mulAdreca" name="mulAdreca" placeholder="" value="{{$multiplicador->mulAdreca}}" >
                                </div>

                                <div class="col-2 ">
                                  <label for="mulCP" class="form-label">CP:</label>
                                  <input type="text" class="form-control" id="mulCP" name="mulCP" placeholder="" value="{{$multiplicador->mulCP}}" >
                                </div>

                                <div class="col-4 ">
                                 <label for="municipi_id" class="form-label obligat">Municipi:</label>
                                  <select class="form-select @error('name') is-invalid @enderror" id="municipi_id" name="municipi_id">
                                    <option disabled selected>Selecciona provincia</option>
                                     @foreach ($municipis as $municipi)
                                       <option value="{{ $municipi->id }}" @if($municipi->id == $multiplicador->municipi_id) selected @endif>{{$municipi->name}}</option>
                                     @endforeach
                                  </select>
                                  @error('municipi_id')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row gx-3 mb-4">


                                 <div class="col-4 ">
                                  <label for="mulCadastral" class="form-label">Cadastral:</label>
                                  <input type="text" class="form-control" id="mulCadastral" name="mulCadastral" placeholder="" value="{{$multiplicador->mulCadastral}}" >
                                </div>
                                
                                  
                                  <div class="col-2 ">
                                  <label for="mulPoligon" class="form-label">Poligon:</label>
                                  <input type="text" class="form-control" id="mulPoligon" name="mulPoligon" placeholder="" value="{{$multiplicador->mulPoligon}}" >
                                </div>
                                <div class="col-2 ">
                                  <label for="mulParcela" class="form-label">Parcela:</label>
                                  <input type="text" class="form-control" id="mulParcela" name="mulParcela" placeholder="" value="{{$multiplicador->mulParcela}}" >
                                </div>
                                <div class="col-2 ">
                                  <label for="mulRecinte" class="form-label">Recinte:</label>
                                  <input type="text" class="form-control" id="mulRecinte" name="mulRecinte" placeholder="" value="{{$multiplicador->mulRecinte}}" >
                                </div>
                            </div>
                            
                            <div class="row gx-3">

                                <div class="col-sm-12">
                                  <label for="mulObservacions"class="form-label">Descripció:</label>
                                  <textarea class="form-control" id="mulObservacions" name="mulObservacions" placeholder=""  cols="50" rows="10">{{$multiplicador->mulObservacions}}</textarea>
                                </div>



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
