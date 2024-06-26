<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Persona:  {{$persone-> name}} {{$persone->perCognoms}}
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

                        <form action="{{ route('persones.update',$persone->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                              <div class="row gx-3 mb-4">

                                <div class="col-4 ">
                                  <label for="name" class="form-label obligat">Nom:</label>
                                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="" value="{{$persone->name}}" >
                                  @error('name')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>

                                <div class="col-4 ">
                                  <label for="perCognoms" class="form-label">Cognoms:</label>
                                  <input type="text" class="form-control" id="perCognoms" name="perCognoms" placeholder="" value="{{$persone->perCognoms}}" >
                                </div>

                                <div class="col-4 ">
                                  <label for="perVinculacio" class="form-label">Vinculacio:</label>
                                  <input type="text" class="form-control" id="perVinculacio" name="perVinculacio" placeholder="" value="{{$persone->perVinculacio}}" >
                                </div>
                            </div>
                            <div class="row gx-3 mb-4">

                                <div class="col-6 ">
                                  <label for="perOrganitzacio" class="form-label">Organització:</label>
                                  <input type="text" class="form-control" id="perOrganitzacio" name="perOrganitzacio" placeholder="" value="{{$persone->perOrganitzacio}}" >
                                </div>
                                <div class="col-2 ">
                                  <label for="perTelefon" class="form-label">Telefon:</label>
                                  <input type="text" class="form-control" id="perTelefon" name="perTelefon" placeholder="" value="{{$persone->perTelefon}}" >
                                </div>
                                <div class="col-4 ">
                                  <label for="perEmail" class="form-label">Email:</label>
                                  <input type="text" class="form-control" id="perEmail" name="perEmail" placeholder="" value="{{$persone->perEmail}}" >
                                  @error('perEmail')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row gx-3 mb-4">
                                <div class="col-6 ">
                                 <label for="municipi_id" class="form-label obligat">Municipi:</label>
                                  <select class="form-select" id="municipi_id" name="municipi_id">
                                    <option value="0">...</option>
                                     @foreach ($municipis as $municipi)
                                       <option value="{{ $municipi->id }}" @if($municipi->id == $persone->municipi_id) selected @endif>{{$municipi->name}}</option>
                                     @endforeach
                                  </select>
                                </div>
                                <div class="col-2 ">
                                  <label for="perCP" class="form-label">CP:</label>
                                  <input type="text" class="form-control" id="perCP" name="perCP" placeholder="" value="{{$persone->perCP}}" >
                                </div>
                            </div>
                            <div class="row gx-3 mb-4">

                                <div class="col-sm-12">
                                  <label for="perObservacions"class="form-label">Descripció:</label>
                                  <textarea class="form-control" id="perObservacions" name="perObservacions" placeholder=""  cols="50" rows="10">{{$persone->perObservacions}}</textarea>
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
